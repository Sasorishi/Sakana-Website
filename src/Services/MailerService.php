<?php

namespace App\Services;
use PHPMailer\PHPMailer\PHPMailer;
use Throwable;

class MailerService {
    private $mailer_username;
    private $mailer_password;
    private $mailer_provider;
    private $mailer_port;
    private $dir_templates;

    public function __construct($mailer_username, $mailer_password, $mailer_provider, $mailer_port, $dir_templates) {
        $this->mailer_username = $mailer_username;
        $this->mailer_password = $mailer_password;
        $this->mailer_provider = $mailer_provider;
        $this->mailer_port = $mailer_port;
        $this->dir_templates = $dir_templates;
    }

    public function sendMail($request) {
        $mailer_username = $this->mailer_username;
        $mailer_password = $this->mailer_password;
        $mailer_provider = $this->mailer_provider;
        $mailer_port = $this->mailer_port;
        $sended = false;

        try {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = $mailer_provider;
            $mail->Port = $mailer_port;
            $mail->SMTPAuth = true;
            $mail->Username = $mailer_username;
            $mail->Password = $mailer_password;
            $mail->setFrom($mailer_username, 'Sakana Administration - Contact');
            $mail->addReplyTo($request->request->get('email'), $request->request->get('fullname'));
            $mail->addAddress($mailer_username, 'Contact');
            $mail->Subject = 'Contact Website - ' .$request->request->get('fullname'). ' - ' .$request->request->get('email');
            $mail->Body = $request->request->get('message');
            $mail->send();

            // if (!$mail->send()) {
            //     echo 'Mailer Error: ' . $mail->ErrorInfo;
            // } else {
                // echo 'The email message was sent.';
                $sended = true;
            // }
        } catch (Throwable $th) {
            throw $th;
        }

        return $sended;
    }

    public function sendRegisted($email, $name) {
        $mailer_username = $this->mailer_username;
        $mailer_password = $this->mailer_password;
        $mailer_provider = $this->mailer_provider;
        $mailer_port = $this->mailer_port;
        $dir_templates = $this->dir_templates;
        $template = file_get_contents($dir_templates.'emailing/1675203885219-CLaujD5NotgkxwCs/signin.html');
        $sended = false;

        try {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = $mailer_provider;
            $mail->Port = $mailer_port;
            $mail->SMTPAuth = true;
            $mail->Username = $mailer_username;
            $mail->Password = $mailer_password;
            $mail->setFrom($mailer_username, 'Sakana Administration - Support');
            $mail->addReplyTo($email, $name);
            $mail->addAddress($email, $name);
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation signin - ' .$name. ' - ' .$email;
            $mail->Body = $template;
            $mail->send();

            // if (!$mail->send()) {
            //     echo 'Mailer Error: ' . $mail->ErrorInfo;
            // } else {
                // echo 'The email message was sent.';
                $sended = true;
            // }
        } catch (Throwable $th) {
            throw $th;
        }

        return $sended;
    }

    public function sendPassword($email, $token) {
        $mailer_username = $this->mailer_username;
        $mailer_password = $this->mailer_password;
        $mailer_provider = $this->mailer_provider;
        $mailer_port = $this->mailer_port;
        $dir_templates = $this->dir_templates;
        $template = file_get_contents($dir_templates.'emailing/1675203885219-CLaujD5NotgkxwCs/resetPassword.html');
        $sended = false;

        $variables['domain'] = 'https://dong-hanh.org';
        $variables['token'] = $token;
        foreach($variables as $key => $value)
        {
            $template = str_replace('{{ '.$key.' }}', $value, $template);
        }

        try {
            $mail = new PHPMailer;
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Host = $mailer_provider;
            $mail->Port = $mailer_port;
            $mail->SMTPAuth = true;
            $mail->Username = $mailer_username;
            $mail->Password = $mailer_password;
            $mail->setFrom($mailer_username, 'Sakana Administration - Support');
            $mail->addReplyTo($email, $email);
            $mail->addAddress($email, $email);
            $mail->isHTML(true);
            $mail->Subject = 'Reset password';
            // $mail->Body = $dir_templates.'emailing/1675192987562-WOJnCvduOKxNHOLB/index.html';
            $mail->Body = $template;
            $mail->send();
            // if (!$mail->send()) {
            //     // echo 'Mailer Error: ' . $mail->ErrorInfo;
            // } else {
            //     echo 'The email message was sent.';
                $sended = true;
            // }
        } catch (Throwable $th) {
            throw $th;
        }

        return $sended;
    }

}