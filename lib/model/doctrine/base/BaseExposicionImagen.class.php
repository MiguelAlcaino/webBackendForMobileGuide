<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ExposicionImagen', 'doctrine');

/**
 * BaseExposicionImagen
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $id_exposicion
 * @property string $ruta_imagen
 * @property boolean $principal
 * @property Exposicion $Exposicion
 * 
 * @method integer          getId()            Returns the current record's "id" value
 * @method integer          getIdExposicion()  Returns the current record's "id_exposicion" value
 * @method string           getRutaImagen()    Returns the current record's "ruta_imagen" value
 * @method boolean          getPrincipal()     Returns the current record's "principal" value
 * @method Exposicion       getExposicion()    Returns the current record's "Exposicion" value
 * @method ExposicionImagen setId()            Sets the current record's "id" value
 * @method ExposicionImagen setIdExposicion()  Sets the current record's "id_exposicion" value
 * @method ExposicionImagen setRutaImagen()    Sets the current record's "ruta_imagen" value
 * @method ExposicionImagen setPrincipal()     Sets the current record's "principal" value
 * @method ExposicionImagen setExposicion()    Sets the current record's "Exposicion" value
 * 
 * @package    mantenedor
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseExposicionImagen extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('exposicion_imagen');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'exposicion_imagen_id',
             'length' => 4,
             ));
        $this->hasColumn('id_exposicion', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => 4,
             ));
        $this->hasColumn('ruta_imagen', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('principal', 'boolean', 1, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'default' => 'false',
             'primary' => false,
             'length' => 1,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Exposicion', array(
             'local' => 'id_exposicion',
             'foreign' => 'id'));
    }
}