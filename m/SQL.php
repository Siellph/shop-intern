<?php

include_once 'config/db.php';

class SQL {

    private static $instance;
    private $db;

    public static function Instance() {

        if (self::$instance == null) {
            self::$instance = new SQL();
        }

        return self::$instance;
    }

    public function __construct() {

        setlocale(LC_ALL, 'ru_RU.UTF8');
        $this->db = new PDO(DRIVER . ':host='. SERVER . ';dbname=' . DB, USERNAME, PASSWORD);
        $this->db->exec('SET NAMES UTF8');
        $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function Select($table, $where_key = false, $where_value = false, $fetchAll = false) {

        if ($where_key AND $where_value AND !$join) {
            $query = "SELECT * FROM " . $table . " WHERE " . $where_key . " = '" . $where_value . "'";
        } else {
            $query = "SELECT * FROM " . $table;
        }

        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        if ($fetchAll) {
            return $q->fetchAll();
        } else if ($where_key AND $where_value) {
            return $q->fetch();
        } else {
            return $q->fetchAll();
        }
    }

    public function NewIdProduct() {

        $query = "SELECT MAX(id_product) AS id_product FROM goods";

        $q = $this->db->prepare($query);
        $q -> execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }
        return $q->fetchAll();
    }

    public function SelectGoods() {

        $query = "SELECT goods.id_product, MAX(`title`) AS title, MAX(`descript`) AS descript, MIN(`name_image`) AS name_image, MAX(`name_category`) AS name_category, MAX(`brand_name`) AS brand_name, MAX(`count`) AS `count`, MAX(`price`) AS `price`, `name_status` FROM `goods`
                  INNER JOIN `categories` ON goods.id_category = categories.id_category
                  INNER JOIN `brand` ON goods.id_brand = brand.id_brand
                  INNER JOIN `status` ON goods.id_status = status.id_status
                  LEFT OUTER JOIN `image` ON goods.id_product = image.id_product
                  GROUP BY goods.id_product";

        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }
        return $q->fetchAll();

    }

    public function SelectProduct($where_key, $id_product) {

        $query = "SELECT `id_product`, `title`, `descript`, `name_category`, `brand_name`, `count`, `price`, `name_status` FROM `goods`
                  INNER JOIN `categories` ON goods.id_category = categories.id_category
                  INNER JOIN `brand` ON goods.id_brand = brand.id_brand
                  INNER JOIN `status` ON goods.id_status = status.id_status
                  WHERE " . $where_key . " = '" . $id_product . "'";

        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $q->fetchAll();

    }

    public function Insert($table, $object) {

        $columns = array();

        foreach ($object as $key => $value) {

            $columns[] = $key;
            $masks[] = ":$key";

            if ($value === null) {
                $object[$key] = 'NULL';
            }
        }

        $columns_s = implode(', ', $columns);
        $masks_s = implode(', ', $masks);

        $query = "INSERT INTO $table ($columns_s) VALUES ($masks_s)";

        $q = $this->db->prepare($query);
        $q->execute($object);

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $this->db->lastInsertId();
    }

    public function Update($table, $object, $where_key, $id) {

        $sets = array();

        foreach ($object as $key => $value) {

            $sets[] = "$key=:$key";

            if ($value === NULL) {
                $object[$key]='NULL';
            }
        }

        $sets_s = implode(' , ',$sets);
        $query = "UPDATE " . $table . " SET " . $sets_s . " WHERE " . $where_key . " = '" . $id ."'";

        $q = $this->db->prepare($query);
        $q->execute($object);

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $q->rowCount();
    }


    public function Delete($table, $where_key, $id_product) {

        $query = "DELETE FROM " . $table . " WHERE " . $where_key . " = '" . $id_product . "'";
        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $q->rowCount();
    }

    public function Remove($table, $where) {

        $query = "DELETE FROM $table WHERE order_id = $where";
        $q = $this->db->prepare($query);
        $q->execute();

        if ($q->errorCode() != PDO::ERR_NONE) {
            $info = $q->errorInfo();
            die($info[2]);
        }

        return $q->rowCount();
    }

    public function Password ($name, $password) {

        return strrev($name) . md5($password);
    }
}