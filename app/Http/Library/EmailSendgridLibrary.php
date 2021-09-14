<?php  namespace PedidosLaravelVue\Http\Library;

use SendGrid\Mail\Mail;

class EmailSendgridLibrary
{
    private $from_email;
    private $from_name;
    private $to_email;
    private $to_name;
    private $subject;
    private $content;

    public function __construct($from_name, $from_email, $to_email, $to_name, $subject, $content)
    {
        $this->api_key = config('mail.sendgrid_api_key');
        $this->from_email = $from_email;
        $this->from_name = $from_name;
        $this->to_email = $to_email;
        $this->to_name = $to_name;
        $this->subject = $subject;
        $this->content = $content;
    }

    public function sendSingleEmail()
    {
        $email = new Mail();
        $email->setFrom($this->from_email, $this->from_name);
        $email->setSubject($this->subject);
        $email->addTo($this->to_email, $this->to_name);
        $email->addContent('text/html', $this->content);
        $sendgrid = new \SendGrid($this->api_key);
        try {
            return $sendgrid->send($email);
        } catch (throwable $th) {
           throw $th;
        }
    }
}
