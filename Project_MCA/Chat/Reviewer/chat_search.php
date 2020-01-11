<?php
require '../../Connection/alert.php';
require '../../Connection/connection.php';
$con= connect();
$user=$_POST['rev1'];
$res= mysqli_query($con,"select * from detail where type='REVIEWER' and user like '".$user."%'");
if(mysqli_num_rows($res)>0){
while($row= mysqli_fetch_assoc($res))
    {
    ?>
     <div  class="col s12 m8 offset-m2 l6 offset-l3" style="width:260px;margin-left:20px;margin-top:20px;">
        <div class="card-panel grey lighten-5 z-depth-1" style="border-radius:20px;height:150px; background-image:url(images.png);">
            <div class="row valign-wrapper">
                <div class="col s2">
                    <?php echo '<img class="img" style="background-size:cover;height:100px;width:75px;border-radius: 10px;margin-top:2px;" src="data:image/jpeg;base64,'. base64_encode($row['pic']).'">';?>
                </div>
                <div class="col s10" style="padding-left: 70px;"><p style="font-family:Segoe UI;font-size: 10px; word-break: break-all;white-space: normal;">
                    <?php $re=mysqli_query($con,"Select * from login where user='".$row['user']."'");?>
                    <?php $r= mysqli_fetch_assoc($re);?>
                    <?php $u=$row['user'];?>
                    <input type="text" id='btnuser' class="btnu" style='color:grey;font-weight:bold;' readonly onclick="fun(this)" value='<?php echo $u; ?>'><br>
                    <?php echo $row['name']; ?><br>
                    <?php echo $r['email'];?></p>
                </div>
             </div>
        </div>
    </div> 
    <?php
    }
    }
 else {
     alert("No such user found..!");
}
    ?>