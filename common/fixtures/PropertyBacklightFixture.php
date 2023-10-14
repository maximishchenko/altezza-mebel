<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyBacklightFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyBacklight';
    public $dataFile = __DIR__ . '/data/catalog/property-backlight.php';
}