<?php
require_once('blog_fns.php');
session_start();
$old_user = $_SESSION['valid_user'];
unset($_SESSION['valid_user']);
$result_dest = session_destroy();
do_html_header('Logging Out');
if (!empty($old_user)) {
if ($result_dest) {
echo "<h3 p style='color:red'>Logged out.<br /></P></h3>";
} else {
echo "<h3 p style='color:red'>Could not log you out.<br /></P></h3>";
}
} else {
echo "<h3 p style='color:red'>You were not logged in, and so have not been logged out.<br /></P></h3>";
}
do_html_footer();
?>