<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Grupos de Inversionistas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Grupos de Inversionistas</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo base_url() ?>investor_groups/register">
            <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i> Agregar</button></a>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Grupos de Inversionistas </h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tab_groups" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Proyectos</th>
                                    <th>Usuarios</th>
                                    <th>Cuentas</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($listar as $grupo) { ?>
                                    <tr style="text-align: center">
                                        <td>
                                            <?php echo $i; ?>
                                        </td>
                                        <td>
                                            <?php echo $grupo->name; ?>
                                        </td>
                                        <td>
                                            <?php
                                            echo "<br>";
                                            // Validamos qué proyectos están asociados a cada grupo
                                            foreach($group_projects as $group_project){
												if($grupo->id == $group_project->group_id){
													foreach ($projects as $project){
														if($group_project->project_id == $project->id){
															echo $project->name."<br>";
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
                                            // Validamos qué usuarios están asociados a cada grupo
                                            foreach($group_users as $group_user){
												if($grupo->id == $group_user->group_id){
													foreach ($users as $user){
														if($group_user->user_id == $user->id){
															echo $user->username."<br>";
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
                                            // Validamos qué cuentas están asociadas a cada grupo
                                            foreach($group_accounts as $group_account){
												if($grupo->id == $group_account->group_id){
													foreach ($accounts as $account){
														if($group_account->account_id == $account->id){
															echo $account->cuenta." - ".$account->numero." - ".$account->coin_symbol."<br>";
														}else{
															echo "";
														}
													}
												}
											}
											?>
                                        </td>
                                        <td style='text-align: center'>
                                            <a href="<?php echo base_url() ?>investor_groups/edit/<?= $grupo->id; ?>" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                                        </td>
                                        <td style='text-align: center'>
                                            <a class='borrar' id='<?php echo $grupo->id; ?>' title='Eliminar'><i class="fa fa-trash-o fa-2x"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
    $('#tab_groups').DataTable({
       "paging": true,
       "lengthChange": false,
       "autoWidth": false,
       "searching": true,
       "ordering": true,
       "info": true,
       dom: '<"html5buttons"B>lTfgitp',
       buttons: [
           { extend: 'copy'},
           {extend: 'csv'},
           {extend: 'excel', title: 'ExampleFile'},
           {extend: 'pdf', title: 'ExampleFile'},

           {extend: 'print',
            customize: function (win){
                   $(win.document.body).addClass('white-bg');
                   $(win.document.body).css('font-size', '10px');

                   $(win.document.body).find('table')
                           .addClass('compact')
                           .css('font-size', 'inherit');
           }
           }
       ],
       "iDisplayLength": 5,
       "iDisplayStart": 0,
       "sPaginationType": "full_numbers",
       "aLengthMenu": [5, 10, 15],
       "oLanguage": {"sUrl": "<?= base_url() ?>assets/js/es.txt"},
       "aoColumns": [
           {"sClass": "registro center", "sWidth": "5%"},
           {"sClass": "registro center", "sWidth": "20%"},
           {"sClass": "none", "sWidth": "8%"},
           {"sClass": "none", "sWidth": "8%"},
           {"sClass": "none", "sWidth": "8%"},
           {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
           {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
       ]
   });
             
         // Validacion para borrar
    $("table#tab_groups").on('click', 'a.borrar', function (e) {
        e.preventDefault();
        var id = this.getAttribute('id');

        swal({
            title: "Borrar registro",
            text: "¿Está seguro de borrar el grupo?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
            closeOnConfirm: false,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
             
              $.post('<?php echo base_url(); ?>investor_groups/delete/' + id + '', function (response) {

              swal({ 
                title: "Eliminar",
                 text: "Registro eliminado con exito",
                  type: "success" 
                },
                function(){
                  window.location.href = '<?php echo base_url(); ?>investor_groups';
              });
   
             });
            } 
          });
        
    });
            
});
        
</script>
