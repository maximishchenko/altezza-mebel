<?php

namespace frontend\modules\content\models\query;

use common\models\Status;
use backend\modules\content\models\query\QuestionQuery as backendQuestionQuery;

class QuestionQuery extends backendQuestionQuery
{
    public function active()
    {
        return $this->andWhere(['status' => Status::STATUS_ACTIVE]);
    }

    public function ordered()
    {
        return $this->orderBy(['sort' => SORT_DESC]);
    }
}
