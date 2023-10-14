<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyTableTopFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyTableTop';
    public $dataFile = __DIR__ . '/data/catalog/property-table-top.php';
}