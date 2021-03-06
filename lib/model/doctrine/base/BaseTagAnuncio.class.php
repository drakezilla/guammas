<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('TagAnuncio', 'doctrine');

/**
 * BaseTagAnuncio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $tag_id
 * @property integer $anuncio_id
 * @property Anuncio $Anuncio
 * @property Tag $Tag
 * 
 * @method integer    getId()         Returns the current record's "id" value
 * @method integer    getTagId()      Returns the current record's "tag_id" value
 * @method integer    getAnuncioId()  Returns the current record's "anuncio_id" value
 * @method Anuncio    getAnuncio()    Returns the current record's "Anuncio" value
 * @method Tag        getTag()        Returns the current record's "Tag" value
 * @method TagAnuncio setId()         Sets the current record's "id" value
 * @method TagAnuncio setTagId()      Sets the current record's "tag_id" value
 * @method TagAnuncio setAnuncioId()  Sets the current record's "anuncio_id" value
 * @method TagAnuncio setAnuncio()    Sets the current record's "Anuncio" value
 * @method TagAnuncio setTag()        Sets the current record's "Tag" value
 * 
 * @package    guammas
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTagAnuncio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('tag_anuncio');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('tag_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
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

        $this->hasOne('Tag', array(
             'local' => 'tag_id',
             'foreign' => 'id'));
    }
}