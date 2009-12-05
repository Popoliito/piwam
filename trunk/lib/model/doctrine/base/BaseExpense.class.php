<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Expense', 'doctrine');

/**
 * BaseExpense
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $label
 * @property decimal $amount
 * @property integer $association_id
 * @property integer $account_id
 * @property integer $activity_id
 * @property date $date
 * @property boolean $paid
 * @property integer $created_by
 * @property integer $updated_by
 * @property Association $Association
 * @property Account $Account
 * @property Activity $Activity
 * @property Member $CreatedByMember
 * @property Member $UpdatedByMember
 * 
 * @method integer     getId()              Returns the current record's "id" value
 * @method string      getLabel()           Returns the current record's "label" value
 * @method decimal     getAmount()          Returns the current record's "amount" value
 * @method integer     getAssociationId()   Returns the current record's "association_id" value
 * @method integer     getAccountId()       Returns the current record's "account_id" value
 * @method integer     getActivityId()      Returns the current record's "activity_id" value
 * @method date        getDate()            Returns the current record's "date" value
 * @method boolean     getPaid()            Returns the current record's "paid" value
 * @method integer     getCreatedBy()       Returns the current record's "created_by" value
 * @method integer     getUpdatedBy()       Returns the current record's "updated_by" value
 * @method Association getAssociation()     Returns the current record's "Association" value
 * @method Account     getAccount()         Returns the current record's "Account" value
 * @method Activity    getActivity()        Returns the current record's "Activity" value
 * @method Member      getCreatedByMember() Returns the current record's "CreatedByMember" value
 * @method Member      getUpdatedByMember() Returns the current record's "UpdatedByMember" value
 * @method Expense     setId()              Sets the current record's "id" value
 * @method Expense     setLabel()           Sets the current record's "label" value
 * @method Expense     setAmount()          Sets the current record's "amount" value
 * @method Expense     setAssociationId()   Sets the current record's "association_id" value
 * @method Expense     setAccountId()       Sets the current record's "account_id" value
 * @method Expense     setActivityId()      Sets the current record's "activity_id" value
 * @method Expense     setDate()            Sets the current record's "date" value
 * @method Expense     setPaid()            Sets the current record's "paid" value
 * @method Expense     setCreatedBy()       Sets the current record's "created_by" value
 * @method Expense     setUpdatedBy()       Sets the current record's "updated_by" value
 * @method Expense     setAssociation()     Sets the current record's "Association" value
 * @method Expense     setAccount()         Sets the current record's "Account" value
 * @method Expense     setActivity()        Sets the current record's "Activity" value
 * @method Expense     setCreatedByMember() Sets the current record's "CreatedByMember" value
 * @method Expense     setUpdatedByMember() Sets the current record's "UpdatedByMember" value
 * 
 * @package    piwam
 * @subpackage model
 * @author     Adrien Mogenet
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseExpense extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('piwam_expense');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('label', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('amount', 'decimal', 10, array(
             'type' => 'decimal',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '10',
             'scale' => ' 2',
             ));
        $this->hasColumn('association_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('account_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('activity_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('date', 'date', 25, array(
             'type' => 'date',
             'notnull' => true,
             'length' => '25',
             ));
        $this->hasColumn('paid', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('created_by', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));
        $this->hasColumn('updated_by', 'integer', 4, array(
             'type' => 'integer',
             'length' => '4',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Association', array(
             'local' => 'association_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Account', array(
             'local' => 'account_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Activity', array(
             'local' => 'activity_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Member as CreatedByMember', array(
             'local' => 'created_by',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $this->hasOne('Member as UpdatedByMember', array(
             'local' => 'updated_by',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}