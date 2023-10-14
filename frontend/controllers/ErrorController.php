<?php

namespace frontend\controllers;

use Yii;
use frontend\controllers\BaseController;

class ErrorController extends BaseController
{

    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    public function actionIndex()
    {
        $error = Yii::$app->response->statusCode;
        if ($error === 404) {
            return $this->render('page-not-found');
        }
    }

    public function actionPageNotFound()
    {
        return $this->render('page-not-found');
    }

}
