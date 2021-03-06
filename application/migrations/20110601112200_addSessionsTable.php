<?php
/**
 * Omeka
 * 
 * @copyright Copyright 2007-2012 Roy Rosenzweig Center for History and New Media
 * @license http://www.gnu.org/licenses/gpl-3.0.txt GNU GPLv3
 */

/**
 * Add a 'sessions' table.
 * 
 * @package Omeka\Db\Migration
 */
class addSessionsTable extends Omeka_Db_Migration_AbstractMigration
{
    public function up()
    {
        $this->db->queryBlock(<<<SQL
CREATE TABLE IF NOT EXISTS `omeka_keys` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `label` varchar(100) NOT NULL,
  `key` char(40) NOT NULL,
  `ip` varbinary(16) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB;
SQL
        );
    }
}
