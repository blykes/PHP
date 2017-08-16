<?php
require_once('blog_fns.php');
session_start();
$new_post_title = $_POST['title'];
$new_post_contents = $_POST['contents'];
do_html_header('Add New Post');
display_site_info();
if ((empty($new_post_title))||(empty($new_post_contents))) {
	echo"<h3 p style='color:red'>Form not completely filled out.</P></h3><br/>";
}
else{
	add_Post($new_post_title,$new_post_contents );
}
do_html_footer();
?>