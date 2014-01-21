<?php

/**
 * @author Miguel Alcaino
 * @copyright 2011
 */

class ValidadorRecorrido extends sfValidatorBase{
  
  protected function configure($options = array(), $messages = array()){
    $this->setMessage('invalid', 'El recorrido tiene salas desactivadas. Quitelas para poder continuar.');
    parent::configure($options, $messages);
  }
  
  protected function doClean($value){
    $original = $value;
    
    parse_str($value);
    
    
    foreach($salas_recorrido as $id_sala){
      $sala = Doctrine::getTable('Sala')->find($id_sala);
      
      if(!$sala->getEstado()){
        throw new sfValidatorError($this,'invalid');
      }
    }
    return $original;
  }
}