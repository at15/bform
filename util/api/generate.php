<?php
/**
 * Created by PhpStorm.
 * User: at15
 * Date: 16-4-21
 * Time: 下午10:26
 *
 * Generate Class and routes based on swagger.json in bform-api
 *
 */

require_once(__DIR__ . '/helper.php');

// check if api dir exists
$bformAPI = __DIR__ . '/../../../bform-api';
if (!file_exists($bformAPI)) {
    ln_red('bform api does not exists');
    ln('Please run the following command in ' . realpath(__DIR__ . '/../../..'));
    ln_green('git clone git@github.com:at15/bform-api.git');
    exit(404);
}
// clean the relative path
$bformAPI = realpath($bformAPI);

// check if swagger json exists
$swaggerJsonPath = $bformAPI . '/util/swagger.json';
if (!file_exists($swaggerJsonPath)) {
    ln_red($swaggerJsonPath . ' does not exists, try to generate one');
    ln('Please run the following command in ' . realpath($bformAPI));
    ln_green('node util/convert.js');
    exit(404);
}

ln_green($swaggerJsonPath . ' found!');


// now read the json file
$swaggerDocument = json_decode(file_get_contents($swaggerJsonPath), true);
//var_dump($swaggerDocument);

// loop all the paths
$basePath = $swaggerDocument['basePath'];
//ln($basePath);
$paths = $swaggerDocument['paths'];
foreach ($paths as $url => $config) {
//  concat to full path
    $url = $basePath . $url;
//  find all the http methods in one path
    foreach ($config as $k => $v) {
        if (is_request_method($k)) {
            ln($url . ' ' . $k);
        }
    }
//    var_dump($url);
}
