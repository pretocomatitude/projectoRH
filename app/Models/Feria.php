<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    use HasFactory;
    
    public function funcionario(){
        return $this->belongTo(Feria::class,'funcionario_id');
}
}
