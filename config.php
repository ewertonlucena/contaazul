<?php
require_once 'environment.php';

define('BASE_URL', 'http://contaazul.pc');

global $config;
$config = [];

if(ENVIRONMENT == "development"){
    $config['dbname'] = 'sexol671_contaazul';
    $config['host'] = 'mvc.estoquefacil.net.br:3306';
    $config['dbuser'] = 'sexol671_ctazul';
    $config['dbpass'] = 'Ton@9811008';
} else {
    $config['dbname'] = 'sexol671_contaazul';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'sexol671_ctazul';
    $config['dbpass'] = 'Ton@9811008';
}

