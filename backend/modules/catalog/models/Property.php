<?php

namespace backend\modules\catalog\models;

use backend\modules\catalog\models\query\PropertyQuery;
use common\models\Sort;
use common\models\Status;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%property}}".
 *
 * @property int $id
 * @property string $property_type
 * @property string $name
 * @property string|null $comment
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Property extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%property}}';
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
            [
                'class' => SluggableBehavior::className(),
                'attribute' => ['name'],
                'slugAttribute' => 'slug',
                'immutable' => true,
                'ensureUnique'=>true,
            ],

        ];
    }  
    
    public function rules()
    {
        return [
            [['property_type', 'name'], 'required'],
            [['comment'], 'string'],
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['property_type', 'name', 'slug'], 'string', 'max' => 255],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'property_type' => Yii::t('app', 'Property Type'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
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
            'slug' => Yii::t('app', 'Auto-generated field. Service. Editable'),
            'comment' => Yii::t('app', 'Text description. Service'),
        ];
    }

    public static function find()
    {
        return new PropertyQuery(get_called_class());
    }
}
