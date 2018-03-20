<style>
.ibox-content {
    background-color: #ffffff;
    color: inherit;
    padding: 15px 20px 20px 20px;
    border-color: #e7eaec;
    border-image: none;
    border-style: solid solid solid;
    border-width: 1px 1px 1px 1px;
}
</style>

<!-- FooTable -->
<!--<link href="<?php echo assets_url('css/plugins/footable/footable.bootstrap.css');?>" rel="stylesheet">-->
<link href="<?php echo assets_url('css/plugins/footable/footable.core.css');?>" rel="stylesheet">

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Project detail </h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Home</a>
            </li>
            
            <li>
                <a href="<?php echo base_url() ?>projects">Projects</a>
            </li>
           
            <li class="active">
                <strong>Project detail</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInUp">
	
	<div class="row">
		
		<div class="col-lg-9">
			<div class="wrapper wrapper-content animated fadeInUp">
				<div class="ibox">
					<div class="ibox-content">
						
						<div class="row">
							<div class="col-lg-12">
								<div class="m-b-md">
									<a href="<?php echo base_url() ?>projects/edit/<?= $ver[0]->id; ?>" class="btn btn-white btn-xs pull-right">Edit project</a>
									<h2><?php echo $ver[0]->name; ?></h2>
								</div>
								<dl class="dl-horizontal">
									<dt>Status:</dt> 
									<dd>
									<?php if($ver[0]->status == 1) { ?>
									<span class="label label-primary">Active</span>
									<?php }else{ ?>
									<span class="label label-default">Inactive</span>
									<?php } ?>
									</dd>
								</dl>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-5">
								<dl class="dl-horizontal">
									<dt>Created by:</dt> <dd><?php //echo $ver[0]->username; ?></dd>
									<dt>Invest:</dt> <dd>  <?php echo count($investors); ?></dd>
								</dl>
							</div>
							<div class="col-lg-7" id="cluster_info">
								<dl class="dl-horizontal" >
									<dt>Last Updated:</dt> <dd><?php echo $ver[0]->d_update; ?></dd>
									<dt>Created:</dt> <dd> 	<?php echo $ver[0]->d_create; ?> </dd>
								</dl>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<dl class="dl-horizontal" >
									<dt></dt>
									<dd class="project-people">
									<?php foreach($data_investors as $investor){?>
										<?php if($investor['image'] != '' && $investor['image'] != null){ ?>
										<a href=""><img class="img-circle" src="<?php echo base_url(); ?>assets/img/users/<?php echo $investor['image']; ?>" title="<?php echo $investor['username']?>"></a>
										<?php }else{ ?>
										<a href=""><img class="img-circle" src="<?php echo base_url(); ?>assets/img/users/usuario.jpg" title="<?php echo $investor['username']?>"></a>
										<?php } ?>
									<?php } ?>
									</dd>
								</dl>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<dl class="dl-horizontal">
									<dt>Completed:</dt>
									<dd>
										<?php 
										if($ver[0]->amount_r == null){
											echo "&infin;";
											$percentage = 0;
										}else{
											if($porcentaje_r > 0){
												echo round($porcentaje_r, 2)."%";
												$percentage = round($porcentaje_r, 2);
											}else{
												echo "0%";
												$percentage = 0;
											}
										}
										?>
										<div class="progress progress-striped active m-b-sm">
											<div style="width: <?php echo $percentage; ?>%;" class="progress-bar"></div>
										</div>
										
										<small>Project completed in <strong><?php echo $percentage; ?>%</strong>. Remaining close the project, sign a contract and invoice.</small>
									</dd>
								</dl>
							</div>
						</div>
						
						<div class="row m-t-sm">
							
							<div class="col-lg-12">
								
								<div class="col-lg-3">
									<div class="ibox">
										<div class="ibox-content">
											<h5>Payback</h5>
											<h1 class="no-margins">
												<?php 
												$payback = explode(" ", $project_transactions_gen->capital_payback);
												$invested = explode(" ", $project_transactions_gen->capital_invested);
												$result = (string)$payback[0]."/".(string)$invested[0];
												?>
												<span class="pie"><?php echo $result; ?></span>
											</h1>
											<div class="stat-percent font-bold text-danger">24% <i class="fa fa-level-down"></i></div>
											<small>Total income</small>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="ibox">
										<div class="ibox-content">
											<h5>Capital Invertido</h5>
											<h1 class="no-margins" style="font-size:25px;">
											<?php echo $project_transactions_gen->capital_invested; ?>
											</h1>
											<div class="stat-percent font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
											<small>Total income</small>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="ibox">
										<div class="ibox-content">
											<h5>Dividendo</h5>
											<h1 class="no-margins" style="font-size:25px;">
											<?php echo $project_transactions_gen->returned_capital; ?>
											</h1>
											<div class="stat-percent font-bold text-danger">12% <i class="fa fa-level-down"></i></div>
											<small>Total income</small>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="ibox">
										<div class="ibox-content">
											<h5>Capital de retiro disponible</h5>
											<h1 class="no-margins" style="font-size:25px;">
											<?php echo $project_transactions_gen->retirement_capital_available; ?>
											</h1>
											<div class="stat-percent font-bold text-danger">24% <i class="fa fa-level-down"></i></div>
											<small>Total income</small>
										</div>
									</div>
								</div>
								
							</div>
							
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
		<div class="col-lg-3">
			<div class="wrapper wrapper-content project-manager">
				<h4>Project description</h4>
				<!--<img src="img/zender_logo.png" class="img-responsive">-->
				<p class="small">
					<?php echo $ver[0]->description; ?>
				</p>
				<!--<p class="small font-bold">
					<span><i class="fa fa-circle text-warning"></i> High priority</span>
				</p>
				<h5>Project tag</h5>
				<ul class="tag-list" style="padding: 0">
					<li><a href=""><i class="fa fa-tag"></i> Zender</a></li>
					<li><a href=""><i class="fa fa-tag"></i> Lorem ipsum</a></li>
					<li><a href=""><i class="fa fa-tag"></i> Passages</a></li>
					<li><a href=""><i class="fa fa-tag"></i> Variations</a></li>
				</ul>-->
				<h5>Project documents</h5>
				<ul class="list-unstyled project-files">
					<?php foreach($documentos_asociados as $doc){ ?>
					<li>
						<a target="_blank" href="<?php echo base_url(); ?>assets/documents/<?php echo $doc->description; ?>">
							<i class="fa fa-file"></i> <?php echo $doc->description; ?>
						</a>
					</li>
					<?php } ?>
				</ul>
				<h5>Project readings</h5>
				<ul class="list-unstyled project-files">
					<?php foreach($lecturas_asociadas as $reading){ ?>
					<li>
						<a target="_blank" href="<?php echo base_url(); ?>assets/readings/<?php echo $reading->description; ?>">
							<i class="fa fa-file"></i> <?php echo $reading->description; ?>
						</a>
					</li>
					<?php } ?>
				</ul>
				<!--<div class="text-center m-t-md">
					<a href="#" class="btn btn-xs btn-primary">Add files</a>
					<a href="#" class="btn btn-xs btn-primary">Report contact</a>

				</div>-->
			</div>
		</div>	
		
	</div>

	<!-- Cuerpo de la sección de transacciones -->
	<div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5>Transactions</h5>

			<div class="ibox-tools">
				<a class="collapse-link">
					<i class="fa fa-chevron-up"></i>
				</a>
				<!--<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-wrench"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="#">Config option 1</a>
					</li>
					<li><a href="#">Config option 2</a>
					</li>
				</ul>-->
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="ibox-content">
			
			<div class="col-sm-4 col-md-offset-8">
				<div class="input-group">
					<input type="text" placeholder="Search in table" class="input-sm form-control" id="filter1">
					<span class="input-group-btn">
						<button type="button" class="btn btn-sm btn-primary"> Go!</button>
					</span>
				</div>
			</div>
			
			<!--<input type="text" class="form-control input-sm m-b-xs"  placeholder="">-->
			
			<table class="footable table table-stripped" data-page-size="8" data-filter=#filter1>
				<thead>
					<tr>
						<th data-hide="phone,tablet">Fecha</th>
						<th>Usuario(nombre)</th>
						<th data-hide="phone,tablet">Tipo</th>
						<th data-hide="phone,tablet">Descripción</th>
						<th>Monto</th>
						<?php if($this->session->userdata('logged_in')['profile_id'] == 1 || $this->session->userdata('logged_in')['profile_id'] == 2){ ?>
						<th data-hide="phone,tablet">Cuenta</th>
						<?php } ?>
						<th data-hide="phone,tablet">Estatus</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($project_transactions as $transact) { ?>
						<tr style="text-align: center">
							<td>
								<?php echo $transact->fecha; ?>
							</td>
							<td>
								<?php echo $transact->name; ?>
							</td>
							<td>
								<?php echo $transact->tipo; ?>
							</td>
							<td>
								<?php echo $transact->descripcion; ?>
							</td>
							<td>
								<?php echo $transact->monto; ?>
							</td>
							<?php if($this->session->userdata('logged_in')['profile_id'] == 1 || $this->session->userdata('logged_in')['profile_id'] == 2){ ?>
							<td>
								<?php echo $transact->alias; ?>
							</td>
							<?php } ?>
							<td>
								<?php
								if($transact->status == "approved"){
									echo "<i class='fa fa-check text-navy'></i>";
								}else if($transact->status == "waiting"){
									echo "<i class='fa fa-check text-warning'></i>";
								}else if($transact->status == "denied"){
									echo "<i class='fa fa-times text-danger'></i>";
								}else{
									echo "";
								}
								?>
							</td>
						</tr>
						<?php $i++ ?>
					<?php } ?>
				</tbody>
			</table>
			
		</div>
		
	</div>
	<!-- Cierre del cuerpo de la sección de transacciones -->
	
	<?php 
	// Ids de los perfiles que tendrań permisos de visualización
	$global_profiles = array(1, 2, 4);
	?>
	
	<?php if(in_array($this->session->userdata('logged_in')['profile_id'], $global_profiles)){?>
	<!-- Cuerpo de la sección de transacciones por usuario-->
	<div class="ibox float-e-margins">
		<div class="ibox-title">
			<h5>User Summary</h5>
			
			<div class="ibox-tools">
				<a class="collapse-link">
					<i class="fa fa-chevron-up"></i>
				</a>
				<!--<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-wrench"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="#">Config option 1</a>
					</li>
					<li><a href="#">Config option 2</a>
					</li>
				</ul>-->
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
			
		</div>
		<div class="ibox-content">
			
			<div class="col-sm-4 col-md-offset-8">
				<div class="input-group">
					<input type="text" placeholder="Search in table" class="input-sm form-control" id="filter2">
					<span class="input-group-btn">
						<button type="button" class="btn btn-sm btn-primary"> Go!</button>
					</span>
				</div>
			</div>
			
			<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8" data-filter=#filter2>
				<thead>
					<tr>
						<th>Usuario(nombre)</th>
						<th data-hide="phone,tablet">Payback</th>
						<th data-hide="phone,tablet">C. Invertido</th>
						<th data-hide="phone,tablet">Dividendo</th>
						<th data-hide="phone,tablet">C. Disponible</th>
						<th data-hide="phone,tablet">Depósito Pendiente</th>
						<th data-hide="phone,tablet">Retiro Pendiente</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($project_transactions_users as $transact) { ?>
						<tr style="text-align: center">
							<td>
								<?php echo $transact->name; ?>
							</td>
							<td>
								<span class="pie">0.52/1.561</span>
							</td>
							<td>
								<?php echo $transact->capital_invested; ?>
							</td>
							<td>
								<?php echo $transact->returned_capital; ?>
							</td>
							<td>
								<?php echo $transact->retirement_capital_available; ?>
							</td>
							<td>
								<?php echo $transact->pending_entry; ?>
							</td>
							<td>
								<?php echo $transact->pending_exit; ?>
							</td>
						</tr>
						<?php $i++ ?>
					<?php } ?>
				</tbody>
			</table>
			
		</div>
		
	</div>
	<!-- Cierre del cuerpo de la sección de transacciones por usuario -->
	<?php } ?>

</div>

<!-- FooTable -->
<!--<script src="<?php echo assets_url('js/plugins/footable/footable.js');?>"></script>-->
<script src="<?php echo assets_url('js/plugins/footable/footable.all.min.js');?>"></script>

<!-- Peity -->
<script src="<?php echo assets_url('js/plugins/peity/jquery.peity.min.js');?>"></script>
<script src="<?php echo assets_url('js/demo/peity-demo.js');?>"></script>

<!-- Flot -->
<script src="<?php echo assets_url('js/plugins/flot/jquery.flot.js');?>"></script>
<script src="<?php echo assets_url('js/plugins/flot/jquery.flot.pie.js');?>"></script>

<script>
$(document).ready(function(){
	
	$('.footable').footable();  // Aplicamos el plugin footable
	
});
</script>
