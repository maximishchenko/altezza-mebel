<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyFasadCoatingFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyFasadCoating';
    public $dataFile = __DIR__ . '/data/catalog/property-fasad-coating.php';
}