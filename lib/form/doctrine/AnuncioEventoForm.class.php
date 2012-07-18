<?php

/**
 * AnuncioEvento form.
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncioEventoForm extends BaseAnuncioEventoForm {

    public function configure() {
        $this->widgetSchema["ciudad_id"] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => ""), array("style" => "width: 205px", "data-placeholder" => "Seleccione una ciudad"));
    }

}
