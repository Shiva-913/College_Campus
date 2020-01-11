<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | s
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="../user_style/style.css">
        <link rel="icon" type="image/png" href="../nitte.ico"/>
        <style>
            html, body {
                margin: 0;
                padding: 0;
            }
            .hero-bkg-animated {
            background: gray url(NMAMIT.jpg) repeat 0 0;
            -webkit-animation: slide 20s linear infinite;
            background-size: cover;
        }

            .hero-bkg-animated h1 {
            font-family: sans-serif;
        }

            @-webkit-keyframes slide {
            from { background-position: 0 0; }
            to { background-position: -400px 0; }
            }
            .topnav {
            background-color: #333;
            overflow: hidden;
            }

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #ddd;
  color:black;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
        </style>
    </head>
    <body>
        <div class="hero-bkg-animated" id="container">
            <div class="topnav" style="opacity: 0.7;">
                <a class="active" href='../user/profile.php?load=UPDATE'>Profile</a>
                <a href="../user/Question.php">My Questions</a>
                <a href="../../Chat/Reviewer/chat_user.php">Chat</a>
                <div class="dropdown">
                    <button class="dropbtn">FAQ 
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="../user/MCA.php">MCA</a>
                        <a href="../user/BE.php">BE</a>
                    </div>
                </div>
                <a href="../../Login/Login.php" style="background-color: red;" target="_top">Logout</a>
            </div> 
        </div>
    </body>
</html>
