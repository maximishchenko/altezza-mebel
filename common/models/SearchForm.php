<?php

namespace common\models;

use Yii;

class SearchForm
{
    const CHECKED = 'checked';

    const SELECTED = 'selected';
    
    public static function isCheckboxSearchParamSelected(string $parameterName, string $value)
    {
        $queryParams = Yii::$app->request->queryParams;
        if (isset($queryParams) && isset($queryParams[$parameterName]) && ($queryParams[$parameterName] == $value || in_array($value, $queryParams[$parameterName]))) {
            return self::CHECKED;
        }
        return null;
    }
    
    public static function isSelectSearchParamSelected(string $parameterName, string $value)
    {
        $queryParams = Yii::$app->request->queryParams;
        if (isset($queryParams) && isset($queryParams[$parameterName]) && ($queryParams[$parameterName] == $value)) {
            return self::SELECTED;
        }
        return null;
    }


}