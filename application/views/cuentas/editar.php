<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cuentas </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>accounts">Cuentas</a>
            </li>
           
            <li class="active">
                <strong>Editar Cuenta</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Editar Cuenta <small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="form_cuentas" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label">Persona *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="owner" id="owner" value="<?php echo $editar[0]->owner ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Nombre *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="alias" id="alias" value="<?php echo $editar[0]->alias ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Número</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="number" id="number" value="<?php echo $editar[0]->number ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Tipo *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="type" id="type">
									<option value="0" selected="">Seleccione</option>
									<?php foreach($account_type as $tipo){?>
									<option value="<?php echo $tipo->id; ?>"><?php echo $tipo->name; ?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Descripción</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="description" maxlength="250" id="description"><?php echo $editar[0]->description; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Monto *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="amount" id="amount" value="<?php echo $editar[0]->amount ?>" readonly="readonly">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Moneda *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="coin_id" id="coin_id">
									<option value="0" selected="">Seleccione</option>
									<?php foreach($monedas as $moneda){?>
									<option value="<?php echo $moneda->id; ?>"><?php echo $moneda->abbreviation." (".$moneda->description.")"; ?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Estatus *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="status" id="status">
									<option value="1">Activo</option>
									<option value="0">Inactivo</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								 <input id="id_tipo" type="hidden" value="<?php echo $editar[0]->type ?>"/>
								 <input id="id_coin" type="hidden" value="<?php echo $editar[0]->coin_id ?>"/>
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
        url = '<?php echo base_url() ?>accounts/';
        window.location = url;
    });
    
    $("#number").numeric(); // Sólo permite valores numéricos
	
	$("#type").select2('val', $("#id_tipo").val());
	$("#coin_id").select2('val', $("#id_coin").val());
	$("#status").select2('val', $("#id_status").val());

    $("#edit").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#owner').val().trim() === "") {
			
			swal("Disculpe,", "para continuar debe ingresar el nombre de la persona");
			$('#owner').parent('div').addClass('has-error');
			
        } else if ($('#alias').val().trim() === "") {
			
			swal("Disculpe,", "para continuar debe ingresar el nombre de la cuenta");
			$('#alias').parent('div').addClass('has-error');
			
        } else if($('#type').val() == "0"){
			
			swal("Disculpe,", "para continuar debe seleccionar el tipo de cuenta");
			$('#tipo').parent('div').addClass('has-error');
			
		} else if($('#coin_id').val() == "0"){
			
			swal("Disculpe,", "para continuar debe seleccionar el tipo de moneda");
			$('#coin_id').parent('div').addClass('has-error');
			
		} else {

            $.post('<?php echo base_url(); ?>CCuentas/update', $('#form_cuentas').serialize(), function (response) {
				if (response['response'] == 'error') {
                    swal("Disculpe,", "El registro no pudo ser guardado, por favor consulte a su administrador...");
                }else{
					swal({ 
						title: "Registro",
						 text: "Guardado con exito",
						  type: "success" 
						},
					function(){
					  window.location.href = '<?php echo base_url(); ?>accounts';
					});
				}
            }, 'json');
            
        }
        
    });
    
});

</script>
