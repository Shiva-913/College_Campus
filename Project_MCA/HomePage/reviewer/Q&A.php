<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../reviewer_style/style.css">
        <link rel="icon" type="image/png" href="../../nitte.ico"/>
        <style>
            .text{
                border:2px solid #456879;
                border-radius: 20px;
                height: 30px;
                width:500px;
                overflow: auto;
                text-align: center;
                font-family: Segoe UI;
                opacity:0.8;
                font-weight:normal;
                letter-spacing: 1px;
                margin-top: 10px;
            }
            .btn{
                font-family: Segoe UI;
                font-weight:normal;
                letter-spacing: 1px;
                padding: 10px 20px;
                font-size: 15px;
                text-align: center;
                cursor: pointer;
                outline: none;
                color: #fff;
                background-color: red;
                border: none;
                border-radius: 30px;
                box-shadow: 0 9px whitesmoke;
                opacity: 0.5;
            }
            .btn:hover{
                background-color: green;  
            }
            .btn:active{
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
        </style>
    </head>
    <body>
        <div id="container1" style="background-color:lightblue;">
            <div id="menu1">
                <font face="Segoe UI" size="5">Questions_to_be_Answered</font>
                <a class="a" style="margin-left:400px;font-size:15px;font-family:Segoe UI;font-weight: normal;" href="../reviewer/reviewer.php">Home</a>
            </div>
            <center>
                <?php
                session_start();
                require '../../Connection/alert.php';
                require '../../Connection/connection.php';
                $con=connect();
                $user=$_SESSION['username'];
                $q= mysqli_fetch_assoc(mysqli_query($con,"select * from detail where user='$user'"));
                $branch=$q['branch'];
                $res=mysqli_query($con,"select * from faq where type='$branch' order by id desc");
                while($row= mysqli_fetch_assoc($res)){
                    ?>
                <br>
                <div id="box" style="height: 450px;"><br><form action="#" method="post">
                    <font face="Segoe UI" size="3" style="color:lightslategray;"><b>Question</b></font><br>
                    <input type="text" class="text" name="txtque" value="<?php echo $row['que']; ?>" readonly><br><br>
                    <font face="Segoe UI" style="color:lightslategray;" size="3"><b>Answer</b></font><br><br>
                    <textarea name="txtans" style="font-size:15px;font-family:Segoe UI;width:400px;height:150px;opacity: 0.8;border-radius: 20px;border:2px solid #456879;text-align: center;"><?php echo $row['ans']; ?></textarea>
                    <br><br><label style="font-size:15px;font-family:Segoe UI;">Answered By</label><br><br><input type="text" style="cursor: none;font-size:15px;font-family:Segoe UI;border-radius: 20px;opacity:0.5;text-align:center;" name="txtrev" value="<?php echo $row['reviewer']; ?>" readonly><br><br>
                    <button  class="btn" name="update" style="margin-left: 20px;">Update</button>
                    <button  class="btn" name="report" style="margin-left: 20px;">Report</button></form>
                </div>
                <?php
                }
                ?>
            </center>
        </div>
    </body>
</html>
<?php
if(isset($_POST['update']))
{
    date_default_timezone_set('Asia/Kolkata');
    $date=date("d/m/Y h:i:s a", time());
    $m= date('m');
    $y=date('Y');
    $que=$_POST['txtque'];
    $ans=$_POST['txtans'];
    if(mysqli_num_rows(mysqli_query($con,"select * from faq where ans='$ans'"))>0)
    {
        alert("Currently entered answer is already present");
        return;
    }
    if(mysqli_query($con,"update faq set ans='$ans',reviewer='$user',date='$date',mt='$m',yy='$y' where que='$que'"))
        alert("Answer Updated Successfully");
}
if(isset($_POST['report']))
{
    $reve=$_POST['txtrev'];
    if($reve==$user){
        alert("You cannot report yourself..!");
        return;
    }
    if(mysqli_query($con,"update login set report=report+1 where user='$reve'")){
        alert($reve." Has been Reported...!");
    }
}
?>