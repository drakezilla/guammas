<?php

/**
 * UbicacionAnuncio filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUbicacionAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'sucursal_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => true)),
      'anuncio_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'sucursal_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ubicacion'), 'column' => 'id')),
      'anuncio_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anuncio'), 'column' => 'id')),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ubicacion_anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'UbicacionAnuncio';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'sucursal_id' => 'ForeignKey',
      'anuncio_id'  => 'ForeignKey',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
