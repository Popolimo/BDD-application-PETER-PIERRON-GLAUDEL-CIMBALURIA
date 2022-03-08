<?php
declare(strict_types=1);

// NAMESPACE
namespace appbdd\modele;

/**
 * Classe Item
 * Représente un item au sein de la base de données
 * Hérite de la classe Modele du module Eloquent
 */
class Theme extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'theme';
    protected $primaryKey = 'id';

    // CONSTRUCTEUR
    public function game() {
        return $this->belongsToMany(Game::class, 
                                    Game2theme::class,
                                    'theme_id',
                                    'game_id');
    }

}
