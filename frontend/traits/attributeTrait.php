<?php

namespace frontend\traits;


trait attributeTrait
{
    
    /**
     * Проверяет наличие переданного аттрибута в списке аттрибутов модели по его названию
     *
     * @param string $attribute проверяемый аттрибут
     * @return boolean
     */
    public function isAttributeExists(string $attribute): bool
    {
        return in_array($attribute, $this::getSearchAttributesArray());
    }
}