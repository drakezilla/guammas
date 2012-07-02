<?php

/**
 * Ubicacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Ubicacion extends BaseUbicacion {

    public function save(Doctrine_Connection $conn = null) {
        $this->setUsuarioId(sfContext::getInstance()->getUser()->getAttribute("usuario_id", '', "user_vars"));
        $this->setPrincipal(self::isPrincipal());
        $this->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute("empresa"));
        $ret = parent::save($conn);
        $this->updateLuceneIndex();
        return $ret;
    }

    private static function isPrincipal() {
        $principal = sfContext::getInstance()->getUser()->getAttribute("principal");
        if (is_bool($principal)) {
            return $principal;
        }
    }

    public function updateLuceneIndex() {
        $ubicacion = Doctrine_Core::getTable("Ubicacion")->findOneByEmpresaId(sfContext::getInstance()->getUser()->getAttribute('empresa'));
        
        $index = UbicacionTable::getLuceneIndex();

        // remove an existing entry
        if ($hit = $index->find('pk:' . $ubicacion->getId())) {
            $index->delete($hit->id);
        }

        $doc = new Zend_Search_Lucene_Document();

        // store job primary key URL to identify it in the search results
        $doc->addField(Zend_Search_Lucene_Field::UnIndexed('pk', $ubicacion->getId()));

        // index job fields

        $doc->addField(Zend_Search_Lucene_Field::UnStored('nombre', $ubicacion->getOrganizacion()->getNombreOrganizacion(), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnStored('ciudad', $ubicacion->getCiudad()->getNombreCiudad(), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnStored('estado', $ubicacion->getCiudad()->getEstado()->getNombreEstado(), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnStored('coordenada_x', $ubicacion->getCoordenadaX(), 'utf-8'));
        $doc->addField(Zend_Search_Lucene_Field::UnStored('coordenada_y', $ubicacion->getCoordenadaY(), 'utf-8'));

        // add job to the index
        $index->addDocument($doc);
        $index->commit();
    }

}
