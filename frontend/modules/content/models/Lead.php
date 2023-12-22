<?php

declare(strict_types=1);

namespace frontend\modules\content\models;

use backend\modules\content\models\Lead as backendLead;
use yii\behaviors\TimestampBehavior;

class Lead extends backendLead
{
    const FEEDBACK_CONTACT_FORM_SUBJECT = 'Сообщение формы обратной связи';

    public function behaviors(): array
    {
        return[
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => false,
                'value' => function () {
                    return date('U');
                },
            ],
        ];
    }  
}