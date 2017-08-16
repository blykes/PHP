<?php
require_once('blog_fns.php');
session_start();
$new_comment = $_POST['comment'];
$id = $_GET['id'];
do_html_header('Add Comment');
display_site_info();
if (empty($new_comment )) {
	echo"<h3 p style='color:red'>Form not completely filled out.</P></h3><br/>";
}
else{
	add_Comment($id,$new_comment);
}
do_html_footer();
?>