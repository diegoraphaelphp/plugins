<?php  
    if(isset($_POST['upload']))  
    {  
   		 $uploaddir = 'uploads/';  
    		foreach ($_FILES["pic"]["error"] as $key => $error)  
    	{  
   			 if ($error == UPLOAD_ERR_OK)  
   			 {  
    			$tmp_name = $_FILES["pic"]["tmp_name"][$key];  
   				$name = $_FILES["pic"]["name"][$key];  
   				$uploadfile = $uploaddir . basename($name);  
    
   				if (move_uploaded_file($tmp_name, $uploadfile))  
   					{  
  					 echo "Successo: O Arquivo ".$name." upload.<br/>";  
  					 }  
   				else {  
   					echo "Error: Arquivo ".$name." não foi feito upload.<br/>";  
   					}  
   			}  
   		}  
   }  
?>  
     
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
   <html xmlns="http://www.w3.org/1999/xhtml">  
   <head>  
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
   <title>Multiplos Uploads com jQuery e PHP</title>  
     
   <script src="jquery.js" type="text/javascript" language="javascript"></script>  
   <script src="jquery.MultiFile.js" type="text/javascript" language="javascript"></script>  
     
   </head>  
     
   <body>  
   <!-- 
   
   maxlength = liimite de arquivos que vão ser feito o upload
   
   accept  = os arquvivos que podem ser feito os upload
   
   -->
   
   <form action="" method="post" enctype="multipart/form-data"> 
   <input type="file" name="pic[]" class="multi" maxlength="9" accept="gif|png|jpg" />  
   <input type="submit" name="upload" value="Upload" />  
   </form>  
   </body>  
     
   </html>  