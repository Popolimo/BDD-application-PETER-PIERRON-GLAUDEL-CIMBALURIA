<?php
declare(strict_types=1);

// NAMESPACE
namespace appbdd\modele;

/**
 * Classe Item
 * Représente un item au sein de la base de données
 * Hérite de la classe Modele du module Eloquent
 */
class Character extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'character';
    protected $primaryKey = 'id';

    // CONSTRUCTEUR
    public function game() {
        return $this->belongsToMany(Game::class, 
                                    Game2character::class,
                                    'character_id',
                                    'game_id');
    }

    public function game2() {
        return $this->belongsToMany(Game::class,
                            'game_id');
    }

    public function friends() {
        return $this->belongsToMany(Character::class, 
                                    Friends::class,
                                    'char1_id',
                                    'char2_id');
    }

    public function enemies() {
        return $this->belongsToMany(Character::class, 
                                    Enemies::class,
                                    'char1_id',
                                    'char2_id');
    }

}
