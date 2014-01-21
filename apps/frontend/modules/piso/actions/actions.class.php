<?php

/**
 * piso actions.
 *
 * @package    mantenedor
 * @subpackage piso
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pisoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->pisos = Doctrine_Core::getTable('Piso')
      ->createQuery('a')
      ->orderBy('numero_piso ASC')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->piso = Doctrine_Core::getTable('Piso')->find(array($request->getParameter('numero_piso')));
    $this->forward404Unless($this->piso);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PisoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PisoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($piso = Doctrine_Core::getTable('Piso')->find(array($request->getParameter('numero_piso'))), sprintf('Object piso does not exist (%s).', $request->getParameter('numero_piso')));
    $this->form = new PisoForm($piso);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($piso = Doctrine_Core::getTable('Piso')->find(array($request->getParameter('numero_piso'))), sprintf('Object piso does not exist (%s).', $request->getParameter('numero_piso')));
    $this->form = new PisoForm($piso);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($piso = Doctrine_Core::getTable('Piso')->find(array($request->getParameter('numero_piso'))), sprintf('Object piso does not exist (%s).', $request->getParameter('numero_piso')));
    $piso->delete();

    $this->redirect('piso/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $piso = $form->save();
      $pisoform = $request->getParameter('piso');
      if(isset($pisoform['estado'])){
        $piso->cambiarEstadoEnCascada(true);
      }else{
        $piso->cambiarEstadoEnCascada(false);
      }

      $this->redirect('piso/edit?numero_piso='.$piso->getNumeroPiso());
    }
  }
}
