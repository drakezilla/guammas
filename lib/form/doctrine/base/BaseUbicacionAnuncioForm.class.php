<?php

/**
 * UbicacionAnuncio form base class.
 *
 * @method UbicacionAnuncio getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUbicacionAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'sucursal_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => true)),
      'anuncio_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sucursal_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'required' => false)),
      'anuncio_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('ubicacion_anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UbicacionAnuncio';
  }

}
