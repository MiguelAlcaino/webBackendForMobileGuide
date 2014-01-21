<?php

/**
 * Usuario filter form base class.
 *
 * @package    mantenedor
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseUsuarioFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_usuario'  => new sfWidgetFormFilterInput(),
      'email'           => new sfWidgetFormFilterInput(),
      'password'        => new sfWidgetFormFilterInput(),
      'nombre_completo' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_usuario'  => new sfValidatorPass(array('required' => false)),
      'email'           => new sfValidatorPass(array('required' => false)),
      'password'        => new sfValidatorPass(array('required' => false)),
      'nombre_completo' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuario_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuario';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'nombre_usuario'  => 'Text',
      'email'           => 'Text',
      'password'        => 'Text',
      'nombre_completo' => 'Text',
    );
  }
}
