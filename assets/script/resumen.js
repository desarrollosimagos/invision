$(document).ready(function(){
	
	$('.footable').footable();  // Aplicamos el plugin footable
	
	// Capturamos la base_url
    var base_url = $("#base_url").val();	
	
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

	
	// Función para validar transacción
    $("table#tab_fondo_personal").on('click', 'a.validar', function (e) {
        e.preventDefault();
        var id = this.getAttribute('id');
        
        var cuenta_id = id.split(';');
        cuenta_id = cuenta_id[1];

        var monto = id.split(';');
        monto = monto[2];

        var tipo = id.split(';');
        tipo = tipo[3];

        var id = id.split(';');
        id = id[0];

        swal({
            title: "Validar transacción",
            text: "¿Está seguro de valdiar la transacción?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Validar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: true
          },
        function(isConfirm){
            if (isConfirm) {
             
                $.post(base_url+'fondo_personal/validar/', {'id': id, 'cuenta_id': cuenta_id, 'monto': monto, 'tipo': tipo}, function (response) {

                    if (response['response'] == 'error') {
                       
                         swal({ 
                           title: "Disculpe,",
                            text: "No se pudo validar la transacción, por favor consulte con su administrador",
                             type: "warning" 
                           },
                           function(){
                             
                         });
                    }else{
                         swal({ 
                           title: "Validado",
                            text: "Transacción validada con exito",
                             type: "success" 
                           },
                           function(){
                             window.location.href = base_url+'resumen';
                         });
                    }
                }, 'json');
            } 
        });
    });
	
});
