<?php

namespace frontend\modules\seo\controllers;

use backend\modules\catalog\models\abs\Product;
use backend\modules\catalog\models\CoatingColor;
use common\models\Core;
use frontend\controllers\BaseController;
use frontend\modules\catalog\models\Coating;
use frontend\modules\catalog\models\Milling;
use frontend\modules\catalog\models\ProductType;
use frontend\modules\catalog\models\Solution;
use frontend\modules\content\models\SpecialOffer;
use Yii;
use yii\web\Response;
use yii2tech\sitemap\File;


class SitemapController extends BaseController
{
    public function actionIndex()
    {
        // get content from cache:
        $content = Yii::$app->cache->get('sitemap.xml');
        if ($content === false) {
            // if no cached value exists - create an new one
            // create sitemap file in memory:
            $sitemap = new File();
            $sitemap->fileName = 'php://memory';

                    
            // write your site URLs:
            $sitemap->writeUrl(['site/index'], ['priority' => '0.9']);

            $sitemap->writeUrl(['about'], ['priority' => '0.9']);
            $sitemap->writeUrl(['news'], ['priority' => '0.9']);
            $sitemap->writeUrl(['special-offers'], ['priority' => '0.9']);
            
            $sitemap->writeUrl(['catalog'], ['priority' => '0.9']);
            $sitemap->writeUrl(['catalog/solution'], ['priority' => '0.9']);
            $sitemap->writeUrl(['catalog/milling'], ['priority' => '0.9']);
            $sitemap->writeUrl(['catalog/coating'], ['priority' => '0.9']);
            $sitemap->writeUrl(['catalog/color'], ['priority' => '0.9']);
            $sitemap->writeUrl(['catalog/end-type'], ['priority' => '0.9']);
            $sitemap->writeUrl(['catalog/patina'], ['priority' => '0.9']);
            $sitemap->writeUrl(['catalog/product-type'], ['priority' => '0.9']);
            // $sitemap->writeUrl(['catalog/decor'], ['priority' => '0.9']);

            $offers = SpecialOffer::find()->where([
                'status' => Core::STATUS_ACTIVE
            ])->all();
            foreach ($offers as $offer) {
                $sitemap->writeUrl(['special-offers/' . $offer->slug], ['priority' => '0.9']);
            }


            $solutions = Solution::find()->where([
                        'status' => Core::STATUS_ACTIVE
                    ])->all();
            foreach ($solutions as $solution) {
                $sitemap->writeUrl(['catalog/solution/' . $solution->slug], ['priority' => '0.9']);
            }

            $product_types = ProductType::find()->where([
                    'status' => Core::STATUS_ACTIVE,
                    'product_type' => Product::TYPE_PRODUCT_TYPE
                ])->with('category')->all();
            foreach ($product_types as $product_type) {
                $sitemap->writeUrl(['catalog/product-type/' . $product_type->category->slug], ['priority' => '0.9']);
                $sitemap->writeUrl(['catalog/product-type/' . $product_type->category->slug . "/" . $product_type->slug], ['priority' => '0.9']);
            }

            $millings = Milling::find()->where([
                    'status' => Core::STATUS_ACTIVE,
                    'product_type' => Product::TYPE_MILLING
                ])->with('category')->all();
            foreach ($millings as $milling) {
                $sitemap->writeUrl(['catalog/milling/' . $milling->category->slug], ['priority' => '0.9']);
                $sitemap->writeUrl(['catalog/milling/' . $milling->category->slug . "/" . $milling->slug], ['priority' => '0.9']);
            }
            $coatings = Coating::find()->where([
                    'status' => Core::STATUS_ACTIVE,
                    'product_type' => Product::TYPE_COATING
                ])->with('category')->all();
            foreach ($coatings as $coating) {
                $sitemap->writeUrl(['catalog/coating/' . $coating->category->slug], ['priority' => '0.9']);
                $sitemap->writeUrl(['catalog/coating/' . $coating->category->slug . "/" . $coating->slug], ['priority' => '0.9']);
            }
            
            $colors = CoatingColor::find()->where([
                    'status' => Core::STATUS_ACTIVE,
                    'product_type' => Product::TYPE_COLOR
                ])->with('category')->all();
            foreach ($colors as $color) {
                $sitemap->writeUrl(['catalog/color/' . $color->category->slug], ['priority' => '0.9']);
                $sitemap->writeUrl(['catalog/color/' . $color->category->slug . "/" . $color->slug], ['priority' => '0.9']);
            }
            
            // get generated content:
            $content = $sitemap->getContent();
        
            // save generated content to cache
            Yii::$app->cache->set('sitemap.xml', $content);
        }
        
        // send sitemap content to the user agent:
        $response = Yii::$app->getResponse();
        $response->format = Response::FORMAT_RAW;
        $response->getHeaders()->add('Content-Type', 'application/xml;');
        $response->content = $content;
                
        return $response;
    }
}