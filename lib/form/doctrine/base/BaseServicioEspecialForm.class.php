<?php

/**
 * ServicioEspecial form base class.
 *
 * @method ServicioEspecial getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServicioEspecialForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'nombre_servicio_especial' => new sfWidgetFormInputText(),
      'que_incluye'              => new sfWidgetFormTextarea(),
      'condiciones'              => new sfWidgetFormTextarea(),
      'descripcion'              => new sfWidgetFormTextarea(),
      'precio'                   => new sfWidgetFormInputText(),
      'imagen'                   => new sfWidgetFormInputText(),
      'activo'                   => new sfWidgetFormInputText(),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre_servicio_especial' => new sfValidatorString(array('max_length' => 100)),
      'que_incluye'              => new sfValidatorString(array('required' => false)),
      'condiciones'              => new sfValidatorString(array('required' => false)),
      'descripcion'              => new sfValidatorString(),
      'precio'                   => new sfValidatorNumber(array('required' => false)),
      'imagen'                   => new sfValidatorString(array('max_length' => 255)),
      'activo'                   => new sfValidatorInteger(),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('servicio_especial[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ServicioEspecial';
  }

}
