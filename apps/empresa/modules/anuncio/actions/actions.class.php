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
        $this->forward404Unless($this->getUser()->hasCredential('Empresa'));
        $this->forward404Unless($request->hasParameter('token'));
        $this->forward404Unless($empresa = Doctrine_Core::getTable('Organizacion')->findOneByToken($request->getParameter('token')));
        $this->forward404Unless($empresa->getUsuarioId()==$this->getUser()->getAttribute('usuario_id','','user_vars'));;
    }

    public function executeIndex(sfWebRequest $request) {
        $this->anuncios = Doctrine_Core::getTable('Anuncio')
                ->createQuery('a')
                ->execute();
    }

    public function executeNew(sfWebRequest $request) {
        $this->form = new AnuncioForm();
        $this->formUbicacion = Doctrine_Core::getTable('Ubicacion')->getSucursalesPorOrganizacion($request->getParameter('token'), false);
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new AnuncioForm();
        $mainForm = $request->getParameter($this->form->getName());
        $this->formExtra = $this->preparaGuardarFormExtra($mainForm['tipo_anuncio_id']);
        $this->processForm($request, $this->form, $this->formExtra);

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
        $this->forward404Unless($anuncio = Doctrine_Core::getTable('Anuncio')->find(array($request->getParameter('id'))), sprintf('Object anuncio does not exist (%s).', $request->getParameter('id')));
        $anuncio->delete();

        $this->redirect('@anuncio?token=' . $request->getParameter('token'));
    }

    protected function processForm(sfWebRequest $request, sfForm $form, $formExtra = null) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            if ($formExtra != null) {
                $anuncio = $form->save();
                $this->getUser()->setAttribute('anuncio', $anuncio->getId());
                $formExtra->guardar($request);
                $formUbicacion = $request->getParameter('ubicacion_anuncio');
                foreach ($formUbicacion['ubicacion_id'] as $ubicacion) {
                    $ubicacionAnuncio = new UbicacionAnuncio();
                    $ubicacionAnuncio->guardar($ubicacion);
                }
                $this->getUser()->getAttributeHolder()->remove('anuncio');
            }
            $this->redirect('@anuncio?token=' . $request->getParameter('token') . '&id=' . $anuncio->getId());
        }
    }

    protected function preparaGuardarFormExtra($formExtra) {
        switch ($formExtra) {
            case 1:
                $extraForm = new AnuncioEvento();
                break;
            case 2:
                $extraForm = null;
                break;
            case 3;
                $extraForm = new AnuncioCupon();
                break;
            default:
                $this->redirect404();
                break;
        }
        return $extraForm;
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
