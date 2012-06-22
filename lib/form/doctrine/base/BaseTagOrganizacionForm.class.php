<?php

/**
 * TagOrganizacion form base class.
 *
 * @method TagOrganizacion getObject() Returns the current form's model object
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTagOrganizacionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'tag_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tag'), 'add_empty' => true)),
      'empresa_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organizacion'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tag_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tag'), 'required' => false)),
      'empresa_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Organizacion'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tag_organizacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TagOrganizacion';
  }

}
