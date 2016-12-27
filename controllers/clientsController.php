<?php

class clientsController extends controller {

    public function __construct() {
        parent::__construct();

        $u = new Users();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "/login");
            exit;
        }
    }

    public function index() {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('clients_view')) {
            $c = new Clients();
            $offset = 0;
            
            $data['p'] = 0;
            if(isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = (intval($_GET['p']) - 1);
                $offset = 10*$data['p'];
            }
            
            $data['max_links'] = 1;
            $data['clients_list'] = $c->getList($offset, $u->getCompany());
            $data['clients_count'] = $c->getCount($u->getCompany());
            $data['p_count'] = ceil( $data['clients_count'] / 10);
            $data['edit_permission'] = $u->hasPermission('clients_edit');
            $this->loadTemplate('clients', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('clients_edit')) {
            $c = new Clients();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $client_data = array(
                    'id_company' => $u->getCompany(),
                    'name' => addslashes(titleCase($_POST['name'])),
                    'cpf' => addslashes($_POST['cpf']),
                    'email' => addslashes($_POST['email']),
                    'phone' => addslashes($_POST['phone']),
                    'cell_phone' => addslashes($_POST['cell_phone']),
                    'stars' => addslashes($_POST['stars']),
                    'internal_obs' => addslashes($_POST['internal_obs']),
                    'addr_zipcode' => addslashes($_POST['addr_zipcode']),
                    'addr' => addslashes(titleCase($_POST['addr'])),
                    'addr_number' => addslashes($_POST['addr_number']),
                    'addr_compl' => addslashes(titleCase($_POST['addr_compl'])),
                    'addr_neighbor' => addslashes(titleCase($_POST['addr_neighbor'])),
                    'addr_city' => addslashes(titleCase($_POST['addr_city'])),
                    'addr_state' => addslashes($_POST['addr_state']),
                    'addr_country' => addslashes(titleCase($_POST['addr_country']))
                );
                $c->add($client_data);
                header("Location: " . BASE_URL . "/clients");
            }

            $data['error_msg'] = "Cliente já existe!";
            $this->loadTemplate('clients_add', $data);
        } else {
            header("Location: " . BASE_URL . "/clients");
        }
    }

    public function edit($id) {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('clients_edit')) {
            $c = new Clients();

            if ((isset($_POST['name']) && !empty($_POST['name'])) && (isset($_POST['cpf']) && !empty($_POST['cpf']))) {
                $client_data = array(
                    'name' => addslashes(titleCase($_POST['name'])),
                    'cpf' => addslashes($_POST['cpf']),
                    'email' => addslashes($_POST['email']),
                    'phone' => addslashes($_POST['phone']),
                    'cell_phone' => addslashes($_POST['cell_phone']),
                    'stars' => addslashes($_POST['stars']),
                    'internal_obs' => addslashes($_POST['internal_obs']),
                    'addr_zipcode' => addslashes($_POST['addr_zipcode']),
                    'addr' => addslashes(titleCase($_POST['addr'])),
                    'addr_number' => addslashes($_POST['addr_number']),
                    'addr_compl' => addslashes(titleCase($_POST['addr_compl'])),
                    'addr_neighbor' => addslashes(titleCase($_POST['addr_neighbor'])),
                    'addr_city' => addslashes(titleCase($_POST['addr_city'])),
                    'addr_state' => addslashes($_POST['addr_state']),
                    'addr_country' => addslashes(titleCase($_POST['addr_country'])),
                    'id' => $id,
                    'id_company' => $u->getCompany()
                );
                $c->edit($client_data);
                header("Location: " . BASE_URL . "/clients");
            }
            $data['client_info'] = $c->getInfo($id, $u->getCompany());
            $this->loadTemplate('clients_edit', $data);
        } else {
            header("Location: " . BASE_URL . "/clients");
        }
    }

    public function view($id) {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('clients_view')) {
            $c = new Clients();
            $data['client_info'] = $c->getInfo($id, $u->getCompany());
            $this->loadTemplate('clients_view', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function delete($id) {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('clients_edit')) {
            $c = new Clients();
            $c->delete($id, $u->getCompany());
            header("Location: " . BASE_URL . "/clients");
        } else {
            header("Location: " . BASE_URL . "/clients");
        }
    }
}
