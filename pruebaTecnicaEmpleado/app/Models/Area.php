<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;

class Area extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['nombre'];

    public function empleados(){
      return $this->hasMany(Empleado::class);
    }
}
