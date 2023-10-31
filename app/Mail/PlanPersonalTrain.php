<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Colaboradores;
use App\Models\Socios;
use App\ServiceEnc\Enc;

class PlanPersonalTrain extends Mailable
{
    use Queueable, SerializesModels;


    public  $planoTreino;
    protected $Enc;

    public function __construct($planoTreino)
    {
        $this->planoTreino =  $planoTreino;
        $this->Enc = new Enc();
    }


    public function build()

    {
        $socio = Socios::find($this->planoTreino->socio_id);
        $name =  $this->Enc->desencriptar($socio->nome) .' '. $this->Enc->desencriptar($socio->apelido);
        $PTrain = $socio->PT_id;

        $personalTrainer = Colaboradores::find($PTrain);
        $nomepersonalTrainer = $this->Enc->desencriptar($personalTrainer->nome).' '.$this->Enc->desencriptar($personalTrainer->apelido);

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
