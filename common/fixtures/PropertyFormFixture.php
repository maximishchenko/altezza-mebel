<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyFormFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyForm';
    public $dataFile = __DIR__ . '/data/catalog/property-form.php';
}