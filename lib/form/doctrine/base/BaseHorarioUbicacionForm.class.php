<?php

/**
 * HorarioUbicacion form base class.
 *
 * @method HorarioUbicacion getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHorarioUbicacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'dia_id'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Dia'), 'add_empty' => false)),
      'hora_apertura_manana' => new sfWidgetFormTime(),
      'hora_cierre_manana'   => new sfWidgetFormTime(),
      'hora_apertura_tarde'  => new sfWidgetFormTime(),
      'hora_cierre_tarde'    => new sfWidgetFormTime(),
      'horario_corrido'      => new sfWidgetFormInputText(),
      'ubicacion_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => false)),
      'tipo_horario_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoHorario'), 'add_empty' => false)),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'dia_id'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Dia'))),
      'hora_apertura_manana' => new sfValidatorTime(),
      'hora_cierre_manana'   => new sfValidatorTime(array('required' => false)),
      'hora_apertura_tarde'  => new sfValidatorTime(array('required' => false)),
      'hora_cierre_tarde'    => new sfValidatorTime(),
      'horario_corrido'      => new sfValidatorInteger(),
      'ubicacion_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'))),
      'tipo_horario_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoHorario'))),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('horario_ubicacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HorarioUbicacion';
  }

}
