<?php
if(isset($_POST['btn_user']))
{
    require '../Connection/alert.php';
    require '../Connection/connection.php';
    $name=$_POST['txt_name'];
    $email=$_POST['txt_email'];
    $user=$_POST['txt_user'];
    $pass=$_POST['txt_pass'];
    $rpass=$_POST['txt_cpass'];
    $pic= $_FILES['file_pic']['name'];
    $tmp= addslashes(file_get_contents($_FILES['file_pic']['tmp_name']));
    $type=$_FILES['file_pic']['type'];
    if(substr($type,0,5)!='image')
    {
        
        alert("Images Only...");
        $_POST['btn_user']=NULL;
        include '../Registration/Registration.php';
        return;
        
    }
    if(!preg_match('/^[a-zA-Z ]+$/', $name))
    {
        alert("Only letters and White spaces allowed.. ! in Fullname field"); 
        $_POST['btn_user']=NULL;
        include'../Registration/Registration.php';
        return;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        alert("Please enter valid email id..");
        $_POST['btn_user']=NULL;
        include'../Registration/Registration.php';
        return;
    }
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) {
        alert('The password does not meet the requirements..');
        $_POST['btn_user']=NULL;
        include'../Registration/Registration.php';
        return;
    }
    if($pass!=$rpass)
    {
        alert('Confirm Password must be same as Password...');
        $_POST['btn_user']=NULL;
        include'../Registration/Registration.php';
        return;
    }
    $con= connect();
    $sql=mysqli_query($con,"select * from login where user='$user' or email='$email'");
    if(mysqli_num_rows($sql)>0){
        $res= mysqli_fetch_assoc($sql);
        if($res['user']==$user){
            alert('Username already present in the database..');
            $_POST['btn_user']=NULL;
            include'../Registration/Registration.php';
            return;
        }
        else
        {
            alert('Currently entered Email already present in the database..');
            $_POST['btn_user']=NULL;
            include'../Registration/Registration.php';
            return;
        }
    }
    $query="INSERT INTO login VALUES('$user','$pass','$email',0)";
    if(mysqli_query($con,$query)){ 
        $q="insert into detail values('$user','$name','USER','','$tmp','')";
        if(mysqli_query($con,$q))   
            alert('Account created..\nNow you can Login to CC...');
        include '../Login/Login.php';
        return;
    }
    else{
        echo mysqli_error($con);
        $_POST['btn_user']=NULL;
        include'../Registration/Registration.php';
        return;
    }
}
            //REVIEWER

