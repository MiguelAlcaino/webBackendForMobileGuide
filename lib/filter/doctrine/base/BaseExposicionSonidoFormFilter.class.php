<?php

/**
 * ExposicionSonido filter form base class.
 *
 * @package    mantenedor
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExposicionSonidoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_exposicion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Exposicion'), 'add_empty' => true)),
      'ruta_sonido'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_exposicion' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Exposicion'), 'column' => 'id')),
      'ruta_sonido'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('exposicion_sonido_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExposicionSonido';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_exposicion' => 'ForeignKey',
      'ruta_sonido'   => 'Text',
    );
  }
}
