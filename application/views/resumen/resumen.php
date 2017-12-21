<!-- FooTable -->
<link href="<?php echo assets_url('css/plugins/footable/footable.core.css');?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Resumen financiero</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Resumen financiero</strong>
            </li>
        </ol>
    </div>
</div>

<!-- Campo oculto que almacena el url base del proyecto -->
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

<!-- Cuerpo de la sección de cuenta de twitter -->
<div class="wrapper wrapper-content animated fadeInUp">
	<div class="row">
		<div class="col-lg-12">
			<div class="contact-box">
				
				<div class="contact-box-footer" style="border-top:0px;">
					<div>
						<div class="col-md-3 forum-info">
							<span class="views-number">
								<?php echo "0.0 $"; ?>
							</span>
							<div>
								<small>Capital pendiente</small>
							</div>
						</div>
						<div class="col-md-3 forum-info">
							<span class="views-number">
								<?php echo "0.0 $"; ?>
							</span>
							<div>
								<small>CApital aprobado</small>
							</div>
						</div>
						<div class="col-md-3 forum-info">
							<span class="views-number">
								<?php echo "0.0 $"; ?>
							</span>
							<div>
								<small>Capital invertido</small>
							</div>
						</div>
						<div class="col-md-3 forum-info">
							<span class="views-number">
								<?php echo "0.0 $"; ?>
							</span>
							<div>
								<small>Capital retornado</small>
							</div>
						</div>
					</div>
					<br>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Cierre del cuerpo de la sección de cuenta de twitter -->

<!-- Cuerpo de la sección de perfiles asociados -->
<div class="wrapper wrapper-content animated fadeInUp">

	<div class="ibox">
		<div class="ibox-title">
			<h5>Transacciones</h5>
			<!--<div class="ibox-tools">
				<a class="btn btn-primary btn-xs" id="boton_vincular">
				Crear nuevo perfil social
				</a>
			</div>-->
		</div>
		<div class="ibox-content">

			<div class="project-list">
				
				<div class="table-responsive">
					<table id="tab_fondo_personal" class="table table-striped table-bordered dt-responsive table-hover footable toggle-arrow-tiny" >
						<thead>
							<tr>
								<th>#</th>
								<th data-hide="phone" >Usuario</th>
								<th data-hide="phone" >Tipo</th>
								<th data-hide="phone" >Monto</th>
								<th data-hide="phone" >Estatus</th>
								<th data-hide="all" >Descripción</th>
								<th data-hide="all" >Referencia</th>
								<th data-hide="all" >Observaciones</th>
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
										if($fondo->tipo == 1){
											echo "<span style='color:#16987E;'>Ingreso</span>";
										}else if($fondo->tipo == 2){
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
										if($fondo->status == 1){
											echo "<span style='color:#16987E;'>Validado</span>";
										}else if($fondo->status == 0){
											echo "<span style='color:#D33333;'>Pendiente</span>";
										}else{
											echo "";
										}
										?>
									</td>
									<td>
										<?php echo $fondo->descripcion; ?>
									</td>
									<td>
										<?php echo $fondo->referencia; ?>
									</td>
									<td>
										<?php echo $fondo->observaciones; ?>
									</td>
									<td style='text-align: center'>
										<a class='validar' id='<?php echo $fondo->id; ?>' style='color: #1ab394' title='Validar'><i class="fa fa-check-circle fa-2x"></i></a>
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
<!-- Cierre del cuerpo de la sección de perfiles asociados -->

<!-- FooTable -->
<script src="<?php echo assets_url('js/plugins/footable/footable.all.min.js');?>"></script>

<!-- Page-Level Scripts -->
<script src="<?php echo assets_url(); ?>script/resumen.js"></script>
