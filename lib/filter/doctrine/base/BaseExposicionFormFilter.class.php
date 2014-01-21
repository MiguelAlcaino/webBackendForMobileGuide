<?php

/**
 * Exposicion filter form base class.
 *
 * @package    mantenedor
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExposicionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_panoramica' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Panoramica'), 'add_empty' => true)),
      'codigo'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nombre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'num_sonido'    => new sfWidgetFormFilterInput(),
      'num_imagenes'  => new sfWidgetFormFilterInput(),
      'cord_x'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cord_y'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'estado'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_panoramica' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Panoramica'), 'column' => 'id')),
      'codigo'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre'        => new sfValidatorPass(array('required' => false)),
      'descripcion'   => new sfValidatorPass(array('required' => false)),
      'num_sonido'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'num_imagenes'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cord_x'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cord_y'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('exposicion_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Exposicion';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_panoramica' => 'ForeignKey',
      'codigo'        => 'Number',
      'nombre'        => 'Text',
      'descripcion'   => 'Text',
      'num_sonido'    => 'Number',
      'num_imagenes'  => 'Number',
      'cord_x'        => 'Number',
      'cord_y'        => 'Number',
      'estado'        => 'Boolean',
    );
  }
}
