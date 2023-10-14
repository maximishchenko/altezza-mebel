<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyBodyMaterialFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyBodyMaterial';
    public $dataFile = __DIR__ . '/data/catalog/property-body-material.php';
}