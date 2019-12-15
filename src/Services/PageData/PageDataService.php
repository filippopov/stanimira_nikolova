<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 28.9.2019 г.
 * Time: 17:27
 */

namespace StanimiraNikolova\Services\PageData;


use StanimiraNikolova\Models\DB\Page\Page;
use StanimiraNikolova\Repositories\PageData\PageDataRepository;
use StanimiraNikolova\Repositories\PageData\PageDataRepositoryInterface;
use StanimiraNikolova\Services\AbstractService;

class PageDataService extends AbstractService implements PageDataServiceInterface
{
    /** @var  PageDataRepository */
    private $pageDataRepository;

    public function __construct(PageDataRepositoryInterface $pageDataRepository)
    {
        $this->pageDataRepository = $pageDataRepository;
    }

    public function GetPageData(string $code, string $subCode) : array
    {
        $pageData = $this->pageDataRepository->getPageData([':code' => $code, ':sub_code' => $subCode]);

        return $pageData;
    }

    public function getPages(): array
    {
        return $this->pageDataRepository->findAll();
    }
}