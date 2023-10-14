<?php

namespace backend\modules\catalog\models;

use Yii;
use backend\modules\catalog\models\query\ProductElementQuery;
use common\models\Sort;

/**
 * This is the model class for table "{{%product_element}}".
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $name
 * @property int|null $x_pos
 * @property int|null $y_pos
 * @property string|null $comment
 * @property int $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property Product $product
 */
class ProductElement extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%product_element}}';
    }

    public function rules()
    {
        return [
            [['product_id', 'x_pos', 'y_pos', 'sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['comment'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],

            [['name', 'x_pos', 'y_pos'], 'required'],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'name' => Yii::t('app', 'Name'),
            'x_pos' => Yii::t('app', 'X Pos'),
            'y_pos' => Yii::t('app', 'Y Pos'),
            'comment' => Yii::t('app', 'Comment'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public static function find()
    {
        return new ProductElementQuery(get_called_class());
    }
}
