<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public array $content;
    public   $subject;
    /**
     * Create a new message instance.
     */
    private $template = 'contact_form';
    public function __construct(array $content, $template=null,$subject = 'Some subject here') {
        $this->content = $content;
        if(isset($template) && $template != null){
            $this->template = $template;
            $this->subject = $subject;
        }
    }


    public function build(): SendMail
    {
        return $this->subject($this->subject)
            ->view('emails.'.$this->template);
    }
}
