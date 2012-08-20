<?php

/**
 * Ciudad form base class.
 *
 * @method Ciudad getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCiudadForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'nombre_ciudad' => new sfWidgetFormInputText(),
      'aprobada'      => new sfWidgetFormInputCheckbox(),
      'estado_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre_ciudad' => new sfValidatorString(array('max_length' => 200)),
      'aprobada'      => new sfValidatorBoolean(),
      'estado_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'))),
    ));

    $this->widgetSchema->setNameFormat('ciudad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ciudad';
  }

}
