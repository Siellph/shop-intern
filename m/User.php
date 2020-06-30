<?php

include_once 'SQL.php';

class User extends SQL {

    public $user_id, $user_login, $user_name, $user_password;

    public function getUser ($id) {

        return parent::Select('users', 'id_user', $id);
    }
// Регистрация нового пользователя
    public function newUser ($name, $login, $password) {

        $object = [
            'name' => strip_tags($name),
            'login' => strip_tags($login),
            'password' => parent::Password(strip_tags($name), strip_tags($password))
        ];
        $user = parent::Select('users', 'login', strip_tags($login));

        if (!$user) {
            parent::Insert('users', $object);
            return 'Вы успешно зарегистрировались!';
        } else {
            return 'Пользователь с таким логином уже зарегистрирован!';
        }
    }
// Функция авторизации пользователя
    public function login ($login, $password) {

        $user = parent::Select('users', 'login', strip_tags($login));

        if ($user) {
            if ($user['password'] == parent::Password($user['name'], strip_tags($password))) {
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['id_role'] = $user['id_role'];
                header('Location: index.php?c=page&act=catalog');
            } else {
                return 'Пароль не верный!';
            }
        } else {
            return 'Пользователь с таким логином не зарегистрирован!';
        }
    }

    public function showAllAdmin() {

        return parent::Select('users', 'id_role', '2', 'true');

    }

    public function saveAdmin($login, $password, $firstname, $lastname, $midname, $date_of_birth, $sex, $phone, $e_mail, $id_role)
    {

        $object = [
            'login' => strip_tags($login),
            'password' => (strip_tags(md5($password))),
            'firstname' => strip_tags($firstname),
            'lastname' => strip_tags($lastname),
            'midname' => strip_tags($midname),
            'date_of_birth' => strip_tags($date_of_birth),
            'sex' => strip_tags($sex),
            'phone' => strip_tags($phone),
            'e-mail' => strip_tags($e_mail),
            'id_role' => $id_role,
        ];

        parent::Insert('users', $object);

    }

    public function changePass($lastPassword, $newPassword) {

        $pass = parent::Select('users', 'id_user', $_SESSION['id_user']);

        if (strip_tags(md5($lastPassword)) == $pass['password']) {

        $object = [
            'password' => (strip_tags(md5($newPassword))),
        ];

        parent::Update('users', $object, 'id_user', $_SESSION['id_user']);
            return 'Пароль успешно изменен';
        } else {
            return 'Старый пароль неверный!';
        }

    }

    public function deleteAdmin($id_user) {

        return parent::Delete('users', 'id_user', $id_user);

    }

// Функция выхода из системы
    public function logout() {

        if (isset($_SESSION["id_user"])) {
            unset($_SESSION["id_user"]);
            session_destroy();
            header('Location: index.php?c=user&act=login');
            return true;
        } else {
            return false;
        }
    }
}