<?php session_start();?>
<html>
    <link rel="stylesheet" href="../../materialize/css/materialize.css"/>
    <link rel="icon" type="image/png" href="../../nitte.ico"/>
    <script src="../../jquery/jquery.min.js"></script>
    <style>
        .container{
        box-shadow:2px 2px 10px #000000;
        width:900px;
        height:600px;
        margin: 2% auto;
        border-radius:1%;
        overflow:auto;
        background-image:url(chat.jpg);
        background-size: cover;
        }   
        .box{
        width:300px;
        height:600px;
        box-shadow:2px 2px 10px #000000;
        overflow:auto;
        background-size: cover;
       
        }
        .user{
            margin-left: 20px;
            width:250px;
            height:150px;
            box-shadow:2px 2px 10px #000000;
            border-radius: 10px;
            margin-top:10px;
            overflow:no-display;
            background-size: cover;
        }
        .img{
            width:100px;
            height:125px;
            border: 2px;
            margin-left: 10px;
            margin-top:10px;
            border-radius:10px;
            overflow:auto;
            background-size: cover;
        }
        .btnu:hover{
            cursor: pointer;
            
        }
        #search-form_3{
background: #e1e1e1; /* Fallback color for non-css3 browsers */
width: 365px;
margin: 100px auto;

/* Gradients */
background: -webkit-gradient( linear,left top, left bottom, color-stop(0, rgb(243,243,243)), color-stop(1, rgb(225,225,225)));
background: -moz-linear-gradient( center top, rgb(243,243,243) 0%, rgb(225,225,225) 100%);

/* Rounded Corners */
border-radius: 17px;
-webkit-border-radius: 17px;
-moz-border-radius: 17px;


/* Shadows */

}

/*** TEXT BOX ***/
#search_3{
background: #fafafa; /* Fallback color for non-css3 browsers */

/* Gradients */
background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(250,250,250)), color-stop(1, rgb(230,230,230)));
background: -moz-linear-gradient( center top, rgb(250,250,250) 0%, rgb(230,230,230) 100%);

border-bottom: 1px solid #fff;
border-right: 1px solid rgba(255,255,255,.8);
font-size: 16px;
margin: 4px;
padding: 5px;
width: 250px;


/* Rounded Corners */
border-radius: 17px;
-webkit-border-radius: 17px;
-moz-border-radius: 17px;

/* Shadows */

}

/*** USER IS FOCUSED ON TEXT BOX ***/


/*** SEARCH BUTTON ***/
#submit_3{
background: #44921f;/* Fallback color for non-css3 browsers */
/* Gradients */
background: -webkit-gradient( linear, left top, left bottom, color-stop(0, rgb(79,188,32)), color-stop(0.15, rgb(73,157,34)), color-stop(0.88, rgb(62,135,28)), color-stop(1, rgb(49,114,21)));
background: -moz-linear-gradient( center top, rgb(79,188,32) 0%, rgb(73,157,34) 15%, rgb(62,135,28) 88%, rgb(49,114,21) 100%);
border: 0;
color: #eee;
cursor: pointer;
float: right;
font: 16px 'Raleway', sans-serif;
font-weight: bold;
height: 30px;
margin: 4px 4px 0;
text-shadow: 0 -1px 0 rgba(0,0,0,.3);
width: 84px;
outline: none;

/* Rounded Corners */
border-radius: 30px;
-webkit-border-radius: 30px;
-moz-border-radius: 30px;

/* Shadows */
box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.4);
-moz-box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.2);
-webkit-box-shadow: -1px -1px 1px rgba(255,255,255,.5), 1px 1px 0 rgba(0,0,0,.4);
}
/*** SEARCH BUTTON HOVER ***/
#submit_3:hover {
background: #4ea923; /* Fallback color for non-css3 browsers */

/* Gradients */
background: -webkit-gradient( linear, left top, left bottom, color-stop(0, rgb(89,222,27)), color-stop(0.15, rgb(83,179,38)), color-stop(0.8, rgb(66,143,27)), color-stop(1, rgb(54,120,22)));
background: -moz-linear-gradient( center top, rgb(89,222,27) 0%, rgb(83,179,38) 15%, rgb(66,143,27) 80%, rgb(54,120,22) 100%);
}
#submit_3:active {
background: #4ea923; /* Fallback color for non-css3 browsers */

/* Gradients */
background: -webkit-gradient( linear, left bottom, left top, color-stop(0, rgb(89,222,27)), color-stop(0.15, rgb(83,179,38)), color-stop(0.8, rgb(66,143,27)), color-stop(1, rgb(54,120,22)));
background: -moz-linear-gradient( center bottom, rgb(89,222,27) 0%, rgb(83,179,38) 15%, rgb(66,143,27) 80%, rgb(54,120,22) 100%);
}


/* ChaT WINDOW*/
  * { box-sizing: border-box; margin: 0; padding: 0; }
html, body { height: 100%; overflow: hidden; }

