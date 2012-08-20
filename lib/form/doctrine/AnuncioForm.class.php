<?php

/**
 * Anuncio form.
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncioForm extends BaseAnuncioForm {

    public function configure() {
        unset($this['created_at'], $this['updated_at'], /* $this['tipo_anuncio_id'], */ $this['horario_anuncio_id']);

        $this->widgetSchema["fecha_inicio"] = new sfWidgetFormInputText(array(), array('size' => '7'));
        $this->widgetSchema["fecha_fin"] = new sfWidgetFormInputText(array(), array('size' => '7'));
        $this->widgetSchema["precio"] = new sfWidgetFormInputText(array(), array('size' => '7'));
        $this->widgetSchema["tipo_anuncio_id"] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoAnuncio'), 'add_empty' =>  'Seleccione'));
    }

}
