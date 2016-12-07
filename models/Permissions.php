<?php

/**
 * Description of Permissions
 *
 * @author uploja
 */
class Permissions extends model {

    private $group;
    private $permissions;

    public function setGroup($id, $id_company) {
        $this->group = $id;
        $this->permissions = [];

        $sql = $this->db->prepare("SELECT params FROM permission_groups "
                . "WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(':id', $id);
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();

            if (empty($row['params'])) {
                $row['params'] = '0';
            }

            $params = $row['params'];

            $sql = $this->db->prepare("SELECT name FROM permission_params "
                    . "WHERE id IN ($params) AND id_company = :id_company");
            $sql->bindValue(':id_company', $id_company);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                foreach ($sql->fetchAll() as $item) {
                    $this->permissions[] = $item['name'];
                }
            }
        }
    }

    public function hasPermission($name) {
        if (in_array($name, $this->permissions)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getList($id_company) {
        $array = [];

        $sql = $this->db->prepare("SELECT * FROM permission_params WHERE "
                . "id_company = :id_company");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getGroupList($id_company) {
        $array = [];

        $sql = $this->db->prepare("SELECT * FROM permission_groups WHERE "
                . "id_company = :id_company");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($name, $id_company) {

        $sql = $this->db->prepare("INSERT INTO permission_params SET "
                . "name = :name, id_company = :id_company");
        $sql->bindValue(":name", $name);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function addGroup($gname, $plist, $id_company) {
        $params = implode(',', $plist);
        $sql = $this->db->prepare("INSERT INTO permission_groups SET "
                . "name = :name, id_company = :id_company, params = :params");
        $sql->bindValue(":name", $gname);
        $sql->bindValue(":id_company", $id_company);
        $sql->bindValue(":params", $params);
        $sql->execute();
    }

    public function delete($id) {

        $sql = $this->db->prepare("DELETE FROM permission_params WHERE "
                . "id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}
