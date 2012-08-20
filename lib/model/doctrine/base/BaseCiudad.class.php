<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Ciudad', 'doctrine');

/**
 * BaseCiudad
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $nombre_ciudad
 * @property boolean $aprobada
 * @property string $estado_id
 * @property Estado $Estado
 * @property Doctrine_Collection $AnuncioEvento
 * @property Doctrine_Collection $Ubicacion
 * @property Doctrine_Collection $Usuario
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method string              getNombreCiudad()  Returns the current record's "nombre_ciudad" value
 * @method boolean             getAprobada()      Returns the current record's "aprobada" value
 * @method string              getEstadoId()      Returns the current record's "estado_id" value
 * @method Estado              getEstado()        Returns the current record's "Estado" value
 * @method Doctrine_Collection getAnuncioEvento() Returns the current record's "AnuncioEvento" collection
 * @method Doctrine_Collection getUbicacion()     Returns the current record's "Ubicacion" collection
 * @method Doctrine_Collection getUsuario()       Returns the current record's "Usuario" collection
 * @method Ciudad              setId()            Sets the current record's "id" value
 * @method Ciudad              setNombreCiudad()  Sets the current record's "nombre_ciudad" value
 * @method Ciudad              setAprobada()      Sets the current record's "aprobada" value
 * @method Ciudad              setEstadoId()      Sets the current record's "estado_id" value
 * @method Ciudad              setEstado()        Sets the current record's "Estado" value
 * @method Ciudad              setAnuncioEvento() Sets the current record's "AnuncioEvento" collection
 * @method Ciudad              setUbicacion()     Sets the current record's "Ubicacion" collection
 * @method Ciudad              setUsuario()       Sets the current record's "Usuario" collection
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCiudad extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ciudad');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('nombre_ciudad', 'string', 200, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 200,
             ));
        $this->hasColumn('aprobada', 'boolean', 1, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('estado_id', 'string', 2, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Estado', array(
             'local' => 'estado_id',
             'foreign' => 'id'));

        $this->hasMany('AnuncioEvento', array(
             'local' => 'id',
             'foreign' => 'ciudad_id'));

        $this->hasMany('Ubicacion', array(
             'local' => 'id',
             'foreign' => 'ciudad_id'));

        $this->hasMany('Usuario', array(
             'local' => 'id',
             'foreign' => 'ciudad_id'));
    }
}