if(isset($_POST['btn_reviewer']))
{
    require '../Connection/alert.php';
    require '../Connection/connection.php';
    $name=$_POST['txt_name1'];
    $email=$_POST['txt_email1'];
    $usn=$_POST['txt_usn'];
    $op=$_POST['option'];
    $user=$_POST['txt_user1'];
    $pass=$_POST['txt_pass1'];
    $rpass=$_POST['txt_cpass1'];
    $pic= $_FILES['file_pic1']['name'];
    $tmp= addslashes(file_get_contents($_FILES['file_pic1']['tmp_name']));
    $type=$_FILES['file_pic1']['type'];
    if(substr($type,0,5)!='image')
    {
        
        alert("Images Only...");
        $_POST['btn_reviewer']=NULL;
        include '../Registration/Registration.php';
        return;
        
    }
    if(!preg_match('/^[a-zA-Z ]+$/', $name))
    {
        alert("Only letters and White spaces allowed.. ! in Fullname field"); 
        $_POST['btn_reviewer']=NULL;
        include'../Registration/Registration.php';
        return;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        alert("Please enter valid email id..");
        $_POST['btn_reviewer']=NULL;
        include'../Registration/Registration.php';
        return;
    }
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) {
        alert('The password does not meet the requirements..');
        $_POST['btn_reviewer']=NULL;
        include'../Registration/Registration.php';
        return;
    }
    if($pass!=$rpass)
    {
        alert('Confirm Password must be same as Password...');
        $_POST['btn_reviewer']=NULL;
        include'../Registration/Registration.php';
        return;
    }
    $con= connect();
    $sql=mysqli_query($con,"select * from login where user='$user' or email='$email'");
    if(mysqli_num_rows($sql)>0){
        $res= mysqli_fetch_assoc($sql);
        if($res['user']==$user){
            alert('Username already present in the database..');
            $_POST['btn_reviewer']=NULL;
            include'../Registration/Registration.php';
            return;
        }
        else
        {
            alert('Currently entered Email already present in the database..');
            $_POST['btn_reviewer']=NULL;
            include'../Registration/Registration.php';
            return;
        }
    }
    $sql=mysqli_query($con,"select * from detail where usn='$usn'");
    if(mysqli_num_rows($sql)>0){
       alert('Entered USN already Present in the database...');
       $_POST['btn_reviewer']=NULL;
       include'../Registration/Registration.php';
       return; 
    }
    $query="INSERT INTO login VALUES('$user','$pass','$email',0)";
    if(mysqli_query($con,$query)){ 
        $q="insert into detail values('$user','$name','REVIEWER','$op','$tmp','$usn')";
        if(mysqli_query($con,$q))   
            alert('Account created..\nNow you can Login to CC...');
        include '../Login/Login.php';
        return;
    }
    else{
        echo mysqli_error($con);
        $_POST['btn_user']=NULL;
        include'../Registration/Registration.php';
        return;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../Registration_style/style.css">
        <link rel="icon" type="image/png" href="../nitte.ico">
        <title></title>
        <style>
            .text{
                border:2px solid #456879;
                border-radius: 20px;
                height: 30px;
                width:250px;
                overflow: auto;
                text-align: center;
                font-family: Segoe UI;
                opacity:0.5;
                font-weight:normal;
                letter-spacing: 1px;
            }
            .button{
                margin-top: 20px;
                font-family: Segoe UI;
                font-weight:normal;
                letter-spacing: 1px;
                padding: 15px 25px;
                font-size: 15px;
                text-align: center;
                cursor: pointer;
                outline: none;
                color: #fff;
                background-color: blue;
                border: none;
                border-radius: 30px;
                box-shadow: 0 9px whitesmoke;
                opacity: 0.5;
            }
            .button:hover{
                background-color: green;  
            }
            .button:active{
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
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
            .a:hover{
                color:red;
            }
         </style>
    </head>
    <body>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype='multipart/form-data'>
        <div id="container">
            <div id="menu">
                <font face="Segoe UI" size="5">Registration_Page</font>
                <a class="a" style="margin-left:280px;font-size:15px;font-family:Segoe UI;font-weight: normal;" href="../Login/Login.php">Go to Login</a>
            </div><br>
            <fieldset style="margin-left:5px;margin-right:5px;border:1px solid #999;border-radius: 8px;box-shadow: 0 0 10px #999;" id="user">
                <legend style="font-family: Segoe UI;font-size: 20px;color:whitesmoke;letter-spacing: 1px;" >USER</legend>
                <div style="margin-top:10px;">
                    <label id="lbl">Full Name</label>
                    <input name="txt_name" type="text" class="text" style="margin-left:60px;" placeholder="Enter your name..." autocomplete="off" required  onclick="disable()">
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">User Name</label>
                    <input name="txt_user" type="text" class="text"  style="margin-left:50px;" placeholder="Enter your username..." autocomplete="off" required>
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">Email</label>
                    <input name="txt_email" type="mail" class="text" style="margin-left:110px;" placeholder="Enter your Email..." autocomplete="off" required>
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">Password</label>
                    <input name="txt_pass" type="password" class="text" style="margin-left:70px;" placeholder="Enter your password..." autocomplete="off" required>
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">Repeat Password</label>
                    <input  name="txt_cpass" type="password" class="text" style="margin-left:0px;" placeholder="Enter your Confirm password..." autocomplete="off" required>
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">Choose Image</label>
                    <input name="file_pic" type="file" style="color:white;margin-left: 30px;" class="text" placeholder="Enter your Confirm password..." autocomplete="off" required>
                </div>
                <div>
                    <center>
                        <input name="btn_user" class="button" style="margin-left:75px;" type="submit" value="Register">
                    </center>
                </div>
                <br>
            </fieldset><br><br>
            
            <!--REVIEWER-->
            
            <fieldset style="margin-left:5px;margin-right:5px;border:1px solid #999;border-radius: 8px;box-shadow: 0 0 10px #999;" id="reviewer">
                <legend style="font-family: Segoe UI;font-size: 20px;color:black;color:whitesmoke;letter-spacing: 1px;" >REVIEWER</legend><br>
                <div style="margin-top:10px;">
                    <label id="lbl">Full Name</label>
                    <input name="txt_name1" type="text" class="text" style="margin-left:60px;" placeholder="Enter your name..." autocomplete="off" required onclick="disable1()">
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">User Name</label>
                    <input name="txt_user1" type="text" class="text" style="margin-left:50px;" placeholder="Enter your username..." autocomplete="off" required>
                </div>
                 <div style="margin-top:20px;">
                    <label id="lbl">USN</label>
                    <input name="txt_usn" type="text" class="text" maxlength="10" style="margin-left:120px;" placeholder="Enter your USN..." autocomplete="off" required>
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">BRANCH</label>
                    <select name="option" class="select" style="margin-left: 80px;" required>
                        <option>-Select-</option>
                        <option>MCA</option>
                        <option>BE</option>
                    </select>
                </div>
                <div style="margin-top:20px;font-family: S">
                    <label id="lbl">Email</label>
                    <input name="txt_email1" type="mail" class="text" style="margin-left:110px;" placeholder="Enter your Email..." autocomplete="off" required>
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">Password</label>
                    <input name="txt_pass1" type="password" class="text" style="margin-left:70px;" placeholder="Enter your password..." autocomplete="off" required>
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">Repeat Password</label>
                    <input name="txt_cpass1" type="password" class="text" style="margin-left:0px;" placeholder="Enter your Confirm password..." autocomplete="off" required>
                </div>
                <div style="margin-top:20px;">
                    <label id="lbl">Choose Image</label>
                    <input name="file_pic1" type="file" style="color:white;margin-left: 30px;" class="text" placeholder="Enter your Confirm password..." autocomplete="off">
                </div>
                <div>
                    <center>
                        <button name="btn_reviewer" class="button" style="margin-left:75px;">Register</button>
                    </center>
                </div><br>
            </fieldset>
        </div>
    </form>
    </body>
    <script>
            function disable()
            {
                 var g = document.getElementById("reviewer"); 
                 g.disabled = true; 
            }
            function disable1()
            {
                var g = document.getElementById("user"); 
                g.disabled = true;
            }
            
    </script>
</html>




