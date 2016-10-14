<?php
/**
 * Created by PhpStorm.
 * User: gocsg
 * Date: 09.10.2016
 * Time: 13:29
 */

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;

class ProductController extends AppController
{
    public function actionView($id)
    {
        $product = Product::findOne($id);
        if(empty($product))
        {
            throw new \yii\web\HttpException(404, 'ШТО ТЫ ДЕЛАЕШЬ!? ПРЕКРАЩАЙ');
        }

        $popular_products = Product::find()->where(['show_main' => 1])->limit(6)->all();

        $this->metaConstruct('Crtshop | ' . $product->name, $product->description);

        return $this->render('view', [
           'product'                => $product,
            'popular_products'      => $popular_products,
        ]);
    }
}