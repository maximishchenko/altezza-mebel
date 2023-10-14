<?php

namespace frontend\modules\catalog\controllers;

use frontend\components\ProductVisit;
use frontend\modules\catalog\models\Product;
use frontend\modules\catalog\models\search\ProductSearch;
use frontend\modules\content\models\Lead;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($slug)
    {
        $lead = new Lead();
        $product = $this->findModelBySlug($slug);        
        $visisted = new ProductVisit();
        if ($visisted->isNewVisit($product->id)) {
            $product->updateCounters(['view_count' => 1]);
        }
        $popularProducts = Product::find()->active()->orderPopular()->limit(10)->all();

        return $this->render('view', [
            'product' => $product,
            'popularProducts' => $popularProducts,
            'lead' => $lead,
        ]);
    }

    protected function findModelBySlug($slug)
    {
        if (($model = Product::findOne(['slug' => $slug])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
