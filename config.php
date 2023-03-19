<?php
$host = "localhost";
$user="root";
$pass="";
$db="lbs";

$conn=mysqli_connect($host, $user, $pass, $db);
if($conn->connect_error){
    echo "
    <script>Connection Error!</script>
    ";
}
?>