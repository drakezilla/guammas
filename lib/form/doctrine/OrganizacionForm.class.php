<?php

/**
 * Organizacion form.
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class OrganizacionForm extends BaseOrganizacionForm {

    public function configure() {
        unset(
                $this['verificada'],
                $this['usuario_id'],
                $this['activa'],
                $this['salt'],
                $this['token'],
                $this['created_at'],
                $this['updated_at']
             );
        
        $this->widgetSchema['categoria_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categoria'), 'add_empty' => ""), array("style" => "width: 205px", "data-placeholder" => "Seleccione una categoria"));
        $this->widgetSchema["categoria_id"]->setLabel("Categoría");
        $this->widgetSchema["nombre_organizacion"]->setLabel("Nombre o Razón Social");
    }

}
