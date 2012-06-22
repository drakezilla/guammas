<?php

/**
 * HorarioAnuncio form base class.
 *
 * @method HorarioAnuncio getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHorarioAnuncioForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'dia'        => new sfWidgetFormInputText(),
      'anuncio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'dia'        => new sfValidatorString(array('max_length' => 9)),
      'anuncio_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'))),
    ));

    $this->widgetSchema->setNameFormat('horario_anuncio[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HorarioAnuncio';
  }

}
