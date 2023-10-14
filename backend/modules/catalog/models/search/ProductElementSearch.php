<?php

namespace backend\modules\catalog\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\catalog\models\ProductElement;

class ProductElementSearch extends ProductElement
{
    public function rules()
    {
        return [
            [['product_id', 'x_pos', 'y_pos', 'sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['status', 'sort'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }
    
    public function search($id, $params)
    {
        $query = ProductElement::find()->where(['product_id' => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
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
