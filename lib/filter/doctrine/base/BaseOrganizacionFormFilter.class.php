<?php

/**
 * Organizacion filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseOrganizacionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_organizacion'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'logotipo'                => new sfWidgetFormFilterInput(),
      'categoria_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => true)),
      'facebook_organizacion'   => new sfWidgetFormFilterInput(),
      'twitter_organizacion'    => new sfWidgetFormFilterInput(),
      'googleplus_organizacion' => new sfWidgetFormFilterInput(),
      'pagina_web'              => new sfWidgetFormFilterInput(),
      'documento'               => new sfWidgetFormFilterInput(),
      'verificada'              => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'usuario_id'              => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Usuario'), 'add_empty' => true)),
      'activa'                  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'salt'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'token'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'nombre_organizacion'     => new sfValidatorPass(array('required' => false)),
      'logotipo'                => new sfValidatorPass(array('required' => false)),
      'categoria_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Categoria'), 'column' => 'id')),
      'facebook_organizacion'   => new sfValidatorPass(array('required' => false)),
      'twitter_organizacion'    => new sfValidatorPass(array('required' => false)),
      'googleplus_organizacion' => new sfValidatorPass(array('required' => false)),
      'pagina_web'              => new sfValidatorPass(array('required' => false)),
      'documento'               => new sfValidatorPass(array('required' => false)),
      'verificada'              => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'usuario_id'              => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Usuario'), 'column' => 'id')),
      'activa'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'salt'                    => new sfValidatorPass(array('required' => false)),
      'token'                   => new sfValidatorPass(array('required' => false)),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('organizacion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Organizacion';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'nombre_organizacion'     => 'Text',
      'logotipo'                => 'Text',
      'categoria_id'            => 'ForeignKey',
      'facebook_organizacion'   => 'Text',
      'twitter_organizacion'    => 'Text',
      'googleplus_organizacion' => 'Text',
      'pagina_web'              => 'Text',
      'documento'               => 'Text',
      'verificada'              => 'Boolean',
      'usuario_id'              => 'ForeignKey',
      'activa'                  => 'Boolean',
      'salt'                    => 'Text',
      'token'                   => 'Text',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
