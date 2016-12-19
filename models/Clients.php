<?php

class Clients extends model {
    
    public function getList($offset, $id_company) {
        $array = [] ;
        
        $sql = $this->db->prepare("SELECT * FROM clients WHERE id_company = :id_company LIMIT :offset, 10");
        $sql->bindValue(':id_company', $id_company);
        $sql->bindValue(':offset', $offset, PDO::PARAM_INT);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }        
        return $array;        
    }
    
    public function add($client_data = array()) {
        $sql = $this->db->prepare("INSERT INTO clients SET "
                . "id_company = :id_company, "
                . "name = :name, "
                . "cpf = :cpf, "
                . "email = :email, "
                . "phone = :phone, "
                . "cell_phone = :cell_phone, "
                . "stars = :stars, "
                . "internal_obs = :internal_obs, "
                . "addr_zipcode = :addr_zipcode, "
                . "addr = :addr, "
                . "addr_number = :addr_number, "
                . "addr_compl = :addr_compl, "
                . "addr_neighbor = :addr_neighbor, "
                . "addr_city = :addr_city, "
                . "addr_state = :addr_state, "
                . "addr_country = :addr_country" );
        $sql->execute($client_data);
    
    }
}
