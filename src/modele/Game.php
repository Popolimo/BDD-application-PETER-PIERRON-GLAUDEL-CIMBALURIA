<?php
declare(strict_types=1);

// NAMESPACE
namespace appbdd\modele;

/**
 * Classe Item
 * Représente un item au sein de la base de données
 * Hérite de la classe Modele du module Eloquent
 */
class Game extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'game';
    protected $primaryKey = 'id';

    // CONSTRUCTEUR

    public function genre() {
        return $this->belongsToMany(Genre::class, 
                                    Game2genre::class,
                                    'game_id',
                                    'genre_id');
    }

    public function platform() {
        return $this->belongsTo(Platform::class, 
                                Game2platform::class,
                                'game_id',
                                'platform_id');
    }

    public function theme() {
        return $this->belongsToMany(Theme::class, 
                                    Game2theme::class,
                                    'game_id',
                                    'theme_id');
    }

    public function company_dev() {
        return $this->belongsToMany(Company::class, 
                                    Game_developers::class,
                                    'game_id',
                                    'comp_id');
    }

    public function company_publi() {
        return $this->belongsToMany(Company::class, 
                                    Game_publishers::class,
                                    'game_id',
                                    'comp_id');
    }

    public function gameRating() {
        return $this->belongsToMany(Game_rating::class, 
                                    Game2rating::class,
                                    'game_id',
                                    'rating_id');
    }

    public function character() {
        return $this->belongsToMany(Character::class, 
                                    Game2character::class,
                                    'game_id',
                                    'character_id');
    }

    public function character2() {
        return $this->hasMany(Character::class,
                                    'character_id');
    }

    public function similarGames() {
        return $this->belongsToMany(Game::class, 
                                    Similar_games::class,
                                    'game1_id',
                                    'game2_id');
    }

}
