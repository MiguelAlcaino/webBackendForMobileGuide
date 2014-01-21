<?php

/**
 * GrabacionRecorrido filter form base class.
 *
 * @package    mantenedor
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGrabacionRecorridoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sala'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sala'), 'add_empty' => true)),
      'ruta_sonido' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_sala'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Sala'), 'column' => 'id')),
      'ruta_sonido' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('grabacion_recorrido_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GrabacionRecorrido';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_sala'     => 'ForeignKey',
      'ruta_sonido' => 'Text',
    );
  }
}
