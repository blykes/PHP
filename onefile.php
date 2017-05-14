<html>
<head>
<title> Forms2 </title>
</head>
<body>
<?php
function putForm($search)
{
echo "<form method='post' action='formAction1.php'>";
echo "Username:<input type='text'  name='username'> <br/>";
echo "Password:<input type='password'  name='password'> <br/> ";
echo "Submit:<input type='submit' name='submit'> <br/>";
}
?>
 </body>
 <?php

$scan = array("beas" => "bugs", 
				"bl" => "926", 
				"rh" => "310", 
				"vk" => "214", 
				"jk" => "307", 
				"sc" => "1022", 
				"cd" => "1215", 
				"cf" => "0315", 
				"sl" =>	"501",
				"pl" =>	"115" 
				);


if (!isset($_POST['submit']))
	putForm($login);
else if(isset($_POST['submit']))
{	
$username = htmlspecialchars($_POST['user']);
$username = trim($username);
$password = htmlspecialchars($_POST['pass']);
$password= trim($password);
$bool = FALSE;
	foreach($login as $key => $value)
	{
	   if(($key == $username) and ($value == $password))
	   {
		   echo "successfull log in!";
		   $bool = TRUE;
	   }
	   
	}
	
	if($bool === FALSE)
		echo "Sorry, wrong information has been entered!";
	
}
?>
</html>