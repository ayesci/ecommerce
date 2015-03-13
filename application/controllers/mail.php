<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller
{
    public function send()
    {
        require "application/vendor/autoload.php";

        $subject = "coucou";
        $body = "Partie princale du message";

        $message = new Swift_Message($subject);
        $message->setFrom("tonsite@tonsite.com");
        $message->setTo("anneclaire.delavergne@gmail.com");
        $message->setBody($body);

        $transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
        $transport->setUsername("anneclaire.delavergne@gmail.com");
        $transport->setPassword("LKQ9dbjidMjaWfP8KXVD9g");

        $swift = Swift_Mailer::newInstance($transport);
        $swift->send($message);

        $worked = $swift->send($message, $errors);
        if($worked)
        {
            echo "ok";
        }
        else
        {
            echo "pas bon.";
        }
        var_dump($errors);
    }



}