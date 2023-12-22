<?php

declare(strict_types=1);

namespace backend\modules\catalog\controllers;

use backend\controllers\BaseController;
use backend\modules\catalog\models\Product;
use backend\modules\catalog\models\ProductElement;
use backend\modules\catalog\models\ProductImage;
use backend\modules\catalog\models\search\ProductElementSearch;
use backend\modules\catalog\models\search\ProductSearch;
use Yii;
use yii\db\StaleObjectException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class ProductController extends BaseController
{

    /**
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return Response|string
     */
    public function actionCreate(): Response | string
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

    /**
     * @param int $id
     * @return Response|string
     * @throws NotFoundHttpException
     */
    public function actionUpdate(int $id): Response | string
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

    /**
     * @param int $id
     * @return Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws StaleObjectException
     */
    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('warning', Yii::t('app', 'Record deleted'));

        return $this->redirect(['index']);
    }


    /**
     * @param int $id
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionDeleteImage(int $id): Response
    {
        $model = $this->findModel($id);
        $file = $model->getPath(Product::UPLOAD_PATH, $model->image);
        $model->removeSingleFileIfExist($file);
        $model->image = null;
        $model->save();
        Yii::$app->session->setFlash('danger', Yii::t('app', 'Record deleted!'));
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @return void
     */
    public function actionSaveImageSort(): void
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


    /**
     * @param int $id
     * @return Response
     * @throws NotFoundHttpException
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDeleteImages(int $id): Response
    {
        $model = $this->findImagesModel($id);
        $model->delete();
        Yii::$app->session->setFlash('danger', Yii::t('app', 'Record deleted!'));
        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @param int $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionElements(int $id): string
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

    /**
     * @param int $id
     * @return Response|string
     * @throws NotFoundHttpException
     */
    public function actionCreateElement(int $id): Response | string
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

    /**
     * @param int $elementId
     * @return Response|string
     * @throws NotFoundHttpException
     */
    public function actionUpdateElement(int $elementId): Response | string
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

    /**
     * @param int $elementId
     * @return Response
     * @throws NotFoundHttpException
     * @throws StaleObjectException
     * @throws \Throwable
     */
    public function actionDeleteElement(int $elementId): Response
    {
        $model = $this->findElementModel($elementId);
        $model->delete();
        Yii::$app->session->setFlash('warning', Yii::t('app', 'Record deleted'));

        return $this->redirect(['elements', 'id' => $model->product_id]);
    }

    /**
     * @param int $id
     * @return Product
     * @throws NotFoundHttpException
     */
    protected function findModel(int $id): Product
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * @param int $elementId
     * @return ProductElement
     * @throws NotFoundHttpException
     */
    protected function findElementModel(int $elementId): ProductElement
    {
        if (($model = ProductElement::findOne(['id' => $elementId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * @param int $id
     * @return ProductImage
     * @throws NotFoundHttpException
     */
    protected function findImagesModel(int $id): ProductImage
    {
        if (($model = ProductImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
