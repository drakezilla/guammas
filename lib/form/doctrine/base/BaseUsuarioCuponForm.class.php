<?php

/**
 * UsuarioCupon form base class.
 *
 * @method UsuarioCupon getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUsuarioCuponForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'usuario_id'       => new sfWidgetFormInputText(),
      'anuncio_cupon_id' => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'       => new sfValidatorInteger(array('required' => false)),
      'anuncio_cupon_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('usuario_cupon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UsuarioCupon';
  }

}
