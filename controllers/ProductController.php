<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
use yii\web\HttpException;

class ProductController extends AppController {

    public function actionView() {
        $id = Yii::$app->request->get('id');

        $product = Product::findOne($id);
        if (empty($product)) {
            throw new HttpException('404', 'Такого товара не существует');
        }

        $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
        $this->setMeta('E-SHOPPER | '. $product->name, $product->keywords, $product->description);

        return $this->render('view', ['product' => $product, 'hits' => $hits]);
    }

    public function actionSearch($name) {
        $query = Product::find()->where(['like', 'name', $name]);
        if (!trim($name)) {
            return $this->render('search');
        }

        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->setMeta('E-SHOPPER | '. $name);

        return $this->render('search', ['products' => $products, 'pages' => $pages, 'name' => $name]);
    }
}