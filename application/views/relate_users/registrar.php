<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Asociación </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>cuentas">Asociación</a>
            </li>
            
            <li class="active">
                <strong>Registrar Asociación</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Registrar Asociación<small></small></h5>
					
				</div>
				<div class="ibox-content">
					<form id="form_relate_users" method="post" accept-charset="utf-8" class="form-horizontal">
						<!-- Si el usuario es administrador, entonces puede elegir el usuario -->
						<?php if($this->session->userdata('logged_in')['id'] == 1){ ?>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Asesor *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="user_id_one" id="user_id_one">
									<option value="0">Seleccione</option>
									<?php foreach($asesores as $asesor){?>
										<?php if(!in_array($asesor->id, $asesores_asociados)){?>
										<option value="<?php echo $asesor->id; ?>"><?php echo $asesor->username; ?></option>
										<?php } ?>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php } ?>
						<!-- Fin validación -->
						<div class="form-group">
							<label class="col-sm-2 control-label" >Inversor(es) *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="user_id_two" id="user_id_two" multiple="multiple">
									<?php foreach($inversores as $inversor){?>
										<?php if(!in_array($inversor->id, $inversores_asociados)){?>
										<option value="<?php echo $inversor->id; ?>"><?php echo $inversor->username; ?></option>
										<?php } ?>
									<?php } ?>
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
        url = '<?php echo base_url() ?>relate_users/';
        window.location = url;
    });

    $("#registrar").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#user_id_one').val() == "0") {
			swal("Disculpe,", "para continuar debe seleccionar el asesor");
			$('#user_id_one').parent('div').addClass('has-error');
			
        } else if ($('#user_id_two').val() == "") {
			swal("Disculpe,", "para continuar debe seleccionar el(los) inversor(es)");
			$('#user_id_two').parent('div').addClass('has-error');
			
        } else {
			
			//~ alert($("#user_id_two").val());

            $.post('<?php echo base_url(); ?>CRelateUsers/add', $('#form_relate_users').serialize()+'&'+$.param({'inversores':$('#user_id_two').val()}), function (response) {
				if (response['response'] == 'error') {
                    swal("Disculpe,", "El registro no pudo ser guardado, por favor consulte a su administrador...");
                }else{
					swal({ 
						title: "Registro",
						 text: "Guardado con exito",
						  type: "success" 
						},
					function(){
					  window.location.href = '<?php echo base_url(); ?>relate_users';
					});
				}
            }, 'json');
            
        }
    });
});

</script>
