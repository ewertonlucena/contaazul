<?php
/**
 * Description of homeController
 *
 * @author ewertonlucena@gmail.com
 */
class homeController extends controller{
    
    public function __construct() {
        parent::__construct();
        $u = new Users();
        if($u->isLogged() == false){
            header("Location: ".BASE_URL."/login");
        } 
       
    }
    
    public function index() {
        $dados = [];
        $this->loadTemplate('home', $dados);     
    }
}
