<?php
/**
 * Created by PhpStorm.
 * User: gocsg
 * Date: 09.10.2016
 * Time: 10:45
 */

namespace app\controllers;

use Yii;
use app\models\Manufacturer;
use app\models\Product;
use yii\data\Pagination;

class ManufacturerController extends AppController
{
    public function actionView($id)
    {
        $manufacturer = Manufacturer::findOne($id);
        if(empty($manufacturer))
        {
            throw new \yii\web\HttpException(404, 'Не существующий производитель');
        }

        $query = Product::find()->where(['manufacturer_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 3,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $this->metaConstruct('Crtshop | ' . $manufacturer->name);

        return $this->render('view', [
            'manufacturer' => $manufacturer,
            'products' => $products,
            'pages'    => $pages,
        ]);
    }
}