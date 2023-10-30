<?php

namespace frontend\modules\catalog\models\search;

use backend\modules\catalog\models\ProductProperty;
use backend\modules\catalog\models\PropertyStyle;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\catalog\models\Product;
use frontend\traits\attributeTrait;

class ProductSearch extends Product
{

    use attributeTrait;

    public $styleName;
    public $formName;
    public $coatingId;

    public function rules()
    {
        return [
            [['name', 'image', 'description', 'comment', 'type_id', 'form_id', 'appliance_id', 'style_id', 'styleName', 'formName', 'sort', 'coatingId'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public static function getSearchAttributesArray(): array
    {
        return [
            'style_id',
            'form_id',
            'type_id',
            'coatingId',
        ];
    }
    
    public function search($params)
    {
        $query = Product::getDb()->cache(function() {
            return Product::find()->active()->joinWith(['style', 'form', 'productProperty'])->distinct();
        }, Product::getCacheDuration(), Product::getCacheDependency());

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'sort',
                'view_count',
                'styleName' => [
                    'asc' => [PropertyStyle::tableName() . '.name' => SORT_ASC],
                    'desc' => [PropertyStyle::tableName() . '.name' => SORT_DESC],
                    'default' => SORT_ASC
                ],
                'formName' => [
                    'asc' => [PropertyStyle::tableName() . '.name' => SORT_ASC],
                    'desc' => [PropertyStyle::tableName() . '.name' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ],
            'defaultOrder' => [
                'sort'=>SORT_ASC
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'style_id' => $this->style_id,
            'form_id' => $this->form_id,
            ProductProperty::tableName().'.property_id' => $this->coatingId,
        ]);

        return $dataProvider;
    }

    public function formName()
    {
        return '';
    }
}
