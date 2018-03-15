
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
                                <?php 
                                    if(isset($slides)){
                                        echo '<h4 class="title">Editar slide</h4>';
                                    }
                                    else{
                                        echo '<h4 class="title">Nuevo slide</h4>';
                                    }
                                ?>
                                <p class="category"></p>
                            </div>
                        </div>


                        <?php 
                        	if(isset($slides)){
                        ?>

                        	<ul class="nav nav-tabs" role="tablist">
	                            <li role="presentation" class="active">
	                                <a href="#es" aria-controls="es" role="tab" data-toggle="tab">Español</a>
	                            </li>
	                            <li role="presentation">
	                                <a href="#en" aria-controls="en" role="tab" data-toggle="tab">Inglés</a>
	                            </li>
	                        </ul>
	                        <div class="tab-content">
		                        <?php
		                            foreach ($slides as $slide_lang) {
		                            	if($slide_lang->id_idioma == 1){
		                            		$idioma = 'es';
		                            	}
		                            	else{
		                            		$idioma = "en";
		                            	}
		                        ?>
		                        	<div class="card tab-pane <?php if($slide_lang->id_idioma == 1){echo 'active';}?>" id="<?php echo $idioma; ?>">
						                <div class="content">
				                         	<form id="form_crear_slide" action="<?php echo base_url()?>admin/guardar-slide" method="post">

				                            	<button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
				                                <a href="<?php echo base_url()?>admin/slider" style="margin-right: 20px; margin-bottom: 20px;" class="cancelar_form btn btn-fill pull-right">Cancelar</a>
												<div class="clearfix"></div>
				                   				
				                   				<div class="card">
						                            <div class="content">
						                            	<div class="row"> 
						                                    <div class="col-md-6">
						                                        <h2 class="titulo_seccion">Título</h2>
						                                    </div>                                        
						                                </div>
														<div class="row"> 
						                                    <div class="col-md-6">
						                                        <div class="form-group">
						                                            <label>Añadir título del slide<br><span>*Título del slide.</span></label>
						                                            <input type="text" name="slide_titulo" id="slide_titulo" rows="1" class="form-control" placeholder="Título" required="required" value="<?php print_r($slide_lang->titulo); ?>" />
						                                        </div>
						                                    </div>                                      
						                                </div>
						                            </div>
						                        </div>
				                   				<div class="card">
						                            <div class="content">
						                            	<div class="row"> 
						                                    <div class="col-md-6">
						                                        <h2 class="titulo_seccion">Subtítulo</h2>
						                                    </div>                                        
						                                </div>
														<div class="row"> 
						                                    <div class="col-md-6">
						                                        <div class="form-group">
						                                            <label>Añadir subtitulo del slide<br><span>*Subtítulo del slide.</span></label>
						                                            <input type="text" name="slide_subtitulo" id="slide_subtitulo" class="form-control" placeholder="Subtitulo" required="required" value="<?php print_r($slide_lang->subtitulo); ?>"/>
						                                        </div>
						                                    </div>                                        
						                                </div>
						                            </div>
						                        </div>
				                   				<div class="card">
						                            <div class="content">
						                            	<div class="row"> 
						                                    <div class="col-md-12">
						                                        <h2 class="titulo_seccion">Imagen escritorio</h2>
						                                    </div>                                        
						                                </div>
														<div class="row">
						                                    <div class="col-md-12">
						                                        <div class="form-group">
						                                            <label class="label_img">Añadir imagen:<br><span>*Tamaño: XXXXxXXXXpx.</span></label>
						                                            <a href="<?php echo (base_url()); ?>assets/admin/js/responsive-filemanager/filemanager/dialog.php?type=1&field_id=slide_imagen_escritorio_<?php echo $idioma; ?>" class="btn iframeItem contiene_img_form" type="button">
						                                            	<div class="imagen_preview" style="background-color: #f7f7f8; background-image: url('<?php echo base_url().$slide_lang->imagen;?>');">
									                            		</div>
																		<p style="display:block;" class="hover_text"><img src="<?php echo base_url()?>assets/admin/img/upload.png" ><span>AÑDIR IMAGEN</span></p>
						                                            </a>
						                                            <input class="imagen_medios_input" id="slide_imagen_escritorio_<?php echo $idioma; ?>" name="slide_imagen_escritorio" type="hidden" class="form-control"  value="<?php echo base_url().$slide_lang->imagen;?>">
						                                        </div>
						                                    </div>                                        
						                                </div>
						                            </div>
						                        </div>
				                   				<div class="card">
						                            <div class="content">
						                            	<div class="row"> 
						                                    <div class="col-md-12">
						                                        <h2 class="titulo_seccion">Imagen mobile</h2>
						                                    </div>                                        
						                                </div>
														<div class="row">
						                                    <div class="col-md-6">
						                                        <div class="form-group">
						                                            <label class="label_img">Añadir imagen:<br><span>*Tamaño: XXXXxXXXXpx.</span></label>
						                                            <a href="<?php echo (base_url()); ?>assets/admin/js/responsive-filemanager/filemanager/dialog.php?type=1&field_id=slide_imagen_mobile_<?php echo $idioma; ?>" class="btn iframeItem contiene_img_form" type="button">
						                                            	<div class="imagen_preview" style="background-color: #f7f7f8; background-image: url('<?php echo base_url().$slide_lang->imagen_mobile;?>');">
									                            		</div>
																		<p style="display:block;" class="hover_text"><img src="<?php echo base_url()?>assets/admin/img/upload.png" ><span>AÑDIR IMAGEN</span></p>
						                                            </a>
						                                            <input class="imagen_medios_input" id="slide_imagen_mobile_<?php echo $idioma; ?>" name="slide_imagen_mobile" type="hidden" class="form-control"  value="<?php echo base_url().$slide_lang->imagen_mobile;?>">
						                                        </div>
						                                    </div>                                        
						                                </div>
						                            </div>
						                        </div>

				                   				<div class="card">
						                            <div class="content">
						                            	<div class="row"> 
						                                    <div class="col-md-12">
						                                        <h2 class="titulo_seccion">Video</h2>
						                                    </div>                                        
						                                </div>
														<div class="row">
						                                    <div class="col-md-6">
						                                        <div class="form-group">
						                                            <label>Añadir ID del vídeo (YouTube / Vimeo):<span class="id-video-msg"></span></label>
						                                            <input type="text" name="video_link" id="video_link" class="form-control add_required video_link" placeholder="id del video" value="<?php print_r($slide_lang->video);?>" />
						                                        </div>
						                                    </div>                                        
						                                </div>
						                            </div>
						                        </div>
				                   				
						                        <input type="hidden" name="idioma" value="<?php echo $slide_lang->id_idioma;?>">
						                        <input type="hidden" name="id" value="<?php echo $slide_lang->id;?>">
				                                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
				                                <a href="<?php echo base_url()?>admin/slider" style="margin-right: 20px;" class="cancelar_form btn btn-fill pull-right">Cancelar</a>
				                                <div class="clearfix"></div>
				                            </form>
			                            </div>
			                        </div>

			                    <?php
			                	}
			                    ?>
		                    </div>


                        <?php 
                        	}else{
                        ?>

                            <form id="form_crear_slide" action="<?php echo base_url()?>admin/guardar-slide" method="post"  enctype="multipart/form-data">

                            	<button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                                <a href="<?php echo base_url()?>admin/slider" style="margin-right: 20px; margin-bottom: 20px;" class="cancelar_form btn btn-fill pull-right">Cancelar</a>
								<div class="clearfix"></div>
                   				
                   				<div class="card">
		                            <div class="content">
		                            	<div class="row"> 
		                                    <div class="col-md-6">
		                                        <h2 class="titulo_seccion">Título</h2>
		                                    </div>                                        
		                                </div>
										<div class="row"> 
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label>Añadir título del slide<br><span>*Título del slide.</span></label>
		                                            <input type="text" name="slide_titulo" id="slide_titulo" rows="1" class="form-control" placeholder="Título" required="required" value="" />
		                                        </div>
		                                    </div>                                      
		                                </div>
		                            </div>
		                        </div>
                   				<div class="card">
		                            <div class="content">
		                            	<div class="row"> 
		                                    <div class="col-md-6">
		                                        <h2 class="titulo_seccion">Subtítulo</h2>
		                                    </div>                                        
		                                </div>
										<div class="row"> 
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label>Añadir subtitulo del slide<br><span>*Subtítulo del slide.</span></label>
		                                            <input type="text" name="slide_subtitulo" id="slide_subtitulo" class="form-control" placeholder="Subtitulo" required="required" value=""/>
		                                        </div>
		                                    </div>                                        
		                                </div>
		                            </div>
		                        </div>
                   				<div class="card">
		                            <div class="content">
		                            	<div class="row"> 
		                                    <div class="col-md-12">
		                                        <h2 class="titulo_seccion">Imagen escritorio</h2>
		                                    </div>                                        
		                                </div>
										<div class="row">
		                                    <div class="col-md-12">
		                                        <div class="form-group">
		                                            <label class="label_img">Añadir imagen:<br><span>*Tamaño: XXXXxXXXXpx.</span></label>
		                                            <a href="<?php echo (base_url()); ?>assets/admin/js/responsive-filemanager/filemanager/dialog.php?type=1&field_id=slide_imagen_escritorio" class="btn iframeItem contiene_img_form" type="button">
		                                            	<div class="imagen_preview" style="background-color: #f7f7f8">
					                            		</div>
														<p style="display:block;" class="hover_text"><img src="<?php echo base_url()?>assets/admin/img/upload.png" ><span>AÑDIR IMAGEN</span></p>
		                                            </a>
		                                            <input class="imagen_medios_input" id="slide_imagen_escritorio" name="slide_imagen_escritorio" type="hidden" class="form-control"  value="">
		                                        </div>
		                                    </div>                                        
		                                </div>
		                            </div>
		                        </div>
                   				<div class="card">
		                            <div class="content">
		                            	<div class="row"> 
		                                    <div class="col-md-12">
		                                        <h2 class="titulo_seccion">Imagen mobile</h2>
		                                    </div>                                        
		                                </div>
										<div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label class="label_img">Añadir imagen:<br><span>*Tamaño: XXXXxXXXXpx.</span></label>
		                                            <a href="<?php echo (base_url()); ?>assets/admin/js/responsive-filemanager/filemanager/dialog.php?type=1&field_id=slide_imagen_mobile" class="btn iframeItem contiene_img_form" type="button">
		                                            	<div class="imagen_preview" style="background-color: #f7f7f8">
					                            		</div>
														<p style="display:block;" class="hover_text"><img src="<?php echo base_url()?>assets/admin/img/upload.png" ><span>AÑDIR IMAGEN</span></p>
		                                            </a>
		                                            <input class="imagen_medios_input" id="slide_imagen_mobile" name="slide_imagen_mobile" type="hidden" class="form-control"  value="">
		                                        </div>
		                                    </div>                                        
		                                </div>
		                            </div>
		                        </div>

                   				<div class="card">
		                            <div class="content">
		                            	<div class="row"> 
		                                    <div class="col-md-12">
		                                        <h2 class="titulo_seccion">Video</h2>
		                                    </div>                                        
		                                </div>
										<div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label>Añadir ID del vídeo (YouTube / Vimeo):<span class="id-video-msg"></span></label>
		                                            <input type="text" name="video_link" id="video_link" class="form-control add_required video_link" placeholder="id del video" value="" />
		                                        </div>
		                                    </div>                                        
		                                </div>
		                            </div>
		                        </div>
		                        <!-- 
                   				<div class="card">
		                            <div class="content">
		                            	<div class="row"> 
		                                    <div class="col-md-12">
		                                        <h2 class="titulo_seccion">Archivo1</h2>
		                                    </div>                                        
		                                </div>
										<div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label>Añadir archivo1:<span class="id-video-msg"></span></label>
		                                            <input type="file" name="archivo1" id="archivo1" class="form-control add_required archivo_field" value="" />
		                                        </div>
		                                    </div>                                        
		                                </div>
		                            </div>
		                        </div>

                   				<div class="card">
		                            <div class="content">
		                            	<div class="row"> 
		                                    <div class="col-md-12">
		                                        <h2 class="titulo_seccion">Archivo2</h2>
		                                    </div>                                        
		                                </div>
										<div class="row">
		                                    <div class="col-md-6">
		                                        <div class="form-group">
		                                            <label>Añadir archivo2:<span class="id-video-msg"></span></label>
		                                            <input type="file" name="archivo2" id="archivo2" class="form-control add_required archivo_field" value="" />
		                                        </div>
		                                    </div>                                        
		                                </div>
		                            </div>
		                        </div>
		                        -->

                                <button type="submit" class="btn btn-info btn-fill pull-right">Guardar</button>
                                <a href="<?php echo base_url()?>admin/slider" style="margin-right: 20px;" class="cancelar_form btn btn-fill pull-right">Cancelar</a>
                                <div class="clearfix"></div>
                            </form>
                            
                        <?php 
                        	}
                        ?>
                    </div>
                </div>
            </div>
          </div>



    </div>
</div>
