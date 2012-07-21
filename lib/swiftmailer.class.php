<?php

class EmailClass {

    public $transport,
            $message,
            $mailer;

    public function __construct() {
        $this->transport = Swift_SmtpTransport::newInstance(sfConfig::get('app_correo_servidor_smtp'), sfConfig::get('app_correo_servidor_port'), sfConfig::get('app_correo_servidor_secu'))
                ->setUsername(sfConfig::get('app_correo_usuario'))
                ->setPassword(sfConfig::get('app_correo_contrasena'));
        $this->mailer = Swift_Mailer::newInstance($this->transport);
    }

    public function correoExito($para, $cuerpo) {
        $this->message = Swift_Message::newInstance('¡Cuenta creada!')
                ->setContentType('text/html')
                ->setFrom(array(sfConfig::get('app_correo_usuario') => sfConfig::get('app_correo_nombre_mostrar')))
                ->setTo(array($para => 'Usuario'));
        $this->enviarEmail($cuerpo);
    }

    protected function enviarEmail($cuerpo) {

        $this->message->setBody($cuerpo);
        return $this->mailer->send($this->message);
    }

}
?>

