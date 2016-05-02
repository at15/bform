<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-4-21
 * Time: 下午10:31
 *
 * Load all the helper functions in helper folder
 */

$d = dir(__DIR__ . '/helper');

while (false !== ($entry = $d->read())) {
    if ($entry === '.' || $entry === '..') {
        continue;
    }
    if (strstr($entry, '.php')) {
//        echo $entry . PHP_EOL;
//        echo $d->path . '/' . $entry . PHP_EOL;
        require_once($d->path . '/' . $entry);
    }
}
$d->close();
