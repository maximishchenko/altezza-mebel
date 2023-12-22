<?php

declare(strict_types=1);

namespace backend\modules\catalog\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\catalog\models\Product;
use yii\data\DataProviderInterface;

class ProductSearch extends Product
{
    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            [['id', 'type_id', 'form_id', 'appliance_id', 'sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name', 'image', 'description', 'comment'], 'safe'],
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }
    
    public function search(array $params): DataProviderInterface
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'type_id' => $this->type_id,
            'form_id' => $this->form_id,
            'appliance_id' => $this->appliance_id,
            'sort' => $this->sort,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
