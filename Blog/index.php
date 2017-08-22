<?php
require_once('blog_fns.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
if ($username && $password){
try
{
  bloglogin($username,$password);
    $_SESSION['valid_user'] = $username;
  }
catch(Exception $e)
{
do_html_header("Problem");
echo "<h3 p style='color:red'>Could not log you in, wrong username or password.</P></h3>";
do_html_footer();
exit;
}
}
if(isset($_SESSION['valid_user'])){
	do_html_header(Welcome);
	display_site_info();
	echo "<h3 p style='color:red'>Welcome ".$_SESSION['valid_user']. "<br /></P></h3>";
}
else{
	do_html_header(Welcome);
	display_site_info();
	echo "<h3 p style='color:red'>Only register user can post and comment.<br /><br /></P></h3>";
}

$conn = db_connect();
$result2 = $conn->query("SELECT count(*) as total FROM Blog_Post Where 1");
$num_results2 = mysqli_num_rows($result2);
for ($i=0;$i<$num_results2;$i++){
	$row2 = mysqli_fetch_assoc($result2);
	$total_post = $row2['total'];
}
if(isset($_GET['page'])&&$_GET['page']>=0){
	if(($total_post-5)<=$_GET['page']){
	$pages=$_GET['page'] = ($total_post-5);
	}
	else{
	$pages=$_GET['page'];
	}
}
else{
	$pages = 0;
}
display_post_info($pages,$total_post);
?>
<html>
<a href="index.php?page=<?php echo $pages - 5;?>"><font color="RED" style="font-size:120%">Previous</font></a>
&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
<a href="index.php?page=<?php echo $pages + 5;?>"><font color="RED" style="font-size:120%">Next</font></a>
</html>
<?php
echo "<br/><br/>";
do_html_footer();
?>