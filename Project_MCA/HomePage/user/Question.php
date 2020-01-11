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
            .select{
                font-family: Segoe UI;
                font-weight:normal;
                letter-spacing: 1px;
                border-radius: 25px;
                font-size: 15px;
                height: 30px;
                width:250px;
                opacity:0.5;
                border:2px solid #456879;
                text-align-last:center;
            }
        </style>
    </head>
    <body><form action="#" method="post">
        <div style="background-color:lightblue;" id="container1">
            <div id="menu1">
                <font face="Segoe UI" size="5">Questions_By_Me</font>
                <a class="a" style="margin-left:500px;font-size:15px;font-family:Segoe UI;font-weight: normal;" href="../../HomePage/user/user.php">Home</a>
            </div>
            <div style="padding:2%">
                <center>
                    <input type="text" class="text" name="que" placeholder="Enter your Question here..." required autocomplete="off"><br><br>
                    <select name="op" class="select">
                        <option>- Choose MCA/BE -</option>
                        <option value='MCA'>MCA</option>
                        <option value='BE'>BE</option>
                     </select><br><br>
                    <button id="btn1" name="post1" style="opacity:0.9;background-color:white;color:black;background-image: url(../user/btn.png);background-size: cover;padding: 40px 40px;"><center>Post</center></button>
                </center>
            </div>
            <center>
                <?php
                session_start();
                require '../../Connection/alert.php';
                require '../../Connection/connection.php';
                $con=connect();
                $user=$_SESSION['username'];
                $res=mysqli_query($con,"select * from faq where user='$user' order by id desc");
                while($row= mysqli_fetch_assoc($res)){
                    ?>
                <br>
                <div id="box"><br>
                    <font face="Segoe UI" size="3" style="color:lightslategray;"><b>Question</b></font><br>
                    <input type="text" class="text" readonly autocomplete="off" value="<?php echo $row['que']; ?>"><br><br>
                    <font face="Segoe UI" style="color:lightslategray;" size="3"><b>Answer</b></font><br><br>
                    <textarea style="font-size:15px;font-family:Segoe UI;width:400px;height:150px;opacity: 0.8;border-radius: 20px;border:2px solid #456879;text-align: center;"><?php echo $row['ans']; ?></textarea>
                    <br><br><b><a href="#"><?php echo $row['reviewer'];?></a>&nbsp;&nbsp;@<?php echo $row['date']; ?><br></b>
                   </div>
                <?php 
                }
                ?>
            </center>
            
        </div>
        </form>   
    </body>
</html>
<?php
if(isset($_POST['post1']))
{
    $op=$_POST['op'];
    if($op=='- Choose MCA/BE -')
    {
        alert("Please choose correct field (MCA/BE)");
        return;
    }
    $q=$_POST['que'];
    $user=$_SESSION['username'];
    $sql="insert into  faq(`user`,`type`,`que`) values('$user','$op','$q')";
    if(mysqli_query($con,$sql)){
            alert("Question posted Successfully...");
    }
    else{
        alert("error");
    }
}
?>