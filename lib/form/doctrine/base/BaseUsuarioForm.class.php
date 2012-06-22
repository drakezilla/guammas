<?php

/**
 * Usuario form base class.
 *
 * @method Usuario getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                              => new sfWidgetFormInputHidden(),
      'nombre_usuario'                  => new sfWidgetFormInputText(),
      'contrasena'                      => new sfWidgetFormInputText(),
      'correo_electronico'              => new sfWidgetFormInputText(),
      'nombre'                          => new sfWidgetFormInputText(),
      'apellido'                        => new sfWidgetFormInputText(),
      'avatar'                          => new sfWidgetFormInputText(),
      'actividad'                       => new sfWidgetFormInputText(),
      'ultimo_inicio_sesion'            => new sfWidgetFormDateTime(),
      'activo'                          => new sfWidgetFormInputText(),
      'perfil_facebook'                 => new sfWidgetFormInputText(),
      'perfil_twitter'                  => new sfWidgetFormInputText(),
      'pref_correo_electronico_publico' => new sfWidgetFormInputText(),
      'rol_id'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'add_empty' => true)),
      'ciudad_id'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => true)),
      'created_at'                      => new sfWidgetFormDateTime(),
      'updated_at'                      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre_usuario'                  => new sfValidatorString(array('max_length' => 20)),
      'contrasena'                      => new sfValidatorString(array('max_length' => 48)),
      'correo_electronico'              => new sfValidatorString(array('max_length' => 50)),
      'nombre'                          => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'apellido'                        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'avatar'                          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'actividad'                       => new sfValidatorInteger(),
      'ultimo_inicio_sesion'            => new sfValidatorDateTime(array('required' => false)),
      'activo'                          => new sfValidatorInteger(),
      'perfil_facebook'                 => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'perfil_twitter'                  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'pref_correo_electronico_publico' => new sfValidatorInteger(),
      'rol_id'                          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'required' => false)),
      'ciudad_id'                       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'required' => false)),
      'created_at'                      => new sfValidatorDateTime(),
      'updated_at'                      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

}
