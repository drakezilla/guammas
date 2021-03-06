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
      'principal'         => new sfWidgetFormInputText(),
      'coordenada_x'      => new sfWidgetFormInputText(),
      'coordenada_y'      => new sfWidgetFormInputText(),
      'telefono_1'        => new sfWidgetFormInputText(),
      'telefono_2'        => new sfWidgetFormInputText(),
      'detalle_direccion' => new sfWidgetFormTextarea(),
      'verificada'        => new sfWidgetFormInputText(),
      'ciudad_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => false)),
      'empresa_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organizacion'), 'add_empty' => true)),
      'usuario_id'        => new sfWidgetFormInputText(),
      'created_at'        => new sfWidgetFormDateTime(),
      'updated_at'        => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'rif'               => new sfValidatorString(array('max_length' => 15)),
      'nombre'            => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'principal'         => new sfValidatorInteger(),
      'coordenada_x'      => new sfValidatorString(array('max_length' => 30)),
      'coordenada_y'      => new sfValidatorString(array('max_length' => 30)),
      'telefono_1'        => new sfValidatorString(array('max_length' => 12)),
      'telefono_2'        => new sfValidatorString(array('max_length' => 12)),
      'detalle_direccion' => new sfValidatorString(),
      'verificada'        => new sfValidatorInteger(),
      'ciudad_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'))),
      'empresa_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organizacion'), 'required' => false)),
      'usuario_id'        => new sfValidatorInteger(),
      'created_at'        => new sfValidatorDateTime(),
      'updated_at'        => new sfValidatorDateTime(),
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
