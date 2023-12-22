<?php

declare(strict_types=1);

namespace backend\modules\catalog\controllers;

use backend\controllers\BaseController;

/**
 * Default controller for the `catalog` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }
}
