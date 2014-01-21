<?php

/**
 * @author Miguel Alcaino
 * @copyright 2011
 */
 
class ValidadorTamanoImagen extends sfValidatorFile{
 
 
 
 protected function configure($options = array(), $messages = array())
  {
    
    
    $this->addOption('ancho');
    $this->addOption('alto');
    
    $this->setMessage('invalid','La imagen debe ser de 800x480 pixels.');
    parent::configure($options, $messages);
  }
 
 protected function doClean($value){
  $original = $value; 
  $size = getimagesize($value['tmp_name']);
  $ancho = $size[0];
  $alto = $size[1];
  
  //if($ancho != $this->getOption('ancho') && $alto != $this->getOption('alto')){
  if($ancho != $this->getOption('ancho') && $alto != $this->getOption('alto')){
    throw new sfValidatorError($this, 'invalid');
  }
  
  
    
  parent::doClean($original);
 } 
 }
 