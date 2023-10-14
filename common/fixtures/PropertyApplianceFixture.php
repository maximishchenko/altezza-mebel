<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyApplianceFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyAppliance';
    public $dataFile = __DIR__ . '/data/catalog/property-appliance.php';
}