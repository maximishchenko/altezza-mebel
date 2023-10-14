<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class AdvantageFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\content\models\Advantage';
    public $dataFile = __DIR__ . '/data/content/advantage.php';
}