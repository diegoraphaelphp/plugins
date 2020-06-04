<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Exemplo de Upper-Box</title>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="upper-box.js"></script>
<style type="text/css">
          .divClass
          {
            background-color: white;
            border: 2px solid silver;
            padding: 5px;
          }
          
          #div2
          {
            width: 300px;
          }
          
          #upper-box-knob
          {
            background-color: silver;
          }
      </style>

</head>

<body>
	<div id="div1" class="divClass">
    	<h2>Olá,</h2>
        <p>Esta div não é <b>upper-box</b>!</p>
     </div>
     
     <div id="div2" class="divClass upper-box">
     <p>Esta div será um <b>upper-box</b>!</p>
     </div>
</body>
</html>
