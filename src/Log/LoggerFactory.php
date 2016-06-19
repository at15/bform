<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-6-20
 * Time: 上午12:25
 */
declare(strict_types = 1);

namespace Dy\Log;


class LoggerFactory
{
    private static $logFolder;

    public static function getLogger(string $className)
    {
        $logger = new \Monolog\Logger($className);
        // TODO: other log file name
        $fileHandler = new \Monolog\Handler\StreamHandler(static::$logFolder . '/' . date('Y-m-d') . '-app.log');
        $logger->pushHandler($fileHandler);
        return $logger;
    }

    public static function setLogFolder(string $folder)
    {
        // TODO: check if the folder exists
        static::$logFolder = $folder;
    }
}
