<?php

namespace frontend\modules\seo\models\query;

use common\models\Status;
use frontend\modules\seo\models\Script;
use backend\modules\seo\models\query\ScriptQuery as backendScriptQuery;
use yii\db\Query;

class ScriptQuery extends backendScriptQuery
{
    public function active(): Query
    {
        return $this->andWhere([Script::tableName() . '.status' => Status::STATUS_ACTIVE]);
    }

    public function beforeEndHead(): Query
    {
        return $this->andWhere([Script::tableName() . '.position' => Script::BEFORE_END_HEAD]);
    }
    
    public function afterBeginBody(): Query
    {
        return $this->andWhere([Script::tableName() . '.position' => Script::AFTER_BEGIN_BODY]);
    }
    
    public function beforeEndBody(): Query
    {
        return $this->andWhere([Script::tableName() . '.position' => Script::BEFORE_END_BODY]);
    }
}
