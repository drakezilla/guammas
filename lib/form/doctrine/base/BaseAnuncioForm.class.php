<?php

/**
 * Anuncio form base class.
 *
 * @method Anuncio getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'titulo'             => new sfWidgetFormInputText(),
      'que_incluye'        => new sfWidgetFormTextarea(),
      'condiciones'        => new sfWidgetFormTextarea(),
      'descripcion'        => new sfWidgetFormTextarea(),
      'precio'             => new sfWidgetFormInputText(),
      'fecha_inicio'       => new sfWidgetFormDate(),
      'fecha_fin'          => new sfWidgetFormDate(),
      'tipo_anuncio_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoAnuncio'), 'add_empty' => false)),
      'horario_anuncio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('HorarioAnuncio'), 'add_empty' => false)),
      'activo'             => new sfWidgetFormInputText(),
      'created_at'         => new sfWidgetFormDateTime(),
      'updated_at'         => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'titulo'             => new sfValidatorString(array('max_length' => 150)),
      'que_incluye'        => new sfValidatorString(array('required' => false)),
      'condiciones'        => new sfValidatorString(array('required' => false)),
      'descripcion'        => new sfValidatorString(),
      'precio'             => new sfValidatorNumber(),
      'fecha_inicio'       => new sfValidatorDate(),
      'fecha_fin'          => new sfValidatorDate(),
      'tipo_anuncio_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoAnuncio'))),
      'horario_anuncio_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('HorarioAnuncio'))),
      'activo'             => new sfValidatorInteger(),
      'created_at'         => new sfValidatorDateTime(),
      'updated_at'         => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Anuncio';
  }

}
