<?php

namespace frontend\interfaces;

interface CacheInterface
{
    public static function getCacheDependency(): \yii\caching\Dependency;

    public static function getCacheDuration(): int;
}