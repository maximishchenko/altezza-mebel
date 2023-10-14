<?php
namespace common\fixtures;

use yii\test\ActiveFixture;

class QuestionFixture extends ActiveFixture
{
    public $modelClass = 'backend\modules\content\models\Question';
    public $dataFile = __DIR__ . '/data/content/question.php';
}