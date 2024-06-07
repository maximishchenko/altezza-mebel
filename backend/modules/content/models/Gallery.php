<?php

namespace backend\modules\content\models;

use backend\models\BaseModel;
use backend\traits\fileTrait;
use common\models\Sort;
use common\models\Status;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%gallery}}".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property GalleryImage[] $galleryImages
 */
class Gallery extends BaseModel
{
    use fileTrait;

    const UPLOAD_PATH = 'upload/gallery/';

    public UploadedFile | string | null $imageFile = null;

    public $imagesFiles = null;

    public static function tableName()
    {
        return '{{%gallery}}';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],
            [['name'], 'unique'],
            [['imageFile'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'image' => Yii::t('app', 'Image'),
            'imageFile' => Yii::t('app', 'Image'),
            'imagesFiles' => Yii::t('app', 'Image'),
            'sort' => Yii::t('app', 'Sort'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    public function getImages()
    {
        return $this->hasMany(GalleryImage::class, ['gallery_id' => 'id'])->orderBy([GalleryImage::tableName().'.sort' => SORT_ASC]);
    }

    public static function find()
    {
        return new \backend\modules\content\models\query\GalleryQuery(get_called_class());
    }

    public function beforeSave($insert): bool
    {
        if (parent::beforeSave($insert)) {
            $this->uploadFile('imageFile', 'image', self::UPLOAD_PATH);
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes): void
    {
        $this->setImageAttributes();
        parent::afterSave($insert, $changedAttributes);
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
    
    private function setImageAttributes(): void
    {
        $this->imagesFiles = UploadedFile::getInstances($this, 'imagesFiles');
        if(isset($this->imagesFiles) && !empty($this->imagesFiles))
        {
            foreach ($this->imagesFiles as $key=>$img) {
                $imageModel = new GalleryImage();
                $imageModel->imageFile = $img;
                $imageModel->gallery_id = $this->id;
                $imageModel->sort = $key;
                $imageModel->save();
            }
        }
    }
}
