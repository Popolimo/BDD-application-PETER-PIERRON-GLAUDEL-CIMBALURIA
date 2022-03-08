<?php
declare(strict_types=1);

// NAMESPACE
namespace appbdd\modele;

/**
 * Classe Item
 * Représente un item au sein de la base de données
 * Hérite de la classe Modele du module Eloquent
 */
class Genre extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'genre';
    protected $primaryKey = 'id';

    // CONSTRUCTEUR
    public function game()
    {
        return $this->belongsToMany(Game::class, 
                                    Game2genre::class,
                                    'genre_id',
                                    'game_id');
    }

}
