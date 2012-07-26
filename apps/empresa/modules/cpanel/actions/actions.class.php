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
        $this->forward404Unless($this->getUser()->hasCredential('Empresa'));
        $this->forward404Unless($request->hasParameter('token'));
        $this->forward404Unless($empresa = Doctrine_Core::getTable('Organizacion')->findOneByToken($request->getParameter('token')));
        $this->forward404Unless($empresa->getUsuarioId()==$this->getUser()->getAttribute('usuario_id','','user_vars'));;
    }

    public function executeIndex(sfWebRequest $request) {
        $this->ultimosAnuncios = Doctrine_Core::getTable('Anuncio')->getUltimosTres();
    }
}