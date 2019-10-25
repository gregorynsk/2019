<?php

namespace app\controllers;

use app\models\ProductsFromXml;
use app\models\ProductsListSearch;
use yii\web\Controller;
use yii;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $product_path = Yii::getAlias('@app').'/files/products.xml';
        $category_path = Yii::getAlias('@app').'/files/categories.xml';
        $model = new ProductsFromXml($product_path, $category_path);
        $model->getDataFromXml();
        $search_model = new ProductsListSearch();
        $data_provider = $search_model->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'search_model' => $search_model,
            'data_provider' => $data_provider,
        ]);
    }
}
