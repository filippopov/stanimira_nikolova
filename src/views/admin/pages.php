<?php
/**
 * @var \StanimiraNikolova\Models\View\Page\PageViewModel $model
 */
$pages = $model->getPages();

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
                        <th>Page Id</th>
                        <th>Page Code</th>
                        <th>Page Sub Code</th>
                        <th>Page Title</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($pages as $page) :?>
                    <tr>
                        <?php
                            $pageId = isset($page['id']) ? $page['id'] : 0;
                            $pageCode = isset($page['code']) ? $page['code'] : '';
                            $pageSubCode = isset($page['sub_code']) ? $page['sub_code'] : '';
                            $pageTitle = isset($page['page_title']) ? $page['page_title'] : '';
                            $pageText = isset($page['text']) ? $page['text'] : '';
                        ?>
                        <td data-label="Page Id">
                            <?= $pageId ?>
                        </td>
                        <td data-label="Page Code">
                            <?= $pageCode ?>
                        </td>
                        <td data-label="Page Sub Code">
                            <?= $pageSubCode ?>
                        </td>
                        <td data-label="Page Title">
                            <?= $pageTitle ?>
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