<?php

declare(strict_types=1);

namespace frontend\modules\content\models;

use backend\modules\content\models\Advantage as backendAdvantage;
use frontend\modules\content\models\query\AdvantageQuery;
use frontend\interfaces\ImageInterface;
use frontend\traits\cacheParamsTrait;
use Yii;

class Advantage extends backendAdvantage implements ImageInterface
{
    use cacheParamsTrait;
    
    public static function find(): AdvantageQuery
    {
        return new AdvantageQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return ($this->image) ? '/' . static::UPLOAD_PATH . $this->image : null;
    }

    public function getCallbackButtonText()
    {
        return (isset($this->callback_button_text) && !empty($this->callback_button_text)) ? $this->callback_button_text : Yii::t('app', 'Send Callback Request a call');
    }
}