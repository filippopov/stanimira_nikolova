<?php

namespace StanimiraNikolova\Services\PageData;

interface PageDataServiceInterface
{
    public function GetPageData(string $code, string $subCode) : array;
}