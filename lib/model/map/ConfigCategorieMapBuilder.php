<?php


/**
 * This class adds structure of 'piwam_config_categorie' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * Mon Nov  9 18:14:01 2009
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class ConfigCategorieMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.ConfigCategorieMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(ConfigCategoriePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ConfigCategoriePeer::TABLE_NAME);
		$tMap->setPhpName('ConfigCategorie');
		$tMap->setClassname('ConfigCategorie');

		$tMap->setUseIdGenerator(false);

		$tMap->addPrimaryKey('CODE', 'Code', 'VARCHAR', true, 20);

		$tMap->addColumn('LIBELLE', 'Libelle', 'VARCHAR', true, 255);

	} // doBuild()

} // ConfigCategorieMapBuilder
