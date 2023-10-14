<?php

namespace frontend\modules\seo\models\query;

use common\models\Status;
use frontend\modules\seo\models\Script;

/**
 * This is the ActiveQuery class for [[Script]].
 *
 * @see Script
 */
class ScriptQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere([Script::tableName() . '.status' => Status::STATUS_ACTIVE]);
    }

    public function beforeEndHead()
    {
        return $this->andWhere([Script::tableName() . '.position' => Script::BEFORE_END_HEAD]);
    }
    
    public function afterBeginBody()
    {
        return $this->andWhere([Script::tableName() . '.position' => Script::AFTER_BEGIN_BODY]);
    }
    
    public function beforeEndBody()
    {
        return $this->andWhere([Script::tableName() . '.position' => Script::BEFORE_END_BODY]);
    }

    /**
     * {@inheritdoc}
     * @return Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
