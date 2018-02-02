<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Proyectos </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>productos">Proyectos</a>
            </li>
           
            <li class="active">
                <strong>Editar Proyecto</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Editar Proyecto <small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="form_proyectos" method="post" accept-charset="utf-8" class="form-horizontal">
						<ul class="nav nav-tabs">
						  <li class="active"><a data-toggle="tab" href="#home">Datos</a></li>
						  <li><a data-toggle="tab" href="#menu1">Fotos</a></li>
						</ul>
						
						<!-- Tab content -->
						<div class="tab-content">
							
							<!-- Datos -->
							<div id="home" class="tab-pane fade in active">
								<br>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label" >Nombre *</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="name" id="name" maxlength="150" value="<?php echo $editar[0]->name; ?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" >Descripción</label>
										<div class="col-sm-10">
											<!--<input type="text" class="form-control" name="description" id="description" maxlength="150" value="<?php echo $editar[0]->descripcion; ?>">-->
											<textarea name="description" id="description" cols="52"><?php echo $editar[0]->description; ?></textarea>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label" >Valor *</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="valor" id="valor" value="<?php echo $editar[0]->valor ?>">
											<label id="label_precio_dolar" style="color:red;"></label>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label" >Fecha *</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="date" id="date" maxlength="11" value="<?php echo $editar[0]->date ?>">
										</div>
									</div>
								</div>
							</div>
							
							<!-- Fotos -->
							<div id="menu1" class="tab-pane fade">
								<br>
								<?php //print_r($fotos_asociadas); echo count($fotos_asociadas);?>
								<div class="col-lg-6">
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 1</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 2</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 3</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 4</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 5</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 6</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 7</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 8</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 9</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
									<div class="form-group"><label class="col-sm-2 control-label" >Nueva Foto 10</label>
										<div class="col-sm-10">
											<input type="file" class="form-control" name="imagen[]" onChange="valida_tipo($(this))">
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 0){ ?>
											<label class="col-sm-2 control-label" >Foto 1</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[0]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 1){ ?>
											<label class="col-sm-2 control-label" >Foto 2</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[1]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 2){ ?>
											<label class="col-sm-2 control-label" >Foto 3</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[2]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 3){ ?>
											<label class="col-sm-2 control-label" >Foto 4</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[3]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 4){ ?>
											<label class="col-sm-2 control-label" >Foto 5</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[4]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 5){ ?>
											<label class="col-sm-2 control-label" >Foto 6</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[5]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 6){ ?>
											<label class="col-sm-2 control-label" >Foto 7</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[6]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 7){ ?>
											<label class="col-sm-2 control-label" >Foto 8</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[7]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 8){ ?>
											<label class="col-sm-2 control-label" >Foto 9</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[8]->photo; ?>">
											<?php } ?>
										</div>
										<div class="col-sm-3">
											<?php if(count($fotos_asociadas) > 9){ ?>
											<label class="col-sm-2 control-label" >Foto 10</label>
											<img style="height:100px;width:100px;" src="<?php echo base_url(); ?>assets/img/projects/<?php echo $fotos_asociadas[9]->photo; ?>">
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
								
						</div>
						<!-- Cierre Tab content -->
						
						<br>
						<br>
						<!-- Enviar-->
						<div class="form-group">
							<div class="col-sm-12">
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
        url = '<?php echo base_url() ?>projects/';
        window.location = url;
    });
	
	$("#valor").numeric(); //Valida solo permite valores numéricos
	
	// Al hacer click en el botón de guardado
    $("#edit").click(function (e) {

        e.preventDefault();  // Para evitar que se envíe por defecto

        if ($('#name').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el nombre del proyecto");
			$('#name').parent('div').addClass('has-error');
			
        } else if ($('#valor').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar el valor del proyecto");
			$('#valor').parent('div').addClass('has-error');
			
        } else if ($('#date').val().trim() === "") {
			swal("Disculpe,", "para continuar debe ingresar la fecha del proyecto");
			$('#date').parent('div').addClass('has-error');
			
        } else {
            
            // Formateamos los precios para usar coma en vez de punto
            //~ $("#valor").val(String($("#valor").val()).replace('.',','));
            //~ 
            //~ alert($("#valor").val());
            
            var formData = new FormData(document.getElementById("form_proyectos"));  // Forma de capturar todos los datos del formulario
			
			$.ajax({
				//~ method: "POST",
				type: "post",
				dataType: "json",
				url: '<?php echo base_url(); ?>CProjects/update',
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			})
			.done(function(response) {
				//~ alert(response);
				if (response['response'] == 'error1') {
					
					swal("Disculpe,", "este proyecto se encuentra registrado");
					
				}else if (response['response'] == 'error2') {
					
					swal("Disculpe,", "ha ocurrido un error al guardar las fotos");
					
				}else{
					
					swal({
						title: "Registro",
						text: "Actualizado con exito",
						type: "success" 
					},
					function(){						
						// Reiniciamos
						window.location.href = '<?php echo base_url(); ?>projects';
					});
						
				}
								
			}).fail(function() {
				console.log("error ajax");
			});
            
        }
    });
	
});

// Validamos que los archivos sean de tipo .jpg, jpeg o png
function valida_tipo(input) {
	
	var max_size = '';
	var archivo = input.val();
	
	var ext = archivo.split(".");
	ext = ext[1];
	
	if (ext != 'jpg' && ext != 'jpeg' && ext != 'png'){
		swal("Disculpe,", "sólo se admiten archivos .jpg, .jpeg y png");
		input.val('');
		input.parent('div').addClass('has-error');
	}else{
		input.parent('div').removeClass('has-error');
	}
};

</script>
