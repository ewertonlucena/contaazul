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
            exit;
        } 
       
    }
    
    public function index() {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $id = $u->getCompany();
       // echo "ID DA COMPANHIA ";
       // print_r($id);
       // exit;
        $company = new Companies($id);
        
        $data['company_name'] = $company->getName();
        
        $this->loadTemplate('home', $data);     
    }
}
