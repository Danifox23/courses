<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

use app\models\Product;
use app\models\Order;
use app\models\User;
use app\models\Blog;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $products = Product::find()->all();
        $orders = Order::find()->all();
        $users = User::find()->all();

        $show_main = Product::find()->select('id, name, category_id, price')->where('show_main = 1')->all();

        return $this->render('index', [
            'products'  => $products,
            'orders'    => $orders,
            'users'     => $users,
            'show_main' => $show_main,
        ]);
    }

    public function actionPeriod()
    {
        if (Yii::$app->request->post()) {
            $period = Yii::$app->request->post('period');
            $rightTime = time();
            $leftTime = [
                'all'   => 0,
                'year'  => $rightTime - 31556926,
                'month' => $rightTime - 2629743,
                'week'  => $rightTime - 604800,
                'day'   => $rightTime - 86400,
            ];

            $products = Product::find()->where('date >= :leftTime and date <= :rightTime', [':leftTime' => $leftTime[$period], ':rightTime' => $rightTime])->all();
            $orders = Order::find()->where('date >= :leftTime and date <= :rightTime', [':leftTime' => $leftTime[$period], ':rightTime' => $rightTime])->all();
            $users = User::find()->where('reg_date >= :leftTime and reg_date <= :rightTime', [':leftTime' => $leftTime[$period], ':rightTime' => $rightTime])->all();
            $blog = Blog::find()->where('date >= :leftTime and date <= :rightTime', [':leftTime' => $leftTime[$period], ':rightTime' => $rightTime])->all();

            $this->layout = false;
            return $this->render('main_info_period', [
                'products'  => $products,
                'orders'    => $orders,
                'users'     => $users,
                'blog'      => $blog,
            ]);
        }
        return false;
    }

    public function actionDeleteFromMain()
    {
        //Удаление из списка показываемых на главной
        if (Yii::$app->request->post('product_id')) {

            $product_id = Yii::$app->request->post('product_id');
            $product = Product::find()->where('id = :id', [':id' => $product_id])->one();
            $product->show_main = 0;
            $product->save();

            $show_main = Product::find()->select('id, name, category_id, price')->where('show_main = 1')->all();

            $this->layout = false;
            return $this->render('show_main', [
                'show_main' => $show_main,
            ]);
        }
        return false;
    }
}
