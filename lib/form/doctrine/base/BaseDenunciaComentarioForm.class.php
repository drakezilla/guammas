<?php

/**
 * DenunciaComentario form base class.
 *
 * @method DenunciaComentario getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDenunciaComentarioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputText(),
      'denuncia_comentario'   => new sfWidgetFormTextarea(),
      'atendida'              => new sfWidgetFormInputText(),
      'comentario_anuncio_id' => new sfWidgetFormInputHidden(),
      'usuario_id'            => new sfWidgetFormInputHidden(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorInteger(),
      'denuncia_comentario'   => new sfValidatorString(),
      'atendida'              => new sfValidatorInteger(),
      'comentario_anuncio_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('comentario_anuncio_id')), 'empty_value' => $this->getObject()->get('comentario_anuncio_id'), 'required' => false)),
      'usuario_id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('usuario_id')), 'empty_value' => $this->getObject()->get('usuario_id'), 'required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('denuncia_comentario[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DenunciaComentario';
  }

}
