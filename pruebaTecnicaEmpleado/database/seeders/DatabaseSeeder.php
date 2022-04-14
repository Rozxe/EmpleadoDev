<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $roles = array(
          ['nombre' => 'Desarrollador'], ['nombre' => 'Analista'], ['nombre' => 'Tester'], ['nombre' => 'Diseñador'],
          ['nombre' => 'Profesional PMO'], ['nombre' => 'Profesional de servicios'], ['nombre' => 'Auxiliar administrativo'],
          ['nombre' => 'Codirector']
        );
        DB::table('roles')->insert($roles);

        $areas = array(
          ['nombre' => 'Administrativa y Financiera'], ['nombre' =>'Ingeniería'],
          ['nombre' =>'Desarrollo de Negocio'], ['nombre' =>'Proyectos'],
          ['nombre' =>'Servicios'], ['nombre' =>'Calidad']);
        DB::table('areas')->insert($areas);

        $empleados = array(
          ['id' => 3, 'nombre' => 'Pedro Pérez', 'email' => 'pperez@example.co',
          'sexo' => 'M', 'area_id' =>  5, 'boletin' => 1, 'descripcion' => 'Hola mundo'],
          ['id' => 4, 'nombre' => 'Amalia Bayona', 'email' => 'abayona@example.co',
          'sexo' => 'F', 'area_id' =>  6, 'boletin' => 0, 'descripcion' => 'Para contactar a Amalia Bayona, puede escribir al correo electrónico abayona@example.co']
        );
        DB::table('empleado')->insert($empleados);

        $empleado_rol = array(
          ['empleado_id' => 3, 'rol_id' => 4], ['empleado_id' => 3, 'rol_id' => 7],
          ['empleado_id' => 3, 'rol_id' => 2], ['empleado_id' => 4, 'rol_id' => 1],
          ['empleado_id' => 4, 'rol_id' => 2]
          );
        DB::table('empleado_rol')->insert($empleado_rol);
    }
}
