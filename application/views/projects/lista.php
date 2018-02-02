<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Projectos</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Projectos</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo base_url() ?>projects/register" id="agregar">
            <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i> Agregar</button>
            </a>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Projectos </h5>
                    <input type="hidden" id="precio_dolar">
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
						
						<br>
						
                        <table id="tab_projects" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" >
                            
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Valor</th>
                                    <th>Fecha</th>
                                    <th>Número de Fotos</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($listar as $proyecto) { ?>
                                    <tr style="text-align: center">
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $proyecto->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $proyecto->description; ?>
                                        </td>
                                        <td>
                                            <?php echo $proyecto->valor; ?>
                                        </td>
                                        <td>
                                            <?php echo $proyecto->date; ?>
                                        </td>
                                        <td>
                                            <?php echo $proyecto->num_fotos; ?>
                                        </td>
                                        <td style='text-align: center'>
                                            <a href="<?php echo base_url() ?>projects/edit/<?= $proyecto->id; ?>" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                                        </td>
                                        <td style='text-align: center'>
                                            <a class='borrar' id='<?php echo $proyecto->id; ?>' title='Eliminar'><i class="fa fa-trash-o fa-2x"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php } ?>
                            </tbody>
							
                        </table>
                        
                        <!-- Campo oculto de base_url -->
                        <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>"/>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Page-Level Scripts -->
<script src="<?php echo assets_url(); ?>script/projects.js"></script>
