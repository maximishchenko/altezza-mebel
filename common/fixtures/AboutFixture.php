<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class AboutFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\content\models\About';
    public $dataFile = __DIR__ . '/data/content/about.php';
}