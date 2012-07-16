<?php

/**
 * Ubicacion form.
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UbicacionForm extends BaseUbicacionForm {

    public function configure() {
        unset(
                $this['principal'],
                $this['detalle_direccion'],
                $this['telefono_sec'],
                $this['verificada'],
                $this['usuario_id'],
                $this['organizacion_id'],
                $this['created_at'],
                $this['updated_at']
             );
        
        
        
        $this->widgetSchema["ciudad_id"] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ciudad'), 'add_empty' => ""), array("style" => "width: 205px", "data-placeholder" => "Seleccione una ciudad"));
        $this->widgetSchema["telefono_ppal"]->setLabel("Algún Teléfono");
        $this->widgetSchema["rif"]->setLabel("RIF");
        $this->widgetSchema["coordenada_x"] = new sfWidgetFormInputHidden();
        $this->widgetSchema["coordenada_y"] = new sfWidgetFormInputHidden();
    }

}
