<?php

/**
 * Usuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Usuario extends BaseUsuario {

    public static function setVariableSesion($datosUsusario, sfUser $sf_user) {
        self::removeVariablesSesion($sf_user);
        $sf_user->setAuthenticated(true);
        $datosUsusario[0]['rol_id'] == 1 ? $sf_user->addCredential('Persona') : $sf_user->addCredentials(array('Persona', 'Empresa'));
        $sf_user->setAttribute("usuario_id", $datosUsusario[0]['id'], "user_vars");
        $sf_user->setAttribute("usuario_nombre", $datosUsusario[0]['nombre'], "user_vars");
        $sf_user->setAttribute("usuario_apellido", $datosUsusario[0]['apellido'], "user_vars");
        $sf_user->setAttribute("usuario_username", $datosUsusario[0]['nombre_usuario'], "user_vars");
        $sf_user->setAttribute("usuario_email", $datosUsusario[0]['correo_electronico'], "user_vars");
        if ($datosUsusario[0]['rol_id'] == 2) {
            self::setVariablesEmpresa($datosUsusario[0]['id'], $sf_user);
        }
    }

    public static function setVariablesEmpresa($usuario_id, sfUser $sf_user) {
        $empresas = Doctrine_Core::getTable('Empresa')->findByUsuarioId($usuario_id);
        $i = 0;
        $arrayEmpresa = array();
        foreach ($empresas as $empresa) {
            $arrayEmpresa[$i]["empresa_id"] = $empresa->getId();
            $arrayEmpresa[$i]["empresa_nombre"] = $empresa->getNombre();
            $arrayEmpresa[$i]["empresa_token"] = $empresa->getToken();
            $i++;
        }
        $sf_user->setAttribute("empresa", $arrayEmpresa, 'empr_vars');
    }

    public static function removeVariablesSesion(sfUser $sf_user) {
        $sf_user->clearCredentials();
        $sf_user->setAuthenticated(false);
        return true;
    }

    public function setUsuarioComoEmpresa(sfUser $sf_user) {
        $this->updateRolUsuario($sf_user->getAttribute("usuario_id", '', "user_vars"));
        $sf_user->addCredential('Empresa');
    }

    private function updateRolUsuario($usuario_id) {
        $query = Doctrine_Query::create()
                ->update("Usuario")
                ->set("rol_id", "2")
                ->where("id=?", $usuario_id)
                ->execute();
        return $query;
    }

}
