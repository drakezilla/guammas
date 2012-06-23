<?php

/**
 * bienvenido actions.
 *
 * @package    guammas
 * @subpackage bienvenido
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bienvenidoActions extends sfActions {

    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request) {
        if (!$this->getUser()->isAuthenticated()) {
            $this->setLayout('layout-bienvenido');
            $this->setTemplate('main');
        } else {
            $this->setLayout('layout-main-mapa');
            $this->setTemplate('index');
        }
    }

    public function executeExito(sfWebRequest $request) {
        //$this->setLayout("lay_bienvenido");
        if ($this->getUser()->hasAttribute("username", 'user_vars')) {
            $this->username = $this->getUser()->getAttribute("username", '', "user_vars");
        } else {
            $this->redirect("bienvenido/index");
        }
        $this->getUser()->getAttributeHolder()->remove("username");
    }
}
