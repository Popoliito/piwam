<?php


/**
 * This class adds structure of 'piwam_acl_credential' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Mon Oct 26 23:18:37 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class AclCredentialMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.AclCredentialMapBuilder';

	/**
	 * The database map.
	 */
	private $dbMap;

	/**
	 * Tells us if this DatabaseMapBuilder is built so that we
	 * don't have to re-build it every time.
	 *
	 * @return     boolean true if this DatabaseMapBuilder is built, false otherwise.
	 */
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	/**
	 * Gets the databasemap this map builder built.
	 *
	 * @return     the databasemap
	 */
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	/**
	 * The doBuild() method builds the DatabaseMap
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(AclCredentialPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(AclCredentialPeer::TABLE_NAME);
		$tMap->setPhpName('AclCredential');
		$tMap->setClassname('AclCredential');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('MEMBRE_ID', 'MembreId', 'INTEGER', 'piwam_membre', 'ID', true, null);

		$tMap->addForeignKey('ACL_ACTION_ID', 'AclActionId', 'INTEGER', 'piwam_acl_action', 'ID', true, null);

	} // doBuild()

} // AclCredentialMapBuilder
