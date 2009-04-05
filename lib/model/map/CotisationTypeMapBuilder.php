<?php


/**
 * This class adds structure of 'cotisation_type' table to 'propel' DatabaseMap object.
 *
 *
 * This class was autogenerated by Propel 1.3.0-dev on:
 *
 * 04/05/09 15:51:12
 *
 *
 * These statically-built map classes are used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CotisationTypeMapBuilder implements MapBuilder {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CotisationTypeMapBuilder';

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
		$this->dbMap = Propel::getDatabaseMap(CotisationTypePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CotisationTypePeer::TABLE_NAME);
		$tMap->setPhpName('CotisationType');
		$tMap->setClassname('CotisationType');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('LIBELLE', 'Libelle', 'VARCHAR', true, 255);

		$tMap->addForeignKey('ASSOCIATION_ID', 'AssociationId', 'INTEGER', 'association', 'ID', true, null);

		$tMap->addColumn('VALIDE', 'Valide', 'INTEGER', true, null);

		$tMap->addColumn('MONTANT', 'Montant', 'DECIMAL', true, null);

		$tMap->addColumn('ACTIF', 'Actif', 'BOOLEAN', false, null);

		$tMap->addForeignKey('ENREGISTRE_PAR', 'EnregistrePar', 'INTEGER', 'membre', 'ID', true, null);

		$tMap->addForeignKey('MIS_A_JOUR_PAR', 'MisAJourPar', 'INTEGER', 'membre', 'ID', true, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'TIMESTAMP', false, null);

	} // doBuild()

} // CotisationTypeMapBuilder
