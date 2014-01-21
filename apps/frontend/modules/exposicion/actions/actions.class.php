<?php

/**
 * exposicion actions.
 *
 * @package    mantenedor
 * @subpackage exposicion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class exposicionActions extends sfActions
{
  public function executeAddExposicionImagenForm(sfWebRequest $request){
    $this->forward404Unless($request->isXmlHttpRequest());
    if($exposicion = Doctrine::getTable('Exposicion')->find($request->getParameter('id_exposicion'))){
      $form = new ExposicionForm($exposicion);
    }else{
      $form = new ExposicionForm();
    }
    $number = $request->getParameter('num')+1;
    $key = 'exposicion_imagen_'.$number;
    $form->addExposicionImagen($key);
    
    return $this->renderPartial('exposicion_imagen', array('exposicion_imagen'=>$form['exposicion_imagen_form'][$key], 'counter'=> $number));
  }
  
  public function executeBorrarImagenDeExposicion(sfWebRequest $request){
    
    $exposicion_imagen = Doctrine_Core::getTable('ExposicionImagen')->find($request->getParameter('id_exposicion_imagen'));
    $exposicion_imagen->delete();
    /*
    if($request->isXmlHttpRequest()){
    
    }else{
      
    }
    */
    
  }
  
  public function executeExposicionesDeSala(sfWebRequest $request){
    $sala = Doctrine_Core::getTable('Sala')->find($request->getParameter('id_sala'));
    $this->sala = $sala;
    $this->exposiciones = $sala->getExposiciones();
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->exposicions = Doctrine_Core::getTable('Exposicion')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->exposicion = Doctrine_Core::getTable('Exposicion')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->exposicion);
  }

  public function executeNew(sfWebRequest $request)
  {
    $sala = Doctrine_Core::getTable('Sala')->find($request->getParameter('id_sala'));
    $this->panoramicas = $sala->getPanoramica();
    $this->form = new ExposicionForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ExposicionForm();

    $this->processForm($request, $this->form);
    
    $exposicion = $request->getParameter('exposicion');
    $panoramica = Doctrine_Core::getTable('Panoramica')->find($exposicion['id_panoramica']);
    $sala = Doctrine_Core::getTable('Sala')->find($panoramica->getIdSala());
    $this->panoramicas = $sala->getPanoramica();
    
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($exposicion = Doctrine_Core::getTable('Exposicion')->find(array($request->getParameter('id'))), sprintf('Object exposicion does not exist (%s).', $request->getParameter('id')));
    $this->panoramicas = $exposicion->getPanoramica()->getSala()->getPanoramica();
    $this->exposicion = $exposicion;
    $this->form = new ExposicionForm($exposicion);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($exposicion = Doctrine_Core::getTable('Exposicion')->find(array($request->getParameter('id'))), sprintf('Object exposicion does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExposicionForm($exposicion);
    
    $this->exposicion = $exposicion;
    $this->panoramicas = $exposicion->getPanoramica()->getSala()->getPanoramica();
    
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($exposicion = Doctrine_Core::getTable('Exposicion')->find(array($request->getParameter('id'))), sprintf('Object exposicion does not exist (%s).', $request->getParameter('id')));
    $exposicion->delete();

    $this->redirect('exposicion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      $exposicion = $form->save();
      
      
      $this->redirect('exposicion/edit?id='.$exposicion->getId());
    }
  }
}
