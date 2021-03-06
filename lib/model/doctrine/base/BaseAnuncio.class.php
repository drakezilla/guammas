<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Anuncio', 'doctrine');

/**
 * BaseAnuncio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $titulo
 * @property string $que_incluye
 * @property string $condiciones
 * @property string $descripcion
 * @property float $precio
 * @property date $fecha_inicio
 * @property date $fecha_fin
 * @property integer $tipo_anuncio_id
 * @property integer $activo
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Doctrine_Collection $AnuncioCupon
 * @property Doctrine_Collection $AnuncioEvento
 * @property Doctrine_Collection $ComentarioAnuncio
 * @property Doctrine_Collection $HorarioAnuncio
 * @property Doctrine_Collection $TagAnuncio
 * @property Doctrine_Collection $UbicacionAnuncio
 * 
 * @method integer             getId()                Returns the current record's "id" value
 * @method string              getTitulo()            Returns the current record's "titulo" value
 * @method string              getQueIncluye()        Returns the current record's "que_incluye" value
 * @method string              getCondiciones()       Returns the current record's "condiciones" value
 * @method string              getDescripcion()       Returns the current record's "descripcion" value
 * @method float               getPrecio()            Returns the current record's "precio" value
 * @method date                getFechaInicio()       Returns the current record's "fecha_inicio" value
 * @method date                getFechaFin()          Returns the current record's "fecha_fin" value
 * @method integer             getTipoAnuncioId()     Returns the current record's "tipo_anuncio_id" value
 * @method integer             getActivo()            Returns the current record's "activo" value
 * @method timestamp           getCreatedAt()         Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()         Returns the current record's "updated_at" value
 * @method Doctrine_Collection getAnuncioCupon()      Returns the current record's "AnuncioCupon" collection
 * @method Doctrine_Collection getAnuncioEvento()     Returns the current record's "AnuncioEvento" collection
 * @method Doctrine_Collection getComentarioAnuncio() Returns the current record's "ComentarioAnuncio" collection
 * @method Doctrine_Collection getHorarioAnuncio()    Returns the current record's "HorarioAnuncio" collection
 * @method Doctrine_Collection getTagAnuncio()        Returns the current record's "TagAnuncio" collection
 * @method Doctrine_Collection getUbicacionAnuncio()  Returns the current record's "UbicacionAnuncio" collection
 * @method Anuncio             setId()                Sets the current record's "id" value
 * @method Anuncio             setTitulo()            Sets the current record's "titulo" value
 * @method Anuncio             setQueIncluye()        Sets the current record's "que_incluye" value
 * @method Anuncio             setCondiciones()       Sets the current record's "condiciones" value
 * @method Anuncio             setDescripcion()       Sets the current record's "descripcion" value
 * @method Anuncio             setPrecio()            Sets the current record's "precio" value
 * @method Anuncio             setFechaInicio()       Sets the current record's "fecha_inicio" value
 * @method Anuncio             setFechaFin()          Sets the current record's "fecha_fin" value
 * @method Anuncio             setTipoAnuncioId()     Sets the current record's "tipo_anuncio_id" value
 * @method Anuncio             setActivo()            Sets the current record's "activo" value
 * @method Anuncio             setCreatedAt()         Sets the current record's "created_at" value
 * @method Anuncio             setUpdatedAt()         Sets the current record's "updated_at" value
 * @method Anuncio             setAnuncioCupon()      Sets the current record's "AnuncioCupon" collection
 * @method Anuncio             setAnuncioEvento()     Sets the current record's "AnuncioEvento" collection
 * @method Anuncio             setComentarioAnuncio() Sets the current record's "ComentarioAnuncio" collection
 * @method Anuncio             setHorarioAnuncio()    Sets the current record's "HorarioAnuncio" collection
 * @method Anuncio             setTagAnuncio()        Sets the current record's "TagAnuncio" collection
 * @method Anuncio             setUbicacionAnuncio()  Sets the current record's "UbicacionAnuncio" collection
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAnuncio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('anuncio');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('titulo', 'string', 150, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 150,
             ));
        $this->hasColumn('que_incluye', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('condiciones', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('precio', 'float', null, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fecha_inicio', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fecha_fin', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('tipo_anuncio_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('activo', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('AnuncioCupon', array(
             'local' => 'id',
             'foreign' => 'anuncio_id'));

        $this->hasMany('AnuncioEvento', array(
             'local' => 'id',
             'foreign' => 'anuncio_id'));

        $this->hasMany('ComentarioAnuncio', array(
             'local' => 'id',
             'foreign' => 'anuncio_id'));

        $this->hasMany('HorarioAnuncio', array(
             'local' => 'id',
             'foreign' => 'anuncio_id'));

        $this->hasMany('TagAnuncio', array(
             'local' => 'id',
             'foreign' => 'anuncio_id'));

        $this->hasMany('UbicacionAnuncio', array(
             'local' => 'id',
             'foreign' => 'anuncio_id'));
    }
}