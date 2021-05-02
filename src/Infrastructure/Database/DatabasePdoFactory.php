<?php

declare(strict_types=1);

namespace StefanBlog\Infrastructure\Database;

use PDO;

class DatabasePdoFactory
{
    public static function create(): PDO
    {
        $config = require_once(__DIR__ . '/../../../config/database.php');

        $pdo = new PDO(
            $config['mysql']['dsn'],
            $config['mysql']['user'],
            $config['mysql']['password'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]
        );

        return $pdo;
    }
}