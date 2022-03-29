<?php

namespace appbdd\controller;

use Faker\Factory;
use \appbdd\modele;
use Faker\Provider\fr_FR\Address;
use Faker\Provider\fr_FR\Company;
use Faker\Provider\fr_FR\Person;
use Faker\Provider\fr_FR\PhoneNumber;
use Faker\Provider\Internet;
use Faker\Provider\DateTime;
use Faker\Provider\Lorem;

class TD2
{
    static function  populateBdd(){
        $faker = Factory::create();
        $faker->addProvider(new Person($faker));
        $faker->addProvider(new Address($faker));
        $faker->addProvider(new PhoneNumber($faker));
        $faker->addProvider(new Company($faker));
        $faker->addProvider(new Internet($faker));
        $faker->addProvider(new DateTime($faker));
        $faker->addProvider(new Lorem($faker));

        /*for ($i = 0; $i < 25000; $i++) {
          $obj = new modele\Account();
          $obj->email = $faker->email;
          $obj->nom = $faker->lastName;
          $obj->prenom = $faker->firstName;
          $obj->adresse = $faker->address;
          $obj->numero = $faker->phoneNumber;
          $obj->dateNaissance = $faker->dateTime;
          $obj->save();
        }*/


        for($k = 0; $k < 250000; $k++){
            $obj = new modele\Comment();
            $obj->email = $faker->email;
            $obj->contenu = $faker->realText(130);
            $obj->dateCreation = $faker->dateTime;
            $obj->dateUpdate = $faker->dateTime;
            $obj->titre = $faker->realText(25);
            $obj->IdJeu = $faker->numberBetween(1,25000);
            $obj->save();
        }
    }
}