<?
if($_POST['acc']=='Editar'){
	// Acoes relacionadas a edicao
	echo 'A ação selecionada é editar';
}elseif($_POST['acc']=='Novo'){
	// Acoes de criacao
	echo 'A ação solicitada é criar';
}else{
	// Acao para deletar
	echo 'A ação solicitada é deletar';
}
?>