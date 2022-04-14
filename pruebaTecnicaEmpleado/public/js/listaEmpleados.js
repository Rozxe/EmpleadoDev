$(document).ready(function() {
  const traduccion = {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }

    $('#datatable').DataTable( {
        "paging":   false,
        "ordering": false,
        "info":     false,
        "language": traduccion,
        "searching":     false
    } );


    $('button[type="button"]').on('click', function(e){
      const id = this.id

      Swal.fire({
        icon: 'info',
        title: '¿Estás seguro que deseas eliminar este empleado?',
        confirmButtonText: 'Si',
        showCancelButton: true,
        cancelButtonText: 'No'
      })
      .then((respuesta) => {
        if(respuesta.isConfirmed){
          window.location.href = '/eliminarEmpleado/' + id
        }
      })
    })

});
