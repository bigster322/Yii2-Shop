<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property string $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord {

    public $image;
    public $gallery;

    public function behaviors() {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Нименование',
            'content' => 'Описание',
            'price' => 'Цена',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'img' => 'Img',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Скидка',
            'image' => 'Главное фото товара',
            'gallery' => 'Дополнительные фото',
        ];
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function upload() {
        if ($this->validate()) {
            $path = 'upload/store/'. $this->image->baseName .'.'. $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);

            return true;
        } else {
            return false;
        }
    }

    public function uploadGallery() {
        if ($this->validate()) {
            foreach ($this->gallery as $image) {
                $path = 'upload/store/'. $image->baseName .'.'. $image->extension;
                $image->saveAs($path);
                $this->attachImage($path);
            }

            return true;
        } else {
            return false;
        }
    }

    public function uploadImages() {
        if ($this->upload() && $this->uploadGallery()) return true;

        return false;
    }
}
