<?php

/**
 * Rol filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRolFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_rol' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_rol' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rol_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Rol';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'nombre_rol' => 'Text',
    );
  }
}
