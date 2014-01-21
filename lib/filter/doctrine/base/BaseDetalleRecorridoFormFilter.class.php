<?php

/**
 * DetalleRecorrido filter form base class.
 *
 * @package    mantenedor
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDetalleRecorridoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_recorrido' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Recorrido'), 'add_empty' => true)),
      'id_sala'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Sala'), 'add_empty' => true)),
      'orden'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_recorrido' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Recorrido'), 'column' => 'id')),
      'id_sala'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Sala'), 'column' => 'id')),
      'orden'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('detalle_recorrido_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DetalleRecorrido';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'id_recorrido' => 'ForeignKey',
      'id_sala'      => 'ForeignKey',
      'orden'        => 'Number',
    );
  }
}
