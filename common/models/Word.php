<?php

namespace common\models;

use Yii;

class Word
{

    public static function getElementsWordsArrayBasedOnCount()
    {
        return [
            Yii::t("app", 'Single Element'),
            Yii::t("app", 'Without Element'),
            Yii::t("app", 'Multiple Elements'),
        ];
    }

    public static function getValuesWordsArrayBasedOnCount()
    {
        return [
            Yii::t("app", 'Single Value'),
            Yii::t("app", 'Without Value'),
            Yii::t("app", 'Multiple Values'),
        ];
    }
    
    /**
     * Склонение существительных после числительных.
     * 
     * @param string $value Значение
     * @param array $words Массив вариантов, например: array('товар', 'товара', 'товаров')
     * @param bool $show Включает значение $value в результирующею строку
     * @return string
     */
    public static function numWord(int $value, array $words, bool $show = true) 
    {
        $num = $value % 100;
        if ($num > 19) { 
            $num = $num % 10; 
        }
        
        $out = ($show) ?  $value . ' ' : '';
        switch ($num) {
            case 1:  $out .= $words[0]; break;
            case 2: 
            case 3: 
            case 4:  $out .= $words[1]; break;
            default: $out .= $words[2]; break;
        }
        
        return $out;
    }
}