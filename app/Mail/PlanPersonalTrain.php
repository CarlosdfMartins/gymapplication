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


class PlanPersonalTrain extends Mailable
{
    use Queueable, SerializesModels;


    public  $planoTreino;

    public function __construct($planoTreino)
    {
        $this->planoTreino =  $planoTreino;
    }


    public function build()

    {
        $socio = Socios::find($this->planoTreino->socio_id);
        $name = $socio->nome .' '.$socio->apelido;
        $PTrain = $socio->PT_id;

        $personalTrainer = Colaboradores::find($PTrain);
        $nomepersonalTrainer = $personalTrainer->nome.' '.$personalTrainer->apelido;

        return $this->view('emails.planPersonalTrain')
            ->with(['planNutri' => $this->planoTreino, 'socioName' => $name, 'personal_trainer' => $nomepersonalTrainer])
            ->subject('Plano de Treino');
    }



    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Plan Personal Train',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.planPersonalTrain',
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
