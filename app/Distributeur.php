<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributeur extends Model
{
    protected $primaryKey = 'idDis';


    public function commandes(){
        return $this->hasMany("App\Commande",'idCom');
    }
}
