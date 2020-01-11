<?php
session_start();
if(isset($_GET['load']))
{
   $_SESSION['load']='load';
   $_GET['load']=NULL;
}
if(isset($_SESSION['load']))
{
    require '../../Connection/connection.php';
    $con= connect();
    $res= mysqli_fetch_array( mysqli_query($con,"select * from detail where user='".$_SESSION['username']."'"));
    $re= mysqli_fetch_array( mysqli_query($con,"select * from login where user='".$_SESSION['username']."'"));  
    $_SESSION['load']=NULL;
}
if(isset($_POST['btnupdate']))
{
    require '../../Connection/alert.php';
    require '../../Connection/connection.php';
    $name=$_POST['txtname'];
    $email=$_POST['txtemail'];
    $pass=$_POST['txtpass'];
    $rpass=$_POST['txtcpass'];
    $pic=$_FILES['uploadfile']['name'];
    $con= connect();
    $res= mysqli_fetch_array( mysqli_query($con,"select * from login where user='".$_SESSION['username']."'"));
    $re= mysqli_fetch_array( mysqli_query($con,"select * from detail where user='".$_SESSION['username']."'"));
    if($pic!='')
    {
        $tmp= addslashes(file_get_contents($_FILES['uploadfile']['tmp_name']));
        $type=$_FILES['uploadfile']['type'];
        if(substr($type,0,5)!='image')
        {
            echo alert("Images Only..");
            $_POST['btnupdate']=NULL;
            return;
        }
    }
    else
    {
        $tmp=$re['pic'];
    }
    if(!preg_match('/^[a-zA-Z ]+$/', $name)){
       alert("Only letters and White spaces allowed.. ! in name field");
       $_POST['btnupdate']=NULL;
       return;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        alert("Please enter valid email id..");
        $_POST['btnupdate']=NULL;
        return;
    }
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) {
        alert('The password does not meet the requirements..');
        $_POST['btnupdate']=NULL;
        return;
    }
    if($pass!=$rpass)
    {
        alert('Confirm Password must be same as Password...');
        $_POST['btnupdate']=NULL;
        return;
    }
   if($pic!=''){
        if(mysqli_query($con,"update login set email='$email',pass='$pass' where user='".$_SESSION['username']."'") && 
           mysqli_query($con,"update detail set name='$name',pic='$tmp' where user='".$_SESSION['username']."'")) {
            alert("Profile Updated...?");
            $_POST['btnupdate']=NULL;
            
        }
   }
   else{
       if(mysqli_query($con,"update login set email='$email',pass='$pass' where user='".$_SESSION['username']."'") &&
          mysqli_query($con,"update detail set name='$name' where user='".$_SESSION['username']."'")) {
            alert("Profile Updated...!");
            $_POST['btnupdate']=NULL;
       }
    }
    $_POST['btnupdate']=NULL;
    $res= mysqli_fetch_array( mysqli_query($con,"select * from detail where user='".$_SESSION['username']."'"));
    $re= mysqli_fetch_array( mysqli_query($con,"select * from login where user='".$_SESSION['username']."'"));
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../reviewer_style/style.css">
        <link rel="icon" type="image/png" href="../../nitte.ico"/>
        <style>
            .button1:hover{
                transform: scale(1.05);
            }
            a:hover{
                color:red;
            }
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
        </style>
        <title></title>
    </head>
    <body>
        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype='multipart/form-data'>
        <div id="container" style="background-color:lightblue;width:450px;">
            <div id="menu">
                <font face="Segoe UI" size="5">Profile_Page(REVIEWER)</font>
                <a class="a" style="margin-left:120px;font-size:15px;font-family:Segoe UI;font-weight: normal;" href="../reviewer/reviewer.php">Home</a>
            </div>
            <center>
                <input type="file" name="uploadfile" id="uploadfile" style="display:none"/> 
                <?php
                echo '<img class="button1" id="OpenImgUpload" onclick="fun();" style="color:white;margin-top:10px;border-radius:150px;height: 200px;width:200px;" src="data:image/jpeg;base64,'. base64_encode($res['pic']).'">';
                ?>
            </center>
        <script type="text/javascript">
           function fun(){
            document.getElementById("uploadfile").click();
        }
        </script>
        <br>
      <center>
        <input type="text" name="txtname" class="text" style="margin-top:20px;"  autocomplete="off" required value="<?php echo $res['name'];?>" >
        <input type="text" name="txtemail" class="text" style="margin-top:20px;"  autocomplete="off" required value="<?php echo $re['email'];?>">
        <input type="text" name="txtpass" class="text" style="margin-top:20px;" autocomplete="off" required placeholder="Enter your Password">
        <input type="text" name="txtcpass" class="text" style="margin-top:20px;" autocomplete="off" required placeholder="Enter your Confirm Password"><br><br><br>
        <button id="btn1" name="btnupdate">Update</button>
      </center>      
     </div>
    </form>    
    </body>
</html>

