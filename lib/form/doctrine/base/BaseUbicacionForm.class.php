<?php

/**
 * Ubicacion form base class.
 *
 * @method Ubicacion getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseUbicacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'rif'               => new sfWidgetFormInputText(),
      'nombre'            => new sfWidgetFormInputText(),
      'principal'         => new sfWidgetFormInputCheckbox(),
      'coordenada_x'      => new sfWidgetFormInputText(),
      'coordenada_y'      => new sfWidgetFormInputText(),
      'telefono_ppal'     => new sfWidgetFormInputText(),
      'telefono_sec'      => new sfWidgetFormInputText(),
      'detalle_direccion' => new sfWidgetFormTextarea(),
      'verificada'        => new sfWidgetFormInputCheckbox(),
      'ciudad_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => false)),
      'organizacion_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organizacion'), 'add_empty' => false)),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'rif'               => new sfValidatorString(array('max_length' => 15)),
      'nombre'            => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'principal'         => new sfValidatorBoolean(),
      'coordenada_x'      => new sfValidatorString(array('max_length' => 30)),
      'coordenada_y'      => new sfValidatorString(array('max_length' => 30)),
      'telefono_ppal'     => new sfValidatorString(array('max_length' => 12)),
      'telefono_sec'      => new sfValidatorString(array('max_length' => 12, 'required' => false)),
      'detalle_direccion' => new sfValidatorString(),
      'verificada'        => new sfValidatorBoolean(),
      'ciudad_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'))),
      'organizacion_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organizacion'))),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ubicacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ubicacion';
  }

}
