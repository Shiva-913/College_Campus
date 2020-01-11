<?php
if(isset($_POST['submit']))
{
    session_start();
    require '../Connection/alert.php';
    require '../Connection/connection.php';
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $con=connect();
    $sql= mysqli_fetch_assoc(mysqli_query($con,"select * from login where user='$user' and pass='$pass'"));
    if($sql['report']>3)
    {
       alert("You have been Reported...!"); 
       $_POST['submit']=NULL;
       include '../Login/Login.php';
       return;
    }
    if($sql['user']==$user and $sql['pass']==$pass){
        alert("Login Successful...");
        $_SESSION['username']=$sql['user']; 
        $q=mysqli_fetch_assoc(mysqli_query($con,"select * from detail where user='$user'"));
        $_SESSION['type']=$q['type'];
        include '../HomePage/Home.php';
    }
    else{
        alert("Incorrect Username/Password...");
        $_POST['submit']=NULL;
        include '../Login/Login.php'; 
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../Login_style/style.css">
        <link rel="icon" type="image/png" href="../nitte.ico"/>
        <title></title>
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <font face="Segoe UI" size="5">Login_Page</font>
            </div> 
            <center>
                <h1 id="head">Account Login</h1><form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="text" id="text" name="username" placeholder="USERNAME" autocomplete="off" required autofocus><br>
                <input type="password" id="text" name="password" style="margin-top:20px;" placeholder="PASSWORD" required><br>
                <button id="btn" name="submit">Login</button><br><br><br><font size="4px" face="Segoe UI" color="white">Forgot&nbsp;</font></form>
                <a id="link" style="font-size:15px;font-family:Segoe UI;opacity: 0.8;font-weight: bold" href="../PasswordRecovery/Recovery.php">
                    User name / password ?
                 </a>
                <br><br><br><br>
                <a id="link" style="font-size:15px;font-family:Segoe UI;opacity: 0.8;font-weight: normal;" href="../Registration/Registration.php">SIGN UP</a>
            </center> 
        </div>
    </body>
</html>

