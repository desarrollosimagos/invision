$(document).ready(function() {
	// Capturamos la base_url
    var base_url = $("#base_url").val();
    
    
    $('#tab_users').DataTable({
       "paging": true,
       "lengthChange": false,
       "autoWidth": false,
       "searching": true,
       "ordering": true,
       "info": true,
       dom: '<"html5buttons"B>lTfgitp',
       buttons: [
           { extend: 'copy'},
           {extend: 'csv'},
           {extend: 'excel', title: 'ExampleFile'},
           {extend: 'pdf', title: 'ExampleFile'},

           {extend: 'print',
            customize: function (win){
                   $(win.document.body).addClass('white-bg');
                   $(win.document.body).css('font-size', '10px');

                   $(win.document.body).find('table')
                           .addClass('compact')
                           .css('font-size', 'inherit');
           }
           }
       ],
       "iDisplayLength": 5,
       "iDisplayStart": 0,
       "sPaginationType": "full_numbers",
       "aLengthMenu": [5, 10, 15],
       "oLanguage": {"sUrl": base_url+"assets/js/es.txt"},
       "aoColumns": [
           {"sClass": "registro center", "sWidth": "5%"},
           {"sClass": "registro center", "sWidth": "10%"},
           {"sClass": "registro center", "sWidth": "10%"},
           {"sClass": "registro center", "sWidth": "10%"},
           {"sClass": "none", "sWidth": "8%"},
           {"sClass": "none", "sWidth": "8%"},
           {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
           {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
       ]       
    });   
                
	// Función para activar/desactivar un usuario
	$("table#tab_users").on('click', 'input.activar_desactivar', function (e) {
		e.preventDefault();
		var id = this.getAttribute('id');
		//alert(id)
		
		var check = $(this);
		
		//~ alert(check.prop('checked'));
		
		var accion = '';
		if (check.is(':checked')) {
            accion = 'activar';
        }else{
			accion = 'desactivar';
		}
		
		swal({
			title: accion.charAt(0).toUpperCase()+accion.substring(1)+" registro",
			text: "¿Desea "+accion+" el Usuario?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: accion.charAt(0).toUpperCase()+accion.substring(1),
			cancelButtonText: "Cancelar",
			closeOnConfirm: false,
			closeOnCancel: true
		  },
		  function(isConfirm){
			if (isConfirm) {

			  $("#motivo_anulacion").val('');
				$("#accion").val(accion);
				
				var mensaje = "";
				if (accion == 'desactivar'){
					mensaje = "desactivado";
				}else{
					mensaje = "activado";
				}
				
				//~ alert("código de la factura: "+$("#codfactura").val());
				//~ alert("motivo de la anulación: "+$("#motivo_anulacion").val());
				
				$.post(base_url+'CUser/update_status/' + id, {'accion':accion}, function(response) {
					swal("El usuario fue "+mensaje+" exitosamente");
					location.reload();
				})
			} 
		  });
	   
	});
        
    $('input').on({
        keypress: function () {
            $(this).parent('div').removeClass('has-error');
        }
    });

    $('#volver2').click(function () {
        url = '../users/';
        window.location = url;
    });
    
    $('#volver').click(function () {
        url = base_url+'users/';
        window.location = url;
    });

	$("#profile").select2('val', $("#id_profile").val());
    $("#status").select2('val', $("#id_status").val());

	
	$('#status').change(function (){
		
		$('#status').parent('div').removeClass("has-error");
	
	});
	
	// Al cargar la página validamos las acciones que se deben mostrar
	var perfil = $("#profile").find('option').filter(':selected').text();
	if(perfil == 'ADMINISTRADOR'){
		$('#admin').val(1);
	}else{
		$('#admin').val(0);
	}
	//~ 
	//~ if(perfil == "FRANQUICIA" || perfil == "franquicia"){
		//~ $("#tiendas").css("display","block");
	//~ }else{
		//~ $("#tiendas").css("display","none");
		//~ $("#tienda").val("0");
	//~ }
	var perfil_id = $("#profile").val();
	var usuario_id = $("#id").val();
	if(perfil_id != '0'){
		$.post(base_url+'CUser/search_actions', $.param({'profile_id':perfil_id}), function (response) {
			//~ alert(response);
			var selectedValues = new Array();  // Arreglo donde almacenaremos los ids de las acciones a marcar
			var option = "";
			$.each(response, function (i) {
				option += "<option value=" + response[i]['id'] + ">" + response[i]['name'] + "</option>";
				if(perfil == 'ADMINISTRADOR'){
					selectedValues[i] = response[i]['id'];  // Añadimos el id de la acción a marcar
				}
			});
			$('#actions_ids').append(option);
			$('#actions_ids').select2('val', selectedValues);  // Marcamos
		}, 'json');
		// Si estamos editando un usuario buscamos las acciones asociadas a él y las añadimos a la lista
		if(usuario_id != '' && perfil != 'ADMINISTRADOR'){
			$.post(base_url+'CUser/search_actions2', $.param({'user_id':usuario_id}), function (response) {
				var selectedValues = new Array();  // Arreglo donde almacenaremos los ids de las acciones a marcar
				var option = "";
				$.each(response, function (i) {
					// Primero removemos la opción igual a la que vamos a imprimir (evitará redundancia de datos)
					$("#actions_ids option[value='"+response[i]['id']+"']").remove();
					option = "<option value=" + response[i]['id'] + ">" + response[i]['name'] + "</option>";
					$('#actions_ids').append(option);
					selectedValues[i] = response[i]['id'];  // Añadimos el id de la acción a marcar
					$('#actions_ids').select2('val', selectedValues);  // Marcamos
				});
			}, 'json');
		}
	}
	
	// Al cambiar el perfil validamos las acciones que se deben mostrar
	$('#profile').change(function (){
		
		$('#profile').parent('div').removeClass("has-error");
		
		var perfil = $("#profile").find('option').filter(':selected').text();
		if(perfil == 'ADMINISTRADOR'){
			$('#admin').val(1);
		}else{
			$('#admin').val(0);
		}
		//~ 
		//~ if(perfil == "FRANQUICIA" || perfil == "franquicia"){
			//~ $("#tiendas").css("display","block");
		//~ }else{
			//~ $("#tiendas").css("display","none");
			//~ $("#tienda").val("0");
		//~ }
		var perfil_id = $("#profile").val();
		var usuario_id = $("#id").val();
		//~ $('#actions_ids').find('option:gt(0)').remove().end().select2('val', '0');
		$('#actions_ids').find('option').remove().end();
		
		if(perfil_id != '0'){
			$.post(base_url+'CUser/search_actions', $.param({'profile_id':perfil_id}), function (response) {
				// alert(response);
				var selectedValues = new Array();  // Arreglo donde almacenaremos los ids de las acciones a marcar
				var option = "";
				$.each(response, function (i) {
					option += "<option value=" + response[i]['id'] + ">" + response[i]['name'] + "</option>";
					if(perfil == 'ADMINISTRADOR'){
						selectedValues[i] = response[i]['id'];  // Añadimos el id de la acción a marcar
					}
				});
				$('#actions_ids').append(option);
				$('#actions_ids').select2('val', selectedValues);  // Marcamos
			}, 'json');
			// Si estamos editando un usuario buscamos las acciones asociadas a él y las añadimos a la lista
			if(usuario_id != '' && perfil != 'ADMINISTRADOR'){
				$.post(base_url+'CUser/search_actions2', $.param({'user_id':usuario_id}), function (response) {
					var selectedValues = new Array();  // Arreglo donde almacenaremos los ids de las acciones a marcar
					var option = "";
					$.each(response, function (i) {
						// Primero removemos la opción igual a la que vamos a imprimir (evitará redundancia de datos)
						$("#actions_ids option[value='"+response[i]['id']+"']").remove();
						option = "<option value=" + response[i]['id'] + ">" + response[i]['name'] + "</option>";
						$('#actions_ids').append(option);
						selectedValues[i] = response[i]['id'];  // Añadimos el id de la acción a marcar
						$('#actions_ids').select2('val', selectedValues);  // Marcamos
					});
				}, 'json');
			}
		}
	
	});

    $("#edit").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto
        // Expresion regular para validar el correo
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

        if ($('#name').val().trim() === "") {

          
		   swal("Disculpe,", "para continuar debe ingresar nombre");
	       $('#name').parent('div').addClass('has-error');
        } else if ($('#lastname').val().trim() === "") {
          
		   swal("Disculpe,", "para continuar debe ingresar el apellido");
	       $('#lastname').parent('div').addClass('has-error');
		   
        } else if ($('#username').val().trim() === "") {
          
		   swal("Disculpe,", "para continuar debe ingresar el nombre de usuario");
	       $('#username').parent('div').addClass('has-error');
		   
        } else if (!(regex.test($('#username').val().trim()))){
			
			swal("Disculpe,", "el usuario debe ser una dirección de correo electrónico válida");
			$('#username').parent('div').addClass('has-error');
			
		}  /*else if ($('#password').val().trim() === "") {
          
		   swal("Disculpe,", "para continuar debe ingresar la contraseña");
	       $('#password').parent('div').addClass('has-error');
		   
        } else if ($('#passw1').val().trim() === "") {
          
		   swal("Disculpe,", "debe confirmar la contraseña");
	       $('#passw1').parent('div').addClass('has-error');
		   
        } else if ($('#passw1').val().trim() != $('#password').val().trim()) {
          
		   swal("Disculpe,", "las contraseñas deben ser iguales");
	       $('#password').parent('div').addClass('has-error');
		   $('#passw1').parent('div').addClass('has-error');
		   
        } */ else if ($('#profile').val() == '0') {
			
		  swal("Disculpe,", "para continuar debe seleccionar el perfil");
	       $('#profile').parent('div').addClass('has-error');
		   
		} /*else if (($("#profile").find('option').filter(':selected').text() == "FRANQUICIA" || $("#profile").find('option').filter(':selected').text() == "franquicia") && $('#tienda').val() == '0') {
			
		  swal("Disculpe,", "para continuar debe seleccionar la franquicia");
	       $('#tienda').parent('div').addClass('has-error');
		   
		}*/ else {
			//~ alert($('#tiendas').val());
			
			// Construimos la data de permisología leyendo las filas de la tabla
			var campos= "";
			var data = [];
			$("#tab_acciones tbody tr").each(function () {
				var campo0, campo1, campo2, campo3, campo4, campo5;
				//~ campo0 = $(this).attr('id');  // Id del usuario
				campo1 = $(this).find('td').eq(0).text();
				campo2 = $(this).find('td').eq(1).text();
				if($(this).find('input').eq(0).is(':checked')){
					campo3 = '7';
				}else{
					campo3 = '0';
				}
				if($(this).find('input').eq(1).is(':checked')){
					campo4 = '7';
				}else{
					campo4 = '0';
				}
				if($(this).find('input').eq(2).is(':checked')){
					campo5 = '7';
				}else{
					campo5 = '0';
				}
				
				campos = { "id" : campo1, "accion" : campo2, "crear" : campo3, "editar" : campo4, "eliminar" : campo5 },
				data.push(campos);
			});

            $.post(base_url+'CUser/update', $('#form_users').serialize()+'&'+$.param({'tiendas_ids':$('#tiendas').val(),'actions_ids':$('#actions_ids').val(), 'data':data}), function (response) {

				if (response == 'existe') {
                    swal("Disculpe,", "este nombre de usuario se encuentra registrado");
                }else{
					swal({ 
						title: "Actualizar",
						 text: "Guardado con exito",
						  type: "success" 
						},
					function(){
					  window.location.href = '../users';
					});
				}

            });
        }

    });

    $("#registrar").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto
        // Expresion regular para validar el correo
		var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

        if ($('#name').val().trim() === "") {

          
		   swal("Disculpe,", "para continuar debe ingresar nombre");
	       $('#name').parent('div').addClass('has-error');
        } else if ($('#lastname').val().trim() === "") {
          
		   swal("Disculpe,", "para continuar debe ingresar el apellido");
	       $('#lastname').parent('div').addClass('has-error');
		   
        } else if ($('#username').val().trim() === "") {
          
		   swal("Disculpe,", "para continuar debe ingresar el nombre de usuario");
	       $('#username').parent('div').addClass('has-error');
		   
        } else if (!(regex.test($('#username').val().trim()))){
			
			swal("Disculpe,", "el usuario debe ser una dirección de correo electrónico válida");
			$('#username').parent('div').addClass('has-error');
			
		}  else if ($('#password').val().trim() === "") {
          
		   swal("Disculpe,", "para continuar debe ingresar el nombre de usuario");
	       $('#password').parent('div').addClass('has-error');
		   
        } else if ($('#passw1').val().trim() === "") {
          
		   swal("Disculpe,", "debe confirmar la contraseña");
	       $('#passw1').parent('div').addClass('has-error');
		   
        }else if ($('#passw1').val().trim() != $('#password').val().trim()) {
          
		   swal("Disculpe,", "las contraseñas deben ser iguales");
	       $('#password').parent('div').addClass('has-error');
		   $('#passw1').parent('div').addClass('has-error');
		   
        } else if ($('#profile').val() == '0') {
			
		  swal("Disculpe,", "para continuar debe seleccionar el perfil");
	       $('#profile').parent('div').addClass('has-error');
		   
		} /*else if (($("#profile").find('option').filter(':selected').text() == "FRANQUICIA" || $("#profile").find('option').filter(':selected').text() == "franquicia") && $('#tienda').val() == '0') {
			
		  swal("Disculpe,", "para continuar debe seleccionar la franquicia");
	       $('#tienda').parent('div').addClass('has-error');
		   
		}*/ else {
			//~ alert($('#tiendas').val());

            $.post(base_url+'CUser/add', $('#form_users').serialize()+'&'+$.param({'tiendas_ids':$('#tiendas').val(),'actions_ids':$('#actions_ids').val()}), function (response) {

				if (response == 'existe') {
                    swal("Disculpe,", "este nombre de usuario se encuentra registrado");
                }else{
					swal({ 
						title: "Registro",
						 text: "Guardado con exito",
						  type: "success"
						},
					function(){
					  window.location.href = 'users';
					});

				}

            });
        }

    });
    
    $("#actions_ids").ready(function() {
		// Función para la interacción del combo select2 y la lista datatable
		$("#actions_ids").on('change', function () {
			
			var ids_actions = $(this).val();
			var data_actions = $(this).select2('data');
			
			// Comparamos las acciones del select con las de la lista y agregamos las que falten
			$.each(data_actions, function (index, value){
				// alert(index + ": " + value.id);
				var contador = 0;  // Para verificar si la acción ya está en la tabla
				$("#tab_acciones tbody tr").each(function (index){
					var id_action = $(this).find('td').eq(0).text();
				
					if(value.id == id_action){
						contador += 1;
					}
				})
				//~ alert(contador+"-"+value.text);
				// Si la acción no está en la tabla, la añadimos
				if(contador == 0){
					var table = $('#tab_acciones').DataTable();
					var id_new_action = value.id;
					var name_new_action = value.text;
					var permission_new_action = '<input type="checkbox" id="">';
					var i = table.row.add( [ id_new_action, name_new_action, permission_new_action, permission_new_action, permission_new_action ] ).draw();
					table.rows(i).nodes().to$().attr("id", $("#id").val());
				}
			});
			
			// Comparamos las acciones de la lista con las del combo select y eliminamos las que sobren
			$("#tab_acciones tbody tr").each(function (index){
				var id_action = $(this).find('td').eq(0).text();
				var contador2 = 0  // Para verificar si la acción está en la tabla
				
				// Recorremos la lista de ids capturados del combo select2
				$.each(ids_actions, function (index, value){
					if(id_action == value) {
						contador2 += 1;
					}
				})
				// Si el contador es igual a cero, significa que la acción ha sido borrada del combo select, por tanto la quitamos también de la lista
				if(contador2 == 0) {
					// Borramos la línea correspondiente (línea actual)
					var table = $('#tab_acciones').DataTable();
					table.row($(this)).remove().draw();
				}
				
			});

		});
	});
    
});
