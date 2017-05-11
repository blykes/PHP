<?php 


//post from html script
//Part 1 Startrs here

//associateive array using given user/pass combos
$login = array("elliez"=>"tr789ial", 
               "greatGuy"=>"abc123", 
               "blogger"=>"23seventeen23"
              );

//if statement for verification. This comment block works. 

$userName = $_POST['user']; //isset($_POST ['user']) ? $_POST['user'] : '';
$password = $_POST['pass']; //isset($_POST ['pass']) ? $_POST['pass'] : '';
if (! isset($login[$userName]) or $login[$userName] !=$password)
{
    echo "Wrong Username/Password<br/>";
}

else 
{
	echo "Welcome. You have sucessfully logged in $userName<br/>";
}

?>

<?php
//arrays of usernames and passwrods defined for part 2


//For Each loop script
$scan = array("slamchez" => "Bugs", 
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
				
$userName1 = $_POST['user1'];
$password1 = $_POST['pass1'];
$bool = FALSE;
foreach ($scan as $user1 => $pass1)  
{
	//echo "start for each loop";
	if (($user1 == $userName1) && ($pass1 == $password1))
	{
		echo "Pair found $user1 $pass1 <br/>";
		$bool = TRUE;
	}
}
	
	if($bool == FALSE)
echo "combination not found <br/>";



?>

/*

Essentially, it's a security measure. The message is inteded to be non specific so that 
should someone try and hack the site, it prevents the attacker from being able to concentrate
their efforts on either the username or password. 	

*/	