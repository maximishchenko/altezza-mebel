<?php

declare(strict_types=1);

namespace backend\modules\content\controllers;

use backend\controllers\BaseController;

/**
 * Default controller for the `content` module
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
