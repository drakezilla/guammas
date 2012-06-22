<?php

/**
 * TagAnuncio filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTagAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tag'), 'add_empty' => true)),
      'anuncio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'tag_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tag'), 'column' => 'id')),
      'anuncio_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anuncio'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tag_anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TagAnuncio';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'tag_id'     => 'ForeignKey',
      'anuncio_id' => 'ForeignKey',
    );
  }
}
