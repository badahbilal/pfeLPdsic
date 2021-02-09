<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{

    protected $primaryKey = 'idProd';

    public function categorie(){
        return $this->belongsTo("App\Categorie",'idCat');
    }
}
