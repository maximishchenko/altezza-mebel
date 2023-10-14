<?php

namespace frontend\controllers;

use common\models\Status;
use frontend\modules\seo\models\Redirect;
use Yii;
use yii\web\Controller;

class BaseController extends Controller
{
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    
    public function beforeAction($action)
    {
        $this->setUrlRedirect();
        return parent::beforeAction($action);
    }

    protected function processPageRequest($param='page')
    {
        if (Yii::$app->request->isAjax && isset($_POST[$param]))
            $_GET[$param] = Yii::$app->request->post($param);
    }

    /**
     * Установка редиректа при наличии
     *
     * @return void
     */
    protected function setUrlRedirect()
    {
        $redirect = Redirect::find()
            ->select(['source_url', 'destination_url', 'redirect_code', 'status'])
            ->where([
                'status' => Status::STATUS_ACTIVE,
                'source_url' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
            ])
            ->one();
            
        if (isset($redirect) && !empty($redirect)) {
            $headers = Yii::$app->getResponse()->getHeaders();
            $headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
            $headers->set('Expires', 'Sat, 26 Jul 1997 05:00:00 GMT');
            $dst = Yii::$app->request->hostInfo . $redirect->destination_url;
            if ($redirect->redirect_code == Redirect::CODE_302) {
                return Yii::$app->response->redirect($dst)->send();
            } else {
                return Yii::$app->response->redirect($dst, Redirect::CODE_301)->send();
            }
            Yii::$app->end();
        }
    }
}