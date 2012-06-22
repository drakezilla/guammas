<?php

/**
 * DenunciaAnuncio form base class.
 *
 * @method DenunciaAnuncio getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDenunciaAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'denuncia_anuncio'    => new sfWidgetFormTextarea(),
      'atendida'            => new sfWidgetFormInputText(),
      'sucursal_anuncio_id' => new sfWidgetFormInputText(),
      'usuario_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'denuncia_anuncio'    => new sfValidatorString(),
      'atendida'            => new sfValidatorInteger(),
      'sucursal_anuncio_id' => new sfValidatorInteger(),
      'usuario_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('denuncia_anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DenunciaAnuncio';
  }

}
