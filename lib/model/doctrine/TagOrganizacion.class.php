<?php

/**
 * TagOrganizacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class TagOrganizacion extends BaseTagOrganizacion {
    public function asignarTag($tag_id,$empresa_id){
        $this->setTagId($tag_id);
        $this->setOrganizacionId($empresa_id);
        $this->save();
    }
}
