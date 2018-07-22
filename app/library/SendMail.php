<?php

use Phalcon\Mvc\User\Component as componente;

class SendMail extends componente {

    function enviaEmail($paraemail) {
    $transport = (new Swift_SmtpTransport('dedrelay.secureserver.net', 25));
    $mailer = new Swift_Mailer($transport);

    // Create a message
    $message = new Swift_Message();

        if ($paraemail['subject'] != '') {
            $message->setSubject($paraemail['subject']);
        }
        if ($paraemail['fromemail']['email'] != NULL) {
            $message->setFrom(array($paraemail['fromemail']['email'] => $paraemail['fromemail']['nombre']));
        }

        if ($paraemail['toemail']['email'] != NULL) {
            $message->setTo(array($paraemail['toemail']['email'] => $paraemail['toemail']['nombre']));
        }

        if (isset($paraemail['bccemail']['email'])) {
            $message->addTo($paraemail['bccemail']['email'], $paraemail['bccemail']['nombre']);
        }

        if ($paraemail['body'] != '') {
            $message->setBody($paraemail['body'], 'text/plain');
        }

        if ($paraemail['part'] != '') {
            $message->addPart($paraemail['part'], 'text/html');
        }

        if (isset($paraemail['attach'])) {
            if ($paraemail['attach'] != '') {
                $message->attach(Swift_Attachment::fromPath($paraemail['attach']));
            }
        }
        if (isset($paraemail['attach1'])) {
            if ($paraemail['attach1'] != '') {
                $message->attach(Swift_Attachment::fromPath($paraemail['attach1']));
            }
        }


        if ($mailer->send($message)) {
            $envio = "Sent";
        } else {
            $envio = "Failed";
        }
        return $envio;
    }

}
