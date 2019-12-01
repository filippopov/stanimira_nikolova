<?php
/** @var \StanimiraNikolova\Core\ViewInterface $this */
?>
<div class="container">
    <?php
        include 'src/views/partials/message.php';
    ?>

    <div id="logreg-forms">
        <form class="form-signin" method="post" action="<?php echo $this->uri('admin', 'loginPost')?>">
            <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
            <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">
            <input type="password" name="password" class="form-control" placeholder="Password" required="">

            <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
        </form>
    </div>
</div>