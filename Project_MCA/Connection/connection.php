<?php
function connect()
{
$con=mysqli_connect('localhost','root','','test');
return $con;
}
function close($con)
{
    $con->close();
}
?>