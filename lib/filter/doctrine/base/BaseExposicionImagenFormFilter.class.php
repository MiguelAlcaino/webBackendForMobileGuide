<?php

/**
 * ExposicionImagen filter form base class.
 *
 * @package    mantenedor
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExposicionImagenFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_exposicion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Exposicion'), 'add_empty' => true)),
      'ruta_imagen'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'principal'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_exposicion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Exposicion'), 'column' => 'id')),
      'ruta_imagen'   => new sfValidatorPass(array('required' => false)),
      'principal'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('exposicion_imagen_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExposicionImagen';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_exposicion' => 'ForeignKey',
      'ruta_imagen'   => 'Text',
      'principal'     => 'Boolean',
    );
  }
}
