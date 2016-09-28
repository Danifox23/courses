<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $category_id
 * @property double $purchase_price
 * @property double $price
 * @property integer $order_id
 * @property integer $manufacturer_id
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'category_id', 'purchase_price', 'price', 'order_id', 'manufacturer_id'], 'required'],
            [['category_id', 'order_id', 'manufacturer_id'], 'integer'],
            [['purchase_price', 'price'], 'number'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'purchase_price' => 'Purchase Price',
            'price' => 'Price',
            'order_id' => 'Order ID',
            'manufacturer_id' => 'Manufacturer ID',
        ];
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
