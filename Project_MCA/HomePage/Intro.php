<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="icon" type="image/png" href="../nitte.ico"/>
        <style>
            html, body {
                margin: 0;
                padding: 0;
            }
            .hero-bkg-animated {
            background: gray url(../HomePage/wood.png) repeat 0 0;
            width: 100%;
            margin: 0;
            text-align: center;
            background-size: cover;
            height: 655px;
            padding-top: 20px;
            box-sizing: border-box;
            -webkit-animation: slide 20s linear infinite;
        }

            .hero-bkg-animated h1 {
            font-family: sans-serif;
        }

            @-webkit-keyframes slide {
            from { background-position: 0 0; }
            to { background-position: -400px 0; }
            }
            fieldset{
                background-color: white;
                margin-left:5px;
                margin-right:5px;
                margin-top: 1px;
                border:1px solid #999;
                border-radius: 10px;
                box-shadow: 0 0 10px #999;
                height:580px;
                width:280px;
                border-color:black;
            }
            img{
                
                border-radius:100px;
                margin-top: 5px;
                padding: 5px;
                width:340px;
                height: 250px;
            }
            img:hover{
                transform: scale(1.05);
            }
            p{
                letter-spacing: 1px;
                font-family: Segoe UI;
                font-size: 20px;
                font-weight: normal;
                margin-left: 10px;
                color:grey;
                
            }
            a:hover{
                color:green;
                transform: scale(1.5);
            }
        </style>
    </head>
    <body>
        <fieldset class="hero-bkg-animated" >
            <img src="download.png"><br><br><p> 
                <b>NMAM Institute of Technology</b><br>
                Nitte, Karkala Taluk,<br>
                Udupi - 574110<br>
                Karnataka, India<br>
                +91 – 8258 – 281263 / 281264 / 281248 / 281461 / 281462 / 281463 / 281349<br>
                +91 - 8258 - 281039<br>
                principal_nmamit@nitte.edu.in<br>
            <a href="https://www.nmamit.nitte.edu.in" target="_blank">www.nmamit.nitte.edu.in</a></p>
        </fieldset>
    </body>
</html>
