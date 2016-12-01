<?php
/**
 * Description of loginController
 *
 * @author uploja
 */
class loginController extends controller {
    
    public function index() {
        $data = [];
        $this->loadView('login', $data);
    }
}
