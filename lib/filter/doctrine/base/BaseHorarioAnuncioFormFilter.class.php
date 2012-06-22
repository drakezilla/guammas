<?php

/**
 * HorarioAnuncio filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHorarioAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dia'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anuncio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'dia'        => new sfValidatorPass(array('required' => false)),
      'anuncio_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anuncio'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('horario_anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HorarioAnuncio';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'dia'        => 'Text',
      'anuncio_id' => 'ForeignKey',
    );
  }
}
