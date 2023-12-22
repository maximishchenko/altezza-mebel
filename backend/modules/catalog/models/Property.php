<?php

namespace backend\modules\catalog\models;

use backend\models\BaseModel;
use backend\modules\catalog\models\query\PropertyQuery;
use common\models\Sort;
use common\models\Status;
use Yii;
use yii\behaviors\SluggableBehavior;
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
class Property extends BaseModel
{
    public static function tableName(): string
    {
        return '{{%property}}';
    }

    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(),
            [
                [
                    'class' => SluggableBehavior::className(),
                    'attribute' => ['name'],
                    'slugAttribute' => 'slug',
                    'immutable' => true,
                    'ensureUnique'=>true,
                ]
            ]);
    }
    
    public function rules(): array
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

    public function attributeLabels(): array
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

    public function attributeHints(): array
    {
        return [
            'slug' => Yii::t('app', 'Auto-generated field. Service. Editable'),
            'comment' => Yii::t('app', 'Text description. Service'),
        ];
    }

    public static function find(): PropertyQuery
    {
        return new PropertyQuery(get_called_class());
    }
}
