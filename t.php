<?php 

$con = mysqli_connect("localhost","flipbook","qwe123!@QWE") OR die("No localhost");
mysqli_select_db($con,"flipbook_prodigy") OR die("No db");

$t = mysqli_fetch_array(mysqli_query($con,"select * from users"));
print_r($t);
 ?>