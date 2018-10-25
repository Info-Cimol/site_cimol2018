<script>
	function confirmar_exclusao(biblioteca_obra){
		if(!confirm("Tem certeza que deseja excluir o livro: " + biblioteca_obra + "?")){
			return false;
		}
		alert("Livro Excluido com sucesso!");
		return true;
	}
</script>
<h1>Lista de Livros</h1>
<table class="table">
	<tr>
		<th>Número ID</th>
		<th>Titulo do Livro</th>
		<th>Resumo</th>
		<th>Edição</th>
		<th>Número ISBN</th>
		<th>Categoria</th>
		<th>Editora</th>
		<th>Quantidade</th>
		<th>locação</th>
		<th>Formação</th>
	</tr>
	<?php foreach ($lista as $linha) { ?>
		<tr>
			<td><?php echo $linha->id ?></td>
			<td><?php echo $linha->titulo ?></td>
			<td><?php echo $linha->resumo ?></td>
			<td><?php echo $linha->edicao ?></td>
			<td><?php echo $linha->isbn ?></td>
			<td><?php echo $linha->categoria_id ?></td>
			<td><?php echo $linha->editora_id ?></td>
			<td><?php echo $linha->quantidade ?></td>
			<td><?php echo $linha->locacao ?></td>
			<td><?php echo $linha->formato ?></td>
			<td><a href="<?php echo base_url()."coordenacao/acervo/excluir/" .$linha->id ?>" onclick="return confirmar_exclusao('<?php echo $linha->titulo ?>')" class="btn btn-danger">Excluir</a></td>
			<td><a href="<?php echo base_url()."coordenacao/acervo/editar/" .$linha->id ?>" onclick=" return ('<?php echo $linha->titulo ?>')" class="btn btn-primary">Editar</a></td>

		</tr>
	<?php } ?>
</table>