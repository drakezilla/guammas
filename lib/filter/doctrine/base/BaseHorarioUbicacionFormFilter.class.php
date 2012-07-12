<?php

/**
 * HorarioUbicacion filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHorarioUbicacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'dia_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dia'), 'add_empty' => true)),
      'hora_apertura_manana' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_cierre_manana'   => new sfWidgetFormFilterInput(),
      'hora_apertura_tarde'  => new sfWidgetFormFilterInput(),
      'hora_cierre_tarde'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'horario_corrido'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ubicacion_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => true)),
      'tipo_horario_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoHorario'), 'add_empty' => true)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'dia_id'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Dia'), 'column' => 'id')),
      'hora_apertura_manana' => new sfValidatorPass(array('required' => false)),
      'hora_cierre_manana'   => new sfValidatorPass(array('required' => false)),
      'hora_apertura_tarde'  => new sfValidatorPass(array('required' => false)),
      'hora_cierre_tarde'    => new sfValidatorPass(array('required' => false)),
      'horario_corrido'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ubicacion_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ubicacion'), 'column' => 'id')),
      'tipo_horario_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoHorario'), 'column' => 'id')),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('horario_ubicacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HorarioUbicacion';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'dia_id'               => 'ForeignKey',
      'hora_apertura_manana' => 'Text',
      'hora_cierre_manana'   => 'Text',
      'hora_apertura_tarde'  => 'Text',
      'hora_cierre_tarde'    => 'Text',
      'horario_corrido'      => 'Number',
      'ubicacion_id'         => 'ForeignKey',
      'tipo_horario_id'      => 'ForeignKey',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
