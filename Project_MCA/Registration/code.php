<?php
include "../Connection/connection.php";
include "../Connection/alert.php";
$con= connect();
$row= isset($_REQUEST['txt_name'])?$_REQUEST['txt_name']:"Fuck";
alert($row);
if(isset($_POST['btn_user']))
{
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
        echo alert("Images Only..");
        return;
    }
    if(empty($_POST['name'])&& empty($_POST['email']) && empty($_POST['username']) &&
    empty($_POST['pass']) && empty($_POST['repeat-pass'])){
        echo alert("All fields must be filled !"); 
        include('C:\xampp\htdocs\CollegeCampus\Login\login_Reg.php');
        return;
    }
    if(!preg_match('/^[a-zA-Z ]+$/', $name)){
        echo alert("Only letters and White spaces allowed.. ! in name field"); 
        include('C:\xampp\htdocs\CollegeCampus\Login\login_Reg.php');
        return;
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo alert("Please enter valid email id.."); 
        include('C:\xampp\htdocs\CollegeCampus\Login\login_Reg.php');
        return;
    }
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)) {
        echo alert('The password does not meet the requirements..');
        include('C:\xampp\htdocs\CollegeCampus\Login\login_Reg.php');
        return;
    }
    if($pass!=$rpass)
    {
        alert('Confirm Password must be same as Password...');
        include('C:\xampp\htdocs\CollegeCampus\Login\login_Reg.php');
        return;
    }
 $sql=mysqli_query($con,"select * from login where user='$user' or email='$email'");
 if(mysqli_num_rows($sql)>0){
     $res= mysqli_fetch_assoc($sql);
     if($res['user']==$user){
        echo alert('Username already present in the database..');
        include('C:\xampp\htdocs\CollegeCampus\Login\login_Reg.php');
        return;
     }
     else{
        echo alert('Currently entered Email already present in the database..');
        include('C:\xampp\htdocs\CollegeCampus\Login\login_Reg.php');
        return;
     }
 }    
$query="INSERT INTO login (name,email,username,pass,pic)VALUES('$name','$email','$user','$pass','$tmp')";
if(mysqli_query($con,$query)){     
    echo alert('Account created..\nNow you can Login to CC...');
    include('C:\xampp\htdocs\CollegeCampus\Login\login_Reg.php');
    return;
}
 else {
    echo mysqli_error($con);
 } 
}
?>