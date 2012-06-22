<?php

/**
 * Estado filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEstadoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_estado' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nombre_estado' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Estado';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Text',
      'nombre_estado' => 'Text',
    );
  }
}
