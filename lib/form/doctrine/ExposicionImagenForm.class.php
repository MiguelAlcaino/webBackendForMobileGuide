<?php

/**
 * ExposicionImagen form.
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ExposicionImagenForm extends BaseExposicionImagenForm
{
  public function configure()
  { 
    unset($this['id_exposicion']);
    
    $this->widgetSchema['ruta_imagen'] = new sfWidgetFormInputFile();
    /*
    $this->widgetSchema['ruta_imagen'] = new sfWidgetFormInputFileEditable(
      array(
        'edit_mode' => !$this->isNew(),
        'file_src' => sfConfig::get('app_ruta_imagenes').$this->getObject()->getRutaImagen(),
        'is_image' => true,
        'with_delete' => true,
        'template' => '%input%'
      )
    );
    */
    
    $this->setValidator('ruta_imagen', new sfValidatorFile(
	  	array(
  			'max_size' => 800000,
  			'mime_types' => array('image/jpeg'), 
  			'path' => sfConfig::get('app_path_subida_imagenes'),
  			'required' => false
		),
      array(
        'required' => 'Debe ingresar una imagen'
      )
	  ));
    
    $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
    
    /*
    $this->widgetSchema['ruta_imagen'] = new sfWidgetFormInputFileEditable(
      array(
        'edit_mode' => false,
        'with_delete' => true,
        'is_image' => true,        
        'file_src' => 'http://localhost/imagenes/'.$this->getObject()->getRutaImagen()                
      )
    );*/
  }
}
