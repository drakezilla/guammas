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
        $this->setPrincipal(self::isPrincipal());
        $this->setOrganizacionId(sfContext::getInstance()->getUser()->getAttribute("empresa"));
        $ret = parent::save($conn);
        $this->updateLuceneIndex();
        return $ret;
    }
    
    public function nuevaUbicacion(sfWebRequest $request){
        $this->setRif($request->getParameter('rif'));
        $this->setNombre($request->getParameter('nombre'));
        //$this->setTelefono2($request->getParameter('telefono'));
        $this->setCoordenadaX($request->getParameter('coordenada_x'));
        $this->setCoordenadaY($request->getParameter('coordenada_y'));
        $this->save();
    }

    private static function isPrincipal() {
        $principal = sfContext::getInstance()->getUser()->getAttribute("principal");
        if (is_bool($principal)) {
            return $principal;
        }
    }

    public function updateLuceneIndex() {

        $empresa = sfContext::getInstance()->getUser()->getAttribute('empresa');
        $index = UbicacionTable::getLuceneIndex();

        if ($hit = $index->find('pk:' . $empresa)) {
            $index->delete($hit->id);
        }

        $doc = new Zend_Search_Lucene_Document();

        $stringIndex = new finda($empresa);
        $indexFinda = $stringIndex->indexConstructor();

        // store job primary key URL to identify it in the search results

        $doc->addField(Zend_Search_Lucene_Field::UnIndexed('pk', $empresa));

        $doc->addField(Zend_Search_Lucene_Field::UnStored('finda', $indexFinda, 'utf-8'));

        $index->addDocument($doc);
        $index->commit();
    }

}
