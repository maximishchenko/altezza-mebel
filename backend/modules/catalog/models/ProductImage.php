<?php

namespace backend\modules\catalog\models;

use backend\models\BaseModel;
use backend\modules\catalog\models\query\ProductImageQuery;
use backend\traits\fileTrait;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%product_image}}".
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $image
 * @property int|null $sort
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property-read void|string $thumb
 * @property Product $product
 */
class ProductImage extends BaseModel
{
    use fileTrait;

    const UPLOAD_PATH = 'upload/product_image/';

    public ?UploadedFile $imageFile = null;
    
    public static function tableName()
    {
        return '{{%product_image}}';
    }

    public function rules()
    {
        return [
            [['product_id', 'sort', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
            [['imageFile'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'image' => Yii::t('app', 'Image'),
            'sort' => Yii::t('app', 'Sort'),
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
        return new ProductImageQuery(get_called_class());
    }

    public function getThumb()
    {
        if (isset($this->image) && !empty($this->image)) {
            return "/" . self::UPLOAD_PATH . $this->image;
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->uploadFile("imageFile", "image", self::UPLOAD_PATH, true);
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
