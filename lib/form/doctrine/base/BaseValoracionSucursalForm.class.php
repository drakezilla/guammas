<?php

/**
 * ValoracionSucursal form base class.
 *
 * @method ValoracionSucursal getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseValoracionSucursalForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'puntos'      => new sfWidgetFormInputText(),
      'observacion' => new sfWidgetFormTextarea(),
      'usuario_id'  => new sfWidgetFormInputText(),
      'sucursal_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => false)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'puntos'      => new sfValidatorInteger(),
      'observacion' => new sfValidatorString(),
      'usuario_id'  => new sfValidatorInteger(),
      'sucursal_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'))),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('valoracion_sucursal[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ValoracionSucursal';
  }

}
