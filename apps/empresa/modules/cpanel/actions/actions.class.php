<?php

/**
 * cpanel actions.
 *
 * @package    guammas
 * @subpackage cpanel
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cpanelActions extends sfActions {

    public function preExecute() {
        $request = $this->context->getRequest();
        if (!$this->getUser()->hasCredential('Empresa')) {
            $this->redirect404();
        } else {
            if (!$request->hasParameter('token')) {
                $this->redirect404();
            } else {
                $empresa = Doctrine_Core::getTable('Organizacion')->findByToken($request->getParameter('token'));
                if (count($empresa) != 1) {
                    $this->redirect404();
                } else {
                    return true;
                }
            }
        }
    }

    public function executeIndex(sfWebRequest $request) {
        
    }

    public function executeSucursal(sfWebRequest $request) {
        if ($this->getUser()->hasAttribute('popupNuevaSucursal')) {
            $this->getResponse()->setCookie('popupNuevaSucursal', 'no', time() + (86400 * 7));
        }
        $this->form = new UbicacionForm();
    }

    public function executeGetSucursales(sfWebRequest $request) {
        $sucursales = Doctrine_Core::getTable('Ubicacion')->getSucursalesPorOrganizacion($request->getParameter('token'));
        echo json_encode($sucursales);
        die();
    }

    public function executeNomostrar(sfWebRequest $request) {
        $this->forward404Unless($request->isXmlHttpRequest());
        if (!$this->context->getRequest()->hasCookie('popupNuevaSucursal')) {
            if ($request->getParameter('nomostrar') == 'on') {
                $this->getUser()->setAttribute('popupNuevaSucursal', true);
            }
        }
        die();
    }

    public function executeConfig(sfWebRequest $request) {
        $this->forward404Unless($request->isXmlHttpRequest());
        $cookie = $this->context->getRequest()->getCookie('popupNuevaSucursal');
        echo $cookie;
        die();
    }
    
    public function executeGuardarUbicacion(sfWebRequest $request){
        $this->forward404Unless($request->isXmlHttpRequest());
        $this->forward404Unless($request->hasParameter('rif')&&$request->hasParameter('nombre')&&$request->hasParameter('telefono')&&$request->hasParameter('coordenada_x')&&$request->hasParameter('coordenada_y')&&$request->hasParameter('ciudad_id'));
        $empresa = Doctrine_Core::getTable("Organizacion")->findOneByToken($request->getParameter('token'));
        $this->getUser()->setAttribute('principal', false);
        $this->getUser()->setAttribute('empresa', $empresa->getId());
        $ubicacion = new Ubicacion();
        $ubicacion->nuevaUbicacion($request);
        echo true;
        die();
    }

}