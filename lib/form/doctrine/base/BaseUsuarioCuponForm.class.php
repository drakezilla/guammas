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
      'usuario_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'anuncio_cupon_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AnuncioCupon'), 'add_empty' => false)),
      'created_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'usuario_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'anuncio_cupon_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AnuncioCupon'))),
      'created_at'       => new sfValidatorDateTime(),
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
