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

            $this->loadTemplate('permissions', $data);
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

        if ($u->hasPermission('permissions_view')) {
            $permissions = new Permissions();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = addslashes($_POST['name']);
                $permissions->add($pname, $u->getCompany());
                header("Location: " . BASE_URL . "/permissions");
            }

            $this->loadTemplate('permissions_add', $data);
        } else {
            header("Location: " . BASE_URL . "/permissions");
        }
    }

    public function addGroup() {
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
                
                $permissions->addGroup($gname, $plist, $u->getCompany());
                header("Location: " . BASE_URL . "/permissions");
            }

            $data['permissions_list'] = $permissions->getList($u->getCompany());

            $this->loadTemplate('permissions_addgroup', $data);
        } else {
            header("Location: " . BASE_URL . "/permissions");
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

            header("Location: " . BASE_URL . "/permissions");
        } else {
            header("Location: " . BASE_URL . "/permissions");
        }
    }

}
