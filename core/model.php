<?php

/**
 * Description of model
 *
 * @author ewertonlucena@gmail.com
 */
class model {

    protected $db;

    public function __construct() {
        global $config;
        $this->db = new PDO("mysql:dbname=" . $config['dbname'] . ';host=' . $config['host'], $config['dbuser'], $config['dbpass']);
    }

}
