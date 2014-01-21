<?php

/**
 * Panoramica form base class.
 *
 * @method Panoramica getObject() Returns the current form's model object
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePanoramicaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'id_sala'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sala'), 'add_empty' => false)),
      'descripcion'           => new sfWidgetFormTextarea(),
      'ruta_imagen'           => new sfWidgetFormTextarea(),
      'numero_orden'          => new sfWidgetFormInputText(),
      'ruta_imagen_miniatura' => new sfWidgetFormTextarea(),
      'estado'                => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_sala'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Sala'))),
      'descripcion'           => new sfValidatorString(),
      'ruta_imagen'           => new sfValidatorString(),
      'numero_orden'          => new sfValidatorInteger(),
      'ruta_imagen_miniatura' => new sfValidatorString(array('required' => false)),
      'estado'                => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('panoramica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Panoramica';
  }

}
