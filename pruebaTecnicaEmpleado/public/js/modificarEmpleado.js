$(document).ready(function() {

  const expresion_regular_nombre = /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/;
  const expresion_regular_correo = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

  $('#modificarEmpleado').submit(function(e){
    e.preventDefault();
    let pasar = 1

    if($('div.checkbox-group.required :checkbox:checked').length == 0){
      $('#rolesE').text('Se necesita por lo menos marcar un rol')
      pasar = 0;
    }

    const nombre = $('#nombre').val().trimEnd();
    if(!expresion_regular_nombre.test(nombre)){
      $('#nombreE').text('Solo se permiten caracteres alfabeticos en este campo')
      pasar = 0
    }else{
      $('#nombreE').text('')
    }

    const correo = $('#email').val().trimEnd();
    if(!expresion_regular_correo.test(correo)){
      $('#correoE').text('Este correo no es valido')
      pasar = 0
    }else{
      $('#correoE').text('')
    }


    if(pasar == 1){
      this.submit()
    }else{
      Swal.fire('Oops...', 'Hay errores en el formulario, por favor validar', 'error')
    }
  })


  $('input[name="roles"').on('change', function(e){
    if($(this).is(':checked')){
      $('#rolesE').text('')
    }
  })

  $('#nombre').keyup(function(e){
    const nombre = $(this).val().trimEnd();

    if(nombre != ""){
      if(!expresion_regular_nombre.test(nombre)){
        $('#nombreE').text('Solo se permiten caracteres alfabeticos en este campo')
      }else{
        $('#nombreE').text('')
      }
    }
  })

  $('#email').keyup(function(e){
    const correo = $(this).val().trimEnd();

    if(correo != ""){
      if(!expresion_regular_correo.test(correo)){
        $('#correoE').text('Este correo no es valido')
      }else{
        $('#correoE').text('')
      }
    }

  })

})
