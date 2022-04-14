<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nombre'];


    public function empleados(){
      return $this->belongsToMany(Role::class, 'rol_id', 'empleado_id');
    }

}
