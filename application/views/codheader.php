<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <title>SkillRary Assessment</title>
    <link rel="shortcut icon" href="https://skillrary.com/uploads/images/fav-sr-64x64-logo.png" type="image/x-icon">
    <style type="text/css">
        body{
            background-color: #f5f5f5;
        }
        .container:before{
            content: initial !important;
        }
        .container-fluid:before{
            content: initial !important;
        }
         .container:after{
            content: initial !important;
        }
        .container-fluid:after{
            content: initial !important;
        }
        .navbar:before{
            content: initial !important;
        }
        .navbar:after{
             content: initial !important;
        }
        .headContainer{
            margin: 0px;
            padding: 0px;
        }
        .bg-white{
            background: white !important;
            position: relative;
            z-index: 1;
            box-shadow: 0 8px 6px -6px #aaa;
        }
 
        .hrDesign{
            border-top: 1px solid white !important;
            padding: 0;
            width: 100%;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .editorContainer{
            margin: 0;
            padding: 0;
        }
        .registerBtn{
            background: #33A478;
            font-size: 18px !important;
            font-weight: 600 !important;
            letter-spacing: 0px !important;
        }
        .LoginBox{
            background: white;
            margin-top: 20%;
            padding: 30px;
        }
        .labelText{
            font-size: 14px;
        }
        .subtn{
            background: #33A478;
            padding: 6px 20px;
            border: 1px solid #33A478;
            color: white;
            font-weight: 600;   
        }
        .form-control:focus {
            color: black;
            background-color: #fff;
            border-color: #aaa !important;
            outline: 0;
            box-shadow: none !important;
        }
        .mobileSideNavBtn{
            width: 50%;
        }
        .iconBtn{
            font-size: 30px;
            cursor: pointer;
            display: none;
            position: absolute;
            margin-top: -45px;
            right: 25px;
        }
        .mobileNav{
            display: none !important;
        }
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }
        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            display: block;
            text-align: left;
            transition: 0.3s;
        }
        .sidenav a:hover {
            color: #f1f1f1;
        }
        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }
        #main {
            transition: margin-left .5s;
            padding: 16px;
        }
        @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
        }
        @media only screen and (max-width: 600px){
            .iconBtn{
                display: block !important;
            }
            .headContainer{
                display: none;
            }
            .mobileNav{
                display: block !important;
            }
        }

</style>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
    }
</script>
</head>
<body>
    <div class="container-fluid editorContainer" style="margin: 0;padding: 0;">
        <div class="container-fluid headContainer" style="margin: 0;padding: 0;">
            <nav class="navbar navbar-white bg-white">
                <div class="container">
                    <img src="https://www.skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary Logo">
                    <div style="float:right">
                        <a class="btn registerBtn" href="/">HOME</a>&nbsp;&nbsp;
                        <a class="btn registerBtn" href="new-login">SIGNIN</a>&nbsp;&nbsp;
                        <a class="btn registerBtn" href="registration">SIGNUP</a>
                    </div>
                </div>
            </nav>
        </div>
        <nav class="navbar navbar-white bg-white mobileNav">
            <div class="container">
                <img src="https://www.skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary Logo">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a class="btn mobileSideNavBtn" href="/">HOME</a>&nbsp;&nbsp;
                        <a class="btn mobileSideNavBtn" href="new-login">SIGNIN</a>&nbsp;&nbsp;
                        <a class="btn mobileSideNavBtn" href="registration">SIGNUP</a>
                    </div>
            </div>
            <div style="float:right">
                <span onclick="openNav()" class="iconBtn">&#9776;</span>
            </div>
        </nav>
    </div>