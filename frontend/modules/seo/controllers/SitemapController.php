<?php

namespace frontend\modules\seo\controllers;

use frontend\controllers\BaseController;
use frontend\modules\catalog\models\Product;
use Yii;
use yii\web\Response;
use yii2tech\sitemap\File;

// TODO crete sitemap rules
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
            $sitemap->writeUrl(['catalog'], ['priority' => '0.9']);

            $products = Product::getDb()->cache(function() {
                return Product::find()->active()->all();
            });
            foreach ($products as $product) {
                $sitemap->writeUrl(['catalog/' . $product->slug], ['priority' => '0.9']);
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