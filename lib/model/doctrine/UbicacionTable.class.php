<?php

/**
 * UbicacionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UbicacionTable extends Doctrine_Table {

    /**
     * Returns an instance of this class.
     *
     * @return object UbicacionTable
     */
    public static function getInstance() {
        return Doctrine_Core::getTable('Ubicacion');
    }

    public static function getLuceneIndex() {
        ProjectConfiguration::registerZend();

        if (file_exists($index = self::getLuceneIndexFile())) {
            return Zend_Search_Lucene::open($index);
        } else {
            return Zend_Search_Lucene::create($index);
        }
    }

    public static function getLuceneIndexFile() {
        return sfConfig::get('sf_data_dir') . '/lucene/sucursal.' . sfConfig::get('sf_environment') . '.index';
    }

    public function getForLuceneQuery($query) {
        $hits = self::getLuceneIndex()->find($query);

        $pks = array();
        foreach ($hits as $hit) {
            $pks[] = $hit->pk;
        }

        if (empty($pks)) {
            return array();
        }

        $query = Doctrine_Query::create()
                ->select('*')
                ->from("Organizacion")
                ->whereIn("id",$pks);

        return $query->execute();
    }
    
    public function getSucursalesPorOrganizacion($token,$json=true){
        $query = Doctrine_Query::create()
                ->select('ubi.*,org.nombre_organizacion as nombre_organizacion')
                ->from('Ubicacion ubi')
                ->innerJoin('ubi.Organizacion org')
                ->where('org.token=?',$token)
                ->execute();
        return $json == true ? $this->jsonSucursales($query) : $query;
    }
    
    public function getSucursalesParaMapa($json=true){
        $query = Doctrine_Query::create()
                ->select('ubi.*,org.nombre_organizacion as nombre_organizacion')
                ->from('Ubicacion ubi')
                ->innerJoin('ubi.Organizacion org')
                ->where('org.activa=?',true)
                ->execute();
        return $json == true ? $this->jsonSucursales($query) : $query;
    }
    
    private static function jsonSucursales($query){
        $arrayJsonSucursales = array();
        for($i=0;$i<count($query);$i++){
            $arrayJsonSucursales[$i]['id'] = $query[$i]['id'];
            $arrayJsonSucursales[$i]['organizacion'] = $query[$i]['nombre_organizacion'];
            $arrayJsonSucursales[$i]['principal'] = $query[$i]['principal'];
            $arrayJsonSucursales[$i]['coordenada_x'] = $query[$i]['coordenada_x'];
            $arrayJsonSucursales[$i]['coordenada_y'] = $query[$i]['coordenada_y'];
            $arrayJsonSucursales[$i]['detalle_direccion'] = $query[$i]['detalle_direccion'];
            $arrayJsonSucursales[$i]['telefono'] = $query[$i]['telefono_ppal'];
        }
        return $arrayJsonSucursales;
    }

}