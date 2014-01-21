<?php

/**
 * OrdenCompra form.
 *
 * @package    form
 * @subpackage OrdenCompra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class OrdenCompraForm extends BaseOrdenCompraForm
{
  public function configure()
  {
    $context = sfContext::getInstance();
    
    $this->widgetSchema['fecha'] = new sfWidgetFormJQueryDate(array(
             'image'=>  '/images/calendar.png', 
             'format' => '%day% - %month% - %year%',
             'culture' => 'es'));
    
    $hoy = array(
                'year'  => date('Y'),       
                'month' => date('n'),
                'day'   => date('j')
                );
    $this->widgetSchema['fecha']->setOption('default', $hoy);
    
    unset($this['orden_compra_id']);
    
    $this->embedDetalleOc();
  }
  
  protected function embedDetalleOc(){
    $formularios_detalle = new sfForm();
    
    if(false == sfContext::getInstance()->getRequest()->isXmlHttpRequest())
    {
        $opcion= sfContext::getInstance()->getRequest()->getParameter('opcion');
        if($opcion == 'desde_solicitud_materiales'){
            $detalle = new SolicitudMateriales();
            $detalle->setId(sfContext::getInstance()->getRequest()->getParameter('id_solicitud'));
            $detalles_solicitud_materiales = $detalle->getDetallesSolicitudMateriales();
        
            if(count($detalles_solicitud_materiales) > 0)
            {
                foreach($detalles_solicitud_materiales as $key => $v){
                    $detalleoc = new DetalleOc();
                    $detalleoc->setOrdenCompra($this->getObject());
                    $detalleoc->setProducto($v->getProducto());
                    $detalleoc->setCantidad($v->getCantidad());
                
                    $form_detalleoc = new DetalleOcForm($detalleoc);
                    $formularios_detalle->embedForm('detalleoc'.($key+1), $form_detalleoc);
                    $formularios_detalle->widgetSchema['detalleoc'.($key+1)]->setLabel('pianola'.$key+1);
                }
            }
        }
        $this->embedForm('detalles_oc', $formularios_detalle);
    }
  }
  
  public function addDetalleSolicitudAOc($key)
 {
     $detalle_oc = new DetalleOc();
     $detalle_oc->setOrdenCompra($this->getObject());
     $this->embeddedForms['detalles_oc']->embedForm($key, new DetalleOcForm($detalle_oc));
     $this->embedForm('detalles_oc', $this->embeddedForms['detalles_oc']);
 }
 /*
 public function bind(array $taintedValues = null, array $taintedFiles = null){
    
    foreach($taintedValues['detalles_oc'] as $key => $form){
        if(false == $this->embeddedForms['detalles_oc']->offsetExists($key)){
            $this->addDetalleSolicitudAOc($key);
        }
    }
    parent::bind($taintedValues, $taintedFiles);
  }
  */
}