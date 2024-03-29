<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('DetalleRecorrido', 'doctrine');

/**
 * BaseDetalleRecorrido
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_recorrido
 * @property integer $id_sala
 * @property integer $orden
 * @property Recorrido $Recorrido
 * @property Sala $Sala
 * 
 * @method integer          getId()           Returns the current record's "id" value
 * @method integer          getIdRecorrido()  Returns the current record's "id_recorrido" value
 * @method integer          getIdSala()       Returns the current record's "id_sala" value
 * @method integer          getOrden()        Returns the current record's "orden" value
 * @method Recorrido        getRecorrido()    Returns the current record's "Recorrido" value
 * @method Sala             getSala()         Returns the current record's "Sala" value
 * @method DetalleRecorrido setId()           Sets the current record's "id" value
 * @method DetalleRecorrido setIdRecorrido()  Sets the current record's "id_recorrido" value
 * @method DetalleRecorrido setIdSala()       Sets the current record's "id_sala" value
 * @method DetalleRecorrido setOrden()        Sets the current record's "orden" value
 * @method DetalleRecorrido setRecorrido()    Sets the current record's "Recorrido" value
 * @method DetalleRecorrido setSala()         Sets the current record's "Sala" value
 * 
 * @package    mantenedor
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDetalleRecorrido extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('detalle_recorrido');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'detalle_recorrido_id',
             'length' => 4,
             ));
        $this->hasColumn('id_recorrido', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('id_sala', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('orden', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Recorrido', array(
             'local' => 'id_recorrido',
             'foreign' => 'id'));

        $this->hasOne('Sala', array(
             'local' => 'id_sala',
             'foreign' => 'id'));
    }
}