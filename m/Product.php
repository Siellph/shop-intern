<?php

	include_once 'SQL.php';

	class Product extends SQL
    {

        public $id_product;

        public $brand_name;

        public function getAllProducts()
        {

            return parent::SelectGoods();
        }

        public function getProduct($id_product)
        {

            return parent::SelectProduct('id_product', $id_product);
        }

        public function getImg($id_product) {

                return parent::Select('image', 'id_product', $id_product, 'true');
        }

        public function getCategory()
        {

            return parent::Select('categories');
        }

        public function getCategoryForEdit($name_category)
        {

            return parent::Select('categories', 'name_category', $name_category);

        }

        public function getBrand()
        {

            return parent::Select('brand');

        }

        public function getBrandForEdit($brand_name)
        {

            return parent::Select('brand', 'brand_name', $brand_name);

        }

        public function getStatus()
        {

            return parent::Select('status');
        }

        public function getStatusForEdit($name_status)
        {

            return parent::Select('status', 'name_status', $name_status);

        }

        public function saveProduct($title, $descript, $id_category, $id_brand, $count, $price, $id_status)
        {

            $object = [
                'title' => strip_tags($title),
                'descript' => strip_tags($descript),
                'id_category' => (int)strip_tags($id_category),
                'id_brand' => $id_brand,
                'count' => strip_tags($count),
                'price' => strip_tags($price),
                'id_status' => $id_status
            ];

            parent::Insert('goods', $object);


        }

        public function saveImage($inputImg, $id_product) {

            foreach ($inputImg as $name_img) {
                $object = [
                    'name_image' => strip_tags($name_img),
                    'id_product' => (int)$id_product
                ];
                parent::Insert('image', $object);
            }

        }

        public function updateProduct($id_category, $title, $descript, $category, $id_brand, $count, $price, $status)
        {

            $object = [
                'title' => strip_tags($title),
                'descript' => strip_tags($descript),
                'id_category' => (int)strip_tags($category),
                'id_brand' => $id_brand,
                'count' => strip_tags($count),
                'price' => strip_tags($price),
                'id_status' => (int)strip_tags($status),
            ];

            parent::Update('goods', $object, 'id_product', $id_category);

            header('Location: index.php?c=page&act=catalog');

        }

        public function RDir( $path ) {
            // если путь существует и это папка
            if ( file_exists( $path ) AND is_dir( $path ) ) {
                // открываем папку
                $dir = opendir($path);
                while ( false !== ( $element = readdir( $dir ) ) ) {
                    // удаляем только содержимое папки
                    if ( $element != '.' AND $element != '..' )  {
                        $tmp = $path . '/' . $element;
                        chmod( $tmp, 0777 );
                        // если элемент является папкой, то
                        // удаляем его используя нашу функцию RDir
                        if ( is_dir( $tmp ) ) {
                            RDir( $tmp );
                            // если элемент является файлом, то удаляем файл
                        } else {
                            unlink( $tmp );
                        }
                    }
                }
                // закрываем папку
                closedir($dir);
                // удаляем саму папку
                if ( file_exists( $path ) ) {
                    rmdir( $path );
                }
            }
        }

		public function DeleteProduct($id_product) {

		    parent::Delete('goods', 'id_product', $id_product);
		    parent::Delete('image', 'id_product', $id_product);

            header('Location: index.php?c=page&act=catalog');
        }
	}
