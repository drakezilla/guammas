<?php

/**
 * ComentarioAnuncio form base class.
 *
 * @method ComentarioAnuncio getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseComentarioAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'comentario'          => new sfWidgetFormTextarea(),
      'usuario_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => false)),
      'denunciado'          => new sfWidgetFormInputText(),
      'comentario_padre_id' => new sfWidgetFormInputText(),
      'anuncio_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => false)),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'comentario'          => new sfValidatorString(),
      'usuario_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'))),
      'denunciado'          => new sfValidatorInteger(),
      'comentario_padre_id' => new sfValidatorInteger(array('required' => false)),
      'anuncio_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'))),
      'created_at'          => new sfValidatorDateTime(),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comentario_anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComentarioAnuncio';
  }

}
