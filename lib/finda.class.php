<?php

/**
 *
 * Finda: es mi clase principal de construccion del indice del buscador.
 * Deberia ser capaz de, solo con el id de la organizacion construir una cadena que se encargue de
 *  Agarrar el nombre de la organizacion
 *  Agarrar las coordenadas de sus ubicaciones
 *  Las etiquetas asociadas
 *  Los Anuncios asociados
 * El separador de campos sera |||
 * 
 * @author Enrique Nuñez
 * @package Guammas
 */
class finda {

    private $empresa, $stringIndex;

    public function __construct($empresa_id) {
        $this->empresa = $empresa_id;
        $this->stringIndex = "";
    }

    /**
     *
     * metodo que construye la cadena de construccion del indice del buscador
     * Pasos de construccion:
     *  Paso 1: buscar datos de la organizacion
     *      Tabla para buscar: Organizacion
     *      Campos a extraer:
     *          nombre_organizacion
     *  Paso 2: busco las ubicaciones para extraer coordenadas de toooooodas las ubicaciones utilizando el id de la organizacion
     *      Tabla para buscar: Ubicacion
     *      Campos a extraer: 
     *          coordenada_x
     *          coordenada_y
     *          CiudadNombre (por relacion con la tabla Ciudad)
     *  Paso 3: busco tooodas las etiquetas asociadas a la empresa
     *      Tabla para buscar: TagOrganizacion
     *      Campos a extraer: etiqueta (por relacion con la tabla Tag)
     * @return unico string de campos de busqueda 
     */
    public function indexConstructor() {

        
        
        $organizacion = Doctrine_Core::getTable('Organizacion')->findOneById($this->empresa);
        $ubicaciones = Doctrine_Core::getTable('Ubicacion')->findByEmpresaId($this->empresa);
        $tags = Doctrine_Core::getTable('TagOrganizacion')->findByEmpresaId($this->empresa);
        
        $this->stringIndex=$organizacion->getNombreOrganizacion();
        
        if (count($ubicaciones) > 0) {
            foreach ($ubicaciones as $ubicacion) {
                $this->stringIndex.="|||".$ubicacion->getCoordenadaX();
                $this->stringIndex.="|||".$ubicacion->getCoordenadaY();
                $this->stringIndex.="|||".$ubicacion->getCiudad()->getNombreCiudad();
            }
        }
        
        if (count($tags) > 0) {
            foreach ($tags as $tag) {
                $this->stringIndex.="|||".$tag->getTag()->getEtiqueta();
            }
        }

        return $this->stringIndex;
    }

}

?>
