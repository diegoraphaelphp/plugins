<?
	include("../js/conexao.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
	<head>
		<title>Imagens Aleatórias</title>
		
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="no" />

		<script type="text/javascript" src="../js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.innerfade.js"></script>
        <script type="text/javascript" src="js/topo.js"></script>
	
		<link rel="stylesheet" href="css/reset.css"  type="text/css" media="all" />
		<link rel="stylesheet" href="css/fonts.css"  type="text/css" media="all" />
        <link rel="stylesheet" href="css/jq_fade.css" type="text/css" media="screen, projection" />
		
	</head>
	<body>				
			<div class="limiter">				
				<h3>Imagens Aleatórias</h3>
				<ul id="portfolio">					
					<li><img src="../SpaceFolder/img/an2.png" alt="Amarelo and Nana" /></li>
					<li><img src="../SpaceFolder/img/anderson2.jpg" alt="Braco" /></li>					
					<li><img src="../SpaceFolder/img/bw1.jpg" alt="Lua" /></li>					
					<li><img src="../SpaceFolder/img/eu2.jpg" alt="Anderson" /></li>		
					<li><img src="../SpaceFolder/img/nana2.jpg" alt="Nana" /></li>				
				</ul>
                
                <h3>Notícias</h3>
                <ul id="news">
                	<?
                    	$sql = "SELECT descricao FROM tbregional order by descricao";
						$query = mysql_query($sql);
						while ($total = mysql_fetch_array($query)){
							  echo '<li>'.$total[0].'</li>';
						}
					?>
                 </ul>
			</div>		
	</body>
</html>
