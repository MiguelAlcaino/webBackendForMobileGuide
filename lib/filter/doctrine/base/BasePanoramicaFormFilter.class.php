<?php

/**
 * Panoramica filter form base class.
 *
 * @package    mantenedor
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePanoramicaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_sala'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sala'), 'add_empty' => true)),
      'descripcion'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ruta_imagen'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'numero_orden'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ruta_imagen_miniatura' => new sfWidgetFormFilterInput(),
      'estado'                => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_sala'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Sala'), 'column' => 'id')),
      'descripcion'           => new sfValidatorPass(array('required' => false)),
      'ruta_imagen'           => new sfValidatorPass(array('required' => false)),
      'numero_orden'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'ruta_imagen_miniatura' => new sfValidatorPass(array('required' => false)),
      'estado'                => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('panoramica_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Panoramica';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'id_sala'               => 'ForeignKey',
      'descripcion'           => 'Text',
      'ruta_imagen'           => 'Text',
      'numero_orden'          => 'Number',
      'ruta_imagen_miniatura' => 'Text',
      'estado'                => 'Boolean',
    );
  }
}
