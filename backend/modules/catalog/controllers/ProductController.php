<?php

namespace backend\modules\catalog\controllers;

use backend\modules\catalog\models\Product;
use backend\modules\catalog\models\ProductElement;
use backend\modules\catalog\models\ProductImage;
use backend\modules\catalog\models\search\ProductElementSearch;
use backend\modules\catalog\models\search\ProductSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProductController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                        'delete-element' => ['POST'],
                        'delete-images' => ['POST'],
                        'delete-image' => ['POST'],
                        'save-image-sort' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Record added'));
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Record changed'));
            return $this->refresh();
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('warning', Yii::t('app', 'Record deleted'));

        return $this->redirect(['index']);
    }
    

    public function actionDeleteImage(int $id)
    {
        $model = $this->findModel($id);
        $file = $model->getPath(Product::UPLOAD_PATH, $model->image);
        $model->removeSingleFileIfExist($file);
        $model->image = null;
        $model->save();
        Yii::$app->session->setFlash('danger', Yii::t('app', 'Record deleted!'));
        return $this->redirect(Yii::$app->request->referrer);
    }
           
    public function actionSaveImageSort()
    {
        $order = Yii::$app->request->post('order');
        foreach($order as $sort => $imageId) {
            if(isset($imageId) && !empty($imageId)) {
                $image = ProductImage::findOne($imageId);
                $image->sort = $sort;
                $image->save();
            }
        }
        print_r($order);
    }

        
    public function actionDeleteImages(int $id)
    {
        $model = $this->findImagesModel($id);
        $model->delete();
        Yii::$app->session->setFlash('danger', Yii::t('app', 'Record deleted!'));
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionElements($id)
    {
        $model = $this->findModel($id);
        $searchModel = new ProductElementSearch();
        $dataProvider = $searchModel->search($id, $this->request->queryParams);

        return $this->render('elements/element_list', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreateElement($id)
    {
        $model = $this->findModel($id);
        $elementModel = new ProductElement();
        $elementModel->product_id = $id;

        if ($this->request->isPost) {
            if ($elementModel->load($this->request->post()) && $elementModel->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Record added'));
                return $this->redirect(['update-element', 'elementId' => $elementModel->id]);
            }
        } else {
            $elementModel->loadDefaultValues();
        }

        return $this->render('elements/create_element', [
            'model' => $model,
            'elementModel' => $elementModel,
        ]);
    }

    public function actionUpdateElement($elementId)
    {
        
        $elementModel = $this->findElementModel($elementId);

        if ($this->request->isPost && $elementModel->load($this->request->post()) && $elementModel->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Record changed'));
            return $this->refresh();
        }

        return $this->render('elements/update_element', [
            'elementModel' => $elementModel,
        ]);
    }

    public function actionDeleteElement($elementId)
    {
        $model = $this->findElementModel($elementId);
        $model->delete();
        Yii::$app->session->setFlash('warning', Yii::t('app', 'Record deleted'));

        return $this->redirect(['elements', 'id' => $model->product_id]);
    }

    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findElementModel($elementId)
    {
        if (($model = ProductElement::findOne(['id' => $elementId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function findImagesModel(int $id)
    {
        if (($model = ProductImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
