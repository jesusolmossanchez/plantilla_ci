var data_table_ES = 
{
	"sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar:",
	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
	},
	"oAria": {
		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}
};

/* Javascript Slug Generator */
var slug = function(str) {
  	str = str.replace(/^\s+|\s+$/g, ''); // trim
  	str = str.toLowerCase();

  	// remove accents, swap ñ for n, etc
  	var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
  	var to   = "aaaaaeeeeeiiiiooooouuuunc------";
  	for (var i=0, l=from.length ; i<l ; i++) {
    	str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  	}

  	str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    	.replace(/\s+/g, '-') // collapse whitespace and replace by -
    	.replace(/-+/g, '-'); // collapse dashes

  	return str;
};

/* Javascript Youtube Validator */
var youtube = function (str) {    
    var url = str;
    var flag = false;
    if (url !== undefined || url !== '') {        
        var regExp = /^.*([^#\&\?]*).*/;
        var match = url.match(regExp);
        if (match && match[0].length == 11) {
            flag = true;
        } else {
            flag = false;
        }
    }
    return flag;
};

/* Javascript Vimeo Validator */
var vimeo = function (str) {
	var url = "http://www.vimeo.com/" + str;
	var flag = false;
	var regExp = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
	var match = url.match(regExp);

	if ((match) && (str.length <= 9) && (str.length >= 6)){
	    flag = true;
	}else{
	    flag = false;
	}
	return flag;
};





$( document ).ready(function() {
	
	global_events();
	menu_events();
	if ($('body').hasClass('slider')) {
		slider_events();
  	}

});

function global_events() {
	
	/* TINY
	tinymce.init({
	    selector: "textarea",theme: "modern",width: 680,height: 300,
	    plugins: [
	         "advlist autolink link image lists charmap print preview hr anchor pagebreak",
	         "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking"
	         //"table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
	   ],
	   toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect"
	   //toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
	   //image_advtab: true ,
	   
	   //external_filemanager_path: base_url + "assets/admin/js/responsive-filemanager/filemanager/",
	   //filemanager_title:"Biblioteca Multimedia" ,
	   //external_plugins: { "filemanager" : base_url + "/assets/admin/js/tinymce/plugins/responsivefilemanager/plugin.min.js"}
	 });
	 */

	/* FANCYBOX */ 
	$('.iframeItem').fancybox({	
		'width'		: 900,
		'height'	: 600,
		'minHeight'  : 600,
		'type'		: 'iframe'
	});


	/* COLUMAN EDITABLE*/
	$("td[contenteditable=true]").blur(function(){
        var row_id = $(this).attr("data-id") ;
        var column_row_id = $(this).attr("data-column-id") ;
        var table = $(this).attr("data-table");
        var column = $(this).attr("data-column");
        var value = $(this).text();
        $.post( base_url + "admin/edit_cell", 
        	{ id : row_id, column_id: column_row_id, table : table, column : column, value : value })
			.done(function( data ) {
				showPush ('Registro EDITADO Correctamente' , 'success', 4000);
			}
		);
    });

	$("td[contenteditable=true]").keypress(function(event) {
	    if(event.which == 13) {
	    	event.preventDefault();
	        $(this).blur();
	    }
	});

	/* COLOR PICKER */
	$('.colorpicker-component').colorpicker();


	$("body").on("keyup", ".video_link", function (event) {
		var video_id = $(this).val();
		$('.id-video-msg').removeClass('youtube vimeo fail').text('');
		if (youtube(video_id)) {
			$(".add_videocase").removeClass("inactivo");
			$(".add_element").tooltip('destroy');
			$('.id-video-msg').addClass('youtube').text(' - Es un video de Youtube');
		} else if (vimeo(video_id)) {
			$(".add_videocase").removeClass("inactivo");
			$(".add_element").tooltip('destroy');
			$('.id-video-msg').addClass('vimeo').text(' - Es un video de Vimeo');
		} else {
			$(".add_videocase").addClass("inactivo");
			$('.id-video-msg').addClass('fail').text(' - ID de video NO valido');
		}
	});


}

function menu_events () {
	$('#nav_' + $('body').attr('class')).addClass('active');
}





function responsive_filemanager_callback(field_id){

	var botones = $("#"+field_id).closest(".card").find(".add_element");
	if(botones.length > 0){
		botones.eq(0).removeClass("inactivo");
		$(".add_element").tooltip('destroy');
	}

	var new_img = $('#'+field_id).val();
	$('#'+field_id).parent().find(".imagen_preview").css("background-image","url('"+new_img+"?v="+Math.random()+"')");

}


function showPush (msg, tipo, time) {
	$.notify({
    	icon: "pe-7s-config",
    	message: msg
    	
    },{
        type: tipo,
        timer: time
        /*placement: {
            from: from,
            align: align
        }*/
    });
}


function slider_events() {
	
	var tabla_slider = $("#table_slider").DataTable( {
		language : data_table_ES,
		"bSort" : false,
		"bInfo" : false,               
		"bLengthChange": false,
		"bPaginate": false,
		rowReorder: {
			update: false
		}
	});


	tabla_slider.on('row-reorder', function ( e, diff, edit ) {
		var orden_id=[];
		$( "#table_slider .ordenable" ).each(function( index ) {
			var orden = index +1;
			var id = $( this ).data("idslider");
			var elemento = {id:id, orden:orden};
			orden_id.push(elemento);
		  	$( this ).text(orden);
		});

		$.post( base_url + "admin/slider/reordena", 
        	{ orden : JSON.stringify(orden_id) })
			.done(function( data ) {
			}
		);
	});

	$(".desactiva_slider").click(function (e) {
		var id_slide_act = $(this).data("idslider");
		var yo = $(this);
		var act = $(this).next();
		$.post( base_url + "admin/desactiva_slide", 
        	{ id_slide : id_slide_act })
			.done(function( data ) {
				yo.hide();
				act.show();
				showPush ('slide desactivado, no se mostrará en la página' , 'success', 2000);
			}
		);
	});

	$(".activa_slider").click(function (e) {
		var id_slide_act = $(this).data("idslider");
		var yo = $(this);
		var des = $(this).prev();
		$.post( base_url + "admin/activa_slide", 
        	{ id_slide : id_slide_act })
			.done(function( data ) {
				yo.hide();
				des.show();
				showPush ('slide activado, se mostrará en la página' , 'success', 2000);
			}
		);
	});

	
}