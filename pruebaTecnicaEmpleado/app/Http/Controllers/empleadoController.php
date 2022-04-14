<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Area;
use App\Models\Role;

class empleadoController extends Controller
{
    public function vistaListarEmpleados(){
      $empleadoM = new Empleado();
      $empleado = $empleadoM->get()->all();
      return view('empleado/listaEmpleados', ['empleados' => $empleado]);
    }

    public function vistaCrearEmpleado(){
      $areaM = new Area();
      $areas = $areaM->get()->all();
      $roleM = new Role();
      $roles = $roleM->get()->all();
      return view('empleado/crearEmpleado', ['areas' => $areas, 'roles' => $roles]);
    }

    public function vistaModificarEmpleado(Request $request, $idEmpleado){
      $empleadoM = new Empleado();
      $empleado = $empleadoM->find($idEmpleado);
      $rolesE = array();
      foreach($empleado->roles as $rol){
        array_push($rolesE, $rol['id']);
      }
      $empleado['id_roles'] = $rolesE;
      $areaM = new Area();
      $areas = $areaM->get()->all();
      $roleM = new Role();
      $roles = $roleM->get()->all();
      return view('empleado/modificarEmpleado', ['empleado' => $empleado, 'areas' => $areas, 'roles' => $roles]);
    }

    public function crearEmpleado(Request $request){
      $empleadoF = $request->all();
      $empleadoM = new Empleado();
      $empleadoM->nombre = $empleadoF['nombre'];
      $empleadoM->email = $empleadoF['email'];
      $empleadoM->sexo = $empleadoF['sexo'];
      $empleadoM->area_id = $empleadoF['area'];
      $empleadoM->descripcion = $empleadoF['descripcion'];

      if(isset($empleadoF['boletin'])){
        $boletin = ($empleadoF['boletin'] == "on") ? 1 : 0;
      }else{
        $boletin = 0;
      }

      $empleadoM->boletin = $boletin;
      $empleadoM->save();
      foreach($empleadoF['lista_roles'] as $idRol){
        $empleadoM->roles()->attach($idRol);
      }

      return redirect('empleado/')->withErrors(['mensaje' => 'Se ha creado correctamente']);
    }


    public function modificarEmpleado(Request $request){
      $empleadoF = $request->all();
      $empleadoM = Empleado::find($empleadoF['id']);
      $empleadoM->nombre = $empleadoF['nombre'];
      $empleadoM->email = $empleadoF['email'];
      $empleadoM->sexo = $empleadoF['sexo'];
      $empleadoM->area_id = $empleadoF['area'];
      $empleadoM->descripcion = $empleadoF['descripcion'];

      if(isset($empleadoF['boletin'])){
        $boletin = ($empleadoF['boletin'] == "on") ? 1 : 0;
      }else{
        $boletin = 0;
      }

      $empleadoM->boletin = $boletin;
      $empleadoM->save();

      foreach($empleadoM->roles as $rol){
        $empleadoM->roles()->detach($rol['id']);
      }

      foreach($empleadoF['lista_roles'] as $idRol){
        $empleadoM->roles()->attach($idRol);
      }

      return redirect('empleado/')->withErrors(['mensaje' => 'Se ha modificado correctamente']);
    }

    public function eliminarEmpleado(Request $request, $idEmpleado){
      $empleadoM = new Empleado();
      $empleado = $empleadoM->find($idEmpleado);
      $empleado->delete();
      return redirect('empleado/')->withErrors(['mensaje' => 'Se ha eliminado correctamente']);
    }

}
