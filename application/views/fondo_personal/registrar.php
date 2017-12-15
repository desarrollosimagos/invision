<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Fondo Personal </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>fondo_personal">Fondo Personal</a>
            </li>
            
            <li class="active">
                <strong>Registrar Fondo Personal</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Registrar Fondo Personal<small></small></h5>
					
				</div>
				<div class="ibox-content">
					<form id="form_fondo_personal" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Tipo *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="tipo" id="tipo">
									<option value="1" selected="">Tipo 1</option>
									<option value="2">Tipo 2</option>
								</select>
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Observaciones</label>
							<div class="col-sm-10">
								<textarea class="form-control" name="observaciones" maxlength="250" id="observaciones"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Monto *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" maxlength="11" name="monto" id="monto">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Estatus *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="status" id="status">
									<option value="1" selected="">Activo</option>
									<option value="0">Inactivo</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<button class="btn btn-white" id="volver" type="button">Volver</button>
								<button class="btn btn-primary" id="registrar" type="submit">Guardar</button>
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
    
    $("#monto").numeric(); // Sólo permite valores numéricos

    $("#registrar").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#monto').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el monto");
			$('#monto').parent('div').addClass('has-error');
			
        } else {

            $.post('<?php echo base_url(); ?>CFondoPersonal/add', $('#form_fondo_personal').serialize(), function (response) {
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
});

</script>
