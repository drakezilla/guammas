<?php

/**
 * empresa actions.
 *
 * @package    guammas
 * @subpackage empresa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class empresaActions extends sfActions {

    public function executeNew(sfWebRequest $request) {
        $this->formOrganizacion = new OrganizacionForm();
        $this->formUbicacion = new UbicacionForm();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->formOrganizacion = new OrganizacionForm();
        $this->formUbicacion = new UbicacionForm();

        $this->processForm($request, $this->formOrganizacion, $this->formUbicacion);

        $this->setTemplate('new');
    }

    protected function processForm(sfWebRequest $request, sfForm $formOrganizacion, sfForm $formUbicacion) {
        $formOrganizacion->bind($request->getParameter($formOrganizacion->getName()), $request->getFiles($formOrganizacion->getName()));
        $formUbicacion->bind($request->getParameter($formUbicacion->getName()), $request->getFiles($formUbicacion->getName()));
        if ($formOrganizacion->isValid() && $formUbicacion->isValid()) {
            $organizacion = $formOrganizacion->save();
            $this->getUser()->setAttribute("empresa", $organizacion->getId());
            $this->getUser()->setAttribute("principal", true);
            $ubicacion = $formUbicacion->save();
            $this->getUser()->getAttributeHolder()->remove("principal");
            $this->getUser()->getAttributeHolder()->remove("empresa");
            $this->redirect('@exito');
        }
    }

    public function executeMapa(sfWebRequest $request) {
        $this->geostring = $request->getParameter("geostring");
    }

    public function executeExito(sfWebRequest $request) {
        Usuario::setVariablesEmpresa($this->getUser()->getAttribute('usuario_id', '', 'user_vars'), $this->getUser());
    }

    public function executeActivarComercioUsuario(sfWebRequest $request) {
        $rutaCorrecta = explode("empresa/exito", $request->getReferer());
        if (count($rutaCorrecta) == 2) {
            $usuario = new Usuario();
            $usuario->setUsuarioComoEmpresa($this->getUser());
            $this->redirect("@homepage");
        } else {
            $this->forward404();
        }
    }

}
