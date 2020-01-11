<?php
session_start();
require '../../Connection/alert.php';
require '../../Connection/connection.php';
$con=connect();
if(isset($_POST['insert']))
{
    $user=$_POST['name'];
    $reve=$_SESSION['username'];
    $msg=$_POST['msg'];
    $res=mysqli_query($con,"select max(id) from chat where user='$user' and reve='$reve'");
    $row= mysqli_fetch_assoc($res);
    $id=$row['max(id)']+1;
    date_default_timezone_set('Asia/Kolkata');
    $date=date("d/m/Y h:i:s a", time());
    $sql="insert into chat(id,user,reve,mreve,date) values('$id','$user','$reve','$msg','$date')";
    mysqli_query($con, $sql); 
}
?>

