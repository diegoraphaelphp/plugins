<?
	header("Content-Type: text/html; charset=utf-8", true);
	include "conexao.php";
	
	if(isset($_POST['busca'])){
		      $queryString = $_POST['busca'];
//              $sql = "SELECT descricao FROM tbregional WHERE descricao LIKE '%$queryString%' LIMIT 10";
			  $sql = "SELECT descricao FROM pro_produto WHERE descricao LIKE '%$queryString%' LIMIT 10";
			  
              $query = mysql_query($sql);
              while ($total = mysql_fetch_array($query)){
                  echo "<p>GERE: <b>".$total['descricao']."</b>";
              }
                echo "<p>Total: <b>".mysql_num_rows($query)."</b>";
	}else{
        echo 'Erro no envio dos dados!';
    }
?>
