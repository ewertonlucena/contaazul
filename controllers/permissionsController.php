<?php
/**
 * Description of permissionController
 *
 * @author uploja
 */
class permissionsController extends controller {
    
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
        $company = new Companies($id);
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();
        
        $this->loadTemplate('permissions', $data);     
    }
    
}
