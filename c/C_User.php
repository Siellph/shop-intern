<?php
include_once 'm/User.php';

class C_User extends C_Base {

    public function action_info() {

        $get_user = new User();
        $user_info = $get_user->getUser($_SESSION['id_user']);
        $this->title .= ' | Инфо' . $user_info['name'];
        $this->content = $this->Template('v/v_info.php', array('username' => $user_info['firstname'], 'userlogin' => $user_info['login']));
    }

    public function action_allAdmin() {

        $admin_object = new User();
        $admin = $admin_object->showAllAdmin();

        $this->title .= ' | Администраторы';
        $this->content = $this->Template('v/v_allAdmin.php', array('admin' => $admin));

    }

    public function action_addAdmin() {

        $this->title .= ' | Новый администратор';
        $this->content = $this->Template('v/v_addAdmin.php');

    }

    public function action_save() {

        $this->IsPost();
        $admin = new User();
        $admin->saveAdmin($_POST['login'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['midname'], $_POST['date_of_birth'], $_POST['sex'], $_POST['phone'], $_POST['e-mail'], $_POST['id_role']);


    }

    public function action_delete($id_user) {
        $admin_object = new User();
        $delete = $admin_object->deleteAdmin($id_user);

        header('Location: index.php?c=user&act=allAdmin');
    }

    public function action_reg() {

        $this->title .= ' | Регистрация';
        $this->content = $this->Template('v/v_reg.php', array());

        if($this->isPost()) {
            $new_user = new User();
            $result = $new_user->newUser($_POST['name'], $_POST['login'], $_POST['password']);
            $this->content = $this->Template('v/v_reg.php', array('text' => $result));
        }
    }

    public function action_login() {
        $this->title .= ' | Вход';
        $this->content = $this->Template('v/v_login.php', array());

        if($this->isPost()) {
            $login = new User();
            $result = $login->login($_POST['login'], $_POST['password']);
            $this->content = $this->Template('v/v_login.php', array('text' => $result));
        }
    }

    public function action_logout() {
        $logout = new User();
        $result = $logout->logout();

        return header('Location: index.php?c=page&act=catalog');
    }
}