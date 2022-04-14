@extends('empleado\baseEmpleados')

@section('css')
<link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
<link href="{{ asset('css/listaEmpleados.css') }}" rel="stylesheet">
<link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">
@stop

@section('cabecera') Lista de empleados @stop

@section('cuerpo')
  <div class="w-full px-20 py-16 border-b border-gray-200 shadow flex flex-col">
    <div class="w-full flex flex-row-reverse">
      <span class="mb-3">
        <a href="crearEmpleado" class="bg-blue-600 px-3 py-1 flex rounded hover:bg-blue-700">
          <img src="{{ asset('images/agregar.png') }}" alt="" class="inline-block pr-1" width="20px" height="20px">
          <p class="text-base text-white">Crear</p>
        </a>
      </span>
    </div>
    <table id="datatable" class="p-4 border">
      <thead class="bg-gray-50">
        <tr>
          <th class="p-8 text-xs text-gray-500">
            <img src="{{ asset('images/user.png') }}" alt="" class="inline-block pr-1">
            Nombre
          </th>
          <th class="p-8 text-xs text-gray-500">
            <img src="{{ asset('images/at.png') }}" alt="" class="inline-block pr-1">
            Email
          </th>
          <th class="p-8 text-xs text-gray-500">
            <img src="{{ asset('images/gender.png') }}" alt="" class="inline-block pr-1">
            Sexo
          </th>
          <th class="p-8 text-xs text-gray-500">
            <img src="{{ asset('images/maletin.png') }}" alt="" class="inline-block pr-1">
            Área
          </th>
          <th class="p-8 text-xs text-gray-500">
            <img src="{{ asset('images/email.png') }}" alt="" class="inline-block pr-1">
            Boletin
          </th>
          <th class="p-8 text-xs text-gray-500">
                Modificar
          </th>
          <th class="p-8 text-xs text-gray-500">
            Eliminar
          </th>
        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach($empleados as $indice => $empleado)
          <tr class="whitespace-nowrap">
            <td class="px-6 py-4 text-sm text-center text-gray-500">
              {{ $empleado['nombre'] }}
            </td>
            <td class="px-6 py-4 text-sm text-center text-gray-500">
              {{ $empleado['email'] }}
            </td>
            <td class="px-6 py-4 text-sm text-center text-gray-500">
              {{ $empleado['sexo'] }}
            </td>
            <td class="px-6 py-4 text-sm text-center text-gray-500">
              {{ $empleado->area->nombre }}
            </td>
            <td class="px-6 py-4 text-sm text-center text-gray-500">
              {{ ($empleado['boletin'] == 0) ? "NO" : "SI" }}
            </td>
            <td class="px-6 py-4 text-sm text-center text-gray-500">
              <a href="modificarEmpleado/{{ $empleado['id'] }}">
                <img src="{{ asset('images/editar.png') }}" alt="" class="inline-block pr-1">
              </a>
            </td>
            <td class="px-6 py-4 text-sm text-center text-gray-500">
              <button name="eliminar" type="button" id="{{ $empleado['id'] }}">
                  <img src="{{ asset('images/eliminar.png') }}" alt="" class="inline-block pr-1">
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @section('js')
    <script src="{{ asset('jsIncludes/jquery.js') }}" charset="utf-8"></script>
    <script src="{{ asset('jsIncludes/jquery.dataTables.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('jsIncludes/sweetalert2.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/listaEmpleados.js') }}" charset="utf-8"></script>
  @stop
@stop
