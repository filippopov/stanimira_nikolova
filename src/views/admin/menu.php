<?php
/**
 * @var \StanimiraNikolova\Models\View\Menu\MenuViewModel $model
 */
$menuItems = $model->getMenuItems();

?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        include 'src/views/partials/message.php';
        ?>
        <div class="row">
            <table>
                <thead>
                <tr>
                    <th>Menu Id</th>
                    <th>Menu Code</th>
                    <th>Menu Title</th>
                    <th>Menu Sub Code</th>
                    <th>Sort Order</th>
                    <th>With Sub Menu</th>
                    <th>Active</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($menuItems as $menuItem) :?>
                <tr>
                    <?php
                        $menuId = isset($menuItem['id']) ? $menuItem['id'] : 0;
                        $menuCode = isset($menuItem['code']) ? $menuItem['code'] : '';
                        $menuTitle = isset($menuItem['title']) ? $menuItem['title'] : '';
                        $menuSubCodeId = isset($menuItem['sub_code_id']) ? $menuItem['sub_code_id'] : '';
                        $menuSortOrder = isset($menuItem['sort_order']) ? $menuItem['sort_order'] : '';
                        $menuWithSubMenu = isset($menuItem['with_sub_menu']) ? $menuItem['with_sub_menu'] : '';
                        $menuActive = isset($menuItem['active']) ? $menuItem['active'] : '';
                    ?>
                    <td data-label="Menu Id">
                        <?= $menuId ?>
                    </td>
                    <td data-label="Menu Code">
                        <?= $menuCode ?>
                    </td>
                    <td data-label="Menu Title">
                        <?= $menuTitle ?>
                    </td>
                    <td data-label="Menu Sub Code">
                        <?= $menuSubCodeId ?>
                    </td >
                    <td data-label="Sort Order">
                        <?= $menuSortOrder ?>
                    </td >
                    <td data-label="With Sub Menu">
                        <?= $menuWithSubMenu ?>
                    </td >
                    <td data-label="Active">
                        <?= $menuActive ?>
                    </td >
                    <td data-label="Edit">
                        <i class="fa fa-edit"></i>
                    </td>
                </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
    <!-- /.content -->
</div>