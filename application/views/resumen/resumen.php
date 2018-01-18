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
<!-- Campos ocultos que almacenan el tipo de moneda de la cuenta del usuario logueado -->
<input type="hidden" id="iso_currency_user" value="<?php echo $this->session->userdata('logged_in')['coin_iso']; ?>">
<input type="hidden" id="symbol_currency_user" value="<?php echo $this->session->userdata('logged_in')['coin_symbol']; ?>">

<div class="wrapper wrapper-content animated fadeInUp">
	
	<!-- Cuerpo de la sección de cuenta de twitter -->
	<div class="row">
		<div class="col-lg-12">
			<div class="contact-box">
				
				<div class="contact-box-footer" style="border-top:0px;">
					<div>
						<div class="col-md-3 forum-info">
							<span class="views-number" id="span_pendiente">
								<?php //echo (float)$capital_pendiente[0]->monto." $"; ?>
							</span>
							<div>
								<small>Capital pendiente</small>
							</div>
						</div>
						<div class="col-md-3 forum-info">
							<span class="views-number" id="span_aprobado">
								<?php //echo (float)$capital_aprobado." $"; ?>
							</span>
							<div>
								<small>Capital aprobado</small>
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
	<!-- Cierre del cuerpo de la sección de cuenta de twitter -->
	
	<!-- Cuerpo de la sección de perfiles asociados -->
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
								<th data-hide="all" >Cuenta</th>
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
											echo "<span style='color:#337AB7;'>Ingreso</span>";
										}else if($fondo->tipo == 2){
											echo "<span style='color:#D33333;'>Egreso</span>";
										}else{
											echo "";
										}
										?>
									</td>
									<td>
										<?php echo $fondo->monto."  ".$fondo->coin_symbol."  (".$fondo->coin_avr.")"; ?>
									</td>
									<td>
										<?php
										if($fondo->status == 1){
											echo "<span style='color:#337AB7;'>Validado</span>";
										}else if($fondo->status == 0){
											echo "<span style='color:#D33333;'>Pendiente</span>";
										}else{
											echo "";
										}
										?>
									</td>
									<td>
										<?php echo $fondo->cuenta." - ".$fondo->numero; ?>
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
										<?php
										$class = "";
										$class_icon_validar = "";
										$disabled = "";
										$cursor_style = "";
										if($fondo->status == 1){
											$class_icon_validar = "fa-check-circle";
											$disabled = "disabled='true'";
											$cursor_style = "cursor:default";
										}else{
											$class = "validar";
											$class_icon_validar = "fa-check-circle-o";
											$cursor_style = "cursor:pointer";
										}
										?>
										<a class='<?php echo $class; ?>' id='<?php echo $fondo->id.';'.$fondo->cuenta_id.';'.$fondo->monto.';'.$fondo->tipo; ?>' <?php echo $disabled; ?> style='<?php echo $cursor_style; ?>' title='Validar'>
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
	<!-- Cierre del cuerpo de la sección de perfiles asociados -->
	
	<?php if($this->session->userdata('logged_in')['profile_id'] == 1){?>
	<!-- Cuerpo de la sección de cuentas -->
	<div class="ibox">
		<div class="ibox-title">
			<h5>Cuentas</h5>
		</div>
		<div class="ibox-content">

			<div class="project-list">
				
				<div class="table-responsive">
					<table id="tab_fondo_personal" class="table table-striped table-bordered dt-responsive table-hover footable toggle-arrow-tiny" >
						<thead>
							<tr>
								<th>#</th>
								<th data-hide="phone" >Cuenta</th>
								<th data-hide="phone" >Número</th>
								<th data-hide="phone" >Tipo</th>
								<th data-hide="phone" >Monto</th>
								<th data-hide="phone" >Estatus</th>
								<th data-hide="all" >Descripción</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($cuentas as $cuenta) { ?>
								<tr style="text-align: center">
									<td>
										<?php echo $i; ?>
									</td>
									<td>
										<?php echo $cuenta->cuenta; ?>
									</td>
									<td>
										<?php echo $cuenta->numero; ?>
									</td>
									<td>
										<?php
										if($cuenta->tipo == 1){
											echo "Tipo 1";
										}else if($cuenta->tipo == 2){
											echo "Tipo 2";
										}else{
											echo "";
										}
										?>
									</td>
									<td>
										<?php echo $cuenta->monto."  ".$cuenta->coin_symbol."  (".$cuenta->coin_avr.")"; ?>
									</td>
									<td>
										<?php
										if($cuenta->status == 1){
											echo "<span style='color:#337AB7;'>Activa</span>";
										}else if($cuenta->status == 0){
											echo "<span style='color:#D33333;'>Inactiva</span>";
										}else{
											echo "";
										}
										?>
									</td>
									<td>
										<?php echo $cuenta->descripcion; ?>
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
	<!-- Cierre del cuerpo de la sección de cuentas -->
	<?php } ?>
	
</div>

<!-- FooTable -->
<script src="<?php echo assets_url('js/plugins/footable/footable.all.min.js');?>"></script>

<!-- Page-Level Scripts -->
<script src="<?php echo assets_url(); ?>script/resumen.js"></script>
