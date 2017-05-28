<?PHP
	
//if youre going to use include, place outside public folder
	
	$searchtype=$_POST['type'];
	$searchterm=trim($_POST['term']);
	
	if (!$searchtype || !$searchterm)
	{
		echo 'You have entered a search.';
		exit;
	}
	
switch ($searchtype)
{//change these for new database
	case 'page_name':
	case 'visit_date':
	case 'visit_time':
	case 'previous_page':
	case 'request_method':
	case 'remote_host':
	case 'remote_port':
		break;
	default:
	echo '<p>That is not a valid search type <br />
			Please go back and try again!</p>';
		exit;
}
//function to log into database
@ $db = new mysqli('localhost', 'lykes', 'brian2318', 'pageVisits');

if (mysqli_connect_errno())
{
	echo 'Error: Could not connect to database. Please try again later.';
	exit;
} 
//queries
$query = "select page_name, visit_date, visit_time, previous_page, request_method, remote_host, remote_port
			FROM visitInfo where $searchtype = ?";
$stmt = $db -> prepare ($query);
$stmt -> bind_param('s', $searchterm);
$stmt -> execute();
$stmt -> store_result();
$stmt -> bind_result($name,$date,$time,$previousPage,$requestMethod,$host,$port);

echo "<p>Number of results found: ".$stmt->num_rows." </p>";

while ($stmt->fetch())
{//fix these to match new database 
	echo "<p><strong> Page Name: ".$name."</strong><br/>";
	echo "Visit Date: ".$date."<br />";
	echo "Visit Time: ".$time."<br />";
	echo "Previous Page: ".$previousPage."<br />";
	echo "Request Method: ".$requestMethod."<br />";
	echo "Remote Host: ".$host."<br />";
	echo "Remote Port: ".$port."<br />";
	//echo "Price: ".number_format($price,2).
	"<p/>";
}

$stmt->free_result();
$db->close();

?>
