<?php

/**
 * AnuncioEvento filter form base class.
 *
 * @package    guammas
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAnuncioEventoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'coordenada_x'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'coordenada_y'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono_evento'   => new sfWidgetFormFilterInput(),
      'pagina_web_evento' => new sfWidgetFormFilterInput(),
      'anuncio_id'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Anuncio'), 'add_empty' => true)),
      'ciudad_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'coordenada_x'      => new sfValidatorPass(array('required' => false)),
      'coordenada_y'      => new sfValidatorPass(array('required' => false)),
      'telefono_evento'   => new sfValidatorPass(array('required' => false)),
      'pagina_web_evento' => new sfValidatorPass(array('required' => false)),
      'anuncio_id'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Anuncio'), 'column' => 'id')),
      'ciudad_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('anuncio_evento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AnuncioEvento';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'coordenada_x'      => 'Text',
      'coordenada_y'      => 'Text',
      'telefono_evento'   => 'Text',
      'pagina_web_evento' => 'Text',
      'anuncio_id'        => 'ForeignKey',
      'ciudad_id'         => 'Number',
    );
  }
}
