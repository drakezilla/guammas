<?php

/**
 * DetalleHorarioAnuncio filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDetalleHorarioAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'horario_anuncio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HorarioAnuncio'), 'add_empty' => true)),
      'hora_inicio'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_fin'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'horario_anuncio_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('HorarioAnuncio'), 'column' => 'id')),
      'hora_inicio'        => new sfValidatorPass(array('required' => false)),
      'hora_fin'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('detalle_horario_anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleHorarioAnuncio';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'horario_anuncio_id' => 'ForeignKey',
      'hora_inicio'        => 'Text',
      'hora_fin'           => 'Text',
    );
  }
}
