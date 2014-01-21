<?php

/**
 * UsuarioTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class UsuarioTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object UsuarioTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Usuario');
    }
    
     public static function login($nombre_usuario,$password){
      return Doctrine_Query::create()
        ->from('Usuario u')
        ->where('u.nombre_usuario = ?', array($nombre_usuario))
        ->andWhere('u.password = ?', array(md5($password))) // Podrimos usar otro algoritmo, en este caso utilizamos md5
        ->fetchOne();
    }
}