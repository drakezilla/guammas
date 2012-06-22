<?php

/**
 * Ciudad filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCiudadFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_ciudad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'aprobada'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Estado'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre_ciudad' => new sfValidatorPass(array('required' => false)),
      'aprobada'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Estado'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('ciudad_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ciudad';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'nombre_ciudad' => 'Text',
      'aprobada'      => 'Number',
      'estado_id'     => 'ForeignKey',
    );
  }
}
