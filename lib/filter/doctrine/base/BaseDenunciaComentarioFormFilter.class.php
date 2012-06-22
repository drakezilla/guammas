<?php

/**
 * DenunciaComentario filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDenunciaComentarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'denuncia_comentario'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'atendida'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'denuncia_comentario'   => new sfValidatorPass(array('required' => false)),
      'atendida'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('denuncia_comentario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DenunciaComentario';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'denuncia_comentario'   => 'Text',
      'atendida'              => 'Number',
      'comentario_anuncio_id' => 'Number',
      'usuario_id'            => 'Number',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
    );
  }
}
