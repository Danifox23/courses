<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use PHPExcel_IOFactory;
use yii\base\DynamicModel;

use app\models\Product;
use app\models\Category;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
//            ],
//        ];
//    }

    /**
     * Lists all Product models.
     * @return mixed
     */

    public function actionImport()
    {
        $model = new DynamicModel(['file_to_import']);
        $model->addRule(['file_to_import'], 'file', ['extensions' => 'xlsx']);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $inputFile_i = UploadedFile::getInstance($model, 'file_to_import');
            $inputFile = Yii::getAlias('@webroot/upload/') . $inputFile_i->baseName . '.' . $inputFile_i->extension;
            $inputFile_i->saveAs($inputFile);

            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFile);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFile);
            } catch (\Exception $e) {
                die('Произошла ошибка');
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 1; $row <= $highestRow; $row++) {
                if ($row == 1) continue;

                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);

                $product = new Product();
                $product->name = $rowData[0][0];
                $product->description = $rowData[0][1];
                $product->category_id = $rowData[0][2];
                $product->manufacturer_id = $rowData[0][3];
                $product->price = $rowData[0][4];
                $product->date = $rowData[0][5];
                $product->save();
            }
            Yii::$app->session->setFlash('success', 'Товары из таблицы успешно добавлены');
            return $this->redirect(['index']);
        }

        return $this->render('import', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $image = $model->getImage();
        return $this->render('view', [
            'model' => $model,
            'image' => $image,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */


    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post())) {
            $model->date = time();
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        return true;
    }


    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $model->image = UploadedFile::getInstance($model, 'image');
            if ($model->image) {
                $path = Yii::getAlias('@webroot/upload/store/') . $model->image->baseName . '.' . $model->image->extension;
                $model->image->saveAs($path);
                $model->removeImages();
                $model->attachImage($path);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatem($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin/category/view', 'id' => $model->category_id]);
        }
    }

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
