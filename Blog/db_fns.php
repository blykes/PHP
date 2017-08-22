<?php

function db_connect() {
  @ $result = mysqli_connect('localhost', 'kumar', 'venisha8142', 'kumar_blog');
   if (mysqli_connect_errno()) {
     throw new Exception('Could not connect to database server');
   } else {
     return $result;
   }
}

?>
