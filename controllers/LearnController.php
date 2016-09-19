<?php

namespace app\controllers;
use yii\data\Pagination;
use yii\web\Controller;
use app\models\Articles;

class LearnController extends Controller
{
    public function actionIndex()
    {
        $query = Articles::find()->select('title, text');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 1,
            'pageSizeParam' => false,
            'forcePageParam' => false
        ]);
        $articles = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render(
            'index', [
                'articles' => $articles,
                'pages' => $pages
        ]);
    }
}