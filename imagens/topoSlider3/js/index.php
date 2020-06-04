<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css"> 
  #test1 {
    margin: 1em auto;
    border: 2px solid #555;
    width: 550px;
    height: 200px;
  }
</style> 

<script language="javascript" src="../../js/jquery.js" type="text/javascript"></script>
<script language="javascript" src="jquery.cross-slider.js" type="text/javascript"></script>
<script type="text/javascript"> 
  $(function() {
    $('#test1').crossSlide({
      speed: 45,
      fade: 1
    }, [
      { src: '../img/an2.png', dir: 'up'   },
      { src: '../img/anderson2.jpg', dir: 'down' },
      { src: '../img/buda.jpg',  dir: 'up'   },
      { src: '../img/carnaval.jpg', dir: 'down' }
    ]);
  });
</script> 
</head>

<body>
	<div id="test1">Carregando...</div>
</body>
</html>
