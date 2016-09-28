<?php

namespace app\controllers;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\Product;
use app\models\LearnForms;

class LearnController extends Controller
{
    //public $layout = false;

    public function actionIndex()
    {

    }

    public function actionProducts()
    {
        $test = 23;
        $query = Product::find();
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
            'pageSizeParam' => false,
            'forcePageParam' => false
        ]);

        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render(
            'products.twig', [
            'products' => $products,
            'pages' => $pages,
            'test' => $test,
        ]);
    }
}