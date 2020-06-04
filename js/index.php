<?
	include("conexao.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
    $('document').ready(function(){ //Criando as funções para as requisições do Ajax
           $('#loading').hide();//Esconde o div loading
               $('#buscar').click(function(){
                  $('#buscar').val('') ;
               });
               $('#buscar').keyup(function(){
                      $('#loading').ajaxStart(function(){
                        $('#alvo').hide();
                        $('#loading').show();
                      });
                      $('#loading').ajaxStop(function(){
                         $('#loading').hide();
                      });
                      $.post('busca.php',{busca: $('#buscar').val()},
                        function(data){
                            if($('#buscar').val()!=''){
                                $('#alvo').show();
                                $('#alvo').empty().html(data);
                            }else{
                                $('#alvo').empty();
                            }                            
                        });
               });
    });
</script>
</head>

<body>
    <div id="main">
            <div id="busca">
            <form>
                <fieldset>
                <legend>Busca Usando JQuery</legend>
                        <input type="text" id="buscar" value="Digite alguma GERE aqui" size="50">
                        <div id="loading"><img src="../img/carregar.png" /></div>
                        <div id="alvo"></div>
                </fieldset>
            </form>
            </div>
     </div>
</body>
</html>
