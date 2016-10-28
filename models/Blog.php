<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property string $author
 * @property integer $public
 * @property string $image
 */
class Blog extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'text', 'author', 'public'], 'required'],
            [['text'], 'string'],
            [['public'], 'integer'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['name', 'author', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Нвзвание',
            'text' => 'Текст',
            'author' => 'Автор',
            'public' => 'Откртыая',
            'image' => 'Изображение',
        ];
    }

    /**
     * @inheritdoc
     * @return BlogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BlogQuery(get_called_class());
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
