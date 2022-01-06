<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMail;
use App\Models\Email;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Email $email)
    {
        //
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $data= array(
            'id'=> $this->email->id,
            'asunto'=> $this->email->asunto,
            'mensaje'=> $this->email->mensaje,
            'destino'=> $this->email->destino,
           );
        $email = new SendMail( $data);
        Mail::to($this->email->destino)->send($email);
      
        $mail = Email::where('id',$this->email->id)->first();
        $mail->status = 'Enviado';
        $mail->save();
        }
}
