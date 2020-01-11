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
        </style>
    </head>
    <body>
        <div id="container1" style="background-color:lightblue;">
            <div id="menu1">
                <font face="Segoe UI" size="5">Answered_Questions_By_Me</font>
                <a class="a" style="margin-left:400px;font-size:15px;font-family:Segoe UI;font-weight: normal;" href="../reviewer/reviewer.php">Home</a>
            </div>
            <center>
                <?php
                session_start();
                require '../../Connection/alert.php';
                require '../../Connection/connection.php';
                $con=connect();
                $user=$_SESSION['username'];
                $res=mysqli_query($con,"select * from faq where reviewer='$user' order by id desc");
                while($row= mysqli_fetch_assoc($res)){
                    ?>
                <br>
                <div id="box"><br>
                    <font face="Segoe UI" size="3" style="color:lightslategray;"><b>Question</b></font><br>
                    <input type="text" class="text" readonly autocomplete="off" value="<?php echo $row['que']; ?>"><br><br>
                    <font face="Segoe UI" style="color:lightslategray;" size="3"><b>Answer</b></font><br><br>
                    <textarea style="font-size:15px;font-family:Segoe UI;width:400px;height:150px;opacity: 0.8;border-radius: 20px;border:2px solid #456879;text-align: center;"><?php echo $row['ans']; ?></textarea>
                   </div>
                <?php 
                }
                ?>
            </center>
        </div>
    </body>
</html>