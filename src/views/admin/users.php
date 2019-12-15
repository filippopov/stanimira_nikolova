<?php

/**
 * @var \StanimiraNikolova\Models\View\User\UserViewModel$model
 */
$users = $model->getUsers();


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
                    <th>User Id</th>
                    <th>Username</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user) :?>
                <tr>
                    <?php
                        $userId = isset($user['id']) ? $user['id'] : 0;
                        $username = isset($user['username']) ? $user['username'] : '';
                    ?>
                    <td data-label="User Id">
                        <?= $userId ?>
                    </td>
                    <td data-label="Username">
                        <?= $username ?>
                    </td>
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