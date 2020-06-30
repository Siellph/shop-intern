<?php
include_once 'm/User.php';

class C_User extends C_Base {

    public function action_info()
    {

        if ($_SESSION['id_user']) {
            $get_user = new User();
            $user_info = $get_user->getUser($_SESSION['id_user']);
            $this->title .= ' | Инфо' . $user_info['name'];
            $this->content = $this->Template('v/v_info.php', array('username' => $user_info['firstname'], 'userlogin' => $user_info['login']));
        } else {
            header('Location: index.php');
        }
    }

    public function action_allAdmin() {

        if ($_SESSION['id_user'] AND $_SESSION['id_role'] == '2') {
            $admin_object = new User();
            $admin = $admin_object->showAllAdmin();

            $this->title .= ' | Администраторы';
            $this->content = $this->Template('v/v_allAdmin.php', array('admin' => $admin));
        } else {
            header('Location: index.php');
        }
    }

    public function action_addAdmin() {

        if ($_SESSION['id_user'] AND $_SESSION['id_role'] == '2') {
            $this->title .= ' | Новый администратор';
            $this->content = $this->Template('v/v_addAdmin.php');

            if ($this->IsPost()) {
                $new_object = new User();
                $new_object->saveAdmin($_POST['login'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['midname'], $_POST['date_of_birth'], $_POST['sex'], $_POST['phone'], $_POST['e-mail'], $_POST['id_role']);
                $this->content = $this->Template('v/v_addAdmin.php');
            }
        } else {
            header('Location: index.php');
        }

    }

    public function action_changePass() {

        if ($_SESSION['id_user']) {
            $this->title .= ' | Смена пароля';
            $this->content = $this->Template('v/v_changePass.php');

            if ($this->IsPost()) {
                $change_object = new User();
                $result = $change_object->changePass($_POST['lastPassword'], $_POST['newPassword']);
                $this->content = $this->Template('v/v_changePass.php', array('text' => $result));
            }
        } else {
            header('Location: index.php');
        }
    }

    public function action_delete($id_user) {

        if ($_SESSION['id_user'] AND $_SESSION['id_role'] == '2') {
            $admin_object = new User();
            $admin_object->deleteAdmin($id_user);

            header('Location: index.php?c=user&act=allAdmin');
        } else {
            header('Location: index.php');
        }
    }

    public function action_reg() {

        if (!$_SESSION['id_user']) {
            $this->title .= ' | Регистрация';
            $this->content = $this->Template('v/v_reg.php', array());

            if ($this->isPost()) {
                $new_user = new User();
                $result = $new_user->newUser($_POST['name'], $_POST['login'], $_POST['password']);
                $this->content = $this->Template('v/v_reg.php', array('text' => $result));
            }
        } else {
            header('Location: index.php');
        }
    }

    public function action_login() {

        if (!$_SESSION['id_user']) {
            $this->title .= ' | Вход';
            $this->content = $this->Template('v/v_login.php', array());

            if ($this->isPost()) {
                $login = new User();
                $result = $login->login($_POST['login'], $_POST['password']);
                $this->content = $this->Template('v/v_login.php', array('text' => $result));
            }
        } else {
            header('Location: index.php');
        }
    }

    public function action_logout() {

        if ($_SESSION['id_user']) {
            $logout = new User();
            $result = $logout->logout();

            return header('Location: index.php?c=page&act=catalog');
        } else {
            header('Location: index.php');
        }
    }
}