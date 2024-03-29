<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Usuario', 'doctrine');

/**
 * BaseUsuario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre_usuario
 * @property string $email
 * @property string $password
 * @property string $nombre_completo
 * 
 * @method integer getId()              Returns the current record's "id" value
 * @method string  getNombreUsuario()   Returns the current record's "nombre_usuario" value
 * @method string  getEmail()           Returns the current record's "email" value
 * @method string  getPassword()        Returns the current record's "password" value
 * @method string  getNombreCompleto()  Returns the current record's "nombre_completo" value
 * @method Usuario setId()              Sets the current record's "id" value
 * @method Usuario setNombreUsuario()   Sets the current record's "nombre_usuario" value
 * @method Usuario setEmail()           Sets the current record's "email" value
 * @method Usuario setPassword()        Sets the current record's "password" value
 * @method Usuario setNombreCompleto()  Sets the current record's "nombre_completo" value
 * 
 * @package    mantenedor
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUsuario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('usuario');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'sequence' => 'usuario_id',
             'length' => 4,
             ));
        $this->hasColumn('nombre_usuario', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('email', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('password', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
        $this->hasColumn('nombre_completo', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => false,
             'primary' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}