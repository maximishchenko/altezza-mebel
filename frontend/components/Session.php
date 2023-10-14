<?php

namespace frontend\components;

use Yii;

class Session
{

    protected $session;

    public function __construct()
    {
        $this->session = Yii::$app->session;
        $this->openSession();
    }

    public function __destruct()
    {
        $this->closeSession();
    }

    protected function openSession()
    {
        if (!$this->session->isActive) {
            $this->session->open();
        }
    }

    protected function closeSession()
    {
        $this->session->close();
    }
}