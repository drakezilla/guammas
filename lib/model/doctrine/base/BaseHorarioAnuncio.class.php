<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('HorarioAnuncio', 'doctrine');

/**
 * BaseHorarioAnuncio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $dia
 * @property integer $anuncio_id
 * @property Anuncio $Anuncio
 * @property Doctrine_Collection $DetalleHorarioAnuncio
 * 
 * @method integer             getId()                    Returns the current record's "id" value
 * @method string              getDia()                   Returns the current record's "dia" value
 * @method integer             getAnuncioId()             Returns the current record's "anuncio_id" value
 * @method Anuncio             getAnuncio()               Returns the current record's "Anuncio" value
 * @method Doctrine_Collection getDetalleHorarioAnuncio() Returns the current record's "DetalleHorarioAnuncio" collection
 * @method HorarioAnuncio      setId()                    Sets the current record's "id" value
 * @method HorarioAnuncio      setDia()                   Sets the current record's "dia" value
 * @method HorarioAnuncio      setAnuncioId()             Sets the current record's "anuncio_id" value
 * @method HorarioAnuncio      setAnuncio()               Sets the current record's "Anuncio" value
 * @method HorarioAnuncio      setDetalleHorarioAnuncio() Sets the current record's "DetalleHorarioAnuncio" collection
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseHorarioAnuncio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('horario_anuncio');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('dia', 'string', 9, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 9,
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

        $this->hasMany('DetalleHorarioAnuncio', array(
             'local' => 'id',
             'foreign' => 'horario_anuncio_id'));
    }
}