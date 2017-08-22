<?php
function do_html_header($title) {
?>
  <html>
  <head>
    <title><?php echo $title;?></title>
    <style>
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #3333cc; width=300; text-align=left}
      a { color: #000000 }
    </style>
  </head>
  <body>
  <h1>Memoirs from Our Spring '17 Semester </h1>
  <hr />
<?php
  if($title) {
    do_html_heading($title);
  }
}

function do_html_heading($heading) {
?>
  <h2><font color="Blue"><?php echo $heading;?></font></h2>
<?php
}

function do_html_footer() {
?>
<html>
<body>
	<a href='login.php' style="text-decoration: none" ><font color="#008B8B" style="font-size:110%">Login</font></a>
	<strong>|</strong>
	<a href='logout.php' style="text-decoration: none"><font color="#008B8B" style="font-size:110%">Logout</font></a>
	<strong>|</strong>
	<a href='add_post_form.php' style="text-decoration: none"><font color="#008B8B" style="font-size:110%">Add New Post</font></a>
	<strong>|</strong>
	<a href='index.php' style="text-decoration: none"><font color="#008B8B" style="font-size:110%">Back to Main</font></a>
	<br/>
</body>
</html>
 <?php
}

function display_login_form() {
?>
  <form method="post" action="index.php">
  <table bgcolor="#cccccc">
   <tr>
     <td colspan="2">Members log in here:</td>
   <tr>
     <td>Username:</td>
     <td><input type="text" name="username"/></td></tr>
   <tr>
     <td>Password:</td>
     <td><input type="password" name="password"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="Log in" name="submit"/></td></tr>
   
 </table></form>
<?php
}

function display_site_info() {
?>
  <ul>
  <li>Get to know us a little personally through our blog posts!</li>
  <li>Check out what other users post!</li>
  </ul>
<?php
}

function display_post_info($page,$total_post) {
?>
<?php
	$conn = db_connect();
	$result = $conn->query("SELECT username,title,date,id,bodypost FROM Blog_Post ORDER BY date DESC limit ".$page.",10");
	$num_results = mysqli_num_rows($result);
	for ($i=$page;$i<($num_results+$page);$i++){
		$row = mysqli_fetch_assoc($result);
		$id = $row['id'];
		echo "<p><strong>".($i+1).".User Name:";
		echo htmlspecialchars(stripslashes($row['username']));
		echo "<br/><br /></strong><strong>Title: </strong>";
		echo stripslashes($row['title']);
		echo "<br /><br /><strong>Post: </strong>";
		echo stripslashes($row['bodypost']);
		echo "<br /><br /><strong>Date: </strong>";
		echo stripslashes($row['date']);
		echo "<br /><br /><a href='add_comment_form.php?id=$id'><font color='DarkMagenta '>Add Comment</font></a>";
		echo " <strong>|</strong> <a href='view_comment.php?id=$id'><font color='DarkMagenta '>View Comment</font></a>";
		echo "</p>";
	}
}

function check_valid_user(){
?>
<?php
if (isset($_SESSION['valid_user'])) {
	echo "<h3><font color='Red'>Logged in as ".$_SESSION['valid_user']."</font></h3>";
} 
else {
	do_html_header('Problem:');
	display_site_info();
	echo '<h2><font color="Red">Only register user can post and comment. Please Login</font></h2><br />';
	display_login_form();
	do_html_footer();
exit;
}
}

function bloglogin($username, $password)
{
	$conn = db_connect();
	$result = $conn->query("select * from Users where username='".$username."' and password = sha1('".$password."')");
	if(!$result)
		throw new Exception("<h3 p style='color:red'>Could not log in</P></h3>");
	if($result->num_rows>0 )
		return true;
	else
		throw new Exception("<h3 p style='color:red'>Could not log in</P></h3>");

}

function add_Comment($id,$comment){
?>
<?php
$conn = db_connect();
$result = $conn->query("SELECT count(*) as total FROM Comments Where 1");
/*$num_results = mysqli_num_rows($result);
for ($i=0;$i<$num_results;$i++){
	$row = mysqli_fetch_assoc($result);
	$total_post = $row['total'];
}*/
$user = $_SESSION['valid_user'];
//$comment_id = 9001;
$sql = "INSERT INTO Comments (user, comment, id, date) VALUES (?, ?, ?, ?)";
//$sql = " INSERT INTO Comments VALUES (8020,'neel5','b',1001,'06-25-2017')";
$stmt = $conn -> prepare ($sql);
$date = date('m/d/Y');
$stmt -> bind_param('ssss',$user, $comment, $id, $date);
$stmt -> execute();
//VALUES ('".$total_post."','".$user."', '".$comment."','".$id."' ,NOW())";
if ($conn->errno) {
    echo "<h3 p style='color:red'>New comment has been added.</P></h3><br/>";
} else {
    echo "Error <br>" . $conn->error;
}
$conn->close();
}

function add_Post($title,$bodypost){
?>
<?php
$conn = db_connect();
$result = $conn->query("SELECT count(*) as total FROM Blog_Post Where 1");

$username = $_SESSION['valid_user'];
//$conn = db_connect();
//$sql = "INSERT INTO Blog_Post (id,title, bodypost, username,date)
$sql = "INSERT INTO Blog_Post (title, bodypost, username, date) VALUES (?, ?, ?, ?)";
$stmt = $conn -> prepare ($sql);
$date = date('m/d/Y');
$stmt -> bind_param('ssss', $title, $bodypost, $username, $date);
$stmt -> execute();
if (!($conn->errno) ){
    echo "<h3 p style='color:red'>New post has been added.</P></h3><br/>";
} else {
    echo "Error <br>" . $conn->error;
}
$conn->close();
}