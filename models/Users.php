<?php
/**
 * Description of users
 *
 * @author uploja
 */
class Users extends model {
    
    private $userInfo;
    
    public function isLogged() {
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function doLogin($email, $pass) {
        
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
    
    public function setLoggedUser() {
        
        if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){
            $id = $_SESSION['ccUser'];
            
            $sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();
            
            if($sql->rowCount() > 0){
                $this->userInfo = $sql->fetch();
            }
        } else {
            session_abort();
            $_SESSION = [];
            header("Location: ". BASE_URL ."/login");
        }
    }
    
    public function getCompany() {
        if (isset($this->userInfo['id_company'])) {
            return $this->userInfo['id_company'];
        } else {
            return 0;
        }
        
    }
}
