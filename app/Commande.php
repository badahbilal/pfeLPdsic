<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $primaryKey = 'idCom';


    public function distributeur(){
        return $this->belongsTo("App\Distributeur",'idDis');
    }


    public function client(){
        return $this->belongsTo("App\User",'idClient');
    }
}
