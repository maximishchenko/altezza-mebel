<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class SliderFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\content\models\Slider';
    public $dataFile = __DIR__ . '/data/content/slider.php';
}