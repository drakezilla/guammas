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
      'id'                   => new sfWidgetFormInputText(),
      'dia'                  => new sfWidgetFormInputText(),
      'hora_apertura_manana' => new sfWidgetFormTime(),
      'hora_cierre_manana'   => new sfWidgetFormTime(),
      'hora_apertura_tarde'  => new sfWidgetFormTime(),
      'hora_cierre_tarde'    => new sfWidgetFormTime(),
      'horario_corrido'      => new sfWidgetFormInputText(),
      'sucursal_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorInteger(),
      'dia'                  => new sfValidatorString(array('max_length' => 10)),
      'hora_apertura_manana' => new sfValidatorTime(),
      'hora_cierre_manana'   => new sfValidatorTime(array('required' => false)),
      'hora_apertura_tarde'  => new sfValidatorTime(array('required' => false)),
      'hora_cierre_tarde'    => new sfValidatorTime(),
      'horario_corrido'      => new sfValidatorInteger(),
      'sucursal_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ubicacion'))),
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
