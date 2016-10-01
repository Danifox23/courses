<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "manufacturer".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Product[] $products
 */
class Manufacturer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manufacturer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['manufacturer_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ManufacturerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ManufacturerQuery(get_called_class());
    }
}
