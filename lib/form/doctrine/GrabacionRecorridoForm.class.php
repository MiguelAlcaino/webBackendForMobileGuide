<?php

/**
 * GrabacionRecorrido form.
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GrabacionRecorridoForm extends BaseGrabacionRecorridoForm
{
  public function configure()
  {
    unset($this['id_sala']);
    
    $this->widgetSchema['ruta_sonido'] = new sfWidgetFormInputFile(
      array(
        'label' => 'Naraci&oacute;n del recorrido'
      )
    );
    
    $this->setValidator('ruta_sonido', new sfValidatorFile(
	  	array(
  			'max_size' => 20000000,
  			'mime_types' => array('audio/mpeg'), 
  			'path' => sfConfig::get('app_path_subida_sonidos'),
  			'required' => false
		),
      array(
        'required' => 'Debe ingresar un archivo de sonido'
      )
    ));
    
    $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
    
    $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('<div class="ayuda_form">%help%</div>');
    
    $this->widgetSchema->setHelp('ruta_sonido','(*) Sonido correspondiente a la narraci&oacute;n usada en los recorridos.<br /> Debe ser en formato MP3.');
  }
}
