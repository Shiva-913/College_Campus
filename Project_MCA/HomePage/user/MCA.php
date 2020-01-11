<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../reviewer_style/style.css">
        <link rel="icon" type="image/png" href="../../nitte.ico"/>
        <script src="../../jquery/jquery.min.js"></script>
        <style>
            /* search box*/
.searchbox_1{
background-color: #fffbf8;
padding:5px;
width:335px;
margin: 100px auto;
-webkit-box-sizing:border-box;
-moz-box-sizing:border-box;
box-sizing:border-box;
border-radius:6px;
-webkit-box-shadow:
0 2px 4px 0 rgba(72, 72, 72, 0.83),
0 10px 15px 0 rgba(126, 126, 126, 0.12),
0 -2px 6px 1px rgba(199, 199, 199, 0.55) inset,
0 2px 4px 2px rgba(255, 255, 255, 0.83) inset;
-moz-box-shadow:
0 2px 4px 0 rgba(72, 72, 72, 0.83),
0 10px 15px 0 rgba(126, 126, 126, 0.12),
0 -2px 6px 1px rgba(199, 199, 199, 0.55) inset,
0 2px 4px 2px rgba(255, 255, 255, 0.83) inset;
box-shadow:
0 2px 4px 0 rgba(72, 72, 72, 0.83),
0 10px 15px 0 rgba(126, 126, 126, 0.12),
0 -2px 6px 1px rgba(199, 199, 199, 0.55) inset,
0 2px 4px 2px rgba(255, 255, 255, 0.83) inset;
}
.search_1{
width:250px;
height:30px;
padding-left:15px;
border-radius:6px;
border:none;
color:#0F0D0D;;
font-weight:500;
background-color:#E2EFF7;;
-webkit-box-shadow:
0 -2px 2px 0 rgba(199, 199, 199, 0.55),
0 1px 1px 0 #fff,
0 2px 2px 1px #fafafa,
0 2px 4px 0 #b2b2b2 inset,
0 -1px 1px 0 #f2f2f2 inset,
0 15px 15px 0 rgba(41, 41, 41, 0.09) inset;
-moz-box-shadow:
0 -2px 2px 0 rgba(199, 199, 199, 0.55),
0 1px 1px 0 #fff,
0 2px 2px 1px #fafafa,
0 2px 4px 0 #b2b2b2 inset,
0 -1px 1px 0 #f2f2f2 inset,
0 15px 15px 0 rgba(41, 41, 41, 0.09) inset;
box-shadow:
0 -2px 2px 0 rgba(199, 199, 199, 0.55),
0 1px 1px 0 #fff,
0 2px 2px 1px #fafafa,
0 2px 4px 0 #b2b2b2 inset,
0 -1px 1px 0 #f2f2f2 inset,
0 15px 15px 0 rgba(41, 41, 41, 0.09) inset;
}
.submit_1{
width:35px;
height:30px;
background-image:url(img/search-btn.png);
background-repeat: no-repeat;
background-position: 17px 2px;
background-color:transparent;
-webkit-background-size:20px 20px;
background-size:20px 20px;
border:none;
cursor:pointer;
}
.search_1:focus{
outline:0;
}
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
                <font face="Segoe UI" size="5">FAQ_MCA</font>
                <a class="a" style="margin-left:600px;font-size:15px;font-family:Segoe UI;font-weight: normal;" href="../../HomePage/user/user.php">Home</a>
            </div>
            <center>
                <br>
                <div class="searchbox_1" style="margin-top: 5px;margin-bottom: 10px;opacity:0.5;">
                <input name="month" type="month"  class="search_1" id="month" min="01-2000" max="12-2100" style="font-size:15px;font-family:Segoe UI;font-weight: normal;border-radius:10px;" required>
                <button id="btnsubmit" class="submit_1">Search</button><br>
                Enter Month_Year
                </div>
                <div id="sort">
                <?php
                require '../../Connection/alert.php';
                require '../../Connection/connection.php';
                $con=connect();
                $res=mysqli_query($con,"select * from faq where type='MCA' order by id desc");
                while($row= mysqli_fetch_assoc($res)){
                    ?>
                <br>
                <div id="box"><br>
                    <font face="Segoe UI" size="3" style="color:lightslategray;"><b>Question</b></font><br>
                    <input type="text" class="text" readonly value="<?php echo $row['que']; ?>"><br><br>
                    <font face="Segoe UI" style="color:lightslategray;" size="3"><b>Answer</b></font><br><br>
                    <textarea style="font-size:15px;font-family:Segoe UI;width:400px;height:150px;opacity: 0.8;border-radius: 20px;border:2px solid #456879;text-align: center;"><?php echo $row['ans']; ?></textarea>
                    <br><br><b><a href="newEmptyPHP.php?sh=OK"><?php echo $row['reviewer'];?></a><?php echo "@".$row['date']; ?><br></b> 
                </div>
                <?php 
                }
                ?>
                </div>
            </center>
        </div>
    </body>
</html>
<script>
    $(document).ready(function(){
        $("#btnsubmit").click(function(){
            var d=document.getElementById("month").value;
            var date=d.split("-");
            var yy=(date[0]!=null)? date[0] : 0;
            var mt=(date[1]!=null)? date[1] : 0;
            $("#sort").load("MCA_SORT.php",{
                month:mt,
                year:yy
            });
        });
    });
</script>