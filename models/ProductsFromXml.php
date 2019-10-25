<?php

namespace app\models;

use yii\base\Model;

class ProductsFromXml extends Model{

    public $products_file_name;
    public $categories_file_name;

    public function __construct($products_file_name, $categories_file_name)
    {
        parent::__construct();
        $this->products_file_name = $products_file_name;
        $this->categories_file_name = $categories_file_name;
    }

    public function getDataFromXml(){
        if(file_exists($this->products_file_name)){
            $xml = simplexml_load_file($this->products_file_name);
            foreach ($xml as $item) {
                $product_model = new Products();
                if (!$product_model::findOne((string)$item->id)) {
                    $product_model->id = (string)$item->id;
                    $product_model->category_id = (string)$item->categoryId;
                    $product_model->price = (string)$item->price;
                    $product_model->hidden = (string)$item->hidden;
                    $product_model->save();
                }
            }
        }
        if(file_exists($this->categories_file_name)){
            $xml = simplexml_load_file($this->categories_file_name);
            foreach ($xml as $item){
                $category_model = new Categories();
                if (!$category_model::findOne((string)$item->id)) {
                    $category_model->id = (string)$item->id;
                    $category_model->name = (string)$item->name;
                    $category_model->save();
                }
            }

        }
    }
}