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
        //Primero ver los tags que ESTAN EN LA TABLA TAGS Y GUARDAR LOS OTROS
        $existen = Doctrine_Core::getTable('Tag')->getIdTags($request->getParameter('tags'));
        $tagExisten=array();
        for ($i = 0; $i < count($existen); $i++) {
            $tagExisten[$i] = $existen[$i]['etiqueta'];
        }
        $tagNoExiste=  array_diff($request->getParameter('tags'), $tagExisten);
        for($i=0;$i<count($tagNoExiste);$i++){
            $tag= new Tag();
            $tag->guardarTag($tagNoExiste[$i]);
        }
        
        //Segundo Traer el id de las etiquetas que cree
        $allTagsSave= Doctrine_Core::getTable('Tag')->getIdTags($request->getParameter('tags'));
        for($i=0;$i<count($allTagsSave);$i++){
            $tagOrganizacion= new TagOrganizacion();
            $tagOrganizacion->asignarTag($allTagsSave[$i]['id'], $this->getUser()->getAttribute('empresa'));
        }

        $ubicacion = new Ubicacion();
        $ubicacion->updateLuceneIndex();


        die();
    }

}
