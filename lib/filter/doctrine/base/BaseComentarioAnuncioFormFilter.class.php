<?php

/**
 * ComentarioAnuncio filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseComentarioAnuncioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'comentario'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'usuario_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'denunciado'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comentario_padre_id' => new sfWidgetFormFilterInput(),
      'anuncio_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'comentario'          => new sfValidatorPass(array('required' => false)),
      'usuario_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id')),
      'denunciado'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comentario_padre_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'anuncio_id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anuncio'), 'column' => 'id')),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('comentario_anuncio_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ComentarioAnuncio';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'comentario'          => 'Text',
      'usuario_id'          => 'ForeignKey',
      'denunciado'          => 'Number',
      'comentario_padre_id' => 'Number',
      'anuncio_id'          => 'ForeignKey',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
