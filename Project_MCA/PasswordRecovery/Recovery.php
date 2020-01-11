<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../PasswordRecovery_style/style.css">
        <link rel="icon" type="image/png" href="../nitte.ico"/>
        <style>
            .a:hover{
                color:red;
            }
        </style>
    </head>
    <body><form method="post">
        <div id="container">
            <div id="menu">
                <font face="Segoe UI" size="5">Recovery_Page</font>
                <a class="a" style="margin-left:280px;font-size:15px;font-family:Segoe UI;font-weight: normal;" href="../Login/Login.php">Go to Login</a>
            </div>
            <div style="margin-top:210px;margin-left: 80px;">
                <label id="lbl" style="margin-top:30px;">Email</label>
                <input type="email" id="text" name="email" style="margin-left:30px;" placeholder="Enter your Email..." autocomplete="off" required ><br>
                <button id="btn" name="submit">Submit</button>
            </div>
        </div>
        </form>
    </body>
</html>
<?php
require '../Connection/alert.php';
require '../Connection/connection.php';
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $con=connect();
    $count=mysqli_query($con,"select * from login where email='$email'");
    if(mysqli_num_rows($count)==0){
        alert("Email does not exists in the database...");
    } 
    else{
         $sql= mysqli_fetch_assoc(mysqli_query($con,"select * from login where email='$email'"));
         $res= mysqli_fetch_assoc(mysqli_query($con,"select * from detail where user='".$sql['user']."'"));
         require '../PasswordRecovery/PHPMailerAutoload.php';
         require '../PasswordRecovery/class.phpmailer.php';
         require '../PasswordRecovery/class.smtp.php';
         $mail = new PHPMailer();
         //$mail->SMTPDebug = 3;                               // Enable verbose debug output
         $mail->isSMTP();                                      // Set mailer to use SMTP
         $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
         $mail->SMTPAuth = true;                               // Enable SMTP authentication
         $mail->Username = 'shettyshiva13997@gmail.com';                 // SMTP username
         $mail->Password = 'shivashetty@123';                           // SMTP password
         $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
         $mail->Port = 587;     
         $mail->SMTPOptions = array(
         'ssl' => array(
                  'verify_peer' => false,
                  'verify_peer_name' => false,
                  'allow_self_signed' => true
                 )
           );

         $mail->setFrom('shettyshiva13997@gmail.com','CollegeCampus');
         $mail->addAddress($email);     // Add a recipient             // Name is optional
         $mail->addReplyTo('shettyshiva13997@gmail.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
         $mail->isHTML(true);                                  // Set email format to HTML
         $name=$res['name'];
         $mail->Subject = 'Username/Password_Recovery';
         $mail->Body    = "<h1>Hello,$name</h1><br><br><b>Username:-</b> '".$res['user']."'<br><b>Password:-</b> '".$sql['pass']."'";
         //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

         if(!$mail->send()) {
            alert('Message could not be sent.');
            alert('Mailer Error: ' . $mail->ErrorInfo);
        }
        else {
            alert('Username/Password has been sent to your mail');
        }
    }
}
?>