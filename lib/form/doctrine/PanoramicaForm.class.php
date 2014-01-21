<?php

/**
 * Panoramica form.
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PanoramicaForm extends BasePanoramicaForm
{
  public function configure()
  {
    //unset($this['id_sala']);
    $this->widgetSchema['id_sala'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['descripcion'] = new sfWidgetFormInputText();
    $this->widgetSchema['ruta_imagen'] = new sfWidgetFormInputFile();
    
     $this->setValidator('ruta_imagen', new sfValidatorFile(
	  	array(
      'ancho' => 800,
      'alto' => 415,
			'max_size' => 800000,
			'mime_types' => array('image/jpeg'), 
			'path' => sfConfig::get('app_path_subida_imagenes'),
			'required' => false
		)

	  ));
    
    $this->widgetSchema->setLabels(array(
      'descripcion' => 'Nombre'
    ));
    
    $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
    
    $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('<div class="ayuda_form">%help%</div>');
    
    $this->widgetSchema->setHelp('descripcion','(*) Nombre mostrada en las pesta&ntilde;as de la gu&iacute;a al mostrar una sala.');
    $this->widgetSchema->setHelp('ruta_imagen','(*) La imagen debe ser de 800x415 pixels.');
    $this->widgetSchema->setHelp('numero_orden','(*) Numero correspondiente al orden en que ser&aacute;n mostradas las panoramicas en la gu&iacute;a.');
    $this->widgetSchema->setHelp('estado','(*) Determina si la panoramica estar&aacute; disponible en la gu&iacute;a.<br />Tenga en cuenta que al cambiar el estado, tambien cambiar&aacute; el de las exposiciones en esta panoramica.');
  }
}
