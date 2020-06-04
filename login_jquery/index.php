<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	$(".loading").hide();
	$(".message").hide();
	$("#login_form").submit(function()
	{
	$(".login-form").hide();
	$(".loading").fadeIn(200);
	
	$.post("login.php",{ uname:$('#username').val(),pword:$('#password').val()} ,function(data)
	{
	$(".loading").hide();
	
	if(data == '1')
	{
	$('.message').html('<p>Success - Redirecting...</p>');
	window.location.replace("?secure-page");
	}
	else
	{
	$('.message').html('<p>Login Failed - Please Try Again</p>');
	$(".login-form").fadeIn("slow");
	}
	$(".message").fadeIn("slow").delay(1000).fadeOut(1000);
	});
	return false;
	});
	});
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>jQuery Login with jQuery / PHP / MySql - Dave Earley's Blog</title>

<style type="text/css">

<!--

.login {

	background-color: #9CF;

	border-right-width: medium;

	border-bottom-width: medium;

	border-left-width: medium;

	border-right-style: solid;

	border-bottom-style: solid;

	border-left-style: solid;

	border-right-color: #333;

	border-bottom-color: #333;

	border-left-color: #333;

	text-align: center;

	font-size: 14px;

	font-family: Arial, Helvetica, sans-serif;

	color: #333;

	padding: 10px;

	margin-top: 100px;

	margin-right: auto;

	margin-left: auto;

	border-top-width: medium;

	border-top-style: solid;

	border-top-color: #333;

	width: 270px;

}

.message {

	color: #333;

	background-color: #F60;

	border: 1px solid #F00;

	padding: 2px;

	font-family: Arial, Helvetica, sans-serif;

}

input {

	border: 1px solid #333;

	padding: 2px;

}

.top {

	font-family: Arial, Helvetica, sans-serif;

	color: #333;

	background-color: #CCC;

	position: absolute;

	left: 5px;

	top: 5px;

	width: 746px;

}

-->

</style>

<script type="text/javascript">

$(document).ready(function() {					   

$(".loading").hide();

$(".message").hide();

$("#login_form").submit(function()

{

        $(".login-form").hide();

        $(".loading").fadeIn(200);



        $.post("login.php",{ uname:$('#username').val(),pword:$('#password').val()} ,function(data)

        {

		$(".loading").hide();



         if(data == '1')

		 {

			 $('.message').html('<p>Success - Redirecting...</p>');

			 window.location.replace("?secure-page");

		 }

		 else

		 {

			 $('.message').html('<p>Login Failed - Please Try Again</p>');

             $(".login-form").fadeIn("slow");

		 }

			 $(".message").fadeIn("slow").delay(1000).fadeOut(1000);

       });

       return false;

});

                          });

</script>

</head>



<body bgcolor="#eeeeee">

<div class="top"><img src="login.png" width="48" height="48" />Login with jquery / php / mysql - Demo - Use <strong>admin</strong> and <strong>admin</strong> for the username and password.</div>

<div class="login">

<div class="message"></div>

<div class="loading"><img src="loading.gif" width="100" height="100" /></div>

<div class="login-form">

 <form id="login_form" method="post" action="">

 <table width="268" border="0">

      <tr>

        <td width="102">Username</td>

        <td width="156">

          <label>

            <input type="text" name="username" id="username" />

          </label>

        </td>

      </tr>

            <tr>

        <td>Password</td>

        <td>

          <label>

            <input type="password" name="password" id="password" />

          </label>

        </td>

      </tr>

                  <tr>

        <td>Remember me?</td>

        <td align="left"><label>

          <input type="checkbox" name="checkbox" id="checkbox" />

        </label></td>

      </tr>

                  <tr>

        <td>&nbsp;</td>

        <td><label>

          <input type="submit" name="button" id="button" value="Submit" />

        </label></td>

      </tr>

    </table>

 </form>

</div>

</div>

</body>

</html>