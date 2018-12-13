<div id="center">
    <div id="container">
        <div id="circle_locados"></div> <h5 style="margin-top: 30px">Alugados</h5>
        <div id="circle_disponiveis" ></div> <h5 style="margin-top: 30px">Disponíveis</h5> 
        <div id="circle_vencidos" ></div> <h5 style="margin-top: 30px">Vencidos</h5>
    </div>
    <br><br>

    <select class="form-control-lg" id="select_armario">
        <option value="todos">Todos</option>
        <option value="locados">Locados</option>
        <option value="disponiveis">Disponíveis</option>
        <option value="vencidos">Vencidos</option>
    </select>
    <br>
    <a href="<?php echo base_url() ?>coordenacao/armario/alugar" class="btn btn-primary active center" role="button" aria-pressed="true">&ensp;Alugar&ensp;</a>
    <a href="<?php echo base_url() ?>coordenacao/armario/devolver" class="btn btn-primary active center" role="button" aria-pressed="true">Devolver</a>
</div>

<div class="wrapper">
     <div id="cards">
          
     </div>
</div>
	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $.ajax({
      url:"<?php echo base_url() ?>coordenacao/armario/busca_todos_armarios_index_ajax",
      method:"POST",
      dataType: 'json',
                    //data:{select_armario:select_armario},
                    success:function(data){
                      $('#cards').empty();
                      
                      for (var i = 0; i < data['locados'].length; i++) {
                       var d = new Date(data['locados'][i].data_fim);
                       data_fim = (d.toLocaleDateString());
                       $('#cards').prepend('<div class="card"><h2 class="card-title" >'+data['locados'][i].numero+'</h2><p>'+data['locados'][i].nome+'</p><h4>Entrega '+data['locados'][i].data_fim+'</h4>');          
                     }

                     for (var i = 0; i < data['vencidos'].length; i++) {
                       var d = new Date(data['vencidos'][i].data_fim);
                       data_fim = (d.toLocaleDateString());
                       $('#cards').append('<div class="card-vencido"><h2 class="card-title" >'+data['vencidos'][i].numero+'</h2><p>'+data['vencidos'][i].nome+'</p><h4>Entrega '+data['vencidos'][i].data_fim+'</h4>');          
                     }

                     for (var i = 0; i < data['disponiveis'].length; i++) {
                       var d = new Date(data['disponiveis'][i].data_fim);
                       data_fim = (d.toLocaleDateString());
                       $('#cards').append('<div class="card-disponivel"><h2 class="card-title" >'+data['disponiveis'][i].numero+'</h2><h4>Disponível</h4>');          
                     }
                     
                   }
                 })
  })

    $('#select_armario').change(function(){
      var select_armario = $('#select_armario').val();
          switch (select_armario) {
            case 'locados':
               $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/armario/armarios_locados_ajax",
                    method:"POST",
                    dataType: 'json',
                    data:{select_armario:select_armario},
                    success:function(data){
                    $('#cards').empty();
                    for (var i = 0; i < data.length; i++) {
                         var d = new Date(data[i].data_fim);
                         data_fim = (d.toLocaleDateString());                         
                         $('#cards').prepend('<div class="card"><h2 class="card-title" >'+data[i].numero+'</h2><p>'+data[i].nome+'</p><h4>Entrega '+data_fim+'</h4>');          

                         }
                         //console.log(data);
                    }
               })
            break;

            case 'disponiveis':
               $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/armario/busca_armarios_disponiveis_ajax",
                    method:"POST",
                    dataType: 'json',
                    data:{select_armario:select_armario},
                    success:function(data){
                    $('#cards').empty();
                    for (var i = 0; i < data.length; i++) {
                         $('#cards').prepend('<div class="card-disponivel"><h2 class="card-title">'+data[i].numero+'</h2><h4 id="titulo_disponivel">Disponível</h4>');          
                         }
                         //console.log(data);
                    }
               })
            break;

            case 'vencidos':
               $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/armario/armarios_vencidos_ajax",
                    method:"POST",
                    dataType: 'json',
                    data:{select_armario:select_armario},
                    success:function(data){
                    $('#cards').empty();
                    for (var i = 0; i < data.length; i++) {
                         var d = new Date(data[i].data_fim);
                         data_fim = (d.toLocaleDateString());
                         $('#cards').prepend('<div class="card-vencido"><h2 class="card-title" id="numero_vencido">'+data[i].numero+'</h2><p id="nome_vencido">'+data[i].nome+'</p><h4 id="entrega_vencido">Entrega '+data_fim+'</h4>');          
                         }
                         //console.log(data);
                    }
               })
            break;

            case 'todos':
              $.ajax({
                    url:"<?php echo base_url() ?>coordenacao/armario/busca_todos_armarios_index_ajax",
                    method:"POST",
                    dataType: 'json',
                    //data:{select_armario:select_armario},
                    success:function(data){
                    $('#cards').empty();
                      
                      for (var i = 0; i < data['locados'].length; i++) {
                         var d = new Date(data['locados'][i].data_fim);
                         data_fim = (d.toLocaleDateString());
                         $('#cards').prepend('<div class="card"><h2 class="card-title" >'+data['locados'][i].numero+'</h2><p>'+data['locados'][i].nome+'</p><h4>Entrega '+data['locados'][i].data_fim+'</h4>');          
                      }

                      for (var i = 0; i < data['vencidos'].length; i++) {
                         var d = new Date(data['vencidos'][i].data_fim);
                         data_fim = (d.toLocaleDateString());
                         $('#cards').append('<div class="card-vencido"><h2 class="card-title" >'+data['vencidos'][i].numero+'</h2><p>'+data['vencidos'][i].nome+'</p><h4>Entrega '+data['vencidos'][i].data_fim+'</h4>');          
                      }

                      for (var i = 0; i < data['disponiveis'].length; i++) {
                         var d = new Date(data['disponiveis'][i].data_fim);
                         data_fim = (d.toLocaleDateString());
                         $('#cards').append('<div class="card-disponivel"><h2 class="card-title" >'+data['disponiveis'][i].numero+'</h2><h4>Disponível</h4>');          
                      }
                  
                    }
               })

            break;

          }
            
 })


 $('#form_alugar').submit(function(){
    //alert('kj');
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

})

 //#02b875

</script>



<style type="text/css">
	 @import url('https://fonts.googleapis.com/css?family=Roboto');
 body{
     font-family: 'Roboto', sans-serif;
}

p{
  font-size: 14px;
  width: 90px;
  height: 40px;
  line-height: 12px;
  margin-top: 25px;
}

 h1{
  text-align: center;
  color: #4181ee;
}

#container {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: -20px;
  margin-bottom: -25px;
}

#circle_locados {
  width: 50px;
  height: 50px;
  float: left;
  background: #3CB371; 
  padding: 30px;
  box-sizing: border-box;
  color: #FFF;
  margin:10px;
  box-shadow: 0px 2px 18px -4px rgba(0,0,0,0.75);
  text-align: center;
  border-radius: 50%;
}

#circle_disponiveis {
  width: 50px;
  height: 50px;
  float: left;
  background: #6A5ACD; 
  padding: 30px;
  box-sizing: border-box;
  color: #FFF;
  margin:10px;
  box-shadow: 0px 2px 18px -4px rgba(0,0,0,0.75);
  text-align: center;
  border-radius: 50%;
}

#circle_vencidos {
  width: 50px;
  height: 50px;
  float: left;
  background: #FF0000; 
  padding: 30px;
  box-sizing: border-box;
  color: #FFF;
  margin:10px;
  box-shadow: 0px 2px 18px -4px rgba(0,0,0,0.75);
  text-align: center;
  border-radius: 50%;
}

#titulo_disponivel{
  margin-top: 50px;
}
 .wrapper{
  display: flex;

  justify-content: center;
  flex-wrap: wrap;
}
 .card{
  width: 150px;
  height: 190px;
  float: left;
  background: #3CB371; 
  padding: 30px;
  box-sizing: border-box;
  color: #FFF;
  margin:10px;
  box-shadow: 0px 2px 18px -4px rgba(0,0,0,0.75);
  text-align: center;
}

.card-vencido{
  width: 150px;
  height: 190px;
  float: left;
  background: #FF0000;
  padding: 30px;
  box-sizing: border-box;
  color: #FFF;
  margin:10px;
  box-shadow: 0px 2px 18px -4px rgba(0,0,0,0.75);
  text-align: center;
}

.card-disponivel{
  width: 150px;
  height: 190px;
  float: left;
  background: #6A5ACD;
  padding: 30px;
  box-sizing: border-box;
  color: #FFF;
  margin:10px;
  box-shadow: 0px 2px 18px -4px rgba(0,0,0,0.75);
  text-align: center;
}
 
 .card-title{
  margin-top: 0;
  font-size: 60px;
  font-weight: 600;
  letter-spacing: 1.2px;
  color: white;
}
 .card-content{
  font-size: 12px;
  letter-spacing: 0.5px;
  line-height: 1.5;
}
 .card-btn{
  all: unset;
  display: block;
  margin-left: auto;
  border: 2px solid #FFF;
  padding: 10px 15px;
  border-radius: 25px;
  font-size: 10px;
  font-weight: 600;
  transition: all 0.5s;
  cursor: pointer;
  letter-spacing: 1.2px;
}
 

h4{
	color: white;
  font-size: 15px;
  line-height: 15px;   
}	

</style>


<style type="text/css">
  #center{
    text-align: center;
  }
#nav{
  width: 100%;
  height: 50px;
  background: #1b4fa3;
}

#ul_menu{
  width: 500px;
  margin: 0 auto;
  height: auto;
}

#li_menu {
  width: 100px;
  float: left;
  height: 50px;
  list-style-type: none;
  position: relative;
}

#li_menu a {
  line-height: 50px;
  text-align: center;
  text-decoration: none;
  color: white;
  display: block;
  width: 100px;
  height: 30px;
  border: 0;
  background: #1b4fa3;
  position: absolute;
  top: 0px;
  left: 0px;

  -webkit-transition: all .2s ease-in;
  -moz-transition: all .2s ease-in;
  -o-transition: all .2s ease-in;
  -ms-transition: all .2s ease-in;
  transition: all .2s ease-in;
}


@keyframes "slide-down" {
 0% {
 }20% {
    height: 70px;
 }
 40% {
    height: 50px;
 }
 60% {
    height: 60px;
 }
 90% {
    height: 50px;
 }
 100% {
 } }

@-moz-keyframes slide-down {
 0% {
 }20% {
   height: 70px;
 }
 40% {
   height: 50px;
 }
 60% {
   height: 60px;
 }
 90% {
   height: 50px;
 }
 100% {
 } }

@-webkit-keyframes "slide-down" {
 0% {
 }20% {
   height: 70px;
 }
 40% {
   height: 50px;
 }
 60% {
   height: 60px;
 }
 90% {
   height: 50px;
 }
 100% {
 } }

@-ms-keyframes "slide-down" {
 0% {
 }20% {
   height: 70px;
 }
 40% {
   height: 50px;
 }
 60% {
   height: 60px;
 }
 90% {
   height: 50px;
 }
 100% {
 } }

@-o-keyframes "slide-down" {
 0% {
 }20% {
   height: 70px;
 }
 40% {
   height: 50px;
 }
 60% {
   height: 60px;
 }
 90% {
   height: 50px;
 }
 100% {
 } }


</style>