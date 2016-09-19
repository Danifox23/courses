<?php
//Базовый класс, содержащий общие методы
use yii\web\Controller;

Class AppController extends Controller
{
    public function debug($arr){
        echo "<pre>".print_r($arr)."</pre>";
    }
}