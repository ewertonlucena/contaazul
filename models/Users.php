<?php
/**
 * Description of users
 *
 * @author uploja
 */
class Users extends model {
    
    public function isLogged() {
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
            return true;
        } else {
            return false;
        }
    }
    
    public function doLogin($email, $pass) {
        
        //echo $email. " - ".$pass;
        //exit;
        
        $sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :pass");
        $sql->bindValue(':email', $email);
        $sql->bindValue(':pass', md5($pass));
        $sql->execute();
        
        if($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['ccUser'] = $row['id'];
            
            return true;
        } else {
            return false;
        }
        
    }
}
