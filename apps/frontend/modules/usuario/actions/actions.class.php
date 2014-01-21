<?php

/**
 * usuario actions.
 *
 * @package    mantenedor
 * @subpackage usuario
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class usuarioActions extends sfActions
{
  public function executeLogin(sfWebRequest $request){
    $this->form = new LoginForm();
    
    if($request->isMethod('post')){
      $this->form->bind($request->getParameter('login'));
      
      if($this->form->isValid()){
        if(!$usuario = UsuarioTable::login($this->form->getValue('usuario'), $this->form->getValue('password'))){
          
          $this->getUser()->setFlash('error', 'Datos incorrectos');
          $this->redirect('usuario/login');
        }else{
          
          $this->getUser()->setAuthenticated(true);
          $this->getUser()->addCredential('user');
          $this->getUser()->setAttribute('id', $usuario->getId());
          
          $url = $this->getUser()->getAttribute('referer', false)?:'sala/index';
          $this->getUser()->setAttribute('referer', false);
          $this->redirect($url);
        }
      }
    }
  }
  
   public function executeLogout(sfWebRequest $request){
    $this->getUser()->setAuthenticated(false);
    $this->getUser()->getAttributeHolder()->clear();
    $this->redirect("usuario/login");
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->usuarios = Doctrine_Core::getTable('Usuario')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UsuarioForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UsuarioForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($usuario = Doctrine_Core::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Object usuario does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsuarioForm($usuario);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($usuario = Doctrine_Core::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Object usuario does not exist (%s).', $request->getParameter('id')));
    $this->form = new UsuarioForm($usuario);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($usuario = Doctrine_Core::getTable('Usuario')->find(array($request->getParameter('id'))), sprintf('Object usuario does not exist (%s).', $request->getParameter('id')));
    $usuario->delete();

    $this->redirect('usuario/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $usuario = $form->save();

      $this->redirect('usuario/edit?id='.$usuario->getId());
    }
  }
}
