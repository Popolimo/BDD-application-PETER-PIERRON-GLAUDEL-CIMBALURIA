<?php

namespace appbdd\modele;

class Comment extends \Illuminate\Database\Eloquent\Model
{

    // ATTRIBUTS

    public $timestamps = false;
    protected $table = 'comment';
    protected $fillable  = ['email', 'titre', 'contenu', 'dateCreation', 'dateUpdate', 'IdJeu'];

    // CONSTRUCTEUR



}
