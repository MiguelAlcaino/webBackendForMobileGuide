<?php

/**
 * Piso form.
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PisoForm extends BasePisoForm
{
  public function configure()
  {
    $this->widgetSchema['ruta_imagen'] = new sfWidgetFormInputFile();
    
     $this->setValidator('ruta_imagen', new sfValidatorFile(
	  	array(
      'ancho' => 800,
      'alto' => 480,
			'max_size' => 800000,
			'mime_types' => array('image/jpeg'), 
			'path' => sfConfig::get('app_path_subida_imagenes'),
			'required' => false
		)

	  ));
  }
}
