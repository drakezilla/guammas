<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Ubicacion', 'doctrine');

/**
 * BaseUbicacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $rif
 * @property string $nombre
 * @property integer $principal
 * @property string $coordenada_x
 * @property string $coordenada_y
 * @property string $telefono_1
 * @property string $telefono_2
 * @property string $detalle_direccion
 * @property integer $verificada
 * @property integer $ciudad_id
 * @property integer $empresa_id
 * @property integer $usuario_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Ciudad $Ciudad
 * @property Organizacion $Organizacion
 * @property Doctrine_Collection $HorarioUbicacion
 * @property Doctrine_Collection $UbicacionAnuncio
 * @property Doctrine_Collection $ValoracionSucursal
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getRif()                Returns the current record's "rif" value
 * @method string              getNombre()             Returns the current record's "nombre" value
 * @method integer             getPrincipal()          Returns the current record's "principal" value
 * @method string              getCoordenadaX()        Returns the current record's "coordenada_x" value
 * @method string              getCoordenadaY()        Returns the current record's "coordenada_y" value
 * @method string              getTelefono1()          Returns the current record's "telefono_1" value
 * @method string              getTelefono2()          Returns the current record's "telefono_2" value
 * @method string              getDetalleDireccion()   Returns the current record's "detalle_direccion" value
 * @method integer             getVerificada()         Returns the current record's "verificada" value
 * @method integer             getCiudadId()           Returns the current record's "ciudad_id" value
 * @method integer             getEmpresaId()          Returns the current record's "empresa_id" value
 * @method integer             getUsuarioId()          Returns the current record's "usuario_id" value
 * @method timestamp           getCreatedAt()          Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()          Returns the current record's "updated_at" value
 * @method Ciudad              getCiudad()             Returns the current record's "Ciudad" value
 * @method Organizacion        getOrganizacion()       Returns the current record's "Organizacion" value
 * @method Doctrine_Collection getHorarioUbicacion()   Returns the current record's "HorarioUbicacion" collection
 * @method Doctrine_Collection getUbicacionAnuncio()   Returns the current record's "UbicacionAnuncio" collection
 * @method Doctrine_Collection getValoracionSucursal() Returns the current record's "ValoracionSucursal" collection
 * @method Ubicacion           setId()                 Sets the current record's "id" value
 * @method Ubicacion           setRif()                Sets the current record's "rif" value
 * @method Ubicacion           setNombre()             Sets the current record's "nombre" value
 * @method Ubicacion           setPrincipal()          Sets the current record's "principal" value
 * @method Ubicacion           setCoordenadaX()        Sets the current record's "coordenada_x" value
 * @method Ubicacion           setCoordenadaY()        Sets the current record's "coordenada_y" value
 * @method Ubicacion           setTelefono1()          Sets the current record's "telefono_1" value
 * @method Ubicacion           setTelefono2()          Sets the current record's "telefono_2" value
 * @method Ubicacion           setDetalleDireccion()   Sets the current record's "detalle_direccion" value
 * @method Ubicacion           setVerificada()         Sets the current record's "verificada" value
 * @method Ubicacion           setCiudadId()           Sets the current record's "ciudad_id" value
 * @method Ubicacion           setEmpresaId()          Sets the current record's "empresa_id" value
 * @method Ubicacion           setUsuarioId()          Sets the current record's "usuario_id" value
 * @method Ubicacion           setCreatedAt()          Sets the current record's "created_at" value
 * @method Ubicacion           setUpdatedAt()          Sets the current record's "updated_at" value
 * @method Ubicacion           setCiudad()             Sets the current record's "Ciudad" value
 * @method Ubicacion           setOrganizacion()       Sets the current record's "Organizacion" value
 * @method Ubicacion           setHorarioUbicacion()   Sets the current record's "HorarioUbicacion" collection
 * @method Ubicacion           setUbicacionAnuncio()   Sets the current record's "UbicacionAnuncio" collection
 * @method Ubicacion           setValoracionSucursal() Sets the current record's "ValoracionSucursal" collection
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseUbicacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('ubicacion');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('rif', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('nombre', 'string', 150, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 150,
             ));
        $this->hasColumn('principal', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('coordenada_x', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('coordenada_y', 'string', 30, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 30,
             ));
        $this->hasColumn('telefono_1', 'string', 12, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 12,
             ));
        $this->hasColumn('telefono_2', 'string', 12, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 12,
             ));
        $this->hasColumn('detalle_direccion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('verificada', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('ciudad_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('empresa_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('usuario_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
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
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Ciudad', array(
             'local' => 'ciudad_id',
             'foreign' => 'id'));

        $this->hasOne('Organizacion', array(
             'local' => 'empresa_id',
             'foreign' => 'id'));

        $this->hasMany('HorarioUbicacion', array(
             'local' => 'id',
             'foreign' => 'sucursal_id'));

        $this->hasMany('UbicacionAnuncio', array(
             'local' => 'id',
             'foreign' => 'sucursal_id'));

        $this->hasMany('ValoracionSucursal', array(
             'local' => 'id',
             'foreign' => 'sucursal_id'));
    }
}