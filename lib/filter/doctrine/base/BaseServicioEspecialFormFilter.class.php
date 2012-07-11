<?php

/**
 * ServicioEspecial filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseServicioEspecialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_servicio_especial' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'que_incluye'              => new sfWidgetFormFilterInput(),
      'condiciones'              => new sfWidgetFormFilterInput(),
      'descripcion'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'precio'                   => new sfWidgetFormFilterInput(),
      'imagen'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'horario_anuncio_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HorarioAnuncio'), 'add_empty' => true)),
      'activo'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'nombre_servicio_especial' => new sfValidatorPass(array('required' => false)),
      'que_incluye'              => new sfValidatorPass(array('required' => false)),
      'condiciones'              => new sfValidatorPass(array('required' => false)),
      'descripcion'              => new sfValidatorPass(array('required' => false)),
      'precio'                   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'imagen'                   => new sfValidatorPass(array('required' => false)),
      'horario_anuncio_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('HorarioAnuncio'), 'column' => 'id')),
      'activo'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('servicio_especial_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ServicioEspecial';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'nombre_servicio_especial' => 'Text',
      'que_incluye'              => 'Text',
      'condiciones'              => 'Text',
      'descripcion'              => 'Text',
      'precio'                   => 'Number',
      'imagen'                   => 'Text',
      'horario_anuncio_id'       => 'ForeignKey',
      'activo'                   => 'Number',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
    );
  }
}
