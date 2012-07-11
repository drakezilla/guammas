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
    }

}
