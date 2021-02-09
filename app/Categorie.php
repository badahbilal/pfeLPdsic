<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{

    protected $primaryKey = 'idCat';

    public function produits(){
        return $this->hasMany("App\Produit",'idProd');
    }
}
