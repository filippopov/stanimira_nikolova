<?php
/**
 * Created by PhpStorm.
 * User: Filip
 * Date: 9/23/2019
 * Time: 5:20 PM
 */

namespace StanimiraNikolova\Repositories\Menu;


use StanimiraNikolova\Adapter\DatabaseInterface;
use StanimiraNikolova\Repositories\AbstractRepository;

class MenuRepository extends AbstractRepository implements MenuRepositoryInterface
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
            'tableName' => 'menu',
            'primaryKeyName' => 'id'
        );
    }

    public function getMainMenu(array $params = []) : array
    {
        $qry = "
            SELECT 
	          m.code,
	          m.title,
	          m.with_sub_menu
            FROM 
              menu AS m
            WHERE 
              m.active = :active 
              AND m.sub_code_id = :main_menu
            ORDER BY 
              m.sort_order";

        $stmt = $this->db->prepare($qry);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    public function getSubMenu(array $params = []) : array
    {
        $qry = "
            SELECT
	          m.id,
	          m.code,
	          m.title,
	          m.sub_code_id,
	          mm.title AS parent_title,
	          mm.code AS parent_code
            FROM 
              menu AS m
            INNER JOIN 
              menu AS mm ON (m.sub_code_id = mm.id)
            WHERE 
              m.active = :active 
              AND m.sub_code_id <> :main_menu
          ORDER BY 
            m.sort_order";

        $stmt = $this->db->prepare($qry);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}