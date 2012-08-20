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

    public function executeGetSucursales(sfWebRequest $request) {
        $this->forward404Unless($request->isXmlHttpRequest());
        $sucursales = Doctrine_Core::getTable('Ubicacion')->getSucursalesParaMapa(true);
        echo json_encode($sucursales);
        die();
    }

    public function executeCreate(sfWebRequest $request) {
        $this->setTemplate('correo');
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->formOrganizacion = new OrganizacionForm();
        $this->formUbicacion = new UbicacionForm();
        $this->processForm($request, $this->formOrganizacion, $this->formUbicacion);

        $this->token = $this->getUser()->getAttribute("token");
        $this->getUser()->getAttributeHolder()->remove("token");
        $cuerpoCorreo = htmlExtractor::getHtmlContent($this, "layout-email");
        $correoExito = new EmailClass('Empresa creada');
        $correoExito->correoExito($this->getUser()->getAttribute('usuario_email', '', 'user_vars'), $cuerpoCorreo);
        $this->redirect('@exito');
        die();
    }

    protected function processForm(sfWebRequest $request, sfForm $formOrganizacion, sfForm $formUbicacion) {
        $formOrganizacion->bind($request->getParameter($formOrganizacion->getName()), $request->getFiles($formOrganizacion->getName()));
        $formUbicacion->bind($request->getParameter($formUbicacion->getName()), $request->getFiles($formUbicacion->getName()));
        if ($formOrganizacion->isValid() && $formUbicacion->isValid()) {
            $organizacion = $formOrganizacion->save();
            $this->getUser()->setAttribute("empresa", $organizacion->getId());
            $this->getUser()->setAttribute("token", $organizacion->getToken());
            $this->getUser()->setAttribute("principal", true);
            $ubicacion = $formUbicacion->save();
            $this->getUser()->getAttributeHolder()->remove("principal");
        }
    }

    public function executeMapa(sfWebRequest $request) {
        $this->geostring = $request->getParameter("geostring");
    }

    public function executeExito(sfWebRequest $request) {
        Usuario::setVariablesEmpresa($this->getUser()->getAttribute('usuario_id', '', 'user_vars'), $this->getUser());
    }

    public function executeTags(sfWebRequest $request) {
        $this->forward404Unless($request->isXmlHttpRequest());
        $tags = Doctrine_Core::getTable("Tag")->getTags($request->getParameter('term'));
        $retArray = array();
        for ($i = 0; $i < count($tags); $i++) {
            $retArray[$i]["id"] = $tags[$i]['id'];
            $retArray[$i]["value"] = $tags[$i]['etiqueta'];
            $retArray[$i]["label"] = $tags[$i]['etiqueta'];
        }
        echo json_encode($retArray);
        die();
    }

    public function executeGuardarTags(sfWebRequest $request) {
        $this->forward404Unless($request->isXmlHttpRequest());
        $this->forward404Unless($datosOrganizacion = Doctrine_Core::getTable('Organizacion')->findOneById($this->getUser()->getAttribute('empresa')));
        //Primero ver los tags que ESTAN EN LA TABLA TAGS Y GUARDAR LOS OTROS

        $existen = Doctrine_Core::getTable('Tag')->getIdTags($request->getParameter('tags'));
        $tagExisten = array();
        for ($i = 0; $i < count($existen); $i++) {
            $tagExisten[$i] = $existen[$i]['etiqueta'];
        }
        $tagNoExiste = array_diff($request->getParameter('tags'), $tagExisten);
        for ($i = 0; $i < count($tagNoExiste); $i++) {
            $tag = new Tag();
            $tag->guardarTag($tagNoExiste[$i]);
        }

        //Segundo Traer el id de las etiquetas que cree
        $allTagsSave = Doctrine_Core::getTable('Tag')->getIdTags($request->getParameter('tags'));
        for ($i = 0; $i < count($allTagsSave); $i++) {
            $tagOrganizacion = new TagOrganizacion();
            $tagOrganizacion->asignarTag($allTagsSave[$i]['id'], $this->getUser()->getAttribute('empresa'));
        }

        if ($datosOrganizacion->getActiva()) {
            $ubicacion = new Ubicacion();
            $ubicacion->updateLuceneIndex($this->getUser()->getAttribute('empresa'));
        }

        die();
    }

    public function executeActivar(sfWebRequest $request) {
        $this->forward404Unless($datosOrganizacion = Doctrine_Core::getTable('Organizacion')->FindOneByToken($request->getParameter('token')));
        if (!$datosOrganizacion->getActiva()) {
            $usuario = new Usuario();
            $usuario->setUsuarioComoEmpresa($this->getUser());
            Organizacion::activarOrganizacion($datosOrganizacion->getId());
            $ubicacion = new Ubicacion();
            $ubicacion->updateLuceneIndex($datosOrganizacion->getId());
        } else {
            $this->setTemplate('errorActivar');
        }
    }

}
