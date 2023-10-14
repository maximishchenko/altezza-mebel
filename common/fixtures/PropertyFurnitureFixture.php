<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyFurnitureFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyFurniture';
    public $dataFile = __DIR__ . '/data/catalog/property-furniture.php';
}