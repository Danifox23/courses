<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

    public function behaviors()
    {
        //получаем поведения, определенные в классе-родителе
        $return = parent::behaviors();
        //определяем свои поведения
        $behaviors = [
            //контролирует доступ к экшенам контроллера
            'access' => [
                //класс фильтра для доступа
                'class' => AccessControl::className(),
                //правила для доступа
                'rules' => [
                    [
                        'allow' => true,
                        //@ означает только авторизованных пользователей
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
        //сливаем два массива в один и возвращаем
        return array_merge($return, $behaviors);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
