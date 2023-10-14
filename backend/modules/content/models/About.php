<?php

namespace backend\modules\content\models;

use backend\modules\content\models\query\AboutQuery;
use backend\traits\fileTrait;
use common\models\Sort;
use common\models\Status;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%about}}".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $image
 * @property string|null $comment
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class About extends \yii\db\ActiveRecord
{
    use fileTrait;


    const UPLOAD_PATH = 'upload/about/';

    public $imageFile;

    public static function tableName()
    {
        return '{{%about}}';
    }

    public function behaviors()
    {
        return[
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => function () {
                    return date('U');
                },
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }  

    public function rules()
    {
        return [
            [['description', 'comment'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['link'], 'url'],
            [['title', 'description'], 'required'],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],
            [['imageFile'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp'],
            
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'link' => Yii::t('app', 'Link'),
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

    public function attributeHints()
    {
        return [
            'description' => Yii::t('app', 'Text description'),
            'comment' => Yii::t('app', 'Text description. Service'),
        ];
    }

    public static function find()
    {
        return new AboutQuery(get_called_class());
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->uploadFile('imageFile', 'image', self::UPLOAD_PATH);
            return true;
        }
        return false;
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $this->deleteSingleFile('image', self::UPLOAD_PATH);
            return true;
        } else {
            return false;
        }
    }
}
