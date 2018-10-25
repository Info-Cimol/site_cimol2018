
//var base_url="http://www2.cimol.g12.br/";
var base_url="http://localhost/site_cimol2018/";
//var base_url="http://cimol.esy.es/";
$('document').ready(function(){
	var ano=$('#ano').html();
	var mes=$('#mes-input').val();;
	
	$(".noticia-item").hover(function(){
		var image=$(this).find('img');
		var url=image.attr('src');
		var link=$(this).find('a');
		var url_link=link.attr('href');
		var texto_titulo=$(this).find('.titulo');
		var titulo=texto_titulo.text();
		var texto_resumo=$(this).find('.resumo');
		var resumo=texto_resumo.text();
		$("#imagem-destaque").attr('src', url);
		$("#link-imagem-destaque").attr('href', url_link);
		$("#titulo").html(titulo);
		$("#resumo").html(resumo);
	});
	$(".outras-imagens").hover(function(){
		var image=$(this).find('img');
		var url=image.attr('src');
		$("#imagem-mostrando").attr('src',url);
	});
	
	$('#voltar_ano').click(function(){
		var novo_ano = ano--;
		console.log(mes);
		$('#ano').html(ano);
		$.ajax({
            url: base_url+"site/agenda/agenda_ajax/"+ano+"/"+mes+"/00",
            type: "post",
            success: function(data){
            	console.log("ok");
            	$('#calendario').html(data);
            }
		})
	})
	
	$('#avancar_ano').click(function(){
		var novo_ano = ano++;
		$('#ano').html(ano);
		$.ajax({
            url: base_url+"site/agenda/agenda_ajax/"+ano+"/"+mes+"/00",
            type: "post",
            success: function(data){
            	$('#calendario').html(data);
            }
		})
	})
	
	$('.trocar-mes').click(function(){
		mes = $(this).attr('id');
		$.ajax({
	        url: base_url+"site/agenda/agenda_ajax/"+ano+"/"+mes+"/00",
	        type: "post",
	        success: function(data){
	        	$('#calendario').html(data);
	        }
		});
	})
	
	$("<input type='file' name='imagens[]' accept='image/*' multiple>").appendTo("#imagens");
	
	tinymce.init({
		mode : "specific_textareas",
		editor_selector : "mceEditor",
		language : 'pt_BR',
                plugins: [
			    	          'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			    	          'searchreplace wordcount visualblocks visualchars code fullscreen',
			    	          'insertdatetime media nonbreaking save table contextmenu directionality',
			    	          'emoticons template paste textcolor colorpicker textpattern imagetools'
			    	        ],
			    	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
			    	toolbar2: 'print preview media | forecolor backcolor emoticons',
			    	        image_advtab: true,
			    	        templates: [
			    	          { title: 'Test template 1', content: 'Test 1' },
			    	          { title: 'Test template 2', content: 'Test 2' }
			    	        ]
		});
	
	
	
});

function ver_eventos(ano, mes, dia){
	$('#modal-body').html('');
	$.ajax({
        url: base_url+"agenda/buscar_evento_data/"+ano+"/"+mes+"/"+dia,
        dataType: 'json',
        type: "post",
        success: function(data){
        	console.log(data);
        	$.each(data.evento,function(index, element){
        		$('#modal-body').append('<h2>'+element.titulo+'</h2>'+
        				'<p>'+element.descricao+'</p><br/>');
        	});
        	$.each(data.agenda, function(index,element){
        		$('#modal-body').append('<h2>'+element.titulo+'</h2>'+
        				'<p>'+element.evento+'</p><br/>');
        	});
        }
	})
}

function ver_popup(dia){
	if(dia<10){
		dia="0"+dia;
	}
	$('#div-'+dia).show();
}

function esconde_popup(dia){
	if(dia<10){
		dia="0"+dia;
	}
	$('#div-'+dia).hide();
}		
