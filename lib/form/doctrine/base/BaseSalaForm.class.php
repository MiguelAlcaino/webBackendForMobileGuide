<?php

/**
 * Sala form base class.
 *
 * @method Sala getObject() Returns the current form's model object
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSalaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                          => new sfWidgetFormInputHidden(),
      'nombre'                      => new sfWidgetFormTextarea(),
      'sala_numero'                 => new sfWidgetFormInputText(),
      'numero_panoramicas'          => new sfWidgetFormInputText(),
      'ruta_imagen_miniatura'       => new sfWidgetFormTextarea(),
      'id_piso'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Piso'), 'add_empty' => true)),
      'cord_x'                      => new sfWidgetFormInputText(),
      'cord_y'                      => new sfWidgetFormInputText(),
      'numero_panoramica_principal' => new sfWidgetFormInputText(),
      'estado'                      => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nombre'                      => new sfValidatorString(),
      'sala_numero'                 => new sfValidatorInteger(),
      'numero_panoramicas'          => new sfValidatorInteger(array('required' => false)),
      'ruta_imagen_miniatura'       => new sfValidatorString(array('required' => false)),
      'id_piso'                     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Piso'), 'required' => false)),
      'cord_x'                      => new sfValidatorInteger(),
      'cord_y'                      => new sfValidatorInteger(),
      'numero_panoramica_principal' => new sfValidatorInteger(array('required' => false)),
      'estado'                      => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sala[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sala';
  }

}
