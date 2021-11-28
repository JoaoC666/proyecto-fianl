<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    use HasFactory;
    protected $table="cliente";
    protected $primarykey="id";
    protected $fillable=['nombre','alarma','apellido','celular','estado'];
    public function categoriadato(){
        return $this->hasOne(PersonalModel::class,'id','alarma');
}
}
