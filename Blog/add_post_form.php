<?php
require_once('blog_fns.php');
session_start();
$title = "Add New Post";
check_valid_user();
do_html_header($title);
display_site_info();
?>
  <form method="post" action="add_post.php">
  <table bgcolor="#cccccc">
   <tr>
     <td colspan="2">Add your post here:</td>
   <tr>
     <td>Title:</td>
     <td><input type="text" name="title" maxlength="255"/></td></tr>
   <tr>
     <td>Contents:</td>
     <td><textarea name="contents" rows="10" cols="40" maxlength="5000"></textarea></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="Add" name="submit"/></td></tr>
   
 </table></form>
<?php
do_html_footer();
?>