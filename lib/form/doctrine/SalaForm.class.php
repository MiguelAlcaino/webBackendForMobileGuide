<?php

/**
 * Sala form.
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SalaForm extends BaseSalaForm
{
  public function configure()
  {
    unset($this['numero_panoramicas']);
    
    $this->grabacionRecorridoForm();
    
    $this->widgetSchema['nombre'] = new sfWidgetFormInputText();
    $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('<div class="ayuda_form">%help%</div>');
    
    $this->widgetSchema->setHelp('nombre','(*) Nombre de la sala.');
    $this->widgetSchema->setHelp('sala_numero','(*) Numero correspondiente al orden cronol&oacute;gico de la sala en el museo.');
  }
  
  protected function grabacionRecorridoForm(){
    
    $grabacion_recorrido = $this->getObject()->getGrabacionRecorrido();
    
    if(count($grabacion_recorrido) == 0){
      $grabacion_recorrido = new GrabacionRecorrido();
      $grabacion_recorrido->setSala($this->getObject());
      $this->embedForm('sala_grabacion_recorrido', new GrabacionRecorridoForm($grabacion_recorrido));
    }else{
      $this->embedForm('sala_grabacion_recorrido', new GrabacionRecorridoForm($grabacion_recorrido[0]));
    }
  }
}
