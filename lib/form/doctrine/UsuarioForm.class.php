<?php

/**
 * Usuario form.
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UsuarioForm extends BaseUsuarioForm {

    public function configure() {
        unset(
                $this["actividad"], 
                $this["ultimo_inicio_sesion"], 
                $this["activo"], 
                $this["rol_id"], 
                $this["created_at"], 
                $this["updated_at"]
        );

        $this->widgetSchema['avatar'] = new sfWidgetFormInputFile();
        $this->widgetSchema['contrasena'] = new sfWidgetFormInputPassword();

        $this->validatorSchema['nombre'] = new sfValidatorString(array('max_length' => 50, 'required' => false));
        $this->validatorSchema['apellido'] = new sfValidatorString(array('max_length' => 50, 'required' => false));
        $this->validatorSchema['actividad'] = new sfValidatorString(array('max_length' => 50, 'required' => false));
        $this->validatorSchema['ultimo_inicio_sesion'] = new sfValidatorString(array('max_length' => 50, 'required' => false));
        $this->validatorSchema['activo'] = new sfValidatorString(array('max_length' => 50, 'required' => false));
        $this->validatorSchema['avatar'] = new sfValidatorFile(array(
                    'required' => false,
                    'path' => sfConfig::get('sf_upload_dir') . '/avatar',
                    'mime_types' => 'web_images',
                ));
        $this->widgetSchema['pref_correo_electronico_publico']->setLabel('Permitir que todos vean mi correo electrónico');
        $this->widgetSchema['pref_enlace_facebook']->setLabel('Mostrar enlace a mi perfil en Facebook');
        $this->widgetSchema['pref_enlace_googleplus']->setLabel('Mostrar enlace a mi perfil en Google Plus');
        $this->widgetSchema['pref_enlace_twitter']->setLabel('Mostrar enlace a mi perfil en Twitter');
        $this->widgetSchema['pref_notificacion_oferta']->setLabel('Notificarme cuando una empresa que sigo que sigo publica una oferta');
        $this->widgetSchema['pref_notificacion_evento']->setLabel('Notificarme cuando una empresa que sigo que sigo publica un evento');
        $this->widgetSchema['pref_notificacion_cupon']->setLabel('Notificarme cuando una empresa que sigo que sigo publica una oferta de cupones');
        $this->widgetSchema['pref_noticia_guamma']->setLabel('Recibir correo electronico con noticias de Guammas');
    }

}
