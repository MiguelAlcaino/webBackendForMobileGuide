<?php

/**
 * DetalleRecorrido form base class.
 *
 * @method DetalleRecorrido getObject() Returns the current form's model object
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDetalleRecorridoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'id_recorrido' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Recorrido'), 'add_empty' => false)),
      'id_sala'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sala'), 'add_empty' => false)),
      'orden'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_recorrido' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Recorrido'))),
      'id_sala'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sala'))),
      'orden'        => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('detalle_recorrido[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleRecorrido';
  }

}
