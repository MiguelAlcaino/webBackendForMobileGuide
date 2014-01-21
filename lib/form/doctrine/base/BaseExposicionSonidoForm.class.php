<?php

/**
 * ExposicionSonido form base class.
 *
 * @method ExposicionSonido getObject() Returns the current form's model object
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExposicionSonidoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'id_exposicion' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Exposicion'), 'add_empty' => false)),
      'ruta_sonido'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_exposicion' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Exposicion'))),
      'ruta_sonido'   => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('exposicion_sonido[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExposicionSonido';
  }

}
