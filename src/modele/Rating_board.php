<?php
declare(strict_types=1);

// NAMESPACE
namespace appbdd\modele;

/**
 * Classe Item
 * Représente un item au sein de la base de données
 * Hérite de la classe Modele du module Eloquent
 */
class Rating_board extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'rating_board';
    protected $primaryKey = 'id';

    // CONSTRUCTEUR
    public function ratingBoard() {
        return $this->hasMany(Game_rating::class, 
                            'GameRating_id');
    }

}
