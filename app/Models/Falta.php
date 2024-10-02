<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Falta extends Model
{
    use HasFactory;
    //de muitos para muitos 
    public function funcionario(){
        return $this-> belongsTo(Funcionario::class);
    }
}
