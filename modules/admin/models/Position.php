<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 *
 * @property Product $product
 * @property Product $order
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'quantity'], 'required'],
            [['order_id', 'product_id', 'quantity'], 'integer'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Product::className(), ['id' => 'order_id']);
    }

    /**
     * @inheritdoc
     * @return PositionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PositionQuery(get_called_class());
    }
}
