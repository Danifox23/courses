<?php
namespace app\models;

use yii\db\ActiveRecord;

Class Articles extends ActiveRecord
{
    public static function tableName()
    {
        return 'articles';
    }
}