<?php

class LoginForm extends sfForm{
  
  public function configure(){
    $this->setWidgets(
      array(
        'usuario' => new sfWidgetFormInputText(),
        'password' => new sfWidgetFormInputPassword()
      )
    );
    
    $this->setValidators(
      array(
        'usuario' => new sfValidatorString(array('required' => true), array('required'=>'El campo de usuario es obligatorio')),
        'password' => new sfValidatorString(array('required' => true), array('required' => 'El campo contraseña es obligatorio'))
      )
    );
    
    $this->widgetSchema->setNameFormat('login[%s]');
    $this->widgetSchema->setFormFormatterName('list');
  }
}