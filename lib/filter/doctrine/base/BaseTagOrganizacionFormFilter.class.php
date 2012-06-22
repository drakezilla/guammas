<?php

/**
 * TagOrganizacion filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTagOrganizacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tag'), 'add_empty' => true)),
      'empresa_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organizacion'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'tag_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tag'), 'column' => 'id')),
      'empresa_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organizacion'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tag_organizacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TagOrganizacion';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'tag_id'     => 'ForeignKey',
      'empresa_id' => 'ForeignKey',
    );
  }
}
