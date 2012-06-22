<?php

/**
 * DetalleHorarioAnuncio form base class.
 *
 * @method DetalleHorarioAnuncio getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetalleHorarioAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'horario_anuncio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HorarioAnuncio'), 'add_empty' => false)),
      'hora_inicio'        => new sfWidgetFormTime(),
      'hora_fin'           => new sfWidgetFormTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'horario_anuncio_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('HorarioAnuncio'))),
      'hora_inicio'        => new sfValidatorTime(),
      'hora_fin'           => new sfValidatorTime(),
    ));

    $this->widgetSchema->setNameFormat('detalle_horario_anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleHorarioAnuncio';
  }

}
