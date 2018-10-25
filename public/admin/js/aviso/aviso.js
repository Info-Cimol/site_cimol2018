	var base_url="http://localhost/site_cimol2018/";
	console.log(base_url);
	function form_aviso(aviso){
			form="<form action='"+base_url+"admin/aviso/salvar' method='post' enctype='multipart/form-data' >"+
					"<div class='padded'>"+
						"<input type='hidden' name='aviso[id]' value='"+aviso.id+"' />"+
						"<input type='hidden' name='aviso[data]' value='"+aviso.data+"' />"+
                        "<div class='control-group'>"+
                            "<label class='control-label'>Aviso:</label>"+
                            "<div class='controls'>"+
                                "<textarea name='aviso[aviso]' class='mceEditor' rows='5'>"+aviso.aviso+"</textarea>"+
                            "</div>"+
                        "</div>"+
                       "<div class='control-group'>"+
                            "<label class='control-label'>Data Fim:</label>"+
                            "<div class='controls'>"+
                                "<input type='date' name='aviso[data_fim]'value='"+aviso.data_fim+"'/>"+
                            "</div>"+
                        "</div>";
                        
	                    
		                form+="</div>"+
                        "<div class='form-actions'>"+
	                    	"<button type='submit' class='btn btn-blue'>Salvar</button>"+
	                    "</div>"+
				"</form>";
			
			
				return form;
			 		
		}
		
		
	
		function editar_aviso(id){
			$('#modal-body').html('');
			//console.log(base_url+"admin/aviso/buscar/"+id);

			$.ajax({
		        url: base_url+"admin/aviso/buscar/"+id,
		        dataType: 'json',
		        type: "post",
		        success: function(data){
		        	console.log(data);
		        	aviso=data[0]
		        	$('#modal-body').html('');
		        	$('#modal-body').append(form_aviso(aviso));
		        	callTinymce();
		        	if(aviso.id!=''){
						$("#file").hide();
		        	}
		        	
		        	
		        	
		        }
			})
		}
		
		function novo_aviso(){ 
			$('#modal-body').html('');
			aviso={id:'', data:'',aviso:'', data_fim:''};
			
			$('#modal-body').append(form_aviso(aviso));
			callTinymce();
			
			
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
