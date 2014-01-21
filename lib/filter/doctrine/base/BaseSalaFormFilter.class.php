<?php

/**
 * Sala filter form base class.
 *
 * @package    mantenedor
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSalaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sala_numero'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_panoramicas'          => new sfWidgetFormFilterInput(),
      'ruta_imagen_miniatura'       => new sfWidgetFormFilterInput(),
      'id_piso'                     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Piso'), 'add_empty' => true)),
      'cord_x'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cord_y'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_panoramica_principal' => new sfWidgetFormFilterInput(),
      'estado'                      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'nombre'                      => new sfValidatorPass(array('required' => false)),
      'sala_numero'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_panoramicas'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ruta_imagen_miniatura'       => new sfValidatorPass(array('required' => false)),
      'id_piso'                     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Piso'), 'column' => 'numero_piso')),
      'cord_x'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cord_y'                      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'numero_panoramica_principal' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'estado'                      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sala_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Sala';
  }

  public function getFields()
  {
    return array(
      'id'                          => 'Number',
      'nombre'                      => 'Text',
      'sala_numero'                 => 'Number',
      'numero_panoramicas'          => 'Number',
      'ruta_imagen_miniatura'       => 'Text',
      'id_piso'                     => 'ForeignKey',
      'cord_x'                      => 'Number',
      'cord_y'                      => 'Number',
      'numero_panoramica_principal' => 'Number',
      'estado'                      => 'Boolean',
    );
  }
}
