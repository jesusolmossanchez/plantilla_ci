<div class="wrapper">
    <?php $this->load->view('admin/templates/sidebar_admin'); ?>
    <div class="main-panel">
    <?php $this->load->view('admin/templates/navbar_admin'); ?>
          <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-plain card-table">
                            <div class="header">
                                <h4 class="title">Slider</h4>
                                <p class="category"></p>
                            </div>
                        </div>
                        <a href="<?php echo base_url()?>admin/slider/crear" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-info btn-fill pull-left">+ Nuevo</a>
                        <div class="content table-responsive table-full-width col-md-12">
                            <table id="table_slider" class="table table-hover col-md-12">
                                <thead>
                                    <th>Orden</th>
                                    <th>Título</th>
                                    <th>Editar</th>
                                    <th>Activo</th>
                                    <th>Borrar</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($slides as $slide) {
                                    ?>
                                    <tr>
                                        <td class="sortable_row"><img class="sort_table" src="<?php echo base_url()?>assets/admin/img/sort.png"><span class="ordenable" data-idslider="<?php print_r ($slide->id) ?>"><?php print_r ($slide->orden) ?></span></td>
                                        <td class="td_text_con_imagen ">
                                            <?php print_r ($slide->nombre) ?>
                                        </td>
                                        <td class="">
                                            <a href="<?php print_r (base_url());?>admin/slider/<?php print_r ($slide->id)?>">
                                                <i data-idslider="<?php print_r ($slide->id) ?>" class="editar_table editar_slide  pe-7s-note"></i>
                                            </a>
                                        </td>
                                        <td class="">
                                            <?php if($slide->activo){ ?>
                                                <i data-idslider="<?php print_r ($slide->id) ?>" class="desactiva_table desactiva_slider pe-7s-check"></i>
                                                <i style="display:none;" data-idslider="<?php print_r ($slide->id) ?>" class="activa_table activa_slider pe-7s-close-circle"></i>
                                            <?php }else{ ?>
                                                <i style="display:none;" data-idslider="<?php print_r ($slide->id) ?>" class="desactiva_table desactiva_slider pe-7s-check"></i>
                                                <i data-idslider="<?php print_r ($slide->id) ?>" class="activa_table activa_slider pe-7s-close-circle"></i>
                                            <?php } ?>
                                        </td>
                                        <td class="">
                                            <a href="<?php print_r (base_url());?>admin/slider/borrar/<?php print_r ($slide->id)?>">
                                                <i data-idslider="<?php print_r ($slide->id) ?>" class="editar_table delete_slide pe-7s-trash"></i>
                                            </a>
                                        </td>
                                    </tr>  
                                    <?php
                                        } 
                                    ?>                                         
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
    </div>
</div>
