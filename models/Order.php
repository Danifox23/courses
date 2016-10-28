<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

use app\models\Position;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $total
 * @property integer $quantity
 * @property integer $status_id
 * @property integer $date
 * @property integer $date_edit
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 *
 * @property Status $status
 * @property User $user
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date', 'date_edit'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['date_edit'],
                ],
            ],
        ];

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'total', 'quantity', 'status_id', 'date', 'date_edit'], 'integer'],
//            [['total', 'quantity', 'status_id', 'date', 'date_edit', 'name', 'email', 'phone', 'address'], 'required'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Юзер',
            'total' => 'Итого',
            'quantity' => 'Кол-во',
            'status_id' => 'Статус',
            'date' => 'Дата',
            'date_edit' => 'Дата (изм)',
            'name' => 'Имя',
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getPositions()
    {
        return $this->hasMany(Position::className(), ['order_id' => 'id']);
    }

    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
