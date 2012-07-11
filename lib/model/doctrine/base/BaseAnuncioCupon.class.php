<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('AnuncioCupon', 'doctrine');

/**
 * BaseAnuncioCupon
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $cantidad_inicial
 * @property integer $cantidad_restante
 * @property integer $cantidad_persona
 * @property date $fecha_disfrute_inicio
 * @property date $fecha_disfrute_fin
 * @property integer $anuncio_id
 * @property Anuncio $Anuncio
 * @property Doctrine_Collection $UsuarioCupon
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method integer             getCantidadInicial()       Returns the current record's "cantidad_inicial" value
 * @method integer             getCantidadRestante()      Returns the current record's "cantidad_restante" value
 * @method integer             getCantidadPersona()       Returns the current record's "cantidad_persona" value
 * @method date                getFechaDisfruteInicio()   Returns the current record's "fecha_disfrute_inicio" value
 * @method date                getFechaDisfruteFin()      Returns the current record's "fecha_disfrute_fin" value
 * @method integer             getAnuncioId()             Returns the current record's "anuncio_id" value
 * @method Anuncio             getAnuncio()               Returns the current record's "Anuncio" value
 * @method Doctrine_Collection getUsuarioCupon()          Returns the current record's "UsuarioCupon" collection
 * @method AnuncioCupon        setId()                    Sets the current record's "id" value
 * @method AnuncioCupon        setCantidadInicial()       Sets the current record's "cantidad_inicial" value
 * @method AnuncioCupon        setCantidadRestante()      Sets the current record's "cantidad_restante" value
 * @method AnuncioCupon        setCantidadPersona()       Sets the current record's "cantidad_persona" value
 * @method AnuncioCupon        setFechaDisfruteInicio()   Sets the current record's "fecha_disfrute_inicio" value
 * @method AnuncioCupon        setFechaDisfruteFin()      Sets the current record's "fecha_disfrute_fin" value
 * @method AnuncioCupon        setAnuncioId()             Sets the current record's "anuncio_id" value
 * @method AnuncioCupon        setAnuncio()               Sets the current record's "Anuncio" value
 * @method AnuncioCupon        setUsuarioCupon()          Sets the current record's "UsuarioCupon" collection
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAnuncioCupon extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('anuncio_cupon');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('cantidad_inicial', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cantidad_restante', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('cantidad_persona', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('fecha_disfrute_inicio', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('fecha_disfrute_fin', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
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
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Anuncio', array(
             'local' => 'anuncio_id',
             'foreign' => 'id'));

        $this->hasMany('UsuarioCupon', array(
             'local' => 'id',
             'foreign' => 'anuncio_cupon_id'));
    }
}