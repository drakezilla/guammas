<?php

/**
 * FotoAnuncio filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFotoAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'imagen'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anuncio_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'activo'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'imagen'     => new sfValidatorPass(array('required' => false)),
      'anuncio_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'activo'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('foto_anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FotoAnuncio';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'imagen'     => 'Text',
      'anuncio_id' => 'Number',
      'activo'     => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
