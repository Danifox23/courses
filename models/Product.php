<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;


class Product extends \yii\db\ActiveRecord
{

    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'category_id', 'price', 'manufacturer_id'], 'required'],
            [['category_id', 'manufacturer_id'], 'integer'],
            [['price'], 'number'],
            [['sale', 'show_main', 'date'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['manufacturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Manufacturer::className(), 'targetAttribute' => ['manufacturer_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
            'category_id' => 'Категория',
            'purchase_price' => 'Purchase Price',
            'price' => 'Цена',
            'manufacturer_id' => 'Производитель',
            'image' => 'Изображение',
            'date' => 'Дата',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPositions0()
    {
        return $this->hasMany(Position::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManufacturer()
    {
        return $this->hasOne(Manufacturer::className(), ['id' => 'manufacturer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }


    public static function find()
    {
        return new ProductQuery(get_called_class());
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);

        $this->image = UploadedFile::getInstance($this, 'image');
        if ($this->image) {
            $path = Yii::getAlias('@webroot/upload/store/') . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path);
        }
    }
}
