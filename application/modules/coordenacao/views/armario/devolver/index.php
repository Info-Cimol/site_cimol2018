<div style="text-align: center;">
    <div>
      <h2>Devolver Armário</h2>
    </div>
    <form  method="post" id="form_entrega" action="<?php echo base_url() ?>coordenacao/armario/devolvido">
        <div class="form-group">
            <label for="armario_id">Selecione o numero do armário</label>
            <select class="form-control" id="armario_id" name="armario_id">
            </select>  
        </div>
            
        <fieldset disabled>
            <div class="form-group" id="aluno">            
            </div>
        </fieldset>

        <div class="form-group">
            <label for="data_entrega">Data de Entrega</label>
            <input type="date" class="form-control" id="data_entrega" name="data_entrega" >
        </div>
        <br>
        <button type="submit" class="btn btn-success btn-lg mr-2" name="devolver">Devolver</button>
    </form>
</div>
<!-- ------------------------------------------------------------------------------ -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
            url:"<?php echo base_url() ?>coordenacao/armario/busca_todos_locados_ajax",
            method:"POST",
            dataType: 'json',
            success:function(data){
                for (var i = 0; i < data.length; i++) {
                    $('#armario_id').prepend("<option value="+data[i].armario_id+" >"+data[i].numero+"</option>");         
                }
                  //console.log(data);
            }  
        })         
    })

    $('#armario_id').change(function(){
        var armario_id = $('#armario_id').val();
        $.ajax({
            url:"<?php echo base_url() ?>coordenacao/armario/busca_aluno_devolver_ajax",
            method:"POST",
            dataType: 'json',
            data:{armario_id:armario_id},
            success:function(data){
                    $('#aluno').html("<label for='aluno'>Aluno</label><input type='text' class='form-control' value="+data[0].nome+" >");
                  //console.log(data);
            }  
        })         
    })

    $('#form_entrega').submit(function(){

        if ($('#data_entrega').val() == ""){
          alert('Informe a data de entrega do armário');
          return false;
        }
      
    })

</script>