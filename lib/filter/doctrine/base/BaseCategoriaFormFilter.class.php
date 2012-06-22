<?php

/**
 * Categoria filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCategoriaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_categoria'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'categoria_padre_id' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_categoria'   => new sfValidatorPass(array('required' => false)),
      'categoria_padre_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('categoria_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categoria';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'nombre_categoria'   => 'Text',
      'categoria_padre_id' => 'Number',
    );
  }
}
