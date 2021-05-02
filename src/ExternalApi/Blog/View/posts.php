<?php
/**
 * @var StefanBlog\DataDomain\Entity\PostEntity[] $posts
 */
?>

<?php foreach ($posts as $post): ?>
    <article>
        <h2><a href="/post/<?= $post->getSlug(); ?>"><?= $post->getTitle(); ?></a></h2>
        <p><?= $post->getExcerpt(); ?></p>
    </article>
<?php endforeach; ?>


