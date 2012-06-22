<?php

/**
 * AnuncioCupon filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnuncioCuponFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cantidad_inicial'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad_restante'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cantidad_persona'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_disfrute_inicio' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_disfrute_fin'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'anuncio_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cantidad_inicial'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_restante'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cantidad_persona'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'fecha_disfrute_inicio' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_disfrute_fin'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'anuncio_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anuncio'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('anuncio_cupon_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnuncioCupon';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'cantidad_inicial'      => 'Number',
      'cantidad_restante'     => 'Number',
      'cantidad_persona'      => 'Number',
      'fecha_disfrute_inicio' => 'Date',
      'fecha_disfrute_fin'    => 'Date',
      'anuncio_id'            => 'ForeignKey',
    );
  }
}
