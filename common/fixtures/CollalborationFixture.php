<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class CollalborationFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\content\models\Collaboration';
    public $dataFile = __DIR__ . '/data/content/collaboration.php';
}