<?php

/**
 * Exposicion form base class.
 *
 * @method Exposicion getObject() Returns the current form's model object
 *
 * @package    mantenedor
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExposicionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'id_panoramica' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Panoramica'), 'add_empty' => false)),
      'codigo'        => new sfWidgetFormInputText(),
      'nombre'        => new sfWidgetFormTextarea(),
      'descripcion'   => new sfWidgetFormTextarea(),
      'num_sonido'    => new sfWidgetFormInputText(),
      'num_imagenes'  => new sfWidgetFormInputText(),
      'cord_x'        => new sfWidgetFormInputText(),
      'cord_y'        => new sfWidgetFormInputText(),
      'estado'        => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_panoramica' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Panoramica'))),
      'codigo'        => new sfValidatorInteger(),
      'nombre'        => new sfValidatorString(),
      'descripcion'   => new sfValidatorString(),
      'num_sonido'    => new sfValidatorInteger(array('required' => false)),
      'num_imagenes'  => new sfValidatorInteger(array('required' => false)),
      'cord_x'        => new sfValidatorInteger(),
      'cord_y'        => new sfValidatorInteger(),
      'estado'        => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('exposicion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Exposicion';
  }

}
