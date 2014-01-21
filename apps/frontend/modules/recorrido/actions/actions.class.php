<?php

/**
 * recorrido actions.
 *
 * @package    mantenedor
 * @subpackage recorrido
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class recorridoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->recorridos = Doctrine_Core::getTable('Recorrido')
      ->createQuery('a')
      ->orderBy('a.id ASC')
      ->execute();
      $recorridos=Doctrine::getTable('Recorrido')->getRecorridosDesactivados();
    if(count($recorridos) > 0){
      $this->recorridos_desactivados = $recorridos;
    }
    
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->recorrido = Doctrine_Core::getTable('Recorrido')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->recorrido);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->salas = Sala::quitarSalasSinGrabacion(Doctrine_Core::getTable('Sala')->createQuery('a')->orderBy('a.sala_numero ASC')->execute());
    $this->form = new RecorridoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
    $this->salas = Sala::quitarSalasSinGrabacion(Doctrine_Core::getTable('Sala')->createQuery('a')->orderBy('a.sala_numero ASC')->execute());
    
    $this->form = new RecorridoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($recorrido = Doctrine_Core::getTable('Recorrido')->find(array($request->getParameter('id'))), sprintf('Object recorrido does not exist (%s).', $request->getParameter('id')));
    $this->salas = Sala::quitarSalasSinGrabacion(Sala::getSalasMenosRecorrido($recorrido->getId()));
    $this->form = new RecorridoForm($recorrido);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($recorrido = Doctrine_Core::getTable('Recorrido')->find(array($request->getParameter('id'))), sprintf('Object recorrido does not exist (%s).', $request->getParameter('id')));
    $this->salas = Sala::quitarSalasSinGrabacion(Sala::getSalasMenosRecorrido($recorrido->getId()));
    //print_r($request->getParameter('recorrido'));
    
    $this->form = new RecorridoForm($recorrido);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($recorrido = Doctrine_Core::getTable('Recorrido')->find(array($request->getParameter('id'))), sprintf('Object recorrido does not exist (%s).', $request->getParameter('id')));
    $recorrido->delete();
    
    $notice = 'El recorrido ha sido eliminado con exito.';
    $this->getUser()->setFlash('notice', $notice);
    $this->redirect('recorrido/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'El recorrido fue creado con exito.' : 'El recorrido fue actualizado con exito';
      $recorrido = $form->save();
      
      $this->getUser()->setFlash('notice', $notice);
      $this->redirect('recorrido/index');
    }
  }
}
