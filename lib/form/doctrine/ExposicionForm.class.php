<?php

/**
 * Exposicion form.
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ExposicionForm extends BaseExposicionForm
{
  public function configure()
  {
    
    //$this->validatorSchema->setOption('allow_extra_fields', true);
    unset($this['num_sonido'], $this['num_imagenes']);
    
    $this->exposicionImagenForm();
    $this->exposicionSonidoForm();
    
    $this->widgetSchema['nombre'] = new sfWidgetFormInputText();
    
    /*
    $this->validatorSchema['codigo'] = new sfValidatorAnd(array(
      $this->validatorSchema['codigo'], new sfValidatorDoctrineUnique(array(
        'model' => 'Exposicion',
        'column' => 'codigo',
        'required' => true
        ))));
      */  
        $this->validatorSchema->setPostValidator(new sfValidatorDoctrineUnique(array(
        'model' => 'Exposicion',
        'column' => 'codigo',
        'required' => true
        ),
        array(
          'invalid' => 'Ya existe una exposici&oacute;n con este c&oacute;digo.'
        )
        ));
    $this->validatorSchema['codigo']->setMessage('required', 'Debe ingresar un c&oacute;digo');
    $this->validatorSchema['nombre']->setMessage('required', 'Debe ingresar un nombre');
    $this->validatorSchema['descripcion']->setMessage('required', 'Debe ingresar una descripci&oacute;n');
    
    //$this->embedRelation('exposicion_imagen_form');
    
    
    $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
    
    $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('<div class="ayuda_form">%help%</div>');
    
    $this->widgetSchema->setHelp('descripcion','(*) Descripci&oacute;n mostrada en la gu&iacute;a.');
    $this->widgetSchema->setHelp('estado','Determina si la exposici&oacute;n estar&aacute; disponible en la gu&iacute;a.');
    $this->widgetSchema->setHelp('codigo','(*) C&oacute;digo &uacute;nico de cada exposici&oacute;n. Se usar&aacute; para acceder directamente a &eacute;sta.');
    $this->widgetSchema->setHelp('nombre','(*) Nombre de la exposici&oacute;n.');
    
    $this->getValidator('cord_x')->setMessage('required', ' Debe seleccionar donde ir&aacute; la exposici&oacute;n.');
    
    //$this->widgetSchema['id_panoramica'] = new sfWidgetFormInputHidden();
    
    //$exposicion=$this->getObject();
    //$panoramica= $exposicion->getPanoramica();
    //$this->widgetSchema['id_panoramica']->setAttribute('onchange','cambiarPanoramica()');
  }
  
  protected function exposicionSonidoForm(){
    
    $expo_sonido = $this->getObject()->getExposicionSonido();
    if(count($expo_sonido) == 0){
      $expo_sonido = new ExposicionSonido();
      $expo_sonido->setExposicion($this->getObject());
      $exposicion_sonido = new ExposicionSonidoForm($expo_sonido);
      $this->embedForm('exposicion_sonido_form', $exposicion_sonido);
    }else{
      $exposicion_sonido = new ExposicionSonidoForm($expo_sonido[0]);
      $this->embedForm('exposicion_sonido_form', $exposicion_sonido);
    }
  }
  
  protected function exposicionImagenForm(){
    $subform = new sfForm();
    
     if (false === sfContext::getInstance()->getRequest()->isXmlHttpRequest()){
      
      $exposicion_imagenes = $this->getObject()->getExposicionImagen();
      
      if(count($exposicion_imagenes) == 0){
        for($i=0;$i<1;$i++){
          
          $exposicionimagen = new ExposicionImagen();
          $exposicionimagen->setExposicion($this->getObject());
          
          $exposicion_imagenes[] = $exposicionimagen;
        }
      }
      
      foreach($exposicion_imagenes as $k => $v){
        $form_exposicion_imagen = new ExposicionImagenForm($v);
        $subform->embedForm('exposicion_imagen_'.($k+1), $form_exposicion_imagen);
        $subform->widgetSchema['exposicion_imagen_'.($k+1)]->setLabel('hola'.($k+1)); 
      }
      
      
      
    }
    $this->embedForm('exposicion_imagen_form', $subform);
    
  }
  
  public function addExposicionImagen($key){
    $exposicion_imagen = new ExposicionImagen();
    $exposicion_imagen->setExposicion($this->getObject());
    $this->embeddedForms['exposicion_imagen_form']->embedForm($key, new ExposicionImagenForm($exposicion_imagen));
    $this->embedForm('exposicion_imagen_form', $this->embeddedForms['exposicion_imagen_form']);
  }
  
  public function bind(array $taintedValues = null, array $taintedFiles = null){
    
    foreach($taintedFiles['exposicion_imagen_form'] as $key => $form1){
        if(false == $this->embeddedForms['exposicion_imagen_form']->offsetExists($key)){
            $this->addExposicionImagen($key);
        }
    }
    parent::bind($taintedValues, $taintedFiles);
  }
}
