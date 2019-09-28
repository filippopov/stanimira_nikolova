<?php
/**
 * Created by PhpStorm.
 * User: Popov
 * Date: 28.9.2019 г.
 * Time: 17:36
 */

namespace StanimiraNikolova\Repositories\PageData;


use StanimiraNikolova\Adapter\DatabaseInterface;
use StanimiraNikolova\Repositories\AbstractRepository;

class PageDataRepository extends AbstractRepository implements PageDataRepositoryInterface
{
    protected $db;
    /**
     * UserRepository constructor.
     */
    public function __construct(DatabaseInterface $db)
    {
        parent::__construct($db);
        $this->db = $db;
    }

    public function setOptions()
    {
        return array(
            'tableName' => 'page_data',
            'primaryKeyName' => 'id'
        );
    }

    public function getPageData(array $params) : array
    {
        $qry = "
            SELECT 
	          pd.page_title,
	          pd.text
            FROM 
              page_data AS pd
            WHERE 
              pd.code = :code
              AND pd.sub_code = :sub_code";

        $stmt = $this->db->prepare($qry);
        $stmt->execute($params);
        return $stmt->fetch();
    }
}