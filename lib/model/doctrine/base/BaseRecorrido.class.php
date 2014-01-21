<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Recorrido', 'doctrine');

/**
 * BaseRecorrido
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $tipo
 * @property boolean $estado
 * @property Doctrine_Collection $DetalleRecorrido
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getTipo()             Returns the current record's "tipo" value
 * @method boolean             getEstado()           Returns the current record's "estado" value
 * @method Doctrine_Collection getDetalleRecorrido() Returns the current record's "DetalleRecorrido" collection
 * @method Recorrido           setId()               Sets the current record's "id" value
 * @method Recorrido           setTipo()             Sets the current record's "tipo" value
 * @method Recorrido           setEstado()           Sets the current record's "estado" value
 * @method Recorrido           setDetalleRecorrido() Sets the current record's "DetalleRecorrido" collection
 * 
 * @package    mantenedor
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseRecorrido extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('recorrido');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'recorrido_id',
             'length' => 4,
             ));
        $this->hasColumn('tipo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('estado', 'boolean', 1, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'default' => 'true',
             'primary' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('DetalleRecorrido', array(
             'local' => 'id',
             'foreign' => 'id_recorrido'));
    }
}