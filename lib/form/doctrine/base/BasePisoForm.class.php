<?php

/**
 * Piso form base class.
 *
 * @method Piso getObject() Returns the current form's model object
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePisoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'numero_piso' => new sfWidgetFormInputHidden(),
      'ruta_imagen' => new sfWidgetFormTextarea(),
      'estado'      => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'numero_piso' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('numero_piso')), 'empty_value' => $this->getObject()->get('numero_piso'), 'required' => false)),
      'ruta_imagen' => new sfValidatorString(),
      'estado'      => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('piso[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Piso';
  }

}
