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
use app\models\Category;

class CategoryWidget extends Widget
{

    public $tpl;    //Шаблон вывода
    public $data;   //Массив категорий
    public $html;   //Готовый код

    public function init()
    {
        parent::init();

        $this->tpl = 'list-category';

        $this->tpl .= '.php';
    }

    public function ToTemplate($category)
    {
        include __DIR__ . '/tpl/' . $this->tpl;
    }

    public function getHtml($data)
    {
        $str = '';
        foreach ($data as $category) {
            $str .= $this->ToTemplate($category);
        }
        return $str;
    }

    public function run()
    {
        if (Yii::$app->cache->get('category_list')) {
            return Yii::$app->cache->get('category_list');
        }

        $this->data = Category::find()->indexBy('id')->asArray()->all(); //Формируем массив из объекта (ключ = id)
        $this->html = $this->getHtml($this->data);

        Yii::$app->cache->set('category_list', $this->html, 10);
        return $this->html;
    }
}