<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cuentas </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.html">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>cuentas">Cuentas</a>
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
							<label class="col-sm-2 control-label">Nombre *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="cuenta" id="cuenta" value="<?php echo $editar[0]->cuenta ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Número</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="numero" id="numero" value="<?php echo $editar[0]->numero ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Tipo *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="tipo" id="tipo">
									<option value="1">Tipo 1</option>
									<option value="2">Tipo 2</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Descripción</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="descripcion" maxlength="250" id="descripcion"><?php echo $editar[0]->descripcion; ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Monto *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="monto" id="monto" value="<?php echo $editar[0]->monto ?>" readonly="readonly">
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
								 <input id="id_tipo" type="hidden" value="<?php echo $editar[0]->tipo ?>"/>
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
        url = '<?php echo base_url() ?>cuentas/';
        window.location = url;
    });
    
    $("#numero").numeric(); // Sólo permite valores numéricos
	
	$("#tipo").select2('val', $("#id_tipo").val());
	$("#status").select2('val', $("#id_status").val());

    $("#edit").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#cuenta').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el nombre de la cuenta");
			$('#monto').parent('div').addClass('has-error');
			
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
					  window.location.href = '<?php echo base_url(); ?>cuentas';
					});
				}
            }, 'json');
            
        }
        
    });
    
});

</script>
