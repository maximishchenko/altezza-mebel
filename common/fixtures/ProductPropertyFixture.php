<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class ProductPropertyFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\catalog\models\ProductProperty';
    public $dataFile = __DIR__ . '/data/catalog/product-property.php';

    public $depends = [
        'common\fixtures\ProductFixture',
        'common\fixtures\PropertyApplianceFixture',
        'common\fixtures\PropertyBacklightFixture',
        'common\fixtures\PropertyBodyMaterialFixture',
        'common\fixtures\PropertyDecorativeElementFixture',
        'common\fixtures\PropertyFasadCoatingFixture',
        'common\fixtures\PropertyFasadMaterialFixture',
        'common\fixtures\PropertyFormFixture',
        'common\fixtures\PropertyFurnitureFixture',
        'common\fixtures\PropertyStyleFixture',
        'common\fixtures\PropertyTableTopFixture',
        'common\fixtures\PropertyTypeFixture',
    ];
}