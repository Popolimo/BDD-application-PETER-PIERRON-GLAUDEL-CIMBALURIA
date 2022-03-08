<?php
declare(strict_types=1);

// NAMESPACE
namespace appbdd\modele;

/**
 * Classe Item
 * Représente un item au sein de la base de données
 * Hérite de la classe Modele du module Eloquent
 */
class Similar_games extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'similar_games';
    //protected $primaryKey = 'id';

    // CONSTRUCTEUR
/*
    public function liste()
    {
        return $this->belongsTo('\mywishlist\modele\Liste', 'liste_id');
    }*/

}
