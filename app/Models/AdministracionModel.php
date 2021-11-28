<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministracionModel extends Model
{
    use HasFactory;//lo enlazamos con la tabla administrador
    protected $table="administrador";
    protected $primarykey="id";
    protected $fillable=['nombre','apellido','celular','estado'];
}
