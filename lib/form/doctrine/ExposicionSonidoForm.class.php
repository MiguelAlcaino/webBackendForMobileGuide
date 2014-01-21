<?php

/**
 * ExposicionSonido form.
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ExposicionSonidoForm extends BaseExposicionSonidoForm
{
  public function configure()
  {
    unset($this['id_exposicion']);
    
    $this->widgetSchema['ruta_sonido'] = new sfWidgetFormInputFile();
    
    $this->setValidator('ruta_sonido', new sfValidatorFile(
	  	array(
			'max_size' => 20000000,
			'mime_types' => array('audio/mpeg'), 
			'path' => sfConfig::get('app_path_subida_sonidos'),
			'required' => false
		)));

    
    $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('<div class="ayuda_form">%help%</div>');
    
    $this->widgetSchema->setLabels(array(
      'ruta_sonido' => 'Sonido Narraci&oacute;n'
    ));
        
    $this->widgetSchema->setHelp('ruta_sonido','(*) Narraci&oacute;n de la descripci&oacute;n en formato MP3.');
  }
}
