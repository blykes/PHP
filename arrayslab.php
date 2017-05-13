<!DOCTYPE html>

<?php
$rebelArray = array("Luke" => "Skywalker", 
					"Lea" => "Organa", 
					"Ben" => "Kenobi",
					"Han" => "Solo",
					"Darth" => "Vader", 
					"GrandMoff" => "Tarkin",
					"Emporer" => "Palpatine",
					"Boba" => "Fett", 
				);

$imperialArray =array(
	3 => array( "Name"=>"Doe", "KarmaScore"=>45, "lastLogin"=>"2012-08-30"),
	2 => array( "Name"=>"Smith", "KarmaScore"=>123,"lastLogin"=>"2012-09-02"),
	1 => array( "Name"=>"Chan","KarmaScore"=>1,"lastLogin"=>"2011-12-23"),
	0 => array( "Name"=>"Zee", "KarmaScore"=>15,"lastLogin"=>"2012-07-01"),
	
);

//function for rebelArray
function tableArray($rebelArray)
{
echo "<table style=width:11.5%>";			
echo "<tr>";
	echo "<th>First</th>";
	echo "<th>Last</th>";
echo "</tr>";
echo "<table>";
foreach($rebelArray as $first => $last)
{
	echo "<tr>";	
		echo "<td>$first</td>";
		echo "<td>$last</td>";
	echo "</tr>";
}				
echo "</table>";
}

?>					
<html lang="en">
<head>
	<title>Arrays Lab</title>
	<meta name="generator" content="BBEdit 11.6" />
</head>
<style>
table
	{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width 100%;
	}
	
td, th
{

	border: 1px solid black;
	text-align: center;
	
}

tr:nth-child(even)
{
	background-color: #dddddd;
}

</style>
<body>



<h1> Part 1: Straight up Arraying</h1>
<h2> Section One: The Array </h2>
<? echo tableArray($rebelArray); ?> 

<h2> Section Two: It's Sorted </h2>
It's A sorted <br />
<? asort($rebelArray); ?>
<? echo tableArray($rebelArray); ?>
It's K sorted <br />
<? ksort($rebelArray); ?>
<? echo tableArray($rebelArray); ?>

<h2> Section Three: The Unsetting </h2>

<? unset($rebelArray['Lea']); ?>
<? echo tableArray($rebelArray); ?>

<h2> Section Four: The Reversing of the Arrays</h2>

<? arsort($rebelArray); ?>
<? echo tableArray($rebelArray); ?>

<h1>Part 2: The 2d Array</h1>
<h2>ID Sort</h2>
<table style="width:50%">
  <tr>
    <th>User ID</th>
    <th>Name</th> 
    <th>Karma Score</th>
    <th>Last Login</th> 
  </tr>


<?php
//ID Sort
 ksort($imperialArray);
  foreach ($imperialArray as $k => $v)
  {
	   echo  '<tr>';
	  echo '<td>' . $k . "</td>\n";
	  
	  foreach ($v as $key => $val)

 echo '<td>' . $val . '</td>';
 echo "</tr>\n";
 
 
}
  echo "</table>\n";
?>
<h2>Login Entry</h2>

<table style="width:50%">
  <tr>
    <th>User ID</th>
    <th>Name</th> 
    <th>Karma Score</th>
    <th>Last Login</th> 
  </tr>
  
  
<?php
//Sort by Last Login Entry




function date_compare($a, $b)
{
    if(strtotime($a["lastLogin"])==strtotime($b["lastLogin"]))
			return 0;
	elseif(strtotime($a["lastLogin"])>strtotime($b["lastLogin"]))
			return 1;
	else 
		return -1;
}    
uasort($imperialArray, 'date_compare');
  foreach ($imperialArray as $k => $v)
  {
	   echo  '<tr>';
	  echo '<td>' . $k . "</td>\n";
	  
	  foreach ($v as $key => $val)

 echo '<td>' . $val . '</td>';
 echo '</tr>';

  }
   echo "</table>";
?>


<table style="width:50%">
  <tr>
    <th>User ID</th>
    <th>Name</th> 
    <th>Karma Score</th>
    <th>Last Login</th> 
  </tr>
 
 <?php
 echo "<h2> Karma Sorted</h2>";
function karmasort($a, $b)
{
    if($a["KarmaScore"]==$b["KarmaScore"])
			return 0;
	elseif($a["KarmaScore"]> $b["KarmaScore"])
			return 1;
	else
	return -1;
}    
uasort($imperialArray, 'karmasort');
  foreach ($imperialArray as $k => $v)
  {
  
	  if ($v["KarmaScore"] > 10)
	  {
	   echo  '<tr>';
	  echo '<td>' . $k . "</td>\n";
	  
	  
	 foreach ($v as $key => $val)
	 	echo '<td>' . $val . '</td>';
	echo '</tr>';
	  }
	  
	  
	  
	  
  }
  echo "</table>";
?>

<?php 
if (!isset ($_POST['submit']))
{

?>
<h1>Search the 2D Array</h1>
<form action = "arrayslab.php" method = "post">
<p>Search: <input type = "text" name = "user"/> </p>
<p><input type="submit" name="submit" value = "submit"/></p>
</form>

<?php 
}
else
{
$userName = $_POST['user'];

$bool = FALSE;
foreach ($imperialArray as $id => &$user)  
{
	
	if (($user["Name"] == $userName))
	{
		
		$user["KarmaScore"]+=5;
		$bool = TRUE;	
	}
}

//set $lastlogin to todays date
$lastlogin = date('Y-d-m');

if ($bool === FALSE)
{
	$imperialArray [] = array("Name"=>$userName, "KarmaScore"=>50 ,"lastLogin"=>$lastlogin);

}

//print the array

?>
<h2>After Update</h2> 

<table style="width:50%">
  <tr>
    <th>User ID</th>
    <th>Name</th> 
    <th>Karma Score</th>
    <th>Last Login</th> 
  </tr>
<?php

/*
echo "<pre>";
print_r($imperialArray);
echo "</pre>";

echo"<table>";
*/

ksort($imperialArray);
  foreach ($imperialArray as $k => $v)
  {
	   echo  '<tr>';
	  echo '<td>' . $k . "</td>\n";
	  
	  foreach ($v as $key => $val)

 echo '<td>' . $val . '</td>';
 echo "</tr>\n";	  
  } 
}

echo "</table>";
/*
echo "<pre>";
print_r($imperialArray);
echo "</pre>";
*/
?>
</body>
</html>
