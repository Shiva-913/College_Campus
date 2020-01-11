           
            <?php
            require '../../Connection/alert.php';
            require '../../Connection/connection.php';
            $con=connect();
            $mt=$_POST['month'];
            $yy=$_POST['year'];
            $res=mysqli_query($con,"select * from faq where mt='$mt'and yy='$yy' and type='MCA' order by id desc");
            if(mysqli_num_rows($res)>0){
            while($row= mysqli_fetch_assoc($res)){
                ?>
            <br>
            <div id="box"><br>
                <font face="Segoe UI" size="3" style="color:lightslategray;"><b>Question</b></font><br>
                <input type="text" class="text" readonly value="<?php echo $row['que']; ?>"><br><br>
                <font face="Segoe UI" style="color:lightslategray;" size="3"><b>Answer</b></font><br><br>
                <textarea style="font-size:15px;font-family:Segoe UI;width:400px;height:150px;opacity: 0.8;border-radius: 20px;border:2px solid #456879;text-align: center;"><?php echo $row['ans']; ?></textarea>
                <br><br><b><a href="#"><?php echo $row['reviewer'];?></a>@<?php echo $row['date']; ?><br><br></b>
               </div>
            <br>
            <?php 
            }
            }
            else {
                alert("Results Not Found..!");
            }
            ?>
