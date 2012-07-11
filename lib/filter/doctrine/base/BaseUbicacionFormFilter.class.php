<?php

/**
 * Ubicacion filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUbicacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rif'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'            => new sfWidgetFormFilterInput(),
      'principal'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coordenada_x'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coordenada_y'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_1'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_2'        => new sfWidgetFormFilterInput(),
      'detalle_direccion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'verificada'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ciudad_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => true)),
      'organizacion_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Organizacion'), 'add_empty' => true)),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'rif'               => new sfValidatorPass(array('required' => false)),
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'principal'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'coordenada_x'      => new sfValidatorPass(array('required' => false)),
      'coordenada_y'      => new sfValidatorPass(array('required' => false)),
      'telefono_1'        => new sfValidatorPass(array('required' => false)),
      'telefono_2'        => new sfValidatorPass(array('required' => false)),
      'detalle_direccion' => new sfValidatorPass(array('required' => false)),
      'verificada'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ciudad_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ciudad'), 'column' => 'id')),
      'organizacion_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Organizacion'), 'column' => 'id')),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('ubicacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ubicacion';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'rif'               => 'Text',
      'nombre'            => 'Text',
      'principal'         => 'Number',
      'coordenada_x'      => 'Text',
      'coordenada_y'      => 'Text',
      'telefono_1'        => 'Text',
      'telefono_2'        => 'Text',
      'detalle_direccion' => 'Text',
      'verificada'        => 'Number',
      'ciudad_id'         => 'ForeignKey',
      'organizacion_id'   => 'ForeignKey',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
