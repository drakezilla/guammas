<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('FotoAnuncio', 'doctrine');

/**
 * BaseFotoAnuncio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $imagen
 * @property integer $anuncio_id
 * @property integer $activo
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Anuncio $Anuncio
 * 
 * @method integer     getId()         Returns the current record's "id" value
 * @method string      getImagen()     Returns the current record's "imagen" value
 * @method integer     getAnuncioId()  Returns the current record's "anuncio_id" value
 * @method integer     getActivo()     Returns the current record's "activo" value
 * @method timestamp   getCreatedAt()  Returns the current record's "created_at" value
 * @method timestamp   getUpdatedAt()  Returns the current record's "updated_at" value
 * @method Anuncio     getAnuncio()    Returns the current record's "Anuncio" value
 * @method FotoAnuncio setId()         Sets the current record's "id" value
 * @method FotoAnuncio setImagen()     Sets the current record's "imagen" value
 * @method FotoAnuncio setAnuncioId()  Sets the current record's "anuncio_id" value
 * @method FotoAnuncio setActivo()     Sets the current record's "activo" value
 * @method FotoAnuncio setCreatedAt()  Sets the current record's "created_at" value
 * @method FotoAnuncio setUpdatedAt()  Sets the current record's "updated_at" value
 * @method FotoAnuncio setAnuncio()    Sets the current record's "Anuncio" value
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFotoAnuncio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('foto_anuncio');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('imagen', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('anuncio_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('activo', 'integer', 4, array(
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
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Anuncio', array(
             'local' => 'anuncio_id',
             'foreign' => 'id'));
    }
}