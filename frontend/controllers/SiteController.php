<?php

namespace frontend\controllers;

use frontend\modules\catalog\models\Product;
use frontend\modules\content\models\About;
use frontend\modules\content\models\Advantage;
use frontend\modules\content\models\Lead;
use frontend\modules\content\models\Slider;
use Yii;

class SiteController extends BaseController
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
        $advantages = Advantage::getDb()->cache(function() {
            return Advantage::find()->active()->ordered()->all();
        });
        $sliders = Slider::getDb()->cache(function() {
            return Slider::find()->active()->ordered()->all();
        });
        $about = About::getDb()->cache(function() {
            return About::find()->active()->ordered()->one();
        });
        $newProducts = Product::getDb()->cache(function() {
            return Product::find()->active()->onlyNew()->limit(Product::NEW_LIMIT)->all();
        });
        
        return $this->render('index', [
            'advantages' => $advantages,
            'sliders' => $sliders,
            'about' => $about,
            'newProducts' => $newProducts,
        ]);
    }
    
    public function actionPolicy()
    {
        return $this->render('policy');
    }
    
    public function actionAbout()
    {
        $abouts = About::getDb()->cache(function() {
            return About::find()->active()->ordered()->all();
        });
        return $this->render('about', [
            'abouts' => $abouts,
        ]);
    }
    
    public function actionCollaboration()
    {
        return $this->render('collaboration');
    }
    
    public function actionFeedback()
    {
        $lead = new Lead();
        if (Yii::$app->request->isAjax) {
            if ($lead->load($this->request->post()) && $lead->save()) {
                echo "success";
            } else {
                foreach ($lead->getErrors() as $key => $value) {
                  echo $key.': '.$value[0];
                }
                echo "error";
            }
        }
        else {
            echo "not ajax request";
        }
        exit(1);
    }
    
    public function actionOffline($name, $message)
    {
        $this->layout = false;
        return $this->render('error', ['name' => $name, 'message' => $message]);
    }
}
