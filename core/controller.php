<?php

/**
 * Controller base
 *
 * @author ewertonlucena@gmail.com
 */
class controller { //classe controller base para todos os Controllers
    
    protected $db;

    public function __construct() {
        global $config;
        $this->db = new PDO("mysql:dbname=" . $config['dbname'] . ';host=' . $config['host'], $config['dbuser'], $config['dbpass']);
    }

    public function loadView($viewName, $viewData = array()) {
        extract($viewData); //$chave = $dados, onde $chave será uma variável
        include 'views/' . $viewName . '.php'; //include views da pasta views/
    }

    public function loadTemplate($viewName, $viewData = array()) {
        include 'views/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        include 'views/' . $viewName . '.php';
    }

}
