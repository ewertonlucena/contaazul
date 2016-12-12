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

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();
            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $data['permissions_groups_list'] = $permissions->getGroupList($u->getCompany());
            $data['index'] = "index";

            $this->loadTemplate('permissions', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function ptab() {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();
            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $data['permissions_groups_list'] = $permissions->getGroupList($u->getCompany());
            $data['index'] = "ptab";

            $this->loadTemplate('permissions', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function add() {
        $data = [];
        $names = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();
            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $data['permissions_groups_list'] = $permissions->getGroupList($u->getCompany());

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = addslashes($_POST['name']);
                $names = array_column($data['permissions_list'], 'name');
                $pname = utf8_decode($pname);
               
                if (in_array($pname, $names) == FALSE) {
                    $permissions->add($pname, $u->getCompany());
                } else {
                    echo "Nome da permissão já existe!";
                }
            }
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function addGroup() {
        $data = [];
        $plist = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();

            if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['permissions']) && !empty($_POST['permissions'])) {
                $gname = addslashes($_POST['name']);
                $plist = $_POST['permissions'];
                $permissions->addGroup($gname, $plist, $u->getCompany());
                header("Location: " . BASE_URL . "/permissions");
            }

            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $data['permissions_groups_list'] = $permissions->getGroupList($u->getCompany());
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

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();
            $permissions->delete($id);

            header("Location: " . BASE_URL . "/permissions/ptab");
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function deleteGroup($id) {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();
            if ($permissions->deleteGroup($id) == '0') {
                echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">' .
                'window.location = "' . BASE_URL . '/permissions";' .
                'alert ("Grupo de Permissões Excluído com Sucesso!");' .
                '</SCRIPT>';
            } else {
                echo '<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">'
                . 'window.location = "' . BASE_URL . '/permissions";'
                . 'alert ("Não foi possível excluir permissão!\n"+'
                . '"Motivo: Há¡ ' . $permissions->deleteGroup($id) . ' '
                . 'Usuário(s) vinculado(s) a esta permissão.");'
                . '</SCRIPT>';
            }
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function editGroup($id) {
        $data = [];
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $gname = addslashes($_POST['name']);
                $plist = $_POST['permissions'];

                $permissions->editGroup($gname, $plist, $id, $u->getCompany());
                header("Location: " . BASE_URL . "/permissions");
            }

            $data['permissions_list'] = $permissions->getList($u->getCompany());
            $data['permissions_groups_list'] = $permissions->getGroupList($u->getCompany());
            $data['group_info'] = $permissions->getGroup($id, $u->getCompany());

            $this->loadTemplate('permissions_editgroup', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

}
