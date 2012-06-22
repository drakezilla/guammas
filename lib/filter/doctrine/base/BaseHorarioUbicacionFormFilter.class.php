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
      'id'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dia'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_apertura_manana' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'hora_cierre_manana'   => new sfWidgetFormFilterInput(),
      'hora_apertura_tarde'  => new sfWidgetFormFilterInput(),
      'hora_cierre_tarde'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'horario_corrido'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sucursal_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dia'                  => new sfValidatorPass(array('required' => false)),
      'hora_apertura_manana' => new sfValidatorPass(array('required' => false)),
      'hora_cierre_manana'   => new sfValidatorPass(array('required' => false)),
      'hora_apertura_tarde'  => new sfValidatorPass(array('required' => false)),
      'hora_cierre_tarde'    => new sfValidatorPass(array('required' => false)),
      'horario_corrido'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sucursal_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ubicacion'), 'column' => 'id')),
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
      'dia'                  => 'Text',
      'hora_apertura_manana' => 'Text',
      'hora_cierre_manana'   => 'Text',
      'hora_apertura_tarde'  => 'Text',
      'hora_cierre_tarde'    => 'Text',
      'horario_corrido'      => 'Number',
      'sucursal_id'          => 'ForeignKey',
    );
  }
}
