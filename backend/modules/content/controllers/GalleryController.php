<?php

namespace backend\modules\content\controllers;

use backend\controllers\BaseController;
use backend\modules\content\models\Gallery;
use backend\modules\content\models\GalleryImage;
use backend\modules\content\models\search\GallerySearch;
use Yii;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * GalleryController implements the CRUD actions for Gallery model.
 */
class GalleryController extends BaseController
{
    public function actionIndex()
    {
        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Gallery();

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

    protected function findModel($id)
    {
        if (($model = Gallery::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionDeleteImage(int $id): Response
    {
        $model = $this->findModel($id);
        $file = $model->getPath(Gallery::UPLOAD_PATH, $model->image);
        $model->removeSingleFileIfExist($file);
        $model->image = null;
        $model->save();
        Yii::$app->session->setFlash('danger', Yii::t('app', 'Record deleted!'));
        return $this->redirect(Yii::$app->request->referrer);
    }


    public function actionSaveImageSort(): void
    {
        $order = Yii::$app->request->post('order');
        foreach($order as $sort => $imageId) {
            if(isset($imageId) && !empty($imageId)) {
                $image = GalleryImage::findOne($imageId);
                $image->sort = $sort;
                $image->save();
            }
        }
        print_r($order);
    }
    
    public function actionDeleteImages(int $id): Response
    {
        $model = $this->findImagesModel($id);
        $model->delete();
        Yii::$app->session->setFlash('danger', Yii::t('app', 'Record deleted!'));
        return $this->redirect(Yii::$app->request->referrer);
    }

    protected function findImagesModel(int $id): GalleryImage
    {
        if (($model = GalleryImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
