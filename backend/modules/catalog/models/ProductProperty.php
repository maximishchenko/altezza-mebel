<?php

declare(strict_types=1);

namespace backend\modules\catalog\models;

use Yii;
use backend\modules\catalog\models\query\ProductPropertyQuery;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%product_property}}".
 *
 * @property int $product_id
 * @property int $property_id
 * @property string|null $property_type
 *
 * @property Product $product
 * @property Property $property
 */
class ProductProperty extends \yii\db\ActiveRecord
{
    public static function tableName(): string
    {
        return '{{%product_property}}';
    }

    public function rules(): array
    {
        return [
            [['product_id', 'property_id'], 'required'],
            [['product_id', 'property_id'], 'integer'],
            [['property_type'], 'string', 'max' => 255],
            [['product_id', 'property_id'], 'unique', 'targetAttribute' => ['product_id', 'property_id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => Property::class, 'targetAttribute' => ['property_id' => 'id']],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'property_id' => Yii::t('app', 'Property ID'),
            'property_type' => Yii::t('app', 'Property Type'),
        ];
    }

    public function getProduct(): ActiveQuery
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getProperty(): ActiveQuery
    {
        return $this->hasOne(Property::class, ['id' => 'property_id']);
    }

    public static function find(): ProductPropertyQuery
    {
        return new ProductPropertyQuery(get_called_class());
    }
}
