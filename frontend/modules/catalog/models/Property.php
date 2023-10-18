<?php

namespace frontend\modules\catalog\models;

use backend\modules\catalog\models\Property as backendProperty;
use frontend\traits\cacheParamsTrait;

class Property extends backendProperty
{
    use cacheParamsTrait;
}