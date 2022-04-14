@extends('empleado\baseEmpleados')

@section('css')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">
@stop

@section('cabecera') Crear empleado @stop

@section('cuerpo')
  <form id="modificarEmpleado" class="w-full h-full px-20 py-12 border-b border-gray-200 shadow flex flex-col items-center"
   method="POST" action="{{ route('modificarEmpleado') }}">
   @csrf

   <input type="text" hidden name="id" value="{{$empleado['id']}}">
    <div class="bg-blue-300 h-20 w-3/6 px-10 flex items-center rounded">
      <h1 class="text-indigo-500 font-serif text-base">Los campos con asteriscos (*) son obligatorios</h1>
    </div>

    <div class="w-3/6 px-5 mt-5 h-full">

        <div class="w-full h-14">
          <div class="w-full flex">
            <div class="w-2/6 flex flex-row-reverse flex items-center">
              <label class="font-semibold" for="nombre">Nombre completo *: </label>
            </div>
            <div class="w-4/6 px-5">
              <input value="{{ $empleado['nombre'] }}" class="w-full px-3 py-1 border rounded text-base focus:outline-none focus:ring-1 focus:border-transparent focus:ring-blue-500 text-gray-700"
              placeholder="Nombre completo del empleado" maxLength="255" required name="nombre" id="nombre" type="text">
            </div>
          </div>
          <div class="w-full flex h-6 flex-row-reverse px-3">
            <div class="w-4/6 px-5">
              <p id="nombreE" class="text-xs text-red-500 wt-0"></p>
            </div>
          </div>
        </div>


        <div class="w-full h-14">
          <div class="w-full flex">
            <div class="w-2/6 flex flex-row-reverse flex items-center">
              <label class="font-semibold" for="email">Correo electronico *: </label>
            </div>
            <div class="w-4/6 px-5">
              <input value="{{ $empleado['email'] }}" class="w-full px-3 py-1 border rounded text-base focus:outline-none focus:ring-1 focus:border-transparent focus:ring-blue-500 text-gray-700"
              placeholder="Correo electronico" name="email" maxLength="255" id="email" required type="text">
            </div>
          </div>
          <div class="w-full flex h-6 flex-row-reverse px-3">
            <div class="w-4/6 px-5">
              <p id="correoE" class="text-xs text-red-500 wt-0"></p>
            </div>
          </div>
        </div>


        <div class="w-full h-14">
          <div class="w-full flex">
            <div class="w-2/6 flex flex-row-reverse flex items-center">
              <label class="font-semibold" for="sexo">Sexo *: </label>
            </div>
            <div class="w-4/6 px-5 flex flex-col">
              <span>
                @php $sexoM = ($empleado['sexo'] == "M") ? 'checked' : ''; @endphp
                <input class="" name="sexo" type="radio" value="M" {{  $sexoM }} required><label> Masculino</label>
              </span>
              <span>
                @php $sexoF = ($empleado['sexo'] == "F") ? 'checked' : ''; @endphp
                <input class="" name="sexo" type="radio" {{$sexoF}} value="F"><label> Femenino</label>
              </span>
            </div>
          </div>
        </div>

        <div class="w-full h-14">
          <div class="w-full flex">
            <div class="w-2/6 flex flex-row-reverse flex items-center">
              <label class="font-semibold" for="areas">Area *: </label>
            </div>
            <div class="w-4/6 px-5 flex flex-col">
              <select required class="w-full px-3 py-1 border rounded text-base focus:outline-none focus:ring-1 focus:border-transparent focus:ring-blue-500 text-gray-700" name="area">
                @foreach($areas as $area)
                @php $marcado = ($empleado['area_id'] == $area['id']) ? 'selected' : '' @endphp
                <option value="{{$area['id']}}" {{ $marcado }}>{{$area['nombre']}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="w-full h-20">
          <div class="w-full flex">
            <div class="w-2/6 flex flex-row-reverse flex items-center">
              <label class="font-semibold" for="areas">Descripcion *: </label>
            </div>
            <div class="w-4/6 px-5 flex flex-col">
              <textarea name="descripcion" rows="2" cols="10" required
              class="w-full px-3 py-1 border rounded text-base focus:outline-none focus:ring-1 focus:border-transparent focus:ring-blue-500 text-gray-700" style="resize:none;">{{$empleado['descripcion']}}</textarea>
            </div>
          </div>
        </div>

        <div class="w-full h-10">
          <div class="w-full flex">
            <div class="w-2/6 flex flex-row-reverse flex items-center">
              <label class="font-semibold" for="areas"></label>
            </div>
            <div class="w-4/6 px-5 flex flex-col">
              <span>
                @php $boletinM = ($empleado['boletin'] == 1) ? "checked" : "" @endphp
                <input class="" name="boletin" type="checkbox" {{$boletinM}} ><label> Deseo recibir boletin informativo</label>
              </span>
            </div>
          </div>
        </div>

        <div class="w-full">
          <div class="w-full flex">
            <div class="w-2/6 flex flex-row-reverse flex items-center">
              <label class="font-semibold" for="areas">Roles *: </label>
            </div>
            <div class="w-4/6 px-5">
              <div name="grupo" class="flex flex-col checkbox-group required">
                @foreach($roles as $rol)
                <span>
                  @php $marcadoR = in_array($rol['id'], $empleado['id_roles']) ? 'checked' : '' @endphp
                  <input class="" name="lista_roles[]" {{ $marcadoR }} type="checkbox" value="{{ $rol['id'] }}"><label> {{$rol['nombre']}}</label>
                </span>
                @endforeach
              </div>
            </div>
          </div>

          <div class="w-full flex h-6 flex-row-reverse px-3">
            <div class="w-4/6 px-5">
              <p id="rolesE" class="text-xs text-red-500 wt-0"></p>
            </div>
          </div>
        </div>


        <div class="w-full h-14">
          <div class="w-full flex">
            <div class="w-2/6 flex flex-row-reverse flex items-center">
              <label class="font-semibold" for="areas"></label>
            </div>
            <div class="w-4/6 px-5 flex flex-col">
              <span>
                <input id="guardar" class="bg-blue-500 text-white py-2 px-5 rounded cursor-pointer focus:outline-none hover:bg-blue-600" type="submit" value="Guardar">
              </span>
            </div>
          </div>
        </div>



    </form>

  </div>
@stop


@section('js')
  <script src="{{ asset('jsIncludes/jquery.js') }}" charset="utf-8"></script>
  <script src="{{ asset('jsIncludes/jquery.dataTables.min.js') }}" charset="utf-8"></script>
  <script src="{{ asset('jsIncludes/sweetalert2.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/modificarEmpleado.js') }}" charset="utf-8"></script>
@stop
