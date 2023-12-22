<?php

declare(strict_types=1);

namespace backend\modules\seo\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\seo\models\MetaTag;
use yii\data\DataProviderInterface;

class MetaTagSearch extends MetaTag
{
    public function rules(): array
    {
        return [
            [['id', 'sort', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['url', 'meta_title', 'meta_keywords', 'meta_description', 'og_title', 'og_description', 'og_image', 'og_url', 'og_sitename', 'og_type'], 'safe'],
        ];
    }

    public function scenarios(): array
    {
        return Model::scenarios();
    }

    public function search(array $params): DataProviderInterface
    {
        $query = MetaTag::find();

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
            'sort' => $this->sort,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'og_title', $this->og_title])
            ->andFilterWhere(['like', 'og_description', $this->og_description])
            ->andFilterWhere(['like', 'og_image', $this->og_image])
            ->andFilterWhere(['like', 'og_url', $this->og_url])
            ->andFilterWhere(['like', 'og_sitename', $this->og_sitename])
            ->andFilterWhere(['like', 'og_type', $this->og_type]);

        return $dataProvider;
    }
}
