<?php

/**
 * Usuario filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_usuario'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contrasena'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'correo_electronico'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'                          => new sfWidgetFormFilterInput(),
      'apellido'                        => new sfWidgetFormFilterInput(),
      'avatar'                          => new sfWidgetFormFilterInput(),
      'actividad'                       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ultimo_inicio_sesion'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'activo'                          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'perfil_facebook'                 => new sfWidgetFormFilterInput(),
      'perfil_twitter'                  => new sfWidgetFormFilterInput(),
      'perfil_googleplus'               => new sfWidgetFormFilterInput(),
      'pref_correo_electronico_publico' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pref_enlace_facebook'            => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pref_enlace_googleplus'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pref_enlace_twitter'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pref_notificacion_oferta'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pref_notificacion_cupon'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pref_notificacion_evento'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'pref_noticia_guamma'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'rol_id'                          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rol'), 'add_empty' => true)),
      'ciudad_id'                       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => true)),
      'created_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'                      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'nombre_usuario'                  => new sfValidatorPass(array('required' => false)),
      'contrasena'                      => new sfValidatorPass(array('required' => false)),
      'correo_electronico'              => new sfValidatorPass(array('required' => false)),
      'nombre'                          => new sfValidatorPass(array('required' => false)),
      'apellido'                        => new sfValidatorPass(array('required' => false)),
      'avatar'                          => new sfValidatorPass(array('required' => false)),
      'actividad'                       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ultimo_inicio_sesion'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'activo'                          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'perfil_facebook'                 => new sfValidatorPass(array('required' => false)),
      'perfil_twitter'                  => new sfValidatorPass(array('required' => false)),
      'perfil_googleplus'               => new sfValidatorPass(array('required' => false)),
      'pref_correo_electronico_publico' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pref_enlace_facebook'            => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pref_enlace_googleplus'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pref_enlace_twitter'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pref_notificacion_oferta'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pref_notificacion_cupon'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pref_notificacion_evento'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'pref_noticia_guamma'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'rol_id'                          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Rol'), 'column' => 'id')),
      'ciudad_id'                       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ciudad'), 'column' => 'id')),
      'created_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'                      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'                              => 'Number',
      'nombre_usuario'                  => 'Text',
      'contrasena'                      => 'Text',
      'correo_electronico'              => 'Text',
      'nombre'                          => 'Text',
      'apellido'                        => 'Text',
      'avatar'                          => 'Text',
      'actividad'                       => 'Number',
      'ultimo_inicio_sesion'            => 'Date',
      'activo'                          => 'Boolean',
      'perfil_facebook'                 => 'Text',
      'perfil_twitter'                  => 'Text',
      'perfil_googleplus'               => 'Text',
      'pref_correo_electronico_publico' => 'Boolean',
      'pref_enlace_facebook'            => 'Boolean',
      'pref_enlace_googleplus'          => 'Boolean',
      'pref_enlace_twitter'             => 'Boolean',
      'pref_notificacion_oferta'        => 'Boolean',
      'pref_notificacion_cupon'         => 'Boolean',
      'pref_notificacion_evento'        => 'Boolean',
      'pref_noticia_guamma'             => 'Boolean',
      'rol_id'                          => 'ForeignKey',
      'ciudad_id'                       => 'ForeignKey',
      'created_at'                      => 'Date',
      'updated_at'                      => 'Date',
    );
  }
}
