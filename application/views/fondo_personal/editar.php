<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Fondo Personal </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>fondo_personal">Fondo Personal</a>
            </li>
           
            <li class="active">
                <strong>Editar Fondo Personal</strong>
            </li>
        </ol>
    </div>
</div>

<!-- Campos ocultos que almacenan el tipo de moneda de la cuenta del usuario logueado -->
<input type="hidden" id="iso_currency_user" value="<?php echo $this->session->userdata('logged_in')['coin_iso']; ?>">
<input type="hidden" id="symbol_currency_user" value="<?php echo $this->session->userdata('logged_in')['coin_symbol']; ?>">

<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Editar Fondo Personal</h5>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="color:red;">
						(Capital aprobado: <span id="span_capital_aprobado"></span>
						<?php echo $this->session->userdata('logged_in')['coin_symbol']; ?>)
						
						</label>
				</div>
				<div class="ibox-content">
					<form id="form_fondo_personal" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Tipo *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="tipo" id="tipo">
									<option value="1">Ingreso</option>
									<option value="2">Egreso</option>
								</select>
							</div>
						</div>
						<!-- Si el usuario es administrador, entonces puede elegir el usuario -->
						<?php if($this->session->userdata('logged_in')['id'] == 1){ ?>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Usuario *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="user_id" id="user_id">
									<option value="0">Seleccione</option>
									<?php foreach($usuarios as $usuario){?>
									<option value="<?php echo $usuario->id; ?>"><?php echo $usuario->username; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php } ?>
						<!-- Fin validación -->
						<div class="form-group">
							<label class="col-sm-2 control-label" >Cuenta *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="cuenta_id" id="cuenta_id">
									<option value="0">Seleccione</option>
									<?php foreach($cuentas as $cuenta){?>
									<option value="<?php echo $cuenta->id; ?>"><?php echo $cuenta->cuenta." - ".$cuenta->numero." - ".$cuenta->coin_avr; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Fecha</label>
							<div class="col-sm-10">
								<?php 
								$fecha = $editar[0]->fecha;
								$fecha = explode("-", $fecha);
								$fecha = $fecha[2]."/".$fecha[1]."/".$fecha[0];
								?>
								<input type="text" class="form-control" name="fecha" maxlength="10" id="fecha" value="<?php echo $fecha; ?>"/>
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Descripción</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="descripcion" maxlength="250" id="descripcion" value="<?php echo $editar[0]->descripcion; ?>"/>
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Referencia</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="referencia" maxlength="100" id="referencia" value="<?php echo $editar[0]->referencia; ?>"/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Observaciones</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="observaciones" maxlength="250" id="observaciones"><?php echo $editar[0]->observaciones; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Monto *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="monto" maxlength="11" id="monto" value="<?php echo $editar[0]->monto ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								 <input id="id_tipo" type="hidden" value="<?php echo $editar[0]->tipo ?>"/>
								 <input id="id_user" type="hidden" value="<?php echo $editar[0]->user_id ?>"/>
								 <input id="id_cuenta" type="hidden" value="<?php echo $editar[0]->cuenta_id ?>"/>
								 <input id="id_status" type="hidden" value="<?php echo $editar[0]->status ?>"/>
								 <input class="form-control"  type='hidden' id="id" name="id" value="<?php echo $id ?>"/>
								<button class="btn btn-white" id="volver" type="button">Volver</button>
								<button class="btn btn-primary" id="edit" type="submit">Guardar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    $('input').on({
        keypress: function () {
            $(this).parent('div').removeClass('has-error');
        }
    });

    $('#volver').click(function () {
        url = '<?php echo base_url() ?>fondo_personal/';
        window.location = url;
    });
    
    $('#fecha').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        endDate: 'today'
    })
    
    $("#monto").numeric(); // Sólo permite valores numéricos
    
    var capital_pendiente = 0;
	var capital_aprobado = 0;
    // Proceso de conversión de monedas de los distintos montos a la moneda del usuario logueado (captura del equivalente a 1 dólar en las distintas monedas)
    $.post('https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664', function (coins) {
		
		var currency_user = coins['rates'][$("#iso_currency_user").val()];  // Tipo de moneda del usuario logueado
		
		// Proceso de cálculo de capital aprobado y pendiente
		$.post('<?php echo base_url(); ?>resumen/fondos_json', function (fondos) {
			
			$.each(fondos, function (i) {
				
				// Conversión de cada monto a dólares
				var currency = fondos[i]['coin_avr'];  // Tipo de moneda de la transacción
				var trans_usd = parseFloat(fondos[i]['monto'])/coins['rates'][currency];
				
				// Sumamos o restamos dependiendo del tipo de transacción (ingreso/egreso)
				if(fondos[i]['status'] == 0){
					if(fondos[i]['tipo'] == 1){
						capital_pendiente += trans_usd;
					}else{
						capital_pendiente -= trans_usd;
					}
				}
				if(fondos[i]['status'] == 1){
					if(fondos[i]['tipo'] == 1){
						capital_aprobado += trans_usd;
					}else{
						capital_aprobado -= trans_usd;
					}
				}
			});
			
			capital_aprobado = (capital_aprobado*currency_user).toFixed(2);
			
			capital_pendiente = (capital_pendiente*currency_user).toFixed(2);
			
			$("#span_capital_aprobado").text(capital_aprobado);
			
		}, 'json');
		
	}, 'json');
	
	
	$("#cuenta_id").select2('val', $("#id_cuenta").val());
	if($("#user_id").val() !== undefined){
		$("#user_id").select2('val', $("#id_user").val());
	}
	$("#tipo").select2('val', $("#id_tipo").val());
	
	
	// Proceso de validación del registro
    $("#edit").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#user_id').val() == "0") {
			
			swal("Disculpe,", "para continuar debe seleccionar el usuario");
			$('#user_id').focus();
			$('#user_id').parent('div').addClass('has-error');
			
        } else if ($('#cuenta_id').val() == "0") {
			
			swal("Disculpe,", "para continuar debe seleccionar la cuenta");
			$('#cuenta_id').focus();
			$('#cuenta_id').parent('div').addClass('has-error');
			
        } else if ($('#fecha').val().trim() === ""){
			
			swal("Disculpe,", "para continuar debe ingresar la fecha");
			$('#fecha').focus();
			$('#fecha').parent('div').addClass('has-error');
			
		} else if ($('#monto').val().trim() === ""){
			
			swal("Disculpe,", "para continuar debe ingresar el monto");
			$('#monto').focus();
			$('#monto').parent('div').addClass('has-error');
			
		} else {
			
			var monto_convertido;
	
			$.post('https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664', function (coins) {
		
				var currency_user = coins['rates'][$("#iso_currency_user").val()];  // Tipo de moneda del usuario logueado
				
				// Conversión de cada monto a dólares
				var currency = $("#cuenta_id").find('option').filter(':selected').text();  // Tipo de moneda de la cuenta
				currency = currency.split(' - ');
				currency = currency[2];
				//~ alert(currency);
				var trans_usd = parseFloat($('#monto').val().trim())/coins['rates'][currency];
				//~ alert(trans_usd);
				
				monto_convertido = trans_usd;
					
				monto_convertido = (monto_convertido*currency_user).toFixed(2);
				
			}, 'json').done(function() {
				
				//~ alert("Monto convertido: " + monto_convertido);
				//~ alert("Capital aprobado: " + capital_aprobado);
				
				if(monto_convertido > capital_aprobado && $('#tipo').val().trim() == 2){
					
					alert("El monto a retirar no puede ser superior al capital aprobado");
					
				}else{
					
					$.post('<?php echo base_url(); ?>CFondoPersonal/update', $('#form_fondo_personal').serialize(), function (response) {
						if (response['response'] == 'error') {
							swal("Disculpe,", "El registro no pudo ser guardado, por favor consulte a su administrador...");
						}else{
							swal({ 
								title: "Registro",
								 text: "Guardado con exito",
								  type: "success" 
								},
							function(){
							  window.location.href = '<?php echo base_url(); ?>fondo_personal';
							});
						}
					}, 'json');
					
				}
				
			});
            
        }
        
    });
    
});

</script>
