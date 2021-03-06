<!-- FooTable -->
<link href="<?php echo assets_url('css/plugins/fileinput/fileinput.min.css');?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Usuarios </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>users">Usuarios</a>
            </li>
            <li class="active">
                <strong>Registrar Usuarios</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Registrar Usuario <small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="form_users" method="post" accept-charset="utf-8" class="form-horizontal" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-2 control-label" >Foto *</label>
							<div class="col-sm-4">
								<input type="file" class="form-control image" placeholder="" name="image[]" id="image" onChange="valida_tipo($(this))">
							</div>
							<div class="col-sm-6">
								<img id="imgSalida" style="height:150px;width:150px;" class="img-circle" src="<?php echo base_url(); ?>assets/img/users/usuario.jpg">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Nombre *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  placeholder="" name="name" id="name">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Alias *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  placeholder="" name="alias" id="alias">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Usuario *</label>
							<div class="col-sm-10">
								<input type="text" class="form-control"  placeholder="ejemplo@xmail.com" name="username" id="username">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Contraseña *</label>
							<div class="col-sm-10">
								<input type="password" class="form-control required"  placeholder="" name="password" id="password">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Confirme Contraseña *</label>
							<div class="col-sm-10">
								<input type="password" class="form-control "  placeholder="" name="passw1" id="passw1">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Perfil *</label>
							<div class="col-sm-10">
								<select class="form-control m-b" name="profile_id" id="profile">
									<option value="0" selected="">Seleccione</option>
									<?php foreach ($list_perfil as $perfil) { ?>
										<option value="<?php echo $perfil->id ?>"><?php echo $perfil->name ?></option>
									<?php } ?>
								</select>
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
						<?php if($this->session->userdata('logged_in')['profile_id'] == 1){ ?>
						<div class="form-group"><label class="col-sm-2 control-label" >Acciones</label>
							<div class="col-sm-10">
								<select id="actions_ids" name="actions_ids[]" class="form-control" multiple="multiple">
									
								</select>
							</div>
						</div>
						<?php } ?>
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
								<input id="base_url" type="hidden" value="<?php echo base_url(); ?>"/>
								<input type='hidden' id="id" value=""/>
								<input type="hidden" name="admin" id="admin">
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

<!-- FooTable -->
<script src="<?php echo assets_url('js/plugins/fileinput/fileinput.min.js');?>"></script>

<script src="<?php echo assets_url('script/users.js'); ?>" type="text/javascript" charset="utf-8" ></script>
