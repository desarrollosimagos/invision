$(document).ready(function(){
	
	$('.footable').footable();  // Aplicamos el plugin footable
	
	// Capturamos la base_url
    var base_url = $("#base_url").val();
	
	
	// Función para levantar modal de vinculación de perfil
	$("#boton_vincular").on('click', function (e) {
		
		swal({
            title: "Crear y vincular perfil",
            text: "¿Está seguro de crear un nuevo perfil y vincularlo a esta cuenta?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Crear",
            cancelButtonText: "Cancelar",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm){
			
            if (isConfirm) {
             
                $("#modal_cedula").modal('show');
                
            }
            
        });
		
	});
	
	// Función para ir al formulario de registro y vinculación de perfil
	$("#vincular").on('click', function (e) {
		
		if($("#cedula").val().trim() == ''){
			
			swal("Disculpe,", "debe indicar la cédula del usuario");
			$("#cedula").focus();
			
		}else{
			
			// Validamos si el perfil ya está registrado y asociado
			$.post(base_url+'CPerfilSocial/ajax_perfil', {'cedula':$("#cedula").val().trim(), 'id_twitter':$("#id_twitter").val()}, function (response) {
				
				//~ alert(response);
				
				if (response['response'] == 'no existe') {
						
					// Redireccionamos al formulario de registro y asociación del nuevo perfil
					window.location.href = base_url+'social_profile/register?id_twitter='+$("#id_twitter").val()+'&screen_name='+$("#screen_name").val()+'&cedula='+$("#cedula").val().trim()+'&ruta='+$("#ruta_origen").val();
						
				}else if(response['response'] == 'existe asociado'){
				
					swal("Disculpe,", "el perfil ya se encuentra asociado a la cuenta");
				
				}else{
					
					swal({
						title: "Asociar perfil",
						text: "El perfil ya existe ¿desea asociarlo a la cuenta?",
						type: "warning",
						showCancelButton: true,
						confirmButtonColor: "#DD6B55",
						confirmButtonText: "Asociar",
						cancelButtonText: "Cancelar",
						closeOnConfirm: false,
						closeOnCancel: true
					},
					function(isConfirm){
						
						if (isConfirm) {
							
							var perfil_id = response['response'].split(':');
							perfil_id = perfil_id[1];
						 
							$.post(base_url+'CPerfilSocial/associate', {'perfil_id':perfil_id, 'twitter_id':$("#id_twitter").val()}, function (response2) 
							{
								
								//~ alert(response['response']);

								if (response2['response'] != 'asociado') {
									
									swal("Disculpe,", "no se pudo asociar el perfil, por favor comuniquese con su administrador");
									
								}else{
									
									swal({ 
										title: "Asociar perfil",
										text: "Asociado con exito",
										type: "success" 
									},
									function(){
										location.reload();
									});

								}

							}, 'json');
							
						}
						
					});

				}
				
			}, 'json');
		
		}
		
	});
	
	
	// Función para quitar un perfil de la cuenta en cuestión
	$("table#tab_perfiles").on('click', 'a.quitar', function (e) {
		
		var perfil_id = this.getAttribute('id');
		perfil_id = perfil_id.split(";");
		perfil_id = perfil_id[0];  // Id del perfil
		var twitter_id = this.getAttribute('id');
		twitter_id = twitter_id.split(";");
		twitter_id = twitter_id[1];  // Id del twitter
		
		swal({
            title: "Quitar perfil",
            text: "¿Está seguro de quitar el perfil asociado a la cuenta?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Quitar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: true
        },
        function(isConfirm){
			
            if (isConfirm) {
             
				$.post(base_url+'CTwitter/quitar', {'perfil_id':perfil_id, 'twitter_id':twitter_id}, function (response) {
					
					//~ alert(response['response']);

					if (response['response'] != 'ok') {
						
						swal("Disculpe,", "no se pudo quitar el perfil, por favor comuniquese con su administrador");
						
					}else{
						
						swal({ 
							title: "Quitar perfil",
							text: "Quitado con exito",
							type: "success" 
						},
						function(){
							location.reload();
						});

					}

				}, 'json');
                
            }
            
        });
		
	});
	
	
	// Función para ver un perfil de la cuenta en cuestión
	$("table#tab_perfiles").on('click', 'a.ver', function (e) {
		
		var perfil_id = this.getAttribute('id');
		perfil_id = perfil_id.split(";");
		perfil_id = perfil_id[0];  // Id del perfil
		var twitter_id = this.getAttribute('id');
		twitter_id = twitter_id.split(";");
		twitter_id = twitter_id[1];  // Id del twitter		
		var screen_name = this.getAttribute('id');
		screen_name = screen_name.split(";");
		screen_name = screen_name[2];  // Nombre del twitter		
             
		window.location.href = base_url+'social_profile/ver?id_twitter='+twitter_id+'&screen_name='+screen_name+'&id_perfil='+perfil_id+'&ruta='+$("#ruta_origen").val();
		
	});
	
	// Función para editar un perfil de la cuenta en cuestión
	$("table#tab_perfiles").on('click', 'a.editar', function (e) {
		
		var perfil_id = this.getAttribute('id');
		perfil_id = perfil_id.split(";");
		perfil_id = perfil_id[0];  // Id del perfil
		var twitter_id = this.getAttribute('id');
		twitter_id = twitter_id.split(";");
		twitter_id = twitter_id[1];  // Id del twitter
		var screen_name = this.getAttribute('id');
		screen_name = screen_name.split(";");
		screen_name = screen_name[2];  // Nombre del twitter
             
		window.location.href = base_url+'social_profile/edit?id_twitter='+twitter_id+'&screen_name='+screen_name+'&id_perfil='+perfil_id+'&ruta='+$("#ruta_origen").val();
		
	});
	
	// Función para levantar modal de envío de mensaje directo
	$("#enviar_mensaje").on('click', function (e) {
		
		$("#modal_mensaje").modal('show');
		
	});
	
});
