<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('DenunciaComentario', 'doctrine');

/**
 * BaseDenunciaComentario
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $denuncia_comentario
 * @property boolean $atendida
 * @property integer $comentario_anuncio_id
 * @property integer $usuario_id
 * @property timestamp $created_at
 * @property timestamp $updated_at
 * @property Usuario $Usuario
 * @property Doctrine_Collection $ComentarioAnuncio
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method string              getDenunciaComentario()    Returns the current record's "denuncia_comentario" value
 * @method boolean             getAtendida()              Returns the current record's "atendida" value
 * @method integer             getComentarioAnuncioId()   Returns the current record's "comentario_anuncio_id" value
 * @method integer             getUsuarioId()             Returns the current record's "usuario_id" value
 * @method timestamp           getCreatedAt()             Returns the current record's "created_at" value
 * @method timestamp           getUpdatedAt()             Returns the current record's "updated_at" value
 * @method Usuario             getUsuario()               Returns the current record's "Usuario" value
 * @method Doctrine_Collection getComentarioAnuncio()     Returns the current record's "ComentarioAnuncio" collection
 * @method DenunciaComentario  setId()                    Sets the current record's "id" value
 * @method DenunciaComentario  setDenunciaComentario()    Sets the current record's "denuncia_comentario" value
 * @method DenunciaComentario  setAtendida()              Sets the current record's "atendida" value
 * @method DenunciaComentario  setComentarioAnuncioId()   Sets the current record's "comentario_anuncio_id" value
 * @method DenunciaComentario  setUsuarioId()             Sets the current record's "usuario_id" value
 * @method DenunciaComentario  setCreatedAt()             Sets the current record's "created_at" value
 * @method DenunciaComentario  setUpdatedAt()             Sets the current record's "updated_at" value
 * @method DenunciaComentario  setUsuario()               Sets the current record's "Usuario" value
 * @method DenunciaComentario  setComentarioAnuncio()     Sets the current record's "ComentarioAnuncio" collection
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDenunciaComentario extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('denuncia_comentario');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('denuncia_comentario', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('atendida', 'boolean', 1, array(
             'type' => 'boolean',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('comentario_anuncio_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
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
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Usuario', array(
             'local' => 'usuario_id',
             'foreign' => 'id'));

        $this->hasMany('ComentarioAnuncio', array(
             'local' => 'id',
             'foreign' => 'id'));
    }
}