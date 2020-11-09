<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    public $timestamps=false;
    protected $fillable = [ 'libelle', 'qte','prix'];
    protected $table = "produits";
}
