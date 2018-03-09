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
    $("table#tab_transactions").on('click', 'a.validar', function (e) {
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
            cancelButtonText: "Denegar",
            closeOnConfirm: false,
            closeOnCancel: true
          },
        function(isConfirm){
            if (isConfirm) {
             
                $.post(base_url+'transactions/validar/', {'id': id, 'cuenta_id': cuenta_id, 'monto': monto, 'tipo': tipo, 'status': 'approved'}, function (response) {

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
            }else{
				
				//~ alert('denied');
				
				$.post(base_url+'transactions/validar/', {'id': id, 'cuenta_id': cuenta_id, 'monto': monto, 'tipo': tipo, 'status': 'denied'}, function (response) {

                    if (response['response'] == 'error') {
                       
                         swal({ 
                           title: "Disculpe,",
                            text: "No se pudo negar la transacción, por favor consulte con su administrador",
                             type: "warning" 
                           },
                           function(){
                             
                         });
                    }else{
                         swal({ 
                           title: "Negada",
                            text: "Transacción negada con exito",
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
    
    
    // Proceso de conversión de moneda (captura del equivalente a 1 dólar en las distintas monedas)
    $.post('https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664', function (coins) {
		
		var valor1btc, valor1vef;
		
		// Valor de 1 btc en dólares (uso de async: false para esperar a que cargue la data)
		$.ajax({
			type: "get",
			dataType: "json",
			url: 'https://api.coinmarketcap.com/v1/ticker/',
			async: false
		})
		.done(function(btc) {
			if(btc.error){
				console.log(btc.error);
			} else {
				valor1btc = btc[0]['price_usd'];
			}				
		}).fail(function() {
			console.log("error ajax");
		});
		
		// Valor de 1 dólar en bolívares (uso de async: false para esperar a que cargue la data)
		$.ajax({
			type: "get",
			dataType: "json",
			url: 'https://s3.amazonaws.com/dolartoday/data.json',
			async: false
		})
		.done(function(vef) {
			if(vef.error){
				console.log(vef.error);
			} else {
				valor1vef = vef['USD']['transferencia'];
			}				
		}).fail(function() {
			console.log("error ajax");
		});
		
		// Si el tipo de moneda de la transacción es Bitcoin (BTC) o Bolívares (VEF) hacemos la conversión usando valores de una api más acorde
		if ($("#iso_currency_user").val() == 'BTC') {
			
			var currency_user = 1/parseFloat(valor1btc);  // Tipo de moneda del usuario logueado
				
		} else if($("#iso_currency_user").val() == 'VEF') {
				
			var currency_user = valor1vef;  // Tipo de moneda del usuario logueado
		
		} else {
		
			var currency_user = coins['rates'][$("#iso_currency_user").val()];  // Tipo de moneda del usuario logueado
		
		}
		
		var capital_pendiente = 0;
		var ingreso_pendiente = 0;
		var egreso_pendiente = 0;
		var capital_aprobado = 0;
		
		// Proceso de carga de capital aprobado
		$.post(base_url+'resumen/fondos_json', function (fondos) {
			
			$.each(fondos, function (i) {
				
				// Conversión de cada monto a dólares
				var currency = fondos[i]['coin_avr'];  // Tipo de moneda de la transacción
				
				// Si el tipo de moneda de la transacción es Bitcoin (BTC) o Bolívares (VEF) hacemos la conversión usando una api más acorde
				if (currency == 'BTC') {
					
					var trans_usd = parseFloat(fondos[i]['monto'])*parseFloat(valor1btc);
					
				} else if(currency == 'VEF') {
						
					var trans_usd = parseFloat(fondos[i]['monto'])/parseFloat(valor1vef);
					
				} else {
					
					var trans_usd = parseFloat(fondos[i]['monto'])/parseFloat(coins['rates'][currency]);
					
				}
				//~ alert(trans_usd);
				//~ console.log("id: "+fondos[i]['id']+" - "+"tipo: "+fondos[i]['tipo']+" - "+"monto: "+fondos[i]['monto']+" - "+trans_usd+" - "+fondos[i]['coin_avr']+" - "+"status: "+fondos[i]['status']);
				
				// Sumamos o restamos dependiendo del tipo de transacción (ingreso/egreso)
				if(fondos[i]['status'] == 'waiting'){
					if(fondos[i]['tipo'] == 'deposit'){
						ingreso_pendiente += trans_usd;
					}else if(fondos[i]['tipo'] == 'withdraw'){
						egreso_pendiente += trans_usd;
					}
				}
				if(fondos[i]['status'] == 'approved'){
					capital_aprobado += trans_usd;
				}
			});
			
			var decimals;
			if($("#decimals_currency_user").val().trim() != ""){
				decimals = parseFloat($("#decimals_currency_user").val());
			}else{
				decimals = 2;
			}
			var symbol = $("#symbol_currency_user").val();
			
			$("#span_aprobado").text((capital_aprobado*currency_user).toFixed(decimals)+" "+symbol);
			
			$("#span_pendiente").text((capital_pendiente*currency_user).toFixed(decimals)+" "+symbol);
			
			$("#span_pendiente").css('display', 'none');
			
			$("#span_ingreso_pendiente").text((ingreso_pendiente*currency_user).toFixed(decimals)+" "+symbol);
			
			$("#span_egreso_pendiente").text((egreso_pendiente*currency_user).toFixed(decimals)+" "+symbol);
			
		}, 'json');
		
	}, 'json');
	
});
