<?php 
    foreach($empresas as $empresa){
        echo $empresa->getCiudad();
        echo $empresa->getOrganizacion()->getNombreOrganizacion();
    }

?>