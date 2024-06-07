<?php

namespace frontend\modules\content\models\search;

use yii\data\ActiveDataProvider;
use frontend\modules\content\models\Gallery;

class GallerySearch extends Gallery
{

    public function search($params)
    {
        $query = Gallery::find()->active();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id'=>SORT_DESC]],
        ]);

        $this->load($params);

        return $dataProvider;
    }
}
