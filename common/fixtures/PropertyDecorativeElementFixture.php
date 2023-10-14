<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class PropertyDecorativeElementFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\PropertyDecorativeElement';
    public $dataFile = __DIR__ . '/data/catalog/property-decorative-element.php';
}