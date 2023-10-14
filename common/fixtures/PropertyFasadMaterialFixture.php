<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyFasadMaterialFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyFasadMaterial';
    public $dataFile = __DIR__ . '/data/catalog/property-fasad-material.php';
}