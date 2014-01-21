<?php

/**
 * Recorrido form.
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RecorridoForm extends BaseRecorridoForm
{
  public function configure()
  {
    $this->widgetSchema['tipo'] = new sfWidgetFormInputText();
    $this->widgetSchema->setLabels(array(
      'tipo' => 'Nombre'
    ));
    
    $this->widgetSchema['detalle_recorrido'] = new sfWidgetFormInputHidden();
    
    $this->validatorSchema['detalle_recorrido'] = new ValidadorRecorrido(
    array(),
    array('required'=>'Debe agregar salas al recorrido')
    );
    
    $this->getWidgetSchema()->getFormFormatter()->setErrorListFormatInARow('<div class="error_form">%errors%</div>');
    $this->getWidgetSchema()->getFormFormatter()->setErrorRowFormatInARow('%error%');
    
    $this->getWidgetSchema()->getFormFormatter()->setHelpFormat('<div class="ayuda_form">%help%</div>');
    
  }
  
  public function save($conn = null){

    $recorrido = parent::save($conn);
    
    parse_str($this->getValue('detalle_recorrido'), $detalle);
    $i=1;
    
    $detalles_recorrido = $this->getObject()->getDetallesRecorridos();
    //$recorrido = $detalles_recorrido[0]->getRecorrido();
    
    foreach($detalles_recorrido as $detalle1){
          $detalle1->delete();
        }
    if(count($detalles_recorrido) > 0){
      foreach($detalle['salas_recorrido'] as $id_sala){
        $detalle_recorrido = new DetalleRecorrido();
        //$sala = Doctrine::getTable('Sala')->find($id_sala);
        //$detalle_recorrido->setSala($sala);
        //echo "editando!...";
        $detalle_recorrido->setIdSala($id_sala);
        $detalle_recorrido->setOrden($i);
        $detalle_recorrido->setRecorrido($recorrido);
        $detalle_recorrido->save();
        $i++;
      } 
      
      }else{
        
        foreach($detalle['salas_recorrido'] as $id_sala){
        $detalle_recorrido = new DetalleRecorrido();
        //$sala = Doctrine::getTable('Sala')->find($id_sala);
        //$detalle_recorrido->setSala($sala);
        //echo "Nuevo!!!....";
        $detalle_recorrido->setIdSala($id_sala);
        $detalle_recorrido->setOrden($i);
        $detalle_recorrido->setRecorrido($this->getObject());
        $detalle_recorrido->save();
        $i++;
      } 
        
      }
  }
}
