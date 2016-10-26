<?php
/**
 * Created by PhpStorm.
 * User: gocsg
 * Date: 09.10.2016
 * Time: 10:45
 */

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionIndex()
    {
        $show_main_products = Product::find()->where(['show_main' => 1])->limit(9)->all();

        $this->metaConstruct('Crtshop');

        return $this->render('index', [
            'show_main_products' => $show_main_products,
        ]);
    }

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if(empty($category))
        {
            throw new \yii\web\HttpException(404, 'Не существующая категория');
        }

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->metaConstruct('Crtshop | ' . $category->name, $category->desc);

        return $this->render('view', [
            'category' => $category,
            'products' => $products,
            'pages'    => $pages,
        ]);
    }
}