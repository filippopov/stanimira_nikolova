<?php

namespace StanimiraNikolova\Models\View\Page;

class PageViewModel
{
    private $pages;

    /**
     * PageViewModel constructor.
     * @param $pages
     */
    public function __construct($pages)
    {
        $this->pages = $pages;
    }

    /**
     * @return mixed
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param mixed $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }
}