<?php
header('Access-Control-Allow-Origin: *');

require_once __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\App;
use Slim\Container;
use Illuminate\Database\Capsule\Manager as DB;


require 'vendor/autoload.php';


error_reporting(E_ALL ^ E_DEPRECATED);

$container = new Container(['settings' => ['displayErrorDetails' => true]]);
$app = new App($container);
$db = new DB();
$db->addConnection(parse_ini_file(__DIR__.'/src/config/dbconfig.ini'));
$db->setAsGlobal();
$db->bootEloquent();
DB::connection()->enableQueryLog();

$app->get('/',
    function (Request $rq, Response $rs): Response {
        return $rs->write("HEUSSS");
    });

try {
    $app->run();
} catch (Throwable $e) {
    echo $e->getMessage();
}