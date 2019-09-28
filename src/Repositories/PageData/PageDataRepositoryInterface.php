<?php

namespace StanimiraNikolova\Repositories\PageData;

interface PageDataRepositoryInterface
{
    public function getPageData(array $params) : array;
}