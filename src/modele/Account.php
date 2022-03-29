<?php

namespace appbdd\modele;

class Account extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'account';
    protected $primaryKey = 'email';
    protected $fillable  = ['email', 'nom', 'prenom', 'adresse', 'numero', 'dateNaissance'];
    // CONSTRUCTEUR

}
