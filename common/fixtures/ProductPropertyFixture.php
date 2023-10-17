<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class ProductPropertyFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\ProductProperty';
    public $dataFile = __DIR__ . '/data/catalog/product-property.php';

    public $depends = [
        'common\fixtures\ProductFixture',
    ];
}