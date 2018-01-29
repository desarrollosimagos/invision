<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2> Cambiar Contraseña  </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Cambiar Contraseña</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
			<div class="ibox float-e-margins">
				<div class="ibox-title">
					<h5>Cambiar Contraseña <small></small></h5>
				</div>
				<div class="ibox-content">
					<form id="change_passwd" method="post" accept-charset="utf-8" class="form-horizontal">
						
						<div class="form-group">
							<label class="col-sm-2 control-label" >Contraseña Actual *</label>
							<div class="col-sm-10">
								<input type="password" class="form-control required"  placeholder="" name="passwd_actual" id="passwd_actual">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Nueva Contraseña *</label>
							<div class="col-sm-10">
								<input type="password" class="form-control required"  placeholder="" name="new_passwd" id="new_passwd">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label" >Confirme Nueva Contraseña *</label>
							<div class="col-sm-10">
								<input type="password" class="form-control "  placeholder="" name="confirm_new_passwd" id="confirm_new_passwd">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-4 col-sm-offset-2">
								<input id="base_url" type="hidden" value="<?php echo base_url(); ?>"/>
								<input type='hidden' id="id" value=""/>
								<input type="hidden" name="admin" id="admin">
								<button class="btn btn-white" id="volver" type="button">Volver</button>
								<button class="btn btn-primary" id="cambiar" type="button">Cambiar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
    </div>
</div>
 <script src="<?php echo assets_url('script/change_passwd.js'); ?>" type="text/javascript" charset="utf-8" ></script>
