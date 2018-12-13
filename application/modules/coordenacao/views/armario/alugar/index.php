<div style="text-align: center;">
    <div>
      <h2>Alugar Armário</h2>
    </div>

    <form  method="post" id="form_alugar" action="<?php echo base_url() ?>coordenacao/armario/armario_alugado">
        <div class="form-group">
            <label for="armario_id">Selecione o numero do armário</label>
            <select class="form-control" id="armario_id" name="armario_id">
            </select> 
        </div>
     
        <div class="formgroup">
            <label for="aluno_id">Selecione o aluno</label>
            <select class="form-control" id="aluno_id" name="aluno_id">
            </select> 
        </div>
     
        <div class="form-group">
            <label for="data_inicio">Data de Início</label>
            <input type="date" class="form-control" id="data_inicio" name="data_inicio" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Entrega</label>
            <input type="date" class="form-control" id="data_fim" name="data_fim" placeholder="Password">
        </div>
        <br>
        <button type="submit" class="btn btn-success btn btn-lg" name="alugar">Alugar</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">    
    $(document).ready(function(){
      //alert('rr');
      $.ajax({
        url:"<?php echo base_url() ?>coordenacao/armario/busca_armarios_disponiveis_ajax",
        method:"POST",
        dataType: 'json',
        success:function(data){
          //alert('rr');
          console.log(data);
            for (var i = 0; i <= data.length; i++) {
               $('#armario_id').prepend("<option value="+data[i].id+" >"+data[i].numero+"</option>");
               //console.log(data.numero);
            }      
        }
      })         
    })
    
    $(document).ready(function(){
      $.ajax({
        url:"<?php echo base_url() ?>coordenacao/armario/busca_aluno_alugar_ajax",
        method:"POST",
        dataType: 'json',
        success:function(data){
              for (var i = 0; i <= data.length; i++) {
                $('#aluno_id').prepend("<option value="+data[i].id+">"+data[i].nome+"</option>");
              }
          }
      })         
    })


    $('#form_alugar').submit(function(){
      
      if (($('#armario_id').val() == null)){
        alert('Informe o número do armário');
        return false;
      }

      if ($('#data_inicio').val() == ""){
        alert('Informe a data do início da locação');
        return false;
      }

      if ($('#data_fim').val() == ""){
        alert('Informe a data de entrega do armário');
        return false;
      }

      if ($('#data_fim').val() < $('#data_inicio').val()) {
        alert('A data de entrega não pode terminar antes do início');
      }
      
    })

</script>