<?php
/**
 * Created by PhpStorm.
 * User: gocsg
 * Date: 09.10.2016
 * Time: 0:50
 */

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\Manufacturer;

class ManufacturerWidget extends Widget
{

    public $tpl;    //Шаблон вывода
    public $data;   //Массив категорий
    public $html;   //Готовый код

    public function init()
    {
        parent::init();

        $this->tpl = 'list-manufacturer';

        $this->tpl .= '.php';
    }

    public function ToTemplate($manufacturer)
    {
        include __DIR__ . '/tpl/' . $this->tpl;
    }

    public function getHtml($data)
    {
        $str = '';
        foreach ($data as $manufacturer) {
            $str .= $this->ToTemplate($manufacturer);
        }
        return $str;
    }

    public function run()
    {
        if (Yii::$app->cache->get('category_list')) {
            return Yii::$app->cache->get('category_list');
        }

        $this->data = Manufacturer::find()->indexBy('id')->asArray()->all(); //Формируем массив из объекта (ключ = id)
        $this->html = $this->getHtml($this->data);

        Yii::$app->cache->set('category_list', $this->html, 10);
        return $this->html;
    }
}