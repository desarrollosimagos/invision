<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cuentas</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo base_url() ?>home">Inicio</a>
            </li>
            <li class="active">
                <strong>Cuentas</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <a href="<?php echo base_url() ?>cuentas/register">
            <button class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-plus"></i> Agregar</button></a>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Listado de Cuentas</h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="tab_cuentas" class="table table-striped table-bordered dt-responsive table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Número</th>
                                    <th>Usuario</th>
                                    <th>Tipo</th>
                                    <th>Monto</th>
                                    <th>Moneda</th>
                                    <th>Estatus</th>
                                    <th>Observaciones</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
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
                                            <?php echo $fondo->cuenta; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->numero; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->usuario; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->tipo; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->monto; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->coin_avr." (".$fondo->coin.")"; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->status; ?>
                                        </td>
                                        <td>
                                            <?php echo $fondo->descripcion; ?>
                                        </td>
                                        <td style='text-align: center'>
                                            <a href="<?php echo base_url() ?>cuentas/edit/<?= $fondo->id; ?>" title="Editar"><i class="fa fa-edit fa-2x"></i></a>
                                        </td>
                                        <td style='text-align: center'>
                                            
                                            <a class='borrar' id='<?php echo $fondo->id; ?>' title='Eliminar'><i class="fa fa-trash-o fa-2x"></i></a>
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


 <!-- Page-Level Scripts -->
<script>
$(document).ready(function(){
     $('#tab_cuentas').DataTable({
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
        "oLanguage": {"sUrl": "<?= assets_url() ?>js/es.txt"},
        "aoColumns": [
            {"sClass": "registro center", "sWidth": "5%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "registro center", "sWidth": "10%"},
            {"sClass": "none", "sWidth": "30%"},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false},
            {"sWidth": "3%", "bSortable": false, "sClass": "center sorting_false", "bSearchable": false}
        ]
    });
             
         // Validacion para borrar
    $("table#tab_cuentas").on('click', 'a.borrar', function (e) {
        e.preventDefault();
        var id = this.getAttribute('id');

        swal({
            title: "Borrar registro",
            text: "¿Está seguro de borrar el registro?",
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
             
                $.post('<?php echo base_url(); ?>cuentas/delete/' + id + '', function (response) {

                    if (response['response'] == "existe") {
                       
                         swal({ 
                           title: "Disculpe,",
                            text: "No se puede eliminar, se encuentra asociado a una transacción",
                             type: "warning" 
                           },
                           function(){
                             
                         });
                    } else if (response['response'] == "existe2") {
                       
                         swal({ 
                           title: "Disculpe,",
                            text: "No se puede eliminar, se encuentra asociado a un grupo de inversionistas.",
                             type: "warning" 
                           },
                           function(){
                             
                         });
                    } else if (response['response'] == "error") {
                       
                         swal({ 
                           title: "Disculpe,",
                            text: "No se puede eliminar, ha ocurrido un falo en el sistema, por favor consulte con su administrador.",
                             type: "warning" 
                           },
                           function(){
                             
                         });
                    } else {
                         swal({ 
                           title: "Eliminar",
                            text: "Registro eliminado con exito.",
                             type: "success" 
                           },
                           function(){
                             window.location.href = '<?php echo base_url(); ?>cuentas';
                         });
                    }
                }, 'json');
            } 
        });
    });       
});
        
</script>
