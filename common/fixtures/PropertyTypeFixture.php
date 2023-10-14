<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyTypeFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyType';
    public $dataFile = __DIR__ . '/data/catalog/property-type.php';
}