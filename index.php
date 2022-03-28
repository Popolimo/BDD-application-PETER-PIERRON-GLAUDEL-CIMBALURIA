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

afficher (name , deck) les personnages du jeu 12342
$req6 = Game::find(12342);
echo "NOM DU JEU :" . $req6;
$r = $req6->character()->get();
echo "<br> <br> PERSOS : <br>";
foreach($r as $value){
    echo 'id : ' . $value->id . ' name : ' .$value->name . ' deck : ' . $value->deck ."<br>" ;
}*/

/*
// Les personnages des jeux dont le nom (du jeu) débute par 'Mario'
$req7 = Game::where('name','like', 'mario%' )->get();
foreach($req7 as $value){
    echo "Nom du jeu " . $value->name . "<br>";
    echo "Nom Perso : <br>";
    $r2 = $value->character()->get();
    foreach($r2 as $v){
        echo $v->name . '<br>';
    }
} */

//es jeux développés par une compagnie dont le nom contient 'Sony'
/*
$req8 = Company::where('name','like','%Sony%')->get();
echo " Liste des jeux fait par <br> <br>";
foreach($req8 as $value){
    echo $value->name ."  :<br> <br>";
    $r8 = $value->game_dev()->get();
    foreach($r8 as $v){
        echo($v->name . "<br>");    
    }
    echo"<br><br>";
}*/


//le rating initial (indiquer le rating board) des jeux dont le nom contient Mario
/*
$req9 = Game::where('name','like', '%mario%' )->get();
foreach($req9 as $value){
    echo $value->name . "<br> <br>";
    $r9 = $value->gameRating()->get();
    foreach($r9 as $v){
    echo " nom : ". $v->name .  "<br>";
    $r99 = Rating_board::where('id','=',(string)$v->rating_board_id);
    $r999 = $r99->get();
    echo " rating_board_id : ". $r999[0]->deck .  "<br>";
    }
    echo "<br> <br>";
} */  


/*
//les jeux dont le nom débute par Mario et ayant plus de 3 personnages
$req10 = Game::where('name','like', 'mario%' )->get();
foreach($req10 as $value){
    $r10 = $value->character()->get();
    if(count($r10) > 3){
        echo "Nom du jeu " . $value->name . ",   Nb de persos : " . count($r10) ."<br>" ;
    }
}*/

/*
//les jeux dont le nom débute par Mario et dont le rating initial contient "3+" 
$req11 = Game::where('name','like', 'mario%' )->get();
$r1111 = Game_rating::where('name','like','%3+%')->get();
foreach($req11 as $value){
    $r111 = $value->gameRating()->get();
   foreach($r111 as $v){
       foreach($r1111 as $va){
            if($v->id == $va->id){
                echo $value->name . "<br>";
            }
       }
    }
}

*/

/*
//les jeux dont le nom débute par Mario, publiés par une compagnie dont le nom contient
"Inc." et dont le rating initial contient "3+"
$req12 = Game::where('name','like', 'mario%' )->get();
$r1222 = Game_rating::where('name','like','%3+%')->get();
$r13 = Company::where('name','like','%Inc.%')->get();
foreach($req12 as $value){
    $r122 = $value->gameRating()->get();
    $r123 = $value->company_publi()->get();
   foreach($r122 as $v){
       foreach($r1222 as $va){
            if($v->id == $va->id){
                foreach($r13 as $v13){
                    foreach($r123 as $v123){
                        if($v13->id == $v123->id){
                            echo "Compagnie : " . $v123->name . ", jeu : " . $value->name . ", rating : " . $v->name . ". <br> <br>";
                                
                        }
                    }
                }
            }
       }
    }
}

*/


//les jeux dont le nom débute Mario, publiés par une compagnie dont le nom contient "Inc",
//dont le rating initial contient "3+" et ayant reçu un avis de la part du rating board nommé
//"CERO"
/*
$req12 = Game::where('name','like', 'mario%' )->get();
$r1222 = Game_rating::where('name','like','%3+%')->get();
$r13 = Company::where('name','like','%Inc.%')->get();
foreach($req12 as $value){
    $r122 = $value->gameRating()->get();
    $r123 = $value->company_publi()->get();
    $c1 = false;
    $c2 = false;
   foreach($r122 as $v){
       foreach($r1222 as $va){
           
            if($v->id == $va->id){
                $c1 = true;
            }

            if($v->rating_board_id == 3){
                $c2 = true;
            }

            if($c1 == true && $c2 == true){
                foreach($r13 as $v13){
                    foreach($r123 as $v123){
                        if($v13->id == $v123->id){
                            
                            echo "Compagnie : " . $v123->name . ", jeu : " . $value->name . ", rating : " . $v->name . ", " . $va->name  .". <br> <br>";
                                
                        }
                    }
                }
            }
       }
    }
}
*/


//$cr = new Genre();
//$cr->name = "Zeldiablo";
//$cr->deck = "Oui";
//$cr->description = "Description du Z";

//$cr->save();

//Seance 3 : 2.2
/**
$aled = Company::all();


foreach ($aled as $b){
    echo $b->name." <br>";
    echo $b->description." <br>";
}
 * */


//Séance 3 : 1.1
/*
$a = microtime();
$aled = Company::all();
$b = microtime();
echo floatval($b)-floatval($a)."ms mon pote <br>";

foreach ($aled as $b){
    echo $b->name." <br>";
    echo $b->description." <br>";
}

*/
//Séance 3.2
/*
$a = microtime();
$aled = Game::where("name","like","%Mario%")->get();
$b = microtime();
echo floatval($b)-floatval($a)."ms mon pote <br>";

foreach ($aled as $b){
    echo $b->name." <br>";
    echo $b->description." <br>";
}
*/