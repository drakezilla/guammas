<?php

/**
 * ValoracionInstitucion filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseValoracionInstitucionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'puntos'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'observacion'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'institucion_id' => new sfWidgetFormFilterInput(),
      'usuario_id'     => new sfWidgetFormFilterInput(),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'puntos'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'observacion'    => new sfValidatorPass(array('required' => false)),
      'institucion_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usuario_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('valoracion_institucion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ValoracionInstitucion';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'puntos'         => 'Number',
      'observacion'    => 'Text',
      'institucion_id' => 'Number',
      'usuario_id'     => 'Number',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
