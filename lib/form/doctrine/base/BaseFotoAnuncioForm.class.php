<?php

/**
 * FotoAnuncio form base class.
 *
 * @method FotoAnuncio getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFotoAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'imagen'     => new sfWidgetFormInputText(),
      'anuncio_id' => new sfWidgetFormInputText(),
      'activo'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'imagen'     => new sfValidatorString(array('max_length' => 255)),
      'anuncio_id' => new sfValidatorInteger(),
      'activo'     => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('foto_anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FotoAnuncio';
  }

}
