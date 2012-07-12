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
        if(!$this->getUser()->hasCredential('Empresa')){
            $this->redirect404();
            
        }else{
            if(!$request->hasParameter('token')){
                $this->redirect404();
            }else{
                $empresa = Doctrine_Core::getTable('Organizacion')->findByToken($request->getParameter('token'));
                if(count($empresa)!=1){
                    $this->redirect404();
                }else{
                    return true;
                }
            }
        }
        
    }
    
    public function executeIndex(sfWebRequest $request) {
        
    }
    
    public function executeSucursal(sfWebRequest $request) {
    }
    
    public function executeGetSucursales(sfWebRequest $request) {
        $sucursales = Doctrine_Core::getTable('Ubicacion')->getSucursalesPorOrganizacion($request->getParameter('token'));
        echo json_encode($sucursales);
        die();
    }

}