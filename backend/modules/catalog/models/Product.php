<?php

namespace backend\modules\catalog\models;

use Yii;
use backend\modules\catalog\models\query\ProductQuery;
use backend\traits\fileTrait;
use common\models\Sort;
use common\models\Status;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property int|null $type_id
 * @property int|null $form_id
 * @property int|null $style_id
 * @property int|null $appliance_id
 * @property string $name
 * @property string|null $image
 * @property string|null $description
 * @property string|null $comment
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Product extends \yii\db\ActiveRecord
{
    use fileTrait;

    const UPLOAD_PATH = 'upload/product/';

    public $imageFile;

    public $imagesFiles;

    protected $fasadMaterialsArray;

    protected $fasadCoatingsArray;

    protected $decorativeElementsArray;

    protected $bodyMaterialsArray;

    protected $furnituresArray;

    protected $backlightsArray;

    protected $tableTopsArray;
    
    public static function tableName()
    {
        return '{{%product}}';
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
            [['type_id', 'form_id', 'appliance_id', 'style_id', 'sort', 'status', 'is_new', 'created_at', 'updated_at', 'created_by', 'updated_by', 'view_count'], 'integer'],
            [['name'], 'required'],
            [['description', 'comment'], 'string'],
            [['name', 'image', 'slug'], 'string', 'max' => 255],

            [['name'], 'unique'],
            [['name', 'type_id', 'form_id', 'appliance_id', 'style_id'], 'required'],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['view_count', 'default', 'value' => 1],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],

            [['fasadMaterialsArray', 'fasadCoatingsArray', 'decorativeElementsArray', 'bodyMaterialsArray', 'furnituresArray', 'backlightsArray', 'imageFile'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp'],
            [['imagesFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp', 'maxFiles' => 5],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type_id' => Yii::t('app', 'Product Type ID'),
            'form_id' => Yii::t('app', 'Product Form ID'),
            'style_id' => Yii::t('app', 'Product Style ID'),
            'coatingId' => Yii::t('app', 'Coating Id'),
            'appliance_id' => Yii::t('app', 'Product Appliance ID'),
            'name' => Yii::t('app', 'Name'),
            'slug' => Yii::t('app', 'Slug'),
            'is_new' => Yii::t('app', 'Is New'),
            'view_count' => Yii::t('app', 'View Count'),
            'image' => Yii::t('app', 'Image'),
            'imageFile' => Yii::t('app', 'Image'),            
            'imagesFiles' => Yii::t('app', 'Images Files'),
            'fasadMaterialsArray' => Yii::t('app', 'Product Fasad Materials'),
            'fasadCoatingsArray' => Yii::t('app', 'Product Fasad Coatings'),
            'decorativeElementsArray' => Yii::t('app', 'Product Decorative Elements'),
            'bodyMaterialsArray' => Yii::t('app', 'Product Body Materials'),
            'furnituresArray' => Yii::t('app', 'Product Furnitures'),
            'backlightsArray'=> Yii::t('app', 'Product Backlights'),
            'tableTopsArray' => Yii::t('app', 'Product Table Tops'),
            'description' => Yii::t('app', 'Description'),
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
            'view_count' => Yii::t('app', 'Auto-generated field. Service. Editable'),
            'description' => Yii::t('app', 'Text description'),
            'comment' => Yii::t('app', 'Text description. Service'),
        ];
    }

    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
    
    public function getType()
    {
        return $this->hasOne(Property::class, ['id' => 'type_id'])->onCondition([Property::tableName().'.property_type' => PropertyType::TYPE]);
    }
    
    public function getForm()
    {
        return $this->hasOne(Property::class, ['id' => 'form_id'])->onCondition([Property::tableName().'.property_type' => PropertyForm::TYPE]);
    }
    
    public function getStyle()
    {
        return $this->hasOne(Property::class, ['id' => 'style_id'])->onCondition([Property::tableName().'.property_type' => PropertyStyle::TYPE]);
    }
    
    public function getAppliance()
    {
        return $this->hasOne(Property::class, ['id' => 'appliance_id'])->onCondition([Property::tableName().'.property_type' => PropertyAppliance::TYPE]);
    }

    public function getImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id'])->orderBy([ProductImage::tableName().'.sort' => SORT_ASC]);
    }
    
    // Материалы фасадов

    public function getFasadMaterialsCheckboxListItems()
    {
        return PropertyFasadMaterial::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getFasadMaterials()
    {
        return $this->hasMany(PropertyFasadMaterial::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyFasadMaterial::TYPE]);
        });
    }

    public function getFasadMaterialsArray()
    {
        if ($this->fasadMaterialsArray === null) {
            $this->fasadMaterialsArray = $this->getFasadMaterials()->select('id')->column();
        }
        return $this->fasadMaterialsArray;
    }

    public function setFasadMaterialsArray($value)
    {
        $this->fasadMaterialsArray = (array)$value;
    }
    
    // Покрытие фасадов

    public function getFasadCoatingsCheckboxListItems()
    {
        return PropertyFasadCoating::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getFasadCoatings()
    {
        return $this->hasMany(PropertyFasadCoating::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyFasadCoating::TYPE]);
        });
    }

    public function getFasadCoatingsArray()
    {
        if ($this->fasadCoatingsArray === null) {
            $this->fasadCoatingsArray = $this->getFasadCoatings()->select('id')->column();
        }
        return $this->fasadCoatingsArray;
    }

    public function setFasadCoatingsArray($value)
    {
        $this->fasadCoatingsArray = (array)$value;
    }
     
    // Декоративные элементы

    public function getDecorativeElementsCheckboxListItems()
    {
        return PropertyDecorativeElement::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getDecorativeElements()
    {
        return $this->hasMany(PropertyDecorativeElement::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyDecorativeElement::TYPE]);
        });
    }

    public function getDecorativeElementsArray()
    {
        if ($this->decorativeElementsArray === null) {
            $this->decorativeElementsArray = $this->getDecorativeElements()->select('id')->column();
        }
        return $this->decorativeElementsArray;
    }

    public function setDecorativeElementsArray($value)
    {
        $this->decorativeElementsArray = (array)$value;
    }
     
    // Материалы корпуса

    public function getBodyMaterialsCheckboxListItems()
    {
        return PropertyBodyMaterial::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getBodyMaterials()
    {
        return $this->hasMany(PropertyBodyMaterial::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyBodyMaterial::TYPE]);
        });
    }

    public function getBodyMaterialsArray()
    {
        if ($this->bodyMaterialsArray === null) {
            $this->bodyMaterialsArray = $this->getBodyMaterials()->select('id')->column();
        }
        return $this->bodyMaterialsArray;
    }

    public function setBodyMaterialsArray($value)
    {
        $this->bodyMaterialsArray = (array)$value;
    }
     
    // Фурнитура

    public function getFurnituresCheckboxListItems()
    {
        return PropertyFurniture::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getFurnitures()
    {
        return $this->hasMany(PropertyFurniture::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyFurniture::TYPE]);
        });
    }

    public function getFurnituresArray()
    {
        if ($this->furnituresArray === null) {
            $this->furnituresArray = $this->getFurnitures()->select('id')->column();
        }
        return $this->furnituresArray;
    }

    public function setFurnituresArray($value)
    {
        $this->furnituresArray = (array)$value;
    }
     
    // Подсветка

    public function getBacklightsCheckboxListItems()
    {
        return PropertyBacklight::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getBacklights()
    {
        return $this->hasMany(PropertyBacklight::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyBacklight::TYPE]);
        });
    }

    public function getBacklightsArray()
    {
        if ($this->backlightsArray === null) {
            $this->backlightsArray = $this->getBacklights()->select('id')->column();
        }
        return $this->backlightsArray;
    }

    public function setBacklightsArray($value)
    {
        $this->backlightsArray = (array)$value;
    }
     
    // Столешница

    public function getTableTopsCheckboxListItems()
    {
        return PropertyTableTop::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getTableTops()
    {
        return $this->hasMany(PropertyTableTop::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyTableTop::TYPE]);
        });
    }

    public function getTableTopsArray()
    {
        if ($this->tableTopsArray === null) {
            $this->tableTopsArray = $this->getTableTops()->select('id')->column();
        }
        return $this->tableTopsArray;
    }

    public function setTableTopsArray($value)
    {
        $this->tableTopsArray = (array)$value;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->uploadFile('imageFile', 'image', self::UPLOAD_PATH);
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->setImageAttributes();
        $this->updateFasadMaterials();
        $this->updateFasadCoatings();
        $this->updateDecorativeElements();
        $this->updateBodyMaterials();
        $this->updateFurnitures();
        $this->updateBacklights();
        $this->updateTableTops();
        parent::afterSave($insert, $changedAttributes);
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
    
    private function setImageAttributes()
    {
        $this->imagesFiles = UploadedFile::getInstances($this, 'imagesFiles');
        if(isset($this->imagesFiles) && !empty($this->imagesFiles))
        {
            foreach ($this->imagesFiles as $key=>$img) {
                $imageModel = new ProductImage();
                $imageModel->imageFile = $img;
                $imageModel->product_id = $this->id;
                $imageModel->sort = $key;
                $imageModel->save();
            }
        }
    }

    private function updateFasadMaterials()
    {
        $currentFasadMaterialsIds = $this->getFasadMaterials()->select('id')->column();
        $newFasadMaterialsIds = $this->getFasadMaterialsArray();
        if (is_string($newFasadMaterialsIds)) {
            $newFasadMaterialsIds = [];
        }

        if (is_array($newFasadMaterialsIds)) {
            foreach (array_filter(array_diff($newFasadMaterialsIds, $currentFasadMaterialsIds)) as $fasadMaterialId) {
                if ($fasadMaterial = PropertyFasadMaterial::findOne($fasadMaterialId)) {
                    $this->link('fasadMaterials', $fasadMaterial, ['property_type' => PropertyFasadMaterial::TYPE]);
                }
            }
        }

        if (is_array($newFasadMaterialsIds)) {
            foreach (array_filter(array_diff($currentFasadMaterialsIds, $newFasadMaterialsIds)) as $fasadMaterialId) {
                if ($fasadMaterial = PropertyFasadMaterial::findOne($fasadMaterialId)) {
                    $this->unlink('fasadMaterials', $fasadMaterial, true);
                }
            }
        }
    }

    private function updateFasadCoatings()
    {
        $currentFasadCoatingsIds = $this->getFasadCoatings()->select('id')->column();
        $newFasadCoatingsIds = $this->getFasadCoatingsArray();
        if (is_string($newFasadCoatingsIds)) {
            $newFasadCoatingsIds = [];
        }

        if (is_array($newFasadCoatingsIds)) {
            foreach (array_filter(array_diff($newFasadCoatingsIds, $currentFasadCoatingsIds)) as $fasadCoatingId) {
                if ($fasadCoating = PropertyFasadCoating::findOne($fasadCoatingId)) {
                    $this->link('fasadCoatings', $fasadCoating, ['property_type' => PropertyFasadCoating::TYPE]);
                }
            }
        }

        if (is_array($newFasadCoatingsIds)) {
            foreach (array_filter(array_diff($currentFasadCoatingsIds, $newFasadCoatingsIds)) as $fasadCoatingId) {
                if ($fasadCoating = PropertyFasadCoating::findOne($fasadCoatingId)) {
                    $this->unlink('fasadCoatings', $fasadCoating, true);
                }
            }
        }
    }

    private function updateDecorativeElements()
    {
        $currentDecorativeElementsIds = $this->getDecorativeElements()->select('id')->column();
        $newDecorativeElementsIds = $this->getDecorativeElementsArray();
        if (is_string($newDecorativeElementsIds)) {
            $newDecorativeElementsIds = [];
        }

        if (is_array($newDecorativeElementsIds)) {
            foreach (array_filter(array_diff($newDecorativeElementsIds, $currentDecorativeElementsIds)) as $decorativeElementid) {
                if ($decorativeElement = PropertyDecorativeElement::findOne($decorativeElementid)) {
                    $this->link('decorativeElements', $decorativeElement, ['property_type' => PropertyDecorativeElement::TYPE]);
                }
            }
        }

        if (is_array($newDecorativeElementsIds)) {
            foreach (array_filter(array_diff($currentDecorativeElementsIds, $newDecorativeElementsIds)) as $decorativeElementid) {
                if ($decorativeElement = PropertyDecorativeElement::findOne($decorativeElementid)) {
                    $this->unlink('decorativeElements', $decorativeElement, true);
                }
            }
        }
    }

    private function updateBodyMaterials()
    {
        $currentBodyMaterialsIds = $this->getBodyMaterials()->select('id')->column();
        $newBodyMaterialsIds = $this->getBodyMaterialsArray();
        if (is_string($newBodyMaterialsIds)) {
            $newBodyMaterialsIds = [];
        }

        if (is_array($newBodyMaterialsIds)) {
            foreach (array_filter(array_diff($newBodyMaterialsIds, $currentBodyMaterialsIds)) as $bodyMaterialId) {
                if ($bodyMaterial = PropertyBodyMaterial::findOne($bodyMaterialId)) {
                    $this->link('bodyMaterials', $bodyMaterial, ['property_type' => PropertyBodyMaterial::TYPE]);
                }
            }
        }

        if (is_array($newBodyMaterialsIds)) {
            foreach (array_filter(array_diff($currentBodyMaterialsIds, $newBodyMaterialsIds)) as $bodyMaterialId) {
                if ($bodyMaterial = PropertyBodyMaterial::findOne($bodyMaterialId)) {
                    $this->unlink('bodyMaterials', $bodyMaterial, true);
                }
            }
        }
    }

    private function updateFurnitures()
    {
        $currentFurnituresIds = $this->getFurnitures()->select('id')->column();
        $newFurnituresIds = $this->getFurnituresArray();
        if (is_string($newFurnituresIds)) {
            $newFurnituresIds = [];
        }

        if (is_array($newFurnituresIds)) {
            foreach (array_filter(array_diff($newFurnituresIds, $currentFurnituresIds)) as $furnitureId) {
                if ($furniture = PropertyFurniture::findOne($furnitureId)) {
                    $this->link('furnitures', $furniture, ['property_type' => PropertyFurniture::TYPE]);
                }
            }
        }

        if (is_array($newFurnituresIds)) {
            foreach (array_filter(array_diff($currentFurnituresIds, $newFurnituresIds)) as $furnitureId) {
                if ($furniture = PropertyFurniture::findOne($furnitureId)) {
                    $this->unlink('furnitures', $furniture, true);
                }
            }
        }
    }

    private function updateBacklights()
    {
        $currentBacklightsIds = $this->getBacklights()->select('id')->column();
        $newBacklightsIds = $this->getBacklightsArray();
        if (is_string($newBacklightsIds)) {
            $newBacklightsIds = [];
        }

        if (is_array($newBacklightsIds)) {
            foreach (array_filter(array_diff($newBacklightsIds, $currentBacklightsIds)) as $backlightId) {
                if ($backlight = PropertyBacklight::findOne($backlightId)) {
                    $this->link('backlights', $backlight, ['property_type' => PropertyBacklight::TYPE]);
                }
            }
        }

        if (is_array($newBacklightsIds)) {
            foreach (array_filter(array_diff($currentBacklightsIds, $newBacklightsIds)) as $backlightId) {
                if ($backlight = PropertyBacklight::findOne($backlightId)) {
                    $this->unlink('backlights', $backlight, true);
                }
            }
        }
    }

    private function updateTableTops()
    {
        $currentTableTopsIds = $this->getBacklights()->select('id')->column();
        $newTableTopsIds = $this->getBacklightsArray();
        if (is_string($newTableTopsIds)) {
            $newTableTopsIds = [];
        }

        if (is_array($newTableTopsIds)) {
            foreach (array_filter(array_diff($newTableTopsIds, $currentTableTopsIds)) as $tableTopId) {
                if ($tableTop = PropertyTableTop::findOne($tableTopId)) {
                    $this->link('tableTops', $tableTop, ['property_type' => PropertyTableTop::TYPE]);
                }
            }
        }

        if (is_array($newTableTopsIds)) {
            foreach (array_filter(array_diff($currentTableTopsIds, $newTableTopsIds)) as $tableTopId) {
                if ($tableTop = PropertyTableTop::findOne($tableTopId)) {
                    $this->unlink('tableTops', $tableTop, true);
                }
            }
        }
    }
}
