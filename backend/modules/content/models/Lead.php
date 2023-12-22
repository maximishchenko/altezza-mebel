<?php

declare(strict_types=1);

namespace backend\modules\content\models;

use backend\modules\content\models\query\LeadQuery;
use common\jobs\SendToEmailJob;
use common\jobs\SendToTelegramJob;
use yii\db\ActiveRecord;
use Yii;

class Lead extends ActiveRecord
{
    
    public static function tableName(): string
    {
        return '{{%lead}}';
    }

    public function rules(): array
    {
        return [
            [['name', 'phone'], 'required'],
            [['body'], 'string'],
            [['created_at'], 'integer'],
            [['name', 'phone', 'email', 'subject'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Client Name'),
            'phone' => Yii::t('app', 'Phone'),
            'email' => Yii::t('app', 'Email'),
            'subject' => Yii::t('app', 'Subject'),
            'body' => Yii::t('app', 'Body'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }

    public static function find(): LeadQuery
    {
        return new LeadQuery(get_called_class());
    }

    public function afterSave($insert, $changedAttributes): bool
    {
        $this->callbackToEmail();
        $this->callbackToTelegram();
        parent::afterSave($insert, $changedAttributes);
    }

    protected function callbackToTelegram(): void
    {
        try {
            $chat_ids = explode(',', Yii::$app->configManager->getItemValue('reportTelegramChatID'));
            if (isset($chat_ids) && !empty($chat_ids) && is_array($chat_ids)) {
                $message = $this->generateMessageText();
                
                Yii::$app->queue->push(new SendToTelegramJob([
                    'chat_ids' => $chat_ids,
                    'message' => $message
                ]));
            } else {
                Yii::error(Yii::t('app', "Telegram Chat ID is not set"));
            }
        } catch (\Exception $e) {
            Yii::debug($e->getMessage());
        }
    }

    protected function callbackToEmail(): void
    {
        try {
            $emails = explode(',', Yii::$app->configManager->getItemValue('reportEmail'));

            if (isset($emails) && !empty($emails) && is_array($emails)) {
                $message = $this->generateMessageText();
                
                Yii::$app->queue->push(new SendToEmailJob([
                    'emails' => $emails,
                    'body' => $message,
                    'subject' => $this->subject,
                ]));
            } else {
                Yii::error(Yii::t('app', "Incorrect report Emails"));
            }
        } catch (\Exception $e) {
            Yii::debug($e->getMessage());
        }
    }

    protected function generateMessageText(): string
    {        
        $message = Yii::t('app', 'ContactName {name}', ['name' => $this->name]) . PHP_EOL;
        $message .= Yii::t('app', 'ContactPhone {phone}', ['phone' => $this->phone]) . PHP_EOL;
        $message .= Yii::t('app', 'ContactBody {body}', ['body' => $this->body]) . PHP_EOL;
        return $message;
    }
}
