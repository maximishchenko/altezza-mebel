<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyStyleFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyStyle';
    public $dataFile = __DIR__ . '/data/catalog/property-style.php';
}