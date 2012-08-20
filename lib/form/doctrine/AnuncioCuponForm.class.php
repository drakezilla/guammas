<?php

/**
 * AnuncioCupon form.
 *
 * @package    guammas
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AnuncioCuponForm extends BaseAnuncioCuponForm {

    public function configure() {
        $this->widgetSchema["fecha_disfrute_inicio"] = new sfWidgetFormInputText(array(), array('size' => '7'));
        $this->widgetSchema["fecha_disfrute_fin"] = new sfWidgetFormInputText(array(), array('size' => '7'));
    }

}
