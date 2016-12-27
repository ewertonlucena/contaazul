<?php

/**
 * Core do sistema
 *
 * Faz a conex�o entre index.php e as classes do MVC.
 *
 * @author ewertonlucena@gmail.com
 */
class Core {

    public function run() { //inicia class Core
        $url = explode('index.php', $_SERVER['REQUEST_URI']);
        $url = end($url);
        $url = explode('?', $url);
        $url = reset($url);

        $params = [];

        if (!empty($url) && $url != '/') { //Se variavel $url n�o estiver vazia
            //execute o c�digo abaixo
            $url = explode('/', $url); //converte a url em array usando "/" como delimitador
            array_shift($url); //retira o primeiro valor do array $url

            $currentController = $url[0] . 'Controller'; //set Controller
            array_shift($url); //retira o Controller do array $url

            if (isset($url[0])) { //Se $url[1](Action) foi digitada
                $currentAction = $url[0]; //set Action = $url[1]
                array_shift($url); //retira o Action do array $url
            } else { //Sen�o, valor n�o digitado
                $currentAction = 'index'; //set Action = 'index'
            }

            if (count($url) > 0) {
                $params = $url;
            }
        } else { //sen�o, execute isso
            //execu��o padrão para $url vazia
            $currentController = 'homeController'; //set Controler = 'home'
            $currentAction = 'index'; //set Action = 'index'
        }

        require_once 'core/controller.php';

        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }

}
