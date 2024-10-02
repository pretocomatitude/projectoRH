<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recrutamento extends Model
{ 
use HasFactory;

protected $fillable = ['nome','categoria','datanascimento','telefone','nbi','email','genero'];

}