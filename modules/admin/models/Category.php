<?php

namespace app\modules\admin\models;


use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Category extends ActiveRecord {

    public static function tableName() {
        return 'category';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_id', 'description', 'keywords'], 'safe'],
        ];
    }

    public function getAll() {
        return $this->find()->all();
    }

    public function getCategoriesMap() {
        $none_category = ['0' => 'Без категории'];
        $arr = ArrayHelper::map($this->getAll(), 'id', 'name');
        $arr = array_merge($none_category, $arr);

        return $arr;
    }
}