<?php

declare(strict_types=1);

namespace backend\modules\catalog\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\catalog\models\ProductElement;
use yii\data\DataProviderInterface;

class ProductElementSearch extends ProductElement
{
    public function rules(): array
    {
        return [
            [['product_id', 'x_pos', 'y_pos', 'sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['status', 'sort'], 'safe'],
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }
    
    public function search(int $id, array $params): DataProviderInterface
    {
        $query = ProductElement::find()->where(['product_id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sort' => $this->sort,
            'status' => $this->status,
            'y_pos' => $this->created_by,
            'x_pos' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