.container1 {
    flex: 1 1 90%; display: flex; flex-direction: column; 
    background-color: #eee; border: 1px solid #ccc; overflow:scroll;
    border-radius: 15px;
    opacity:0.5;
    border:2px solid #456879;
}
.form { flex: 0 0 32px; display: flex; border: 1px solid #ddd; }
.form > input[type=text] { flex: 1 1 auto; border: 1px solid #eee; }
.form > input[type=button] { flex: 0 0 20%; border: 1px solid #eee; }
.bubble { flex: 1 1 auto; clear: both; } /* clear the floats here on parent */
.bubble p {
    border-radius: 5px;
    padding: 8px; margin: 8px 12px;
    max-width: 80%;  /* this will make it not exceed 80% and then wrap */
    position: relative; transition: background-color 0.5s; 
}
.left p { background-color: green; float: left; color: #fff; } /* floated left */
.right p { background-color: #33c; color: #fff; float: right; } /* floated right */
/* classes below are only for arrows, not relevant */
.left p::before {
    content: ''; position: absolute;
    width: 0; height: 0; left: -8px; top: 8px;
    border-top: 4px solid transparent;
    border-right: 8px solid green;
    border-bottom: 4px solid transparent;
}
.right p::after {
    content: ''; position: absolute;
    width: 0; height: 0; right: -8px; bottom: 8px;
    border-top: 4px solid transparent;
    border-left: 8px solid #33c;
    border-bottom: 4px solid transparent;
}
#inp{
    border:2px solid #456879;
    height: 30px;
    width:480px;
    overflow: hidden;
    text-align: center;
    font-family: Segoe UI;
    font-weight:normal;
    letter-spacing: 1px;
    border-radius: 20px;
    
}
#btn{
    border-radius: 20px;
    height: 45px;
    width:70px;
    background-image: url(send.png);
    background-size:100% 100%;
    padding: 10px;
}
input,
input::-webkit-input-placeholder {
    font-size: 12px;
    line-height: 3;
    color:#456879;
}
.a:hover{
    cursor: pointer;
}
    </style>
    <body>
        <div class="container">
            <div class="box" style="overflow: auto;">
                <a style="margin-left:230px;color:red;" href="../../HomePage/user/user.php">Home</a>
                <div style="text-align: center;word-break: break-all;white-space: normal;"><?php echo '(USER)'.$_SESSION['username']; ?></div>
                <div id="search-form_3" style="width:280px;height:37px;margin-top: 10px;margin-bottom:20px;">
                    <input autocomplete="off" type="text" id="search_3" style="text-align: center;width:165px;height:21px;border-color:black;border-radius: 20px;margin-top: 3px;margin-left:5px;border-color:black;border:10px;font-size:12px;" placeholder="Enter here..."/>
                    <button id="submit_3">Search</button>
                </div>
                <div id="Show">
                <?php
                 require '../../Connection/alert.php';
                 require '../../Connection/connection.php';
                 $con= connect();
                 $res= mysqli_query($con,"select * from detail where type='REVIEWER'");
                while($row= mysqli_fetch_assoc($res)){
                    ?>
                <div  class="col s12 m8 offset-m2 l6 offset-l3" style="width:260px;margin-left:20px;margin-top:20px;">
                    <div class="card-panel grey lighten-5 z-depth-1" style="border-radius:20px;height:150px; background-image:url(images.png);">
                        <div class="row valign-wrapper">
                            <div class="col s2">
                                <?php echo '<img class="img" style="background-size:cover;height:100px;width:75px;border-radius: 10px;margin-top:2px;" src="data:image/jpeg;base64,'. base64_encode($row['pic']).'">';?>
                            </div>
                            <div class="col s10" style="padding-left: 70px;"><p style="font-family:Segoe UI;font-size: 10px; word-break: break-all;white-space: normal;">
                                <?php $re=mysqli_query($con,"Select * from login where user='".$row['user']."'");?>
                                <?php $r= mysqli_fetch_assoc($re);?>
                                <?php $u=$row['user'];?>
                                    <input type="text" id='btnuser' class="btnu" style='color:grey;font-weight:bold;' readonly onclick="fun(this);" value='<?php echo $u; ?>'><br>
                                <?php echo $row['name']; ?><br>
                                <?php echo $r['email'];?></p>
                            </div>
                        </div>
                     </div>
                </div> 
                <?php
                 }
                 ?>
               </div>
           </div>
            <div style="margin-left:310px;margin-top:-590px;width:560px;height:400px;">
                    <div id="chatWindow" class="container1" style="height:520px;">
                    </div>
                <input id="inp" type="text" placeholder="Write Something..." autocomplete="off" />
                <button id="btn" onclick="postMsg()"></button>     
            </div>
        </div>
    </body>
</html>
<script>
    var int=1000;
    var msg,name;
    $(document).ready(function(){
        $("#submit_3").click(function(){
            var d=document.getElementById("search_3").value.toString();
            $("#Show").load("chat_search.php",{
                rev1:d
            });
        });
    });
    function fun(elm){
       name=elm.value;
       $("#chatWindow").load("show_chat.php",{
                name1:name
         });
    }
    function postMsg() {
        
            var btn 	= document.getElementById('btn'), 
                inp 	= document.getElementById('inp'), 
                chats	= document.getElementById('chatWindow');
	msg 	= inp.value,
        bubble 	= document.createElement('div'),
        p 		= document.createElement('p');
    if (msg.trim().length <= 0) { return; }
    bubble.classList.add('bubble');
    bubble.classList.add('left');
    p.textContent = msg;
    bubble.appendChild(p);
    inp.value = '';
    chats.insertBefore(bubble, chats.lastChild);
    var messageBody = document.querySelector('#chatWindow');
    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
}
   $("#btn").click(function(){
        if (msg.trim().length <= 0) { return; }
    $("#chatWindow").load("show_chat1.php",{
            name1:name,
            insert1:'insert',
            msg1:msg
         });
     });
     setInterval(function(){
         var messageBody = document.querySelector('#chatWindow');
         messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
        $("#chatWindow").load("show_chat.php",{
            name1:name
        });
    },int);
  
</script>



