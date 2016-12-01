<?php
/**
 * Description of loginController
 *
 * @author uploja
 */
class loginController extends controller {
    
    public function index() {
        $data = [];
        
        if(isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $pass = addslashes($_POST['password']);
            
            $u = new Users();
            
            if($u->doLogin($email, $pass)) {
                header("Location: ". BASE_URL);
                exit;
            } else {
                $data['error'] = 'E-mail e/ou senha não conferem';
            }
        }
        
        $this->loadView('login', $data);
    }
}
