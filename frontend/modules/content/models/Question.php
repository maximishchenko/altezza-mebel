<?php
namespace frontend\modules\content\models;

use backend\modules\content\models\Question as backendQuestion;
use frontend\interfaces\CacheInterface;
use frontend\modules\content\models\query\QuestionQuery;
use Yii;

class Question extends backendQuestion implements CacheInterface
{
    public static function find()
    {
        return new QuestionQuery(get_called_class());
    }

    public static function getCacheDependency(): \yii\caching\Dependency
    {
        return new \yii\caching\DbDependency([
            'sql' => "SELECT MAX(updated_at) FROM {{%question}}"
        ]);
    }

    public static function getCacheDuration(): int
    {
        return Yii::$app->cache->defaultDuration;
    }
}