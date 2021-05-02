<?php
/**
 * @var StefanBlog\BusinessDomain\Model\Post[] $posts
 * @var string $pageName
 */
?>

<html>
    <head>
        <title>Stefan Blog - <?= $pageName ?></title>
    </head>
    <body>
        <div class="main">
            <h1><?= $pageName ?></h1>
            <?php foreach ($posts as $post): ?>
                <article>
                    <h2><a href="/post/<?= $post->getSlug(); ?>"><?= $post->getTitle(); ?></a></h2>
                    <p><?= $post->getExcerpt(); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </body>
</html>

