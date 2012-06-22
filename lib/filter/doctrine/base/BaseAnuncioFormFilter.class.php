<?php

/**
 * Anuncio filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'titulo'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'que_incluye'     => new sfWidgetFormFilterInput(),
      'condiciones'     => new sfWidgetFormFilterInput(),
      'descripcion'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_inicio'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_fin'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'tipo_anuncio_id' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'activo'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'titulo'          => new sfValidatorPass(array('required' => false)),
      'que_incluye'     => new sfValidatorPass(array('required' => false)),
      'condiciones'     => new sfValidatorPass(array('required' => false)),
      'descripcion'     => new sfValidatorPass(array('required' => false)),
      'precio'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fecha_inicio'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_fin'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'tipo_anuncio_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'activo'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anuncio';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'titulo'          => 'Text',
      'que_incluye'     => 'Text',
      'condiciones'     => 'Text',
      'descripcion'     => 'Text',
      'precio'          => 'Number',
      'fecha_inicio'    => 'Date',
      'fecha_fin'       => 'Date',
      'tipo_anuncio_id' => 'Number',
      'activo'          => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
