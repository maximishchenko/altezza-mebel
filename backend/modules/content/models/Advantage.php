<?php

declare(strict_types=1);

namespace backend\modules\content\models;

use backend\models\BaseModel;
use common\models\Sort;
use common\models\Status;
use backend\modules\content\models\query\AdvantageQuery;
use backend\traits\fileTrait;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "advantage".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string|null $image
 * @property string|null $comment
 * @property string|null $callback_button_text
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Advantage extends BaseModel
{
    use fileTrait;

    const UPLOAD_PATH = 'upload/advantage/';

    public UploadedFile | string | null $imageFile = null;


    public static function tableName(): string
    {
        return '{{%advantage}}';
    }

    public function rules(): array
    {
        return [
            [['title', 'description'], 'required'],
            [['title'], 'unique'],
            [['description', 'comment', 'callback_button_text'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],
            [['imageFile'], 'safe'],

        ];
    }

    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'callback_button_text' => Yii::t('app', 'Callback Button Text'),
            'image' => Yii::t('app', 'Image'),
            'imageFile' => Yii::t('app', 'Image'),
            'comment' => Yii::t('app', 'Comment'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public static function find(): AdvantageQuery
    {
        return new AdvantageQuery(get_called_class());
    }

    public function beforeSave($insert): bool
    {
        if (parent::beforeSave($insert)) {
            $this->uploadFile('imageFile', 'image', self::UPLOAD_PATH);
            return true;
        }
        return false;
    }

    public function beforeDelete(): bool
    {
        if (parent::beforeDelete()) {
            $this->deleteSingleFile('image', self::UPLOAD_PATH);
            return true;
        } else {
            return false;
        }
    }

}
