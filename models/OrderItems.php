<?php

namespace app\models;


use yii\db\ActiveRecord;

class OrderItems extends ActiveRecord {

    public static function tableName()
    {
        return 'order_items';
    }

    public function rules() {
        return [
            [['order_id', 'product_id', 'name', 'price', 'qty_item', 'sum_item'], 'required'],
            [['order_id', 'product_id', 'qty_item'], 'integer'],
            [['price', 'sum_item'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function gerOrder() {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    public static function saveItems($items, $id) {
        foreach ($items as $item_id => $item) {
            $order_item = new OrderItems();

            $order_item->order_id = $id;
            $order_item->product_id = $item_id;
            $order_item->name = $item['name'];
            $order_item->price = $item['price'];
            $order_item->qty_item = $item['qty'];
            $order_item->sum_item = $item['qty'] * $item['price'];

            $order_item->save();
        }
    }

}