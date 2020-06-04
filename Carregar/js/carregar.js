// JavaScript Document
$(document).ready(function(){
	$("input[type=button]").click(function(event){
		$("conteudo").load('../Menu/index.php',aviso());
	});
});

$(document).ready(function(){
	$("input[type=button]").click(function(event){
		var acao = $(this).attr("value");										   
		$("#box").load('requisicao.php',{acc:acao});								   
   });
});

function aviso(){
		alert('O conteudo será carregado agora!');
}