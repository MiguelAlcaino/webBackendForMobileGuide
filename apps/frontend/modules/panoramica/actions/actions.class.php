<?php

/**
 * panoramica actions.
 *
 * @package    mantenedor
 * @subpackage panoramica
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class panoramicaActions extends sfActions
{
  public function executePanoramicasDeSala(sfWebRequest $request){
    $sala = Doctrine_Core::getTable('Sala')->find($request->getParameter('id_sala'));
    $this->sala = $sala;
    $this->panoramicas = $sala->getPanoramica();
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->panoramicas = Doctrine_Core::getTable('Panoramica')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->panoramica = Doctrine_Core::getTable('Panoramica')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->panoramica);
  }

  public function executeNew(sfWebRequest $request)
  {
    $sala = Doctrine_Core::getTable('Sala')->find($request->getParameter('id_sala'));
    $panoramica = new Panoramica();
    $panoramica->setSala($sala);
    $this->sala = $sala;
    $this->form = new PanoramicaForm($panoramica);
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    $panoramica = $request->getParameter('panoramica');
    $this->sala = Doctrine_Core::getTable('Sala')->find($panoramica['id_sala']);
    
    $this->form = new PanoramicaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($panoramica = Doctrine_Core::getTable('Panoramica')->find(array($request->getParameter('id'))), sprintf('Object panoramica does not exist (%s).', $request->getParameter('id')));
    $this->sala = $panoramica->getSala();
    $this->form = new PanoramicaForm($panoramica);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($panoramica = Doctrine_Core::getTable('Panoramica')->find(array($request->getParameter('id'))), sprintf('Object panoramica does not exist (%s).', $request->getParameter('id')));
    $this->form = new PanoramicaForm($panoramica);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($panoramica = Doctrine_Core::getTable('Panoramica')->find(array($request->getParameter('id'))), sprintf('Object panoramica does not exist (%s).', $request->getParameter('id')));
    
    $panoramica->delete();
    
    $sala = $panoramica->getSala();
    
    $panoramicas = $sala->getPanoramica();
    
    if(count($panoramicas)==0){
      $sala->setEstado(false);
      $sala->save();
    }

    $this->redirect('panoramica/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $panoramica = $form->save();
      $sala = $panoramica->getSala();
      $panoramicas = $sala->getPanoramica();
      
      $panoramicaform = $request->getParameter('panoramica');
      if(isset($panoramicaform['estado'])){
        $panoramica->cambiarEstadoEnCascada(true);
      }else{
        $panoramica->cambiarEstadoEnCascada(false);
      }
      if(count($panoramicas) >= 1){
        $sala->setEstado(true);
        $sala->save();
      }
      
      if($sala->isPanoramicasActivadas()){
        $sala->setEstado(true);
        $sala->save();
      }else{
        $sala->setEstado(false);
        $sala->save();
      }
      
      
      $this->redirect('panoramica/edit?id='.$panoramica->getId());
    }
  }
}
