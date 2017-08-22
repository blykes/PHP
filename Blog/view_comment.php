<?php
	require_once('blog_fns.php');
	do_html_header("Comment: ");
	display_site_info();
	$conn = db_connect();
	$id = $_GET['id'];
	$result = $conn->query("SELECT commentuser,bodycomment,date FROM Comments Where  postid = ".$id);
	$num_results = mysqli_num_rows($result);
	if(empty($num_results)){
		echo "<h3><font color='Red'>No Comment Found</font></h3><br/>";
	}
	for ($i=$page;$i<($num_results+$page);$i++){
		$row = mysqli_fetch_assoc($result);
		echo "<p><strong>User Name: </strong>";
		echo htmlspecialchars(stripslashes($row['commentuser']));
		echo "<br/><br /><strong>Comments: </strong>";
		echo stripslashes($row['bodycomment']);
		echo "<br /><br /><strong>Date: </strong>";
		echo stripslashes($row['date']);
		echo "</p>";
	}
	do_html_footer();
?>