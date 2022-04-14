<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role;
use App\Models\Area;

class Empleado extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'empleado';
    protected $fillable = ['nombre', 'email', 'sexo', 'area_id', 'boletin', 'descripcion'];



    public function roles(){
      return $this->belongsToMany(Role::class, 'empleado_rol', 'empleado_id', 'rol_id');
    }

    public function area(){
      return $this->belongsTo(Area::class);
    }
}
