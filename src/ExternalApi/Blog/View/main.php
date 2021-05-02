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
            <a href="/">[Home]</a>
            <a href="/login">[Login]</a>
        </div>
        <div class="main">
            <h1><?= $pageName ?></h1>
            <?= $content ?>
        </div>
    </body>
</html>

