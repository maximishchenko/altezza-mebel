<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class ProductFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\Product';
    public $dataFile = __DIR__ . '/data/catalog/product.php';
}