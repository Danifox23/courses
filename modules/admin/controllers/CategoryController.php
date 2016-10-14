<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Product;
use app\models\Category;
use app\models\Manufacturer;


/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     */

    public function actionModal()
    {
        $data = Yii::$app->request->post();
        $product = Product::findOne($data['product_id']);

        if ($product->load($data) && $product->validate()) {
            return $this->redirect(['view', 'id' => $product->id]);
        } else
            {
            if (Yii::$app->request->isAjax)
            {
                return $this->renderAjax('_form_product', [
                    'model' => $product,
                    'category_id' => $data['category_id'],
                ]);
            }
        }
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        $products = $model->products;
        $dataProvider = new ActiveDataProvider([
            'query' => $model->getProducts(),
        ]);

        return $this->render('view', [
            'model' => $model,
            'products' => $products,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $products = $model->products;
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->validate()) {
            $post_products = null;
            foreach ($post['Product'] as $post_product) {
                if (!isset($post_product['id'])) {
                    $product = new Product();
                } else {
                    $product = Product::findOne($post_product['id']);
                }

                $product->load($post_product, '');

                $model->link('products', $product);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'products' => $products,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
