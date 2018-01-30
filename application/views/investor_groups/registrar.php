<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Grupo de Inversores </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>profile">Grupo de Inversores</a>
            </li>
            <li class="active">
                <strong>Registrar Grupo de Inversores</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Registrar Grupo de Inversores <small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="form_group" method="post" accept-charset="utf-8" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Nombre</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  placeholder="Introdúzca nombre" name="name" id="name">
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Inversores</label>
							<div class="col-sm-10">
								<select id="users_ids" class="form-control" multiple="multiple">
									<?php
									foreach ($inversores as $inversor) {
										?>
										<option value="<?php echo $inversor->id; ?>"><?php echo $inversor->username; ?></option>
										<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group"><label class="col-sm-2 control-label" >Cuentas</label>
							<div class="col-sm-10">
								<select id="accounts_ids" class="form-control" multiple="multiple">
									<?php
									foreach ($accounts as $account) {
										?>
										<option value="<?php echo $account->id; ?>"><?php echo $account->cuenta." - ".$account->numero; ?></option>
										<?php
									}
									?>
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

	$('select').on({
		change: function () {
			$(this).parent('div').removeClass('has-error');
		}
	});
    $('input').on({
        keypress: function () {
            $(this).parent('div').removeClass('has-error');
        }
    });

    $('#volver').click(function () {
        url = '<?php echo base_url() ?>investor_groups/';
        window.location = url;
    });

    $("#registrar").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#name').val().trim() === "") {
          
			swal("Disculpe,", "para continuar debe ingresar nombre");
			$('#name').parent('div').addClass('has-error');
			
        } else if ($('#users_ids').val() == "") {
          
			swal("Disculpe,", "para continuar debe seleccionar los usuarios");
			$('#users_ids').parent('div').addClass('has-error');
			
        } else if ($('#accounts_ids').val() == "") {
          
			swal("Disculpe,", "para continuar debe seleccionar las cuentas");
			$('#accounts_ids').parent('div').addClass('has-error');
			
        } else {
			//~ alert(String($('#users_ids').val()));

            $.post('<?php echo base_url(); ?>CInvestorGroups/add', $('#form_group').serialize()+'&'+$.param({'users_ids':$('#users_ids').val(), 'accounts_ids':$('#accounts_ids').val()}), function (response) {
				//~ alert(response);
				if (response == 'existe') {
                    swal("Disculpe,", "este nombre de grupo se encuentra registrado");
                    $('#name').parent('div').addClass('has-error');
                }else{
					swal({ 
						title: "Registro",
						 text: "Guardado con exito",
						  type: "success" 
						},
					function(){
						window.location.href = '<?php echo base_url(); ?>investor_groups';
					});
				}
            });
        }
    });
});

</script>
