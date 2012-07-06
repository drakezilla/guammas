<?php

/**
 * usuario actions.
 *
 * @package    guammas
 * @subpackage usuario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends sfActions {

    public function executeNew(sfWebRequest $request) {
        if ($request->isXmlHttpRequest()) {
            $this->form = new UsuarioForm();
        } else {
            return $this->forward404();
        }
    }

    public function executeCreate(sfWebRequest $request) {
        if ($request->hasParameter("deacuerdo")) {
            $deacuerdo = $request->getParameter("deacuerdo");
            if (!empty($deacuerdo)) {
                $this->forward404Unless($request->isMethod(sfRequest::POST));
                $this->form = new UsuarioForm();
                if (!$this->processForm($request, $this->form)) {
                    $this->setTemplate('new');
                    //$this->redirect("bienvenido/index");
                } else {
                    $this->redirect("bienvenido/exito");
                }
            } else {
                $this->forward404();
            }
        } else {
            $this->forward404();
        }
    }

    public function executeCheckusuario(sfWebRequest $request) {
        $return = array();
        if ($request->isXmlHttpRequest()) {
            if (strlen($request->getParameter("username")) >= 6) {
                $checkUsuario = Doctrine_Core::getTable("Usuario")->findByNombreUsuario($request->getParameter("username"));
                if (count($checkUsuario) == 0) {
                    $return["flag"] = 'true';
                    $return["msg"] = 'Este usuario se encuentra disponible';
                } else {
                    $return["flag"] = 'false';
                    $return["msg"] = 'Este usuario esta ocupado, piensa en otro';
                }
            } else {
                $return["flag"] = 'false';
                $return["msg"] = 'El nombre es muy corto, busca uno de mas de 6 letras';
            }
            echo json_encode($return);
            die();
        } else {
            return $this->forward404();
        }
    }

    public function executeCheckemail(sfWebRequest $request) {
        $return = array();
        if ($request->isXmlHttpRequest()) {
            $checkUsuario = Doctrine_Core::getTable("Usuario")->findByCorreoElectronico($request->getParameter("correo"));
            if (count($checkUsuario) == 0) {
                $return["flag"] = 'true';
                $return["msg"] = 'Este correo electronico si es valido';
            } else {
                $return["flag"] = 'false';
                $return["msg"] = 'Este correo esta siendo usado, ¿eres tú? <a href="#">Recupera tu contraseña</a>';
            }
            echo json_encode($return);
            die();
        } else {
            return $this->forward404();
        }
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $usuario = $form->save();
            $this->getUser()->setAttribute("username", $usuario->getNombreUsuario(),"user_vars");
            return true;
        } else {
            return false;
        }
    }

    public function executeCerrarsesion(sfWebRequest $request) {
        Usuario::removeVariablesSesion($this->getUser());
        $this->redirect("bienvenido/index");
    }

    public function executeLogin(sfWebRequest $request) {
        if ($request->hasParameter("login")) {
            $formData = $request->getParameter("login");
            if (count($formData) == 2) {
                $this->logingIn($formData, $request);
            } else {
                return $this->forward404();
            }
        } else {
            return $this->forward404();
        }
    }

    protected function logingIn($form, sfWebRequest $request) {
        $clave=$form['password'];
        $usuario=$form['username'];
        $usuario = Doctrine_Core::getTable("Usuario")->getDatosUsuario($usuario, $clave);
        if ($request->isXmlHttpRequest()) {
            if (count($usuario) == 1) {
                $return = array();
                if ($usuario[0]['activo'] == false) {
                    $return["flag"] = "false";
                    $return["msg"] = "Aun no has activado tu cuenta, por favor verifica tu correo y activala para iniciar sesión";
                } else {
                    $return["flag"] = "true";
                    $return["msg"] = "Iniciando sesion y haciendo otras cosas geniales :)";
                }
            } else {
                $return["flag"] = "false";
                $return["msg"] = "Usuario o contraseña invalidos! verifica tus datos e intenta de nuevo";
            }
            echo json_encode($return);
            die();
        } else {
            if (count($usuario) == 1) {
                Usuario::setVariableSesion($usuario, $this->getUser());
                $this->redirect("bienvenido/index");
            }
        }
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($usuario = Doctrine_Core::getTable('Usuario')->findOneByNombreUsuario(array($request->getParameter('nombre_usuario'))), sprintf('Object usuario does not exist (%s).', $request->getParameter('nombre_usuario')));
        $this->formUsuario= new UsuarioForm($usuario);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($usuario = Doctrine_Core::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Object usuario does not exist (%s).', $request->getParameter('id')));
        $this->formUsuario = new UsuarioForm($usuario);

        $request = self::setDatosUsuarioUpdate($request);

        if ($this->processForm($request, $this->formUsuario)) {
            $this->getUser()->setFlash("notice", "Gracias! todos tus cambios fueron cambiado con exito");
            $this->redirect("@editarUsuario?nombre_usuario=" . $this->getUser()->getAttribute('usuario_username','',"user_vars"));
        } else {
            $this->getUser()->setFlash("error", "Oops, ha ocurrido algo que no deberia, por favor intenta mas tarde!");
            $this->setTemplate("edit");
        }
    }

    private static function setDatosUsuarioUpdate(sfWebRequest $request) {
        $usuario = Doctrine_Core::getTable("Usuario")->findOneById($request->getParameter("id"));
        $form = $request->getParameter("usuario");
        $form['activo'] = $usuario->getActivo();
        $form['contrasena'] = $usuario->getContrasena();
        $form['rol_id'] = $usuario->getRolId();
        $request->setParameter("usuario", $form);
        return $request;
    }
    
    public function executeLogout(sfWebRequest $request){
        Usuario::removeVariablesSesion($this->getUser());
        $this->redirect("@homepage");
    }

    public function executeLoginREST(sfWebRequest $request){
        $this->forward404Unless($request->hasParameter('correo')&&$request->hasParameter('clave'));
        $this->forward404Unless(ereg('Android', $_SERVER['HTTP_USER_AGENT']));
        
        $usuarioData = Doctrine_Core::getTable('Usuario')->getDatosUsuario($request->getParameter('correo'),$request->getParameter('clave'));
        if(count($usuarioData)==1){
            $returnArray['status'] = 'true';
        }else{
            $returnArray['status'] = 'false';
        }
        echo json_encode($returnArray);
        die();
    }
}

