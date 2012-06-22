<?php

/**
 * AnuncioCupon form base class.
 *
 * @method AnuncioCupon getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAnuncioCuponForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'cantidad_inicial'      => new sfWidgetFormInputText(),
      'cantidad_restante'     => new sfWidgetFormInputText(),
      'cantidad_persona'      => new sfWidgetFormInputText(),
      'fecha_disfrute_inicio' => new sfWidgetFormDate(),
      'fecha_disfrute_fin'    => new sfWidgetFormDate(),
      'anuncio_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cantidad_inicial'      => new sfValidatorInteger(),
      'cantidad_restante'     => new sfValidatorInteger(),
      'cantidad_persona'      => new sfValidatorInteger(),
      'fecha_disfrute_inicio' => new sfValidatorDate(),
      'fecha_disfrute_fin'    => new sfValidatorDate(),
      'anuncio_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'))),
    ));

    $this->widgetSchema->setNameFormat('anuncio_cupon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnuncioCupon';
  }

}
