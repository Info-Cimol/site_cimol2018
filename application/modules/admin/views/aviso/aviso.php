<script src="<?php echo base_url();?>public/admin/js/aviso/aviso.js" type="text/javascript"></script>

	<div class="box-header">
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					Avisos
                    	</a>
            </li>
            
		</ul>
    	
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
            	
            	<a data-toggle="modal" href="#modal-form" class="btn btn-blue" onclick="novo_aviso()">Novo aviso</a>
               
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                            <th><div>Data</div></th>
                    		<th><div>Aviso</div></th>
                    		<th><div>Data Final</div></th>
                    		<th><div>Opções</div></th>
						</tr>
					</thead>
					<tbody>
						
                    	<?php
                        
                    	if(isset($avisos)){

                        	$count = 1;
                        	foreach($avisos as $aviso):

                                ?>
                                
                            <tr>
                            	<td><?php echo $count++;?></td>
                                <td><?php echo $aviso->data;?></td>
    							<td><?=$aviso->aviso;?></td>
                                <td><?php echo $aviso->data_final; ?></td>
    							<td align="center">
    								<a data-toggle="modal" href="#modal-form" onclick="editar_aviso(<?php echo $aviso->id; ?>)" class="btn btn-gray btn-small" title="Editar"> 
                                    		<i class="icon-wrench"></i>
                                    </a>
                                	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>admin/aviso/deletar/<?php echo $aviso->id;?>')" class="btn btn-red btn-small" title="Excluir">
                                    		<i class="icon-trash"></i> 
                                    </a>
                                    
                                </td>
                            </tr>
                            <?php endforeach;
                    	}?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            <!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php include "formulario_aviso.php"?>              
                </div>                
			</div>
			<!----CREATION FORM ENDS--->
		</div>
	</div>

<?php if(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE){
?>
	<script>
	$(document).ready(function(){
		$('.data').mask("99/99/9999");
	})
	</script>
<?php 
}?>