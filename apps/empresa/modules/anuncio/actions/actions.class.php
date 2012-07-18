<?php

/**
 * anuncio actions.
 *
 * @package    guammas
 * @subpackage anuncio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class anuncioActions extends sfActions {

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
        $this->anuncios = Doctrine_Core::getTable('Anuncio')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new AnuncioForm();
        $this->formUbicacion = Doctrine_Core::getTable('Ubicacion')->getSucursalesPorOrganizacion($request->getParameter('token'),false);
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new AnuncioForm();

        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
        $this->form = new AnuncioForm($anuncio);
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
        $this->form = new AnuncioForm($anuncio);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
        $anuncio->delete();

        $this->redirect('anuncio/index?token=' . $request->getParameter('token'));
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $anuncio = $form->save();

            $this->redirect('anuncio/edit?token=' . $request->getParameter('token') . '&id=' . $anuncio->getId());
        }
    }

    public function executeGetForm(sfWebRequest $request) {
        $this->forward404Unless($request->isXmlHttpRequest());
        $this->form = $form = new AnuncioForm();
        if ($request->getParameter('form') != 'oferta') {
            $this->formExtra = $this->getFormObj($request->getParameter('form'));
        }
        $this->setTemplate($request->getParameter('form'));
    }

    protected function getFormObj($form) {
        switch ($form) {
            case 'cupon':
                $form = new AnuncioCuponForm();
                break;
            case 'evento':
                $form = new AnuncioEventoForm();
                break;
            default:
                $this->forward404();
        }
        return $form;
    }

}
