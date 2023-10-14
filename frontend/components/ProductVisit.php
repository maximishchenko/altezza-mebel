<?php

namespace frontend\components;

use frontend\components\Session;

class ProductVisit extends Session
{
    const VISITED_PRODUCTS_SECTION = 'visitedProducts';

    public $expire = 86400;

    protected array $visitedProducts = [];

    public function __construct()
    {
        parent::__construct();
        $this->visitedProducts = $this->getVisitedProduct();
    }

    public function isNewVisit(int $id): bool
    {
        $currentTime = time();
        if (!$this->isProductInSession($id) || $this->isLastVisitExpired($id, $currentTime)) {
            $this->setProductVisited($id, $currentTime);
            return true;
        }
        return false;
    }

    protected function getVisitedProduct(): array
    {
        if (!$this->session->has(self::VISITED_PRODUCTS_SECTION)) {
            $this->session->set(self::VISITED_PRODUCTS_SECTION, []); 
        }
        return $this->session->get(self::VISITED_PRODUCTS_SECTION);
    }

    protected function isProductInSession(int $id): bool
    {
        $visitedProductsIds = array_keys($this->visitedProducts);
        return true ? in_array($id, $visitedProductsIds) : false;
    }

    protected function isLastVisitExpired(int $id, int $time): bool
    {
        $expireTime = $this->visitedProducts[$id] + $this->expire;
        return true ? $time > $expireTime : false;
    }

    protected function setProductVisited($id, $time)
    {
        $this->visitedProducts[$id] = $time;
        $this->session->set(self::VISITED_PRODUCTS_SECTION, $this->visitedProducts);
    }
}