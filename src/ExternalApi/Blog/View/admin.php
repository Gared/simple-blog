<?php
/**
 * @var string $pageName
 * @var string $content
 * @var \StefanBlog\BusinessDomain\Model\Post[] $posts
 */
?>

<html>
    <head>
        <title>Stefan Blog - <?= $pageName ?></title>
    </head>
    <body>
        <div class="menu">
            <a href="/logout">[Logout]</a>
            <a href="/admin/post/create">[Create post]</a>
        </div>
        <div class="main">
            <h1><?= $pageName ?></h1>
            <?php foreach ($posts as $post): ?>
                <article>
                    <h2><a href="/admin/post/edit/<?= $post->getSlug(); ?>"><?= $post->getTitle(); ?></a></h2>
                    <p><?= $post->getExcerpt(); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </body>
</html>

