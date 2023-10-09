<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Colaboradores;
use App\Models\Socios;

class PlanNutricionMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $planNutri;

    public function __construct($planNutri)
    {
        $this->planNutri = $planNutri;
    }

    public function build()

    {

        $socio = Socios::find($this->planNutri->socio_id);
        $name = $socio->nome .' '.$socio->apelido;
        $nutri = $socio->NUT_id;

        $nutricionista = Colaboradores::find($nutri);
        $nomeNutricionista = $nutricionista->nome.' '.$nutricionista->apelido;

        return $this->view('emails.planNutricion')
            ->with(['planNutri' => $this->planNutri, 'socioName' => $name, 'nutricionista' => $nomeNutricionista])
            ->subject('Plano de Nutrição');
    }

    public function envelope(): Envelope
    {
       
        $socio = Socios::find($this->planNutri->socio_id);

        $to = $socio ? $socio->email : null;
        $name = $socio ? $socio->nome : null;

        return (new Envelope())
            ->to($to, $name)
            ->subject('Plano de Nutrição');
    }



    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.planNutricion',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
