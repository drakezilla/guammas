<?php

/**
 * AnuncioEvento form base class.
 *
 * @method AnuncioEvento getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnuncioEventoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'coordenada_x'      => new sfWidgetFormInputText(),
      'coordenada_y'      => new sfWidgetFormInputText(),
      'telefono_evento'   => new sfWidgetFormInputText(),
      'pagina_web_evento' => new sfWidgetFormInputText(),
      'anuncio_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => false)),
      'ciudad_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'coordenada_x'      => new sfValidatorString(array('max_length' => 30)),
      'coordenada_y'      => new sfValidatorString(array('max_length' => 30)),
      'telefono_evento'   => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'pagina_web_evento' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'anuncio_id'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'))),
      'ciudad_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'))),
    ));

    $this->widgetSchema->setNameFormat('anuncio_evento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnuncioEvento';
  }

}
