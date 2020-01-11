<?php
session_start();
require '../../Connection/alert.php';
require '../../Connection/connection.php';
$user=$_POST['name1'];
$reve=$_SESSION['username'];
$con= connect();
$res=mysqli_query($con,"select * from chat where user='$reve' and reve='$user' order by id asc");
if(mysqli_num_rows($res)>0){
    while($row= mysqli_fetch_assoc($res)){
        if($row['muser']!=""){
?>
        <div class="bubble left"><p><?php echo $row['muser'];?><br><a><?php echo $row['date'];?></a></p></div>
<?php
        }
        else{
        ?>
        <div class="bubble right"><p><?php echo $row['mreve'];?><br><a><?php echo $row['date'];?></a></p></div>
        <?php
        }
    }
}
 else {
    echo "<center style='color:red'>No chats Found..!</center>";
}
?>


