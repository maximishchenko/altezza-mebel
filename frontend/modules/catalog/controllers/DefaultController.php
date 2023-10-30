<?php

namespace frontend\modules\catalog\controllers;

use frontend\components\ProductVisit;
use frontend\modules\catalog\models\Product;
use frontend\modules\catalog\models\search\ProductSearch;
use frontend\modules\content\models\Lead;
use Yii;
use yii\web\Response;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $this->processPageRequest('page');

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (Yii::$app->request->isAjax) {
            $dataProvider->prepare();
            \Yii::$app->response->format = Response::FORMAT_HTML;   
            $response = [
                'totalCount' => $dataProvider->getTotalCount(), 
                'pagesCount' => $dataProvider->pagination->pageCount,
                'content' => $this->renderPartial('//layouts/include/product/_productLoop', ['dataProvider' => $dataProvider])
            ];
            return Json::encode($response);
            Yii::$app->end();
        } else {
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    public function actionView($slug)
    {
        $lead = new Lead();
        $product = $this->findModelBySlug($slug);        
        $visisted = new ProductVisit();
        if ($visisted->isNewVisit($product->id)) {
            $product->updateCounters(['view_count' => 1]);
        }
        $popularProducts = Product::getDb()->cache(function() {
            return Product::find()->active()->orderPopular()->limit(10)->all();
        }, Product::getCacheDuration(), Product::getCacheDependency());

        return $this->render('view', [
            'product' => $product,
            'popularProducts' => $popularProducts,
            'lead' => $lead,
        ]);
    }

    public function actionSearchParams()
    {
        if (Yii::$app->request->isAjax) {
            $searchModel = new ProductSearch();
            $queryParams = Yii::$app->request->queryParams;
            $searchParamsArray = [];
            if(isset($queryParams) && !empty($queryParams)):
                foreach($queryParams as $attribute => $value):
                    if ($searchModel->isAttributeExists($attribute)):
                        $searchParamsArray[$attribute]['name'] = $searchModel->getAttributeLabel($attribute);
                        if (is_array($value)) {
                            $searchParamsArray[$attribute]['value'] = count($value);
                            $searchParamsArray[$attribute]['attribute'] = $attribute . '[]';
                        } 
                        else {
                            $searchParamsArray[$attribute]['value'] = 1;
                            $searchParamsArray[$attribute]['attribute'] = $attribute;
                        }
                    endif; 
                endforeach;
            endif;
            echo Json::encode($searchParamsArray);
        }
        Yii::$app->end();
    }

    protected function findModelBySlug($slug)
    {
        $model = Product::getDb()->cache(function() use ($slug) {
            return Product::findOne(['slug' => $slug]);
        }, Product::getCacheDuration(), Product::getCacheDependency());
        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    protected function processPageRequest($param='page')
    {
        if (Yii::$app->request->isAjax && isset($_POST[$param]))
            $_GET[$param] = Yii::$app->request->post($param);
    }
}
