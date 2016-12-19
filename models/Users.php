<?php

/**
 * Description of users
 *
 * @author uploja
 */
class Users extends model {

    private $userInfo;
    private $permissions;

    public function isLogged() {
        if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
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

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            $_SESSION['ccUser'] = $row['id'];

            return true;
        } else {
            return false;
        }
    }

    public function setLoggedUser() {

        if (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])) {
            $id = $_SESSION['ccUser'];

            $sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
            $sql->bindValue(':id', $id);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $this->userInfo = $sql->fetch();
                $this->permissions = new Permissions;
                $this->permissions->setGroup($this->userInfo['id_group'], $this->userInfo['id_company']);
            }
        }
    }

    public function logout() {
        unset($_SESSION['ccUser']);
        header("Location: " . BASE_URL);
    }

    public function hasPermission($name) {
        return $this->permissions->hasPermission($name);
    }

    public function getInfo($id, $id_company) {
        $array = [];
        $sql = $this->db->prepare("SELECT * FROM users WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }

    public function getCompany() {
        if (isset($this->userInfo['id_company'])) {
            return $this->userInfo['id_company'];
        } else {
            return 0;
        }
    }

    public function getEmail() {
        if (isset($this->userInfo['email'])) {
            return $this->userInfo['email'];
        } else {
            return '';
        }
    }

    public function getList($id_company) {
        $array = [];
        $sql = $this->db->prepare(""
                . "SELECT "
                . "u.id AS id, "
                . "u.email AS email, "
                . "g.name AS group_name "
                . "FROM users AS u, "
                . "permission_groups AS g WHERE u.id_group = g.id "
                . "AND u.id_company = :id_company");
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function findUsersInGroup($id) {

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE "
                . "id_group = :id_group");
        $sql->bindvalue(":id_group", $id);
        $sql->execute();
        $row = $sql->fetch();
        if ($row['c'] == '0') {
            return $row['c'];
        } else {
            return $row['c'];
        }
    }

    public function add($email, $pass, $id_group, $id_company) {
        $sql = $this->db->prepare("SELECT COUNT(*) AS c FROM users WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();
        $row = $sql->fetch();

        if ($row['c'] == '0') {

            $sql = $this->db->prepare("INSERT INTO users SET "
                    . "email = :email, "
                    . "password = :pass, "
                    . "id_group = :id_group, "
                    . "id_company = :id_company");
            $sql->bindValue(":email", $email);
            $sql->bindValue(":pass", md5($pass));
            $sql->bindValue(":id_group", $id_group);
            $sql->bindValue(":id_company", $id_company);
            $sql->execute();
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function edit($id, $pass, $id_group, $id_company) {
        $sql = $this->db->prepare("UPDATE users SET "
                . "id_group = :id_group "
                . "WHERE "
                . "id = :id "
                . "AND "
                . "id_company = :id_company");
        $sql->bindValue(':id_group', $id_group);
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        
        if(!empty($pass)) {
            $sql = $this->db->prepare("UPDATE users SET "
                . "password = :pass "
                . "WHERE "
                . "id = :id "
                . "AND "
                . "id_company = :id_company");
        $sql->bindValue(':pass', md5($pass));
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        }
    }
    
    public function delete($id, $id_company) {
        $sql = $this->db->prepare("DELETE FROM users "
                . "WHERE "
                . "id = :id "
                . "AND "
                . "id_company = :id_company");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
    }
}
