<?php
    /**
     * @var \StanimiraNikolova\Models\View\Home\HomeViewModel $model
     */
    $pageData = $model->getPageData();
    $pageTitle = isset($pageData['page_title']) ? $pageData['page_title'] : '';
    $text = isset($pageData['text']) ? $pageData['text'] : '';
?>

<main>
    <article>
        <header>
            <h1><?= $pageTitle ?></h1>
        </header>
        <section>
            <p>
                <?= $text ?>
            </p>
        </section>
    </article>
</main>