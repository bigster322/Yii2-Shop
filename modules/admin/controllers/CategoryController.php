<?php
/**
 * Created by PhpStorm.
 * User: Mizantrap
 * Date: 20.03.2019
 * Time: 17:22
 */

namespace app\modules\admin\controllers;


use app\modules\admin\models\Category;
use Yii;

class CategoryController extends AppAdminController {

    public function actionView() {
        $categories = Category::find()->all();
        $category = new Category();

        return $this->render('view', ['categories' => $categories, 'category' => $category]);
    }

    public function actionChange($id) {
        $category = Category::findOne($id);
        $categories = new Category();

        return $this->render('change', ['category' => $category, 'categories' => $categories]);
    }

    public function actionUpdate($id) {
        $category = Category::findOne($id);

        if ($category->load(Yii::$app->request->post()) && $category->update()) {
            return $this->redirect(['change', 'id' => $category->id]);
        }
    }

    public function actionDelete($id) {
        $category = Category::findOne($id);

        if($category->delete()) {
            return $this->redirect(['view']);
        }
    }

    public function actionAdd() {
        $category = new Category();

        if ($category->load(Yii::$app->request->post()) && $category->save()) {
            return $this->redirect(['view']);
        }
    }
}