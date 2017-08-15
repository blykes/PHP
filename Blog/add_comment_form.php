<?php
require_once('blog_fns.php');
session_start();
$title = "Add Comment";
check_valid_user();
$id = $_GET['id'];
?>
<?php
	do_html_header($title);
	display_site_info();
?>
<form action="add_comment.php?id=<?php echo $id;?>" method="post">
  <table bgcolor="#cccccc">
   <tr>
     <td colspan="2">Add your comment here:</td>
   <tr>
     <td>Comment:</td>
     <td><textarea name="comment" rows="5" cols="40" maxlength="5000"></textarea></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="Add" name="add"/></td></tr>
   
 </table></form>
<?php
do_html_footer();
?>