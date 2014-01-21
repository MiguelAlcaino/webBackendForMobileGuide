<?php

/**
 * sala actions.
 *
 * @package    mantenedor
 * @subpackage sala
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class salaActions extends sfActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    if($request->getParameter('numero_piso')){
      $piso = Doctrine_Core::getTable('Piso')->find($request->getParameter('numero_piso'));
      $this->pisos = Doctrine_Core::getTable('Piso')->createQuery('a')->orderBy('a.numero_piso ASC')->execute();
      $this->salas = $piso->getSalas();
    }else{
      $piso = Doctrine_Core::getTable('Piso')->find(1);
      $this->pisos = Doctrine_Core::getTable('Piso')->createQuery('a')->orderBy('a.numero_piso ASC')->execute();
      $this->salas = $piso->getSalas();
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->sala = Doctrine_Core::getTable('Sala')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->sala);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->pisos = Doctrine_Core::getTable('Piso')->createQuery('a')->orderBy('a.numero_piso ASC')->execute();
    $this->form = new SalaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
    
    $this->pisos = Doctrine_Core::getTable('Piso')->createQuery('a')->execute();
    
    $this->form = new SalaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($sala = Doctrine_Core::getTable('Sala')->find(array($request->getParameter('id'))), sprintf('Object sala does not exist (%s).', $request->getParameter('id')));
    $this->pisos = Doctrine_Core::getTable('Piso')->createQuery('a')->orderBy('a.numero_piso ASC')->execute();
    $this->sala = $sala;
    $this->form = new SalaForm($sala);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($sala = Doctrine_Core::getTable('Sala')->find(array($request->getParameter('id'))), sprintf('Object sala does not exist (%s).', $request->getParameter('id')));
    $this->form = new SalaForm($sala);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($sala = Doctrine_Core::getTable('Sala')->find(array($request->getParameter('id'))), sprintf('Object sala does not exist (%s).', $request->getParameter('id')));
    
    $sala->desactivarRecorridoSegunSala();
    
    $sala->delete();
    
    $notice = 'La sala ha sido eliminada con exito.';
    
    $this->getUser()->setFlash('notice', $notice);
    $this->redirect('sala/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'La sala fue creada con exito. Procure agregar imagenes panoramicas a ella.' : 'La sala fue actualizada con exito';
      $es_nuevo = $form->getObject()->isNew();
      
      $sala = $form->save();
      
      $salaform = $request->getParameter('sala');
      
      if(isset($salaform['estado'])){
        $sala->cambiarEstadoEnCascada(true);
      }else{
        
        if(!$es_nuevo){

        $sala->cambiarEstadoEnCascada(false);
        $recorridos_desactivados=$sala->desactivarRecorridoSegunSala();
        if(count($recorridos_desactivados) != 0){
          $mensaje_recorridos_desactivados = (count($recorridos_desactivados) == 1) ? 'El recorrido ' : 'Los recorridos ';
          foreach($recorridos_desactivados as $recorrido_desactivado){
            $mensaje_recorridos_desactivados.= $recorrido_desactivado->getTipo().', ';
          }
          $mensaje_recorridos_desactivados.= (count($recorridos_desactivados) == 1) ? 'ha sido desactivado.' : 'han sido desactivados.';
          $this->getUser()->setFlash('mensaje_recorridos_desactivados', $mensaje_recorridos_desactivados);
        }
        
        }
      }
      $this->getUser()->setFlash('notice', $notice);
      $this->redirect('sala/index');
    }
  }
}
