<?php

/**
 * DenunciaAnuncio filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDenunciaAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'denuncia_anuncio'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'atendida'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ubicacion_anuncio_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UbicacionAnuncio'), 'add_empty' => true)),
      'usuario_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'denuncia_anuncio'     => new sfValidatorPass(array('required' => false)),
      'atendida'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ubicacion_anuncio_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('UbicacionAnuncio'), 'column' => 'id')),
      'usuario_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id')),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('denuncia_anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DenunciaAnuncio';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'denuncia_anuncio'     => 'Text',
      'atendida'             => 'Number',
      'ubicacion_anuncio_id' => 'ForeignKey',
      'usuario_id'           => 'ForeignKey',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
