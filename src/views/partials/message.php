<div class="message">
        <?php foreach (\StanimiraNikolova\Core\MVC\Message::returnMessages() AS $value) : ?>
            <?php if ($value->type == \StanimiraNikolova\Core\MVC\Message::POSITIVE_MESSAGE) :?>
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $value->text ?></strong>
                </div>
            <?php endif; ?>
        <?php endforeach;?>
        <?php foreach (\StanimiraNikolova\Core\MVC\Message::returnMessages() AS $value) : ?>
            <?php if ($value->type == \StanimiraNikolova\Core\MVC\Message::NEGATIVE_MESSAGE) :?>
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong><?php echo $value->text ?></strong>
                </div>
            <?php endif; ?>
        <?php endforeach;?>
</div>