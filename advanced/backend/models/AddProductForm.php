<?php

namespace backend\models;

use yii\base\Model;

class AddProductForm extends Model {

    public $title;
    public $descript;
    public $count;
    public $price;
    public $image;
    public $category;
    public $brand;
    public $status;
    public $imageFiles;


    public function rules()
    {
        return [
            ['title', 'trim'],
            ['title', 'required'],
            ['title', 'string', 'min' => 5, 'max' => 255],

            ['descript', 'trim'],
            ['descript', 'required'],
            ['descript', 'string', 'max' => 30000],

            ['count', 'trim'],
            ['count', 'required'],
            ['count', 'string', 'max' => 255],

            ['category', 'trim'],
            ['category', 'required'],
            ['category', 'integer'],

            ['brand', 'trim'],
            ['brand', 'required'],
            ['brand', 'integer'],

            ['price', 'trim'],
            ['price', 'required'],
            ['price', 'string', 'max' => 255],

            ['status', 'trim'],
            ['status', 'required'],
            ['status', 'integer'],

            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4,'checkExtensionByMimeType'=>false],

        ];
    }

    public function addProduct()
    {

        $product = new Product();
        $product->title = $this->title;
        $product->descript = $this->descript;
        $product->count = $this->count;
        $product->price = $this->price;
        $product->id_category = $this->category;
        $product->id_brand = $this->brand;
        $product->id_status = $this->status;

        return $product->save();

    }

}