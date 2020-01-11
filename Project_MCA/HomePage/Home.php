<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?PHP if(trim($_SESSION['type'])=="USER"){?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../nitte.ico"/>
        <title></title>
    </head>
    <frameset cols="*" noresize>
       
        <frame src="../HomePage/user/user.php">    
    </frameset>   
</html>
<?PHP } else { ?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="../nitte.ico"/>
        <title></title>
    </head>
    <frameset cols="*" noresize>
        <frame src="../HomePage/reviewer/reviewer.php">    
    </frameset>   
</html>
<?PHP } ?>



