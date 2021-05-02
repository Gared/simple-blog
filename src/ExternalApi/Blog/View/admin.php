<?php
/**
 * @var string $pageName
 * @var string $content
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
            <?= $content ?>
        </div>
    </body>
</html>

