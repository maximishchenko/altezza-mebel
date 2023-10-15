<?php

namespace frontend\modules\catalog\models;

use frontend\modules\catalog\models\query\ProductQuery;
use backend\modules\catalog\models\Product as backendProduct;
use backend\modules\catalog\models\ProductElement;
use backend\modules\catalog\models\ProductProperty;
use backend\modules\catalog\models\Property;
use common\models\Status;
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
class Product extends backendProduct
{
    const NEW_LIMIT = 10;

    public static function find()
    {
        return new ProductQuery(get_called_class());
    }

    public function getThumb()
    {
        return (isset($this->image)) ? '/' . self::UPLOAD_PATH . $this->image : '/static/sprite.svg#noimage';
    }

    public function getStyleName()
    {
        return $this->style->name;
    }

    public function getFormName()
    {
        return $this->form->name;
    }

    public function getFormFilter()
    {
        $formIds = self::getDb()->cache(function() {
            return self::find()->active()->asArray()->all();
        });
        $formIdsArray = ArrayHelper::getColumn($formIds, 'form_id');
        $forms = Property::getDb()->cache(function() use ($formIdsArray) {
            return Property::find()->where(['id' => array_unique($formIdsArray)])->active()->all();
        });
        return $forms;
    }

    public function getStyleFilter()
    {
        $styleIds = self::getDb()->cache(function() {
            return self::find()->active()->asArray()->all();
        });
        $styleIdsArray = ArrayHelper::getColumn($styleIds, 'style_id');
        $styles = Property::getDb()->cache(function() use ($styleIdsArray) {
            Property::find()->where(['id' => array_unique($styleIdsArray)])->active()->all();
        });
        return $styles; 
    }

    public function getCoatingFilter()
    {
        $fasadCoatingsIds = ProductProperty::getDb()->cache(function() {
            return ProductProperty::find()->onlyFasadCoating()->asArray()->all();
        });
        $fasadCoatingsArray = ArrayHelper::getColumn($fasadCoatingsIds, 'property_id');
        $coatings = Property::getDb()->cache(function() use ($fasadCoatingsArray) {
            return Property::find()->where(['id' => array_unique($fasadCoatingsArray)])->active()->all();
        });
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

    public function getProductProperty()
    {
        return $this->hasMany(ProductProperty::className(), ['product_id' => 'id']);
    }

    public function getElements()
    {
        return $this->hasMany(ProductElement::className(), ['product_id' => 'id'])
                ->orderBy([ProductElement::tableName().'.sort' => SORT_ASC])
                ->onCondition([ProductElement::tableName().'.status' => Status::STATUS_ACTIVE]);
    }

    public function getType()
    {
        return self::getDb()->cache(function() {
            return parent::getType();
        });
    }
    
    public function getForm()
    {
        return self::getDb()->cache(function() {
            return parent::getForm();
        });
    }
    
    public function getStyle()
    {
        return self::getDb()->cache(function() {
            return parent::getStyle();
        });
    }
    
    public function getAppliance()
    {
        return self::getDb()->cache(function() {
            return parent::getAppliance();
        });
    }

    public function getImages()
    {
        return self::getDb()->cache(function() {
            return parent::getImages();
        });
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
