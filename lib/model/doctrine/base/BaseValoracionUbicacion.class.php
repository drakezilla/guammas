<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ValoracionUbicacion', 'doctrine');

/**
 * BaseValoracionUbicacion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $puntos
 * @property string $observacion
 * @property integer $usuario_id
 * @property integer $ubicacion_id
 * @property timestamp $created_at
 * @property Ubicacion $Ubicacion
 * @property Usuario $Usuario
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method integer             getPuntos()       Returns the current record's "puntos" value
 * @method string              getObservacion()  Returns the current record's "observacion" value
 * @method integer             getUsuarioId()    Returns the current record's "usuario_id" value
 * @method integer             getUbicacionId()  Returns the current record's "ubicacion_id" value
 * @method timestamp           getCreatedAt()    Returns the current record's "created_at" value
 * @method Ubicacion           getUbicacion()    Returns the current record's "Ubicacion" value
 * @method Usuario             getUsuario()      Returns the current record's "Usuario" value
 * @method ValoracionUbicacion setId()           Sets the current record's "id" value
 * @method ValoracionUbicacion setPuntos()       Sets the current record's "puntos" value
 * @method ValoracionUbicacion setObservacion()  Sets the current record's "observacion" value
 * @method ValoracionUbicacion setUsuarioId()    Sets the current record's "usuario_id" value
 * @method ValoracionUbicacion setUbicacionId()  Sets the current record's "ubicacion_id" value
 * @method ValoracionUbicacion setCreatedAt()    Sets the current record's "created_at" value
 * @method ValoracionUbicacion setUbicacion()    Sets the current record's "Ubicacion" value
 * @method ValoracionUbicacion setUsuario()      Sets the current record's "Usuario" value
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseValoracionUbicacion extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('valoracion_ubicacion');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('puntos', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('observacion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
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
        $this->hasColumn('ubicacion_id', 'integer', 4, array(
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Ubicacion', array(
             'local' => 'ubicacion_id',
             'foreign' => 'id'));

        $this->hasOne('Usuario', array(
             'local' => 'usuario_id',
             'foreign' => 'id'));
    }
}