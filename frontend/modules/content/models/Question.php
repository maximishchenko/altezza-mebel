<?php

declare(strict_types=1);

namespace frontend\modules\content\models;

use backend\modules\content\models\Question as backendQuestion;
use frontend\modules\content\models\query\QuestionQuery;
use frontend\traits\cacheParamsTrait;

class Question extends backendQuestion
{

    use cacheParamsTrait;

    public static function find(): QuestionQuery
    {
        return new QuestionQuery(get_called_class());
    }
}