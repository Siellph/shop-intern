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