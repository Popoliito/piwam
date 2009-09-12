<?php

/**
 * update actions.
 *
 * @package    piwam
 * @subpackage update
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class updateActions extends sfActions
{
    const SQL_DIR = '../data/updates/';


    /**
     * Executes index action
     *
     * @param sfRequest $request A request object
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->currentDBVersion = PiwamDataPeer::get('dbversion');
        $this->files            = $this->_checkSQLFilesSince($this->currentDBVersion);
    }


    /**
     * Perform the update : execute SQL files
     *
     * @param sfWebRequest $request
     */
    public function executePerform(sfWebRequest $request)
    {
        $this->currentDBVersion = PiwamDataPeer::get('dbversion');
        $files                  = $this->_checkSQLFilesSince($this->currentDBVersion, true);
    }


    /*
     * Look for SQL files to execute since version $version
     * All SQL files have to be in /data/updates/* folder
     */
    private function _checkSQLFilesSince($version, $execute = false)
    {
        $sqlFiles   = array();
        $d          = dir(self::SQL_DIR);
        chdir (self::SQL_DIR);

        while($entry = $d->read())
        {
            /*
             * We browse directories that have been put into /data/updates
             */

            if ((is_dir($entry)) && ($this->_isPiwamDir($entry)))
            {
                $sqlDir = dir($entry);
                chdir($entry);

                while ($file = $sqlDir->read())
                {
                    if ($this->_isValidSQLfile($file, $version)) {
                        $sqlFiles[] = self::SQL_DIR . $entry . '/' . $file;

                        if ($execute)
                        {
                            try {
                                DbTools::executeSQLFile($file, Propel::getConnection());
                                $newVersion = $this->_getVersionFromFile($file);
                                PiwamDataPeer::set('dbversion', $newVersion);
                            }
                            catch (PDOException $e) {
                                // do nothing
                            }
                        }
                    }
                }

                $sqlDir->close();
                chdir('..');
            }
        }
        $d->close();

        return $sqlFiles;
    }


    /*
     * Check if $dir is Piwam directory (not .svn, '.' or '..', etc)
     */
    private function _isPiwamDir($dir)
    {
        return $dir[0] !== '.';
    }


    /*
     * Check if $file is a SQL file to execute. Filenames have to follow this
     * format : rXYZ.sql
     * where XYZ is the version number. Otherwise, file won't be checked.
     * SQL files will be executed if XYZ > $currentVersion
     */
    private function _isValidSQLfile($file, $currentVersion)
    {
        $version = $this->_getVersionFromFile($file);

        if (false === $version) {
            return false;
        }
        else {
            return $version > $currentVersion;
        }
    }


    /*
     * Get the DB version of the file $file.
     * Returns false if this not a rXYZ.sql file
     */
    private function _getVersionFromFile($file)
    {
        $a = explode('.', $file);

        if (count($a) != 2) {
            return false;
        }
        else
        {
            $filename   = $a[0];
            $extension  = $a[1];
            if ($extension === 'sql')
            {
                $explode = explode('r', $a[0]);
                if (count($explode) !== 2) {
                    return false;
                }
                else
                {
                    $version = $explode[1];
                    if (is_numeric($version)) {
                        return intval($version);
                    }
                }
            }
        }
    }
}
