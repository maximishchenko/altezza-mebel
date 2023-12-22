<?php

declare(strict_types=1);

namespace frontend\modules\catalog\models\search;

use backend\modules\catalog\models\ProductProperty;
use backend\modules\catalog\models\PropertyStyle;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\catalog\models\Product;
use frontend\traits\attributeTrait;
use yii\data\DataProviderInterface;

class ProductSearch extends Product
{

    use attributeTrait;

    public ?string $styleName = null;
    public ?string $formName = null;
    public ?int $coatingId = null;

    public function rules(): array
    {
        return [
            [['name', 'image', 'description', 'comment', 'type_id', 'form_id', 'appliance_id', 'style_id', 'styleName', 'formName', 'sort', 'coatingId'], 'safe'],
        ];
    }

    public function scenarios(): array
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
    
    public function search(array $params): DataProviderInterface
    {
        $query = Product::getDb()->cache(function() {
            return Product::find()->active()->joinWith(['style', 'form', 'productProperty'])->distinct();
        }, Product::getCacheDuration(), Product::getCacheDependency());

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
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

    public function formName(): string
    {
        return '';
    }
}
