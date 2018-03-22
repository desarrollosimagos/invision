<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Transacciones</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Transacciones</strong>
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
            <a href="<?php echo base_url() ?>transactions/register/deposit">
				<button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i> Agregar</button>
            </a>
            <a href="<?php echo base_url() ?>transactions/register/withdraw">
				<button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-minus"></i> Retirar</button>
            </a>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Transacciones</h5>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<label style="color:red;">
						(Capital aprobado: <span id="span_capital_aprobado"></span>
						<?php echo $this->session->userdata('logged_in')['coin_symbol']; ?>)
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tab_transactions" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th>Monto</th>
                                    <th>Estatus</th>
                                    <th>Cuenta</th>
                                    <th>Descripción</th>
                                    <th>Referencia</th>
                                    <th>Observaciones</th>
                                    <th>Documento</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    <th>Validar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($listar as $fondo) { ?>
                                    <tr style="text-align: center">
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->usuario; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($fondo->type == 'deposit'){
												echo "<span style='color:#337AB7;'>Ingreso</span>";
											}else if($fondo->type == 'withdraw'){
												echo "<span style='color:#D33333;'>Egreso</span>";
											}else{
												echo "";
											}
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->monto; ?>
                                        </td>
                                        <td>
                                            <?php
                                            if($fondo->status == 'approved'){
												echo "<span style='color:#337AB7;'>Validado</span>";
											}else if($fondo->status == 'waiting'){
												echo "<span style='color:#A5D353;'>En espera</span>";
											}else{
												echo "<span style='color:#D33333;'>Denegado</span>";
											}
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->alias." - ".$fondo->number; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->description; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->reference; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->observation; ?>
                                        </td>
                                        <td>
											<a target="_blank" href="<?php echo base_url(); ?>assets/docs_trans/<?php echo $fondo->document; ?>"><?php echo $fondo->document; ?></a>
                                        </td>
                                        <td style='text-align: center'>
											<?php if($this->session->userdata('logged_in')['profile_id'] == 1){ ?>
												<a href="<?php echo base_url() ?>transactions/edit/<?= $fondo->id; ?>" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                                            <?php }else{ ?>
												<a ><i class="fa fa-ban fa-2x" style='color:#D33333;'></i></a>
                                            <?php } ?>
                                        </td>
                                        <td style='text-align: center'>
											<?php if($this->session->userdata('logged_in')['profile_id'] == 1){ ?>
                                            <a class='borrar' id='<?php echo $fondo->id; ?>' title='Eliminar'><i class="fa fa-trash-o fa-2x"></i></a>
                                            <?php }else{ ?>
												<a ><i class="fa fa-ban fa-2x" style='color:#D33333;'></i></a>
                                            <?php } ?>
                                        </td>
                                        <td style='text-align: center'>
											<?php
											$class = "";
											$class_icon_validar = "";
											$disabled = "";
											$cursor_style = "";
											$color_style = "";
											$title = "";
											if($fondo->status == 'approved'){
												$class_icon_validar = "fa-check-circle";
												$disabled = "disabled='true'";
												$cursor_style = "cursor:default";
												$color_style = "";
												$title = "";
											}else if($fondo->status == 'waiting'){
												$class = "validar";
												$class_icon_validar = "fa-check-circle-o";
												$cursor_style = "cursor:pointer";
												$color_style = "";
												$title = "title='Validar'";
											}else{
												$class_icon_validar = "fa-check-circle";
												$disabled = "disabled='true'";
												$cursor_style = "cursor:default";
												$color_style = "color:grey";
												$title = "";
											}
											?>
                                            <a class='<?php echo $class; ?>' id='<?php echo $fondo->id.';'.$fondo->cuenta_id.';'.$fondo->monto.';'.$fondo->tipo; ?>' <?php echo $disabled; ?> style='<?php echo $cursor_style; ?>;<?php echo $color_style; ?>' <?php echo $title; ?>>
												<i class="fa <?php echo $class_icon_validar; ?> fa-2x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
     $('#tab_transactions').DataTable({
        "paging": true,
        "lengthChange": true,
        "autoWidth": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "iDisplayLength": 50,
        "iDisplayStart": 0,
        "sPaginationType": "full_numbers",
        "aLengthMenu": [10, 50, 100, 150],
        "oLanguage": {"sUrl": "<?= assets_url() ?>js/es.txt"},
        "aoColumns": [
            {"sClass": "registro center", "sWidth": "5%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "30%"},
            {"sClass": "none", "sWidth": "30%"},
            {"sClass": "none", "sWidth": "30%"},
            {"sClass": "none", "sWidth": "30%"},
            {"sClass": "none", "sWidth": "30%"},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
        ]
    });
             
    // Validacion para borrar
    $("table#tab_transactions").on('click', 'a.borrar', function (e) {
        e.preventDefault();
        var id = this.getAttribute('id');

        swal({
            title: "Borrar registro",
            text: "¿Está seguro de borrar el registro?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: true
          },
        function(isConfirm){
            if (isConfirm) {
             
                $.post('<?php echo base_url(); ?>transactions/delete/' + id + '', function (response) {

                    if (response[0] == "e") {
                       
                         swal({ 
                           title: "Disculpe,",
                            text: "No se puede eliminar se encuentra asociado a un usuario",
                             type: "warning" 
                           },
                           function(){
                             
                         });
                    }else{
                         swal({ 
                           title: "Eliminar",
                            text: "Registro eliminado con exito",
                             type: "success" 
                           },
                           function(){
                             window.location.href = '<?php echo base_url(); ?>transactions';
                         });
                    }
                });
            } 
        });
    });
    
    
    // Proceso de conversión de moneda (captura del equivalente a 1 dólar en las distintas monedas)
    $.post('https://openexchangerates.org/api/latest.json?app_id=65148900f9c2443ab8918accd8c51664', function (coins) {
		
		var currency_user = coins['rates'][$("#iso_currency_user").val()];  // Tipo de moneda del usuario logueado
		var capital_pendiente = 0;
		var capital_aprobado = 0;
		
		// Proceso de cálculo de capital aprobado y pendiente
		$.post('<?php echo base_url(); ?>dashboard/fondos_json', function (fondos) {
			
			$.each(fondos, function (i) {
				
				// Conversión de cada monto a dólares
				var currency = fondos[i]['coin_avr'];  // Tipo de moneda de la transacción
				var trans_usd = parseFloat(fondos[i]['monto'])/coins['rates'][currency];
				
				// Sumamos o restamos dependiendo del tipo de transacción (ingreso/egreso)
				if(fondos[i]['status'] == 'waiting'){
					if(fondos[i]['tipo'] == 'deposit'){
						capital_pendiente += trans_usd;
					}else{
						capital_pendiente -= trans_usd;
					}
				}
				if(fondos[i]['status'] == 'approved'){
					if(fondos[i]['tipo'] == 'deposit'){
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
				
				//~ alert('approved');
             
                $.post('<?php echo base_url(); ?>transactions/validar/', {'id': id, 'cuenta_id': cuenta_id, 'monto': monto, 'tipo': tipo, 'status': 'approved'}, function (response) {

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
                             window.location.href = '<?php echo base_url(); ?>transactions';
                         });
                    }
                    
                }, 'json');
                
            }else{
				
				//~ alert('denied');
				
				$.post('<?php echo base_url(); ?>transactions/validar/', {'id': id, 'cuenta_id': cuenta_id, 'monto': monto, 'tipo': tipo, 'status': 'denied'}, function (response) {

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
                             window.location.href = '<?php echo base_url(); ?>transactions';
                         });
                    }
                    
                }, 'json');
				
			}
        });
    });
    
});
        
</script>
