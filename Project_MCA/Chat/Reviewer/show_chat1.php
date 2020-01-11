<?php
session_start();
require '../../Connection/alert.php';
require '../../Connection/connection.php';
$con=connect();
if(isset($_POST['insert1']))
{
    $user=$_POST['name1'];
    $reve=$_SESSION['username'];
    $msg=$_POST['msg1'];
    $res=mysqli_query($con,"select max(id) from chat where user='$reve' and reve='$user'");
    $row= mysqli_fetch_assoc($res);
    $id=$row['max(id)']+1;
    date_default_timezone_set('Asia/Kolkata');
    $date=date("d/m/Y h:i:s a", time());
    $sql="insert into chat(id,user,reve,muser,date) values('$id','$reve','$user','$msg','$date')";
    mysqli_query($con, $sql); 
}
?>

