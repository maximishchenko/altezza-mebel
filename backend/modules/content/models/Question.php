<?php

declare(strict_types=1);

namespace backend\modules\content\models;

use backend\models\BaseModel;
use Yii;
use backend\modules\content\models\query\QuestionQuery;
use common\models\Sort;
use common\models\Status;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property string|null $comment
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Question extends BaseModel
{

    public static function tableName(): string
    {
        return '{{%question}}';
    }

    public function rules(): array
    {
        return [
            [['question', 'answer'], 'required'],
            [['answer', 'comment'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['question'], 'string', 'max' => 255],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'question' => Yii::t('app', 'Question'),
            'answer' => Yii::t('app', 'Answer'),
            'comment' => Yii::t('app', 'Comment'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public static function find(): QuestionQuery
    {
        return new QuestionQuery(get_called_class());
    }
}
