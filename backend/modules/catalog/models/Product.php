<?php

declare(strict_types=1);

namespace backend\modules\catalog\models;

use backend\models\BaseModel;
use Yii;
use backend\modules\catalog\models\query\ProductQuery;
use backend\traits\fileTrait;
use common\models\Sort;
use common\models\Status;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
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
 * @property string $slug
 * @property string|null $image
 * @property string|null $description
 * @property string|null $comment
 * @property int|null $sort
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property-read mixed $style
 * @property-read mixed $form
 * @property-read mixed $bodyMaterialsCheckboxListItems
 * @property-read mixed $bodyMaterials
 * @property-read mixed $backlightsCheckboxListItems
 * @property-read mixed $fasadCoatings
 * @property-read mixed $images
 * @property-read mixed $decorativeElements
 * @property-read mixed $fasadCoatingsCheckboxListItems
 * @property-read mixed $tableTopsCheckboxListItems
 * @property-read mixed $fasadMaterialsCheckboxListItems
 * @property-read mixed $furnituresCheckboxListItems
 * @property-read mixed $backlights
 * @property-read mixed $tableTops
 * @property-read mixed $type
 * @property-read mixed $fasadMaterials
 * @property-read mixed $decorativeElementsCheckboxListItems
 * @property-read mixed $furnitures
 * @property-read mixed $appliance
 * @property int|null $updated_by
 */
class Product extends BaseModel
{
    use fileTrait;

    const UPLOAD_PATH = 'upload/product/';

    public $imageFile = null;

    public $imagesFiles = null;

    protected $fasadMaterialsArray;

    protected $fasadCoatingsArray;

    protected $decorativeElementsArray;

    protected $bodyMaterialsArray;

    protected $furnituresArray;

    protected $backlightsArray;

    protected $tableTopsArray;
    
