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

$app->get('/api/games/{id}/comments',
    function (Request $rq, Response $rs, $args): Response {
        $obj = \appbdd\modele\Comment::where("idjeu","=", $args["id"])->get();


        return $rs->write(json_encode($obj));
    });

$app->get('/api/games/{id}',
    function (Request $rq, Response $rs, $args): Response {
        $obj = \appbdd\modele\Game::where("id","=", $args["id"])->get();

       $obj[] = array("self" => array("href" => "/api/games/" . $args["id"]));

        return $rs->write(json_encode($obj));
});
$app->get('/api/games',
    function (Request $rq, Response $rs, $args): Response {
        $r = 1;
        $prev=1;
        $skip=0;
        if(isset($_GET["page"]))
        {
           if($_GET["page"]>=1)
           {
               $r = $_GET["page"];
               $prev = $r-1;
               $skip=200*$r;
           }
        }
        $obj = \appbdd\modele\Game::take(200*$r)->skip($skip)->get();

        $res = array("games" => $obj, "links" => array("prev" => array("href"=>"/api/games?page=".$prev),"next" => array("href"=>"/api/games?page=".$r+1)));
        return $rs->write(json_encode($res));
    });
$app->get('/',
    function (Request $rq, Response $rs): Response {
        return $rs->write("HEUSSS");
    });

try {
    $app->run();
} catch (Throwable $e) {
    echo $e->getMessage();
}