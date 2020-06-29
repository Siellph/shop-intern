<?phpinclude_once 'm/Product.php';include_once 'm/Basket.php';class C_Page extends C_Base {//    public function action_index() {////        $this->title .= ' | Главная';//        $this->content = $this->Template('v/v_index.php', array());//    }    public function action_catalog() {        $product_object = new Product();        $catalog = $product_object->getAllProducts();        $this->title .= ' | Каталог';        $this->content = $this->Template('v/v_catalog.php', array('catalog' => $catalog));    }    public function action_product($id_product) {        $product_object = new Product();        $product = $product_object->getProduct($id_product);        foreach ($product as $product);        $this->title .= ' | ' . $product['title'];        $this->content = $this->Template('v/v_product.php', array('product' => $product));    }    public function action_add() {        $this->title .= ' | Новый товар';        $category_object = new Product();        $category = $category_object->getCategory();        $brand_object = new Product();        $brand = $brand_object->getBrand();        $status_object = new Product();        $status = $status_object->getStatus();        $this->content = $this->Template('v/v_addEditProduct.php', array('category' => $category, 'brand' => $brand, 'status' => $status));    }    public function action_save() {        if ($_POST['id_product'] AND !$_GET['step']) {            $this->IsPost();            $product = new Product();            $result = $product->updateProduct($_POST['id_product'], $_POST['title'], $_POST['descript'], $_POST['id_category'], $_POST['id_brand'], $_POST['count'], $_POST['price'], $_POST['id_status']);        } else {            $this->IsPost();            $product = new Product();            $result = $product->saveProduct($_POST['title'], $_POST['descript'], $_POST['id_category'], $_POST['id_brand'], $_POST['count'], $_POST['price'], $_POST['id_status']);        }        $this->content = $this->Template('v/v_addEditProduct.php');    }    public function action_copy() {            $this->IsPost();            $product = new Product();            $result = $product->saveProduct($_POST['title'], $_POST['descript'], $_POST['id_category'], $_POST['id_brand'], $_POST['count'], $_POST['price'], $_POST['id_status']);        $this->content = $this->Template('v/v_addEditProduct.php');    }    public function action_edit($id_product) {        $product_object = new Product();        $product = $product_object->getProduct($id_product);        foreach ($product as $product);        $this->title .= ' | Редактирование ' . $product['title'];        $category_object = new Product();        $category = $category_object->getCategory();        $categoryEdit_object = new Product();        $categoryEdit = $categoryEdit_object->getCategoryForEdit($product['name_category']);        $brand_object = new Product();        $brand = $brand_object->getBrand();        $brandEdit_object = new Product();        $brandEdit = $brandEdit_object->getBrandForEdit($product['brand_name']);        $status_object = new Product();        $status = $status_object->getStatus();        $statusEdit_object = new Product();        $statusEdit = $statusEdit_object->getStatusForEdit($product['name_status']);        $this->content = $this->Template('v/v_addEditProduct.php',            array('product' => $product,                'category' => $category,                'brand' => $brand,                'status' => $status,                'categoryEdit' => $categoryEdit,                'brandEdit' => $brandEdit,                'statusEdit' => $statusEdit));    }    public function action_delete($id_product) {        $product_object = new Product();        $delete = $product_object->DeleteProduct($id_product);    }}