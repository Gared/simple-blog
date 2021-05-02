<?php
/**
 * @var StefanBlog\BusinessDomain\Model\Post $post
 */
?>

<article>
    <h2><?= $post->getTitle(); ?></h2>
    <p><?= $post->getContent(); ?></p>
    <p><?= $post->getUser()->getName(); ?></p>
</article>