    public static function tableName(): string
    {
        return '{{%product}}';
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
            [['type_id', 'form_id', 'appliance_id', 'style_id', 'sort', 'status', 'is_new', 'created_at', 'updated_at', 'created_by', 'updated_by', 'view_count'], 'integer'],
            [['name'], 'required'],
            [['description', 'comment'], 'string'],
            [['name', 'image', 'slug'], 'string', 'max' => 255],

            [['name'], 'unique'],
            [['name', 'type_id', 'form_id', 'appliance_id', 'style_id'], 'required'],
            ['sort', 'default', 'value' => Sort::DEFAULT_SORT_VALUE],
            ['view_count', 'default', 'value' => 1],
            ['status', 'in', 'range' => array_keys(Status::getStatusesArray())],

            [['fasadMaterialsArray', 'fasadCoatingsArray', 'decorativeElementsArray', 'bodyMaterialsArray', 'furnituresArray', 'backlightsArray', 'imageFile', 'tableTopsArray'], 'safe'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp'],
            [['imagesFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp', 'maxFiles' => 5],
        ];
    }

    public function attributeLabels(): array
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

    public function attributeHints(): array
    {
        return [
            'slug' => Yii::t('app', 'Auto-generated field. Service. Editable'),
            'view_count' => Yii::t('app', 'Auto-generated field. Service. Editable'),
            'description' => Yii::t('app', 'Text description'),
            'comment' => Yii::t('app', 'Text description. Service'),
        ];
    }

    public static function find(): ProductQuery
    {
        return new ProductQuery(get_called_class());
    }
    
    public function getType(): ActiveQuery
    {
        return $this->hasOne(Property::class, ['id' => 'type_id'])->onCondition([Property::tableName().'.property_type' => PropertyType::TYPE]);
    }
    
    public function getForm(): ActiveQuery
    {
        return $this->hasOne(Property::class, ['id' => 'form_id'])->onCondition([Property::tableName().'.property_type' => PropertyForm::TYPE]);
    }
    
    public function getStyle(): ActiveQuery
    {
        return $this->hasOne(Property::class, ['id' => 'style_id'])->onCondition([Property::tableName().'.property_type' => PropertyStyle::TYPE]);
    }
    
    public function getAppliance(): ActiveQuery
    {
        return $this->hasOne(Property::class, ['id' => 'appliance_id'])->onCondition([Property::tableName().'.property_type' => PropertyAppliance::TYPE]);
    }

    public function getImages(): ActiveQuery
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'id'])->orderBy([ProductImage::tableName().'.sort' => SORT_ASC]);
    }
    
    // Материалы фасадов

    public function getFasadMaterialsCheckboxListItems(): array
    {
        return PropertyFasadMaterial::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getFasadMaterials(): ActiveQuery
    {
        return $this->hasMany(PropertyFasadMaterial::class, ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyFasadMaterial::TYPE]);
        });
    }

    public function getFasadMaterialsArray(): array | string
    {
        if ($this->fasadMaterialsArray === null) {
            $this->fasadMaterialsArray = $this->getFasadMaterials()->select('id')->column();
        }
        return $this->fasadMaterialsArray;
    }

    public function setFasadMaterialsArray(array $value): void
    {
        $this->fasadMaterialsArray = (array)$value;
    }
    
    // Покрытие фасадов

    public function getFasadCoatingsCheckboxListItems(): array
    {
        return PropertyFasadCoating::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getFasadCoatings(): ActiveQuery
    {
        return $this->hasMany(PropertyFasadCoating::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyFasadCoating::TYPE]);
        });
    }

    public function getFasadCoatingsArray(): array | string
    {
        if ($this->fasadCoatingsArray === null) {
            $this->fasadCoatingsArray = $this->getFasadCoatings()->select('id')->column();
        }
        return $this->fasadCoatingsArray;
    }

    public function setFasadCoatingsArray(array $value): void
    {
        $this->fasadCoatingsArray = (array)$value;
    }
     
    // Декоративные элементы

    public function getDecorativeElementsCheckboxListItems(): array
    {
        return PropertyDecorativeElement::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getDecorativeElements(): ActiveQuery
    {
        return $this->hasMany(PropertyDecorativeElement::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyDecorativeElement::TYPE]);
        });
    }

    public function getDecorativeElementsArray(): array | string
    {
        if ($this->decorativeElementsArray === null) {
            $this->decorativeElementsArray = $this->getDecorativeElements()->select('id')->column();
        }
        return $this->decorativeElementsArray;
    }

    public function setDecorativeElementsArray(array $value): void
    {
        $this->decorativeElementsArray = (array)$value;
    }
     
    // Материалы корпуса

    public function getBodyMaterialsCheckboxListItems(): array
    {
        return PropertyBodyMaterial::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getBodyMaterials(): ActiveQuery
    {
        return $this->hasMany(PropertyBodyMaterial::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyBodyMaterial::TYPE]);
        });
    }

    public function getBodyMaterialsArray(): array | string
    {
        if ($this->bodyMaterialsArray === null) {
            $this->bodyMaterialsArray = $this->getBodyMaterials()->select('id')->column();
        }
        return $this->bodyMaterialsArray;
    }

    public function setBodyMaterialsArray(array $value): void
    {
        $this->bodyMaterialsArray = (array)$value;
    }
     
    // Фурнитура

    public function getFurnituresCheckboxListItems(): array
    {
        return PropertyFurniture::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getFurnitures(): ActiveQuery
    {
        return $this->hasMany(PropertyFurniture::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyFurniture::TYPE]);
        });
    }

    public function getFurnituresArray(): array | string
    {
        if ($this->furnituresArray === null) {
            $this->furnituresArray = $this->getFurnitures()->select('id')->column();
        }
        return $this->furnituresArray;
    }

    public function setFurnituresArray(array $value): void
    {
        $this->furnituresArray = (array)$value;
    }
     
    // Подсветка

    public function getBacklightsCheckboxListItems(): array
    {
        return PropertyBacklight::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getBacklights(): ActiveQuery
    {
        return $this->hasMany(PropertyBacklight::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyBacklight::TYPE]);
        });
    }

    public function getBacklightsArray(): array | string
    {
        if ($this->backlightsArray === null) {
            $this->backlightsArray = $this->getBacklights()->select('id')->column();
        }
        return $this->backlightsArray;
    }

    public function setBacklightsArray($value): void
    {
        $this->backlightsArray = (array)$value;
    }
     
    // Столешница

    public function getTableTopsCheckboxListItems(): array
    {
        return PropertyTableTop::find()->select(['name', 'id'])->indexBy('id')->column();
    }
    
    public function getTableTops(): ActiveQuery
    {
        return $this->hasMany(PropertyTableTop::className(), ['id' => 'property_id'])->viaTable('{{%product_property}}', ['product_id' => 'id'], function ($query) {
            $query->andWhere(['property_type' => PropertyTableTop::TYPE]);
        });
    }

    public function getTableTopsArray(): array | string
    {
        if ($this->tableTopsArray === null) {
            $this->tableTopsArray = $this->getTableTops()->select('id')->column();
        }
        return $this->tableTopsArray;
    }

    public function setTableTopsArray($value): void
    {
        $this->tableTopsArray = (array)$value;
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
        $this->updateFasadMaterials();
        $this->updateFasadCoatings();
        $this->updateDecorativeElements();
        $this->updateBodyMaterials();
        $this->updateFurnitures();
        $this->updateBacklights();
        $this->updateTableTops();
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
                $imageModel = new ProductImage();
                $imageModel->imageFile = $img;
                $imageModel->product_id = $this->id;
                $imageModel->sort = $key;
                $imageModel->save();
            }
        }
    }

    private function updateFasadMaterials(): void
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

    private function updateFasadCoatings(): void
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

    private function updateDecorativeElements(): void
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

    private function updateBodyMaterials(): void
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

    private function updateFurnitures(): void
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

    private function updateBacklights(): void
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

    private function updateTableTops(): void
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
