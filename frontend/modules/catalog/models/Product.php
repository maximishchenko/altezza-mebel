<?php

declare(strict_types=1);

namespace frontend\modules\catalog\models;

use frontend\modules\catalog\models\query\ProductQuery;
use backend\modules\catalog\models\Product as backendProduct;
use backend\modules\catalog\models\ProductElement;
use backend\modules\catalog\models\ProductProperty;
use common\models\Status;
use frontend\interfaces\ImageInterface;
use frontend\traits\cacheParamsTrait;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property int|null $type_id
 * @property int|null $form_id
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
class Product extends backendProduct implements ImageInterface
{
    const NEW_LIMIT = 10;

    use cacheParamsTrait;

    public static function find(): ProductQuery
    {
        return new ProductQuery(get_called_class());
    }

    public function getThumb(): ?string
    {
        return (isset($this->image)) ? '/' . self::UPLOAD_PATH . $this->image : '/static/sprite.svg#noimage';
    }

    public function getStyleName(): string
    {
        return $this->style->name;
    }

    public function getFormName(): string
    {
        return $this->form->name;
    }

    public function getFormFilter(): array
    {
        $formIds = self::getDb()->cache(function() {
            return self::find()->active()->asArray()->all();
        }, static::getCacheDuration(), static::getCacheDependency());
        $formIdsArray = ArrayHelper::getColumn($formIds, 'form_id');
        $forms = Property::getDb()->cache(function() use ($formIdsArray) {
            return Property::find()->where(['id' => array_unique($formIdsArray)])->active()->all();
        }, Property::getCacheDuration(), Property::getCacheDependency());
        return $forms;
    }

    public function getStyleFilter(): array
    {
        $styleIds = self::find()->active()->asArray()->all();
        $styleIdsArray = ArrayHelper::getColumn($styleIds, 'style_id');
        $styles = Property::find()->where(['id' => array_unique($styleIdsArray)])->active()->all();
        return $styles; 
    }

    public function getCoatingFilter(): array
    {
        $fasadCoatingsIds = ProductProperty::getDb()->cache(function() {
            return ProductProperty::find()->onlyFasadCoating()->asArray()->all();
        });
        $fasadCoatingsArray = ArrayHelper::getColumn($fasadCoatingsIds, 'property_id');
        $coatings = Property::getDb()->cache(function() use ($fasadCoatingsArray) {
            return Property::find()->where(['id' => array_unique($fasadCoatingsArray)])->active()->all();
        }, Property::getCacheDuration(), Property::getCacheDependency());
        return $coatings;
    }

    public function getFasadMaterialsString(): ?string
    {
        return implode(', ', ArrayHelper::map($this->fasadMaterials, 'id', 'name'));
    }

    public function getFasadMaterialsStringWithCount(): ?string
    {
        $fasadMaterialsString = $this->getFasadMaterialsString();
        return $this->getStringWithCountElements($fasadMaterialsString);
    }

    public function getFasadCoatingString(): ?string
    {
        return implode(', ', ArrayHelper::map($this->fasadCoatings, 'id', 'name'));
    }

    public function getFasadCoatingStringWithCount(): ?string
    {
        $fasadCoatingsString = $this->getFasadCoatingString();
        return $this->getStringWithCountElements($fasadCoatingsString);
    }

    public function getDecorativeElementsString(): ?string
    {
        return implode(', ', ArrayHelper::map($this->decorativeElements, 'id', 'name'));;
    }

    public function getDecorativeElementsStringWithCount(): ?string
    {
        $decorativeElementsString = $this->getDecorativeElementsString();
        return $this->getStringWithCountElements($decorativeElementsString);
    }

    public function getBodyMaterialsString(): ?string
    {
        return implode(', ', ArrayHelper::map($this->bodyMaterials, 'id', 'name'));
    }

    public function getFurnitureString(): ?string
    {
        return implode(', ', ArrayHelper::map($this->furnitures, 'id', 'name'));
    }

    public function getBacklightsString(): ?string
    {
        return implode(', ', ArrayHelper::map($this->backlights, 'id', 'name'));
    }

    public function getTableTopsString(): ?string
    {
        return implode(', ', ArrayHelper::map($this->tableTops, 'id', 'name'));
    }

    public function appliancesString(): ?string
    {
        return implode(', ', ArrayHelper::map($this->appliance, 'id', 'name'));
    }

    public function getProductProperty(): ActiveQuery
    {
        return $this->hasMany(ProductProperty::className(), ['product_id' => 'id']);
    }

    public function getElements(): ActiveQuery
    {
        return $this->hasMany(ProductElement::className(), ['product_id' => 'id'])
                ->orderBy([ProductElement::tableName().'.sort' => SORT_ASC])
                ->onCondition([ProductElement::tableName().'.status' => Status::STATUS_ACTIVE]);
    }

    public function getType(): ActiveQuery
    {
        return static::getDb()->cache(function() {
            return parent::getType();
        }, static::getCacheDuration(), static::getCacheDependency());
    }
    
    public function getForm(): ActiveQuery
    {
        return static::getDb()->cache(function() {
            return parent::getForm();
        }, static::getCacheDuration(), static::getCacheDependency());
    }
    
    public function getStyle(): ActiveQuery
    {
        return static::getDb()->cache(function() {
            return parent::getStyle();
        }, static::getCacheDuration(), static::getCacheDependency());
    }
    
    public function getAppliance(): ActiveQuery
    {
        return static::getDb()->cache(function() {
            return parent::getAppliance();
        }, static::getCacheDuration(), static::getCacheDependency());
    }

    public function getImages(): ActiveQuery
    {
        return static::getDb()->cache(function() {
            return parent::getImages();
        }, static::getCacheDuration(), static::getCacheDependency());
    }

    private function getStringWithCountElements(string $elementsString): ?string
    {
        $elementsArray = explode(", ", $elementsString);
        if (count($elementsArray) == 0) {
            return "";
        } elseif (count($elementsArray) == 1) {
            return $elementsArray[0];
        } else {
            $count = count($elementsArray) - 1;
            return $elementsArray[0] . " (еще " . $count . ")";
        }
    }
}
