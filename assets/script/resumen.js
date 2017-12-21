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
	
});
