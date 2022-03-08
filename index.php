<?php
declare(strict_types=1);


# Chargement de l'autoload
require_once __DIR__ . '/vendor/autoload.php';

use Carbon\Exceptions\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Capsule\Manager as DB;

use appbdd\modele\Character;
use appbdd\modele\Company;
use appbdd\modele\Enemies;
use appbdd\modele\Friends;
use appbdd\modele\Game_developers;
use appbdd\modele\Game_publishers;
use appbdd\modele\Game_rating;
use appbdd\modele\Game;
use appbdd\modele\Game2character;
use appbdd\modele\Game2genre;
use appbdd\modele\Game2platform;
use appbdd\modele\Game2rating;
use appbdd\modele\Game2theme;
use appbdd\modele\Genre;
use appbdd\modele\Platform;
use appbdd\modele\Rating_board;
use appbdd\modele\Similar_games;
use appbdd\modele\Theme;




$db = new DB();
$db->addConnection(parse_ini_file(__DIR__.'/src/config/dbconfig.ini'));
$db->setAsGlobal();
$db->bootEloquent();

//Requête 1 :

/*
$req1 = Game::where( 'name', 'like', '%mario%' )->get();

foreach ($req1 as $l){
    echo "{$l->id},{$l->name}";
    echo"<br>";
}
*/

//Requête 2 :

$req2 = Company::where( 'location_country', '=', 'japon' )->get();
/*
foreach ($req2 as $l){
    echo "{$l->id},{$l->name}";
    echo"<br>";
}*/

//Requête 3 :

/*
$req3 = Platform::where( 'install_base', '>=', 10000000 )->get();

foreach ($req3 as $l){
    echo "{$l->id},{$l->name}, nombre d'installe : {$l->install_base}";
    echo"<br>";
}
*/

//Requête 4 :

/*
$req4 = Game::where( 'id', '>=', 21173 )->take(442)->get();

foreach ($req4 as $l){
    echo "{$l->id}, {$l->name}";
    echo"<br>";
}
*/

//Requête 5 :
/*

$req5 = Game::get();

foreach ($req5 as $l){
    echo "Le jeu {$l->id} a pour nom <strong>{$l->name}</strong>, a comme deck {$l->deck}";
    echo"<br>";
}
*/
/*
$req6 = Game::find(12342);
echo "NOM DU JEU :" . $req6;

$r = $req6->character()->get();
echo "<br> <br> PERSOS : <br>";
foreach($r as $value){
    echo 'id : ' . $value->id . ' name : ' .$value->name . ' deck : ' . $value->deck ."<br>" ;
}*/

$req7 = Game::where('name','like', 'mario%' )->get();
foreach($req7 as $value){
    echo "Nom du jeu " . $value->name . "<br>";
    echo "Nom Perso : <br>";
    $r2 = $value->character()->get();
    foreach($r2 as $v){
        echo $v->name . '<br>';
    }
} 