<?php

namespace backend\modules\content\models;

use backend\traits\fileTrait;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%gallery_image}}".
 *
 * @property int $id
 * @property int|null $gallery_id
 * @property string|null $image
 * @property int|null $sort
 *
 * @property Gallery $gallery
 */
class GalleryImage extends \yii\db\ActiveRecord
{
    use fileTrait;

    public ?UploadedFile $imageFile = null;

    public static function tableName()
    {
        return '{{%gallery_image}}';
    }

    public function rules()
    {
        return [
            [['gallery_id', 'sort'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['gallery_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gallery::class, 'targetAttribute' => ['gallery_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'gallery_id' => Yii::t('app', 'Gallery ID'),
            'image' => Yii::t('app', 'Image'),
            'sort' => Yii::t('app', 'Sort'),
        ];
    }

    public function getGallery()
    {
        return $this->hasOne(Gallery::class, ['id' => 'gallery_id']);
    }

    public static function find()
    {
        return new \backend\modules\content\models\query\GalleryImageQuery(get_called_class());
    }

    public function getThumb()
    {
        if (isset($this->image) && !empty($this->image)) {
            return "/" . Gallery::UPLOAD_PATH . $this->image;
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->uploadFile("imageFile", "image", Gallery::UPLOAD_PATH, true);
            return true;
        }
        return false;
    }

    public function beforeDelete()
    {

        if (parent::beforeDelete()) {
            $this->deleteSingleFile('image', Gallery::UPLOAD_PATH);
            return true;
        } else {
            return false;
        }
    }
}
