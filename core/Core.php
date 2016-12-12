<?php

/**
 * Core do sistema
 * 
 * Faz a conexão entre index.php e as classes do MVC.
 *
 * @author ewertonlucena@gmail.com
 */
class Core {

    public function run() { //inicia class Core
        $url = explode('index.php', $_SERVER['REQUEST_URI']);
        $url = end($url);
        $params = [];

        if (!empty($url) && $url != '/') { //Se variavel $url não estiver vazia 
            //execute o código abaixo
            $url = explode('/', $url); //converte a url em array usando "/" como delimitador
            array_shift($url); //retira o primeiro valor do array $url

            $currentController = $url[0] . 'Controller'; //set Controller
            array_shift($url); //retira o Controller do array $url

            if (isset($url[0])) { //Se $url[1](Action) foi digitada
                $currentAction = $url[0]; //set Action = $url[1]
                array_shift($url); //retira o Action do array $url
            } else { //Senão, valor não digitado
                $currentAction = 'index'; //set Action = 'index'
            }

            if (count($url) > 0) {
                $params = $url;
            }
        } else { //senão, execute isso
            //execução padrÃ£o para $url vazia
            $currentController = 'homeController'; //set Controler = 'home'
            $currentAction = 'index'; //set Action = 'index'
        }

        require_once 'core/controller.php';

        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
    }
}
