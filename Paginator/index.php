<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paginação com Ajax</title>
<style>
.paginacao{
	font-family:Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	cursor:pointer;
}
</style>
<script src="ajax.js"></script>
<script>
	function pesquisa(pag){
		url="busca.php?_pagi_pg"+pag;
		ajax(url);
	}
</script>
</head>

<body onload="pesquisa(1)">
<div id="pagina"></div>
</body>
</html>
