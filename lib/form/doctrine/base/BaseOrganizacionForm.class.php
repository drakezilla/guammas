<?php

/**
 * Organizacion form base class.
 *
 * @method Organizacion getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseOrganizacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'nombre_organizacion'     => new sfWidgetFormInputText(),
      'logotipo'                => new sfWidgetFormInputText(),
      'categoria_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => false)),
      'facebook_organizacion'   => new sfWidgetFormInputText(),
      'twitter_organizacion'    => new sfWidgetFormInputText(),
      'googleplus_organizacion' => new sfWidgetFormInputText(),
      'pagina_web'              => new sfWidgetFormInputText(),
      'documento'               => new sfWidgetFormInputText(),
      'verificada'              => new sfWidgetFormInputCheckbox(),
      'usuario_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'activa'                  => new sfWidgetFormInputCheckbox(),
      'salt'                    => new sfWidgetFormInputText(),
      'token'                   => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre_organizacion'     => new sfValidatorString(array('max_length' => 150)),
      'logotipo'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'categoria_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'))),
      'facebook_organizacion'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'twitter_organizacion'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'googleplus_organizacion' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'pagina_web'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'documento'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'verificada'              => new sfValidatorBoolean(),
      'usuario_id'              => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'activa'                  => new sfValidatorBoolean(),
      'salt'                    => new sfValidatorString(array('max_length' => 40)),
      'token'                   => new sfValidatorString(array('max_length' => 32)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('organizacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organizacion';
  }

}
