<input id="base_url" type="hidden" value="<?php echo base_url(); ?>"/>
<script src="<?php echo assets_url('script/users.js'); ?>" type="text/javascript" charset="utf-8" ></script>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Usuarios</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Usuarios</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo base_url() ?>users_register">
            <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i> Agregar</button></a>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Usuarios </h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tab_users" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Usuario</th>
                                    <th>Tiendas</th>
                                    <th>Permisos</th>
                                    <th>Editar</th>
                                    <th>Activar/Desactivar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($listar as $usuario) { ?>
                                    <tr style="text-align: center">
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario->lastname; ?>
                                        </td>
                                        <td>
                                            <?php echo $usuario->username; ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo "<br>";
                                            // Validamos qué tiendas están asociadas a cada usuario
                                            foreach($users_tiendas as $user_tienda){
												if($usuario->id == $user_tienda->user_id){
													foreach ($tiendas as $tienda){
														if($user_tienda->tienda_id == $tienda->id){
															echo $tienda->name."<br>";
														}else{
															echo "";
														}
													}
												}
											}
											?>
                                        </td>
                                        <td>
                                            <?php
                                            echo "<br>";
                                            // Validamos qué acciones están asociadas a cada usuario
                                            foreach($permisos as $permiso){
												if($usuario->id == $permiso->user_id){
													foreach ($acciones as $accion){
														if($permiso->action_id == $accion->id){
															echo $accion->name."<br>";
														}else{
															echo "";
														}
													}
												}
											}
											?>
                                        </td>
                                        <td style='text-align: center'>
                                            <a href="<?php echo base_url() ?>users_edit/<?= $usuario->id; ?>"  title="Editar" style='color: #1ab394'><i class="fa fa-edit fa-2x"></i></a>
                                        </td>
                                        <td style='text-align: center'>
											<?php if ($usuario->status == 1) {?>
											<input class='activar_desactivar' id='<?php echo $usuario->id; ?>' type="checkbox" title='Desactivar el usuario <?php echo $usuario->id;?>' checked="checked"/>
											<?php }else if ($usuario->status == 0){ ?>
											<input class='activar_desactivar' id='<?php echo $usuario->id; ?>' type="checkbox" title='Activar el usuario <?php echo $usuario->id;?>'/>
											<?php } ?>
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
</div>

