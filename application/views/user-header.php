<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <link rel="shortcut icon" href="https://skillrary.com/uploads/images/fav-sr-64x64-logo.png" type="image/x-icon">
    <title>SkillRary Assessment</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <style type="text/css">
    body{
        background-color: #f5f5f5;
    }
    .headContainer{
        margin: 0px;
        padding: 0px;
    }
    .errMessage{
        position: absolute;
        margin-top: -23px;
        font-size: 13px;
        color: red;
    }
    .errMessageLast{
        position: absolute;
        margin-top: 0px;
        font-size: 13px;
        color: red;
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
    .formControl:focus {
        color: black;
        background-color: #fff;
        border-color: #aaa !important;
        outline: 0;
        box-shadow: none !important;
    }
    .profileBox{
        background: white;
        margin-bottom: 20px;
        padding: 30px;
    }
    #contentBox{
        margin-top: 5%;
    }
    .rowGap{
        margin-bottom: -10px;
    }
    .imgLogo{
        width: 130px;
    }
    .dashboardList{
        list-style-type: none;
        margin :0px;
        padding: 0px;
    }
    .dashboardBox{
        background: white;
        padding: 20px;
    }
    .liList{
        padding: 10px 25px;
        background: #33A478;
        margin-bottom: 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    .editButton{
        position: absolute;
        left: 50%;
        top: 8%;
        transform: translate(-50%,-8%);
        background: white;
        border: 2px solid white;
    }
    .editButton:focus{
        outline: none;
    }
    .modal-content {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        min-width: 600px;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: .3rem;
        outline: 0;
    }
    .modal-header .close {
        padding: 1rem 1rem;
        margin: -1rem -1rem -1rem auto;
        margin-top: -10% !important;
    }
    .modal-header {
        display: inline-block !important;
        -ms-flex-align: start;
        align-items: flex-start;
        -ms-flex-pack: justify;
        justify-content: space-between;
        padding: 1rem 1rem;
        border-bottom: 1px solid #dee2e6;
        border-top-left-radius: .3rem;
        border-top-right-radius: .3rem;
    }
    .modal-footer{
        display: inline-block !important;
        border-top: 1px solid transparent !important;
    }
    .resume_upload {
        position: relative;
        min-width: 141px;
        height: 36px;
        text-align: center;
        color: #33a478;
        line-height: 25px;
        background: #fff;
        border: solid 2px black;
        font-weight: 600;
    }
        
    a.resume_upload {
        display: inline-block;
    }
        
    .resume_upload .btn_lbl {
        position: relative;
        z-index: 2;
        pointer-events: none;
    }
        
    .resume_upload .btn_colorlayer {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: #fff;
        z-index: 1;
        pointer-events: none;
    }
        
    .resume_upload input[type="file"] {
        position: absolute;
        top: 0px;
        left: -90px;
        font-weight: 600;
        margin-left: 92%;
        color: #33a478;
        outline: none;                    
    }
    .subbtn{
        background: #33A478;
        padding: 5px 17px;
        border: 2px solid #33A478;
    }
    .subbtn:focus{
        outline: none;
    }
    .errortag{
        margin-top: -2px;
        position: absolute;
        font-size: 12px;
        color: red;
        left: 50%;
        transform: translateX(-50%);
    }
    .updatedText{
        color: #33A478;
        font-weight: 600;
        font-size: 20px;
    }
    .mobileNavBtn{
        width: 60%;
    }
    .icon{
        font-size: 30px;
        cursor: pointer;
        display: none;
        position: absolute;
        margin-top: -45px;
        right: 25px;
    }
    .mobileNavigation{
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
        transition: 0.3s;
        text-align: left;
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
    #main1 {
        transition: margin-left .5s;
        padding: 16px;
    }

    .rowGapDegree{
        margin-bottom: 10px;
    }
     /* .hrDesignUpdate{
        border-top: 1px solid black;
    } */
    #sectionHeading{
        font-weight: 700;
        font-size: 20px;
        color: #333742;
        letter-spacing: 1.5px;
        position: relative;
        /* padding: 0px 0px 10px 0px;
        margin-bottom: 20px; */
    }
    /* #sectionHeading:before{
        content: ' ';
        background: #33A478;
        box-shadow: 0 4px 8px 0 rgba(76,215,200,0.3);
        width: 44px;
        height: 4px;
        position: absolute;
        bottom: 0;
    } */
    .tenthDetails{
        color: #333742;
        font-weight: 600;
        font-size: 18px;
    }
    .twelvethDetails{
        color: #333742;
        font-weight: 600;
        font-size: 18px;
        margin-top: 10px;
    }
    fieldset {
        display: block;
        margin-left: 2px;
        margin-right: 2px;
        padding-top: 0.35em;
        padding-bottom: 0.625em;
        padding-left: 0.75em;
        padding-right: 0.75em;
        border: 1px groove black;
    }
    legend {
        font-weight: 600;
        display: block;
        width: inherit;
        max-width: 100%;
        padding: 0;
        margin-bottom: .5rem;
        font-size: 1.5rem;
        line-height: inherit;
        color: #33A478 !important;
        white-space: normal;
    }

    @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
    }
    @media only screen and (max-width: 600px){
        fieldset{
            display: block;
            margin-left: 2px;
            margin-right: 2px;
            padding-top: 0.35em;
            padding-bottom: 0.625em;
            padding-left: 0.75em;
            padding-right: 0.75em;
            border: 1px groove black;
            border-right: 0.7px solid;
        }
        .icon{
            display: block !important;
        }
        .headContainer{
            display: none;
        }
        .mobileNavigation{
            display: block !important;
        }
        .editButton{
            position: absolute;
            left: 50%;
            top: 70%;
            transform: translate(-50%,-17%);
            background: white;
            border: 2px solid white;
        }
    }
</style>
<script>
     $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

    function openNav() {
        document.getElementById("mySidenavigation").style.width = "250px";
        document.getElementById("main1").style.marginLeft = "250px";
    }
    function closeNav() {
        document.getElementById("mySidenavigation").style.width = "0";
        document.getElementById("main1").style.marginLeft= "0";
    }
</script>
</head>
<body>
    <!-- <div class="container-fluid editorContainer" style="margin:0px; padding: 0px;">
        <div class="container-fluid headContainer" style="margin:0px; padding: 0px;">
            <nav class="navbar navbar-white bg-white">
                <div class="container">
                    <img src="https://www.skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary Logo">
                    <div style="float:right">
                        <a class="btn registerBtn" href=<?php echo base_url()."user/home";?>>Home</a>
                        <a class="btn registerBtn" href=<?php echo base_url()."user/profile";?>>Profile</a>
                        <a class="btn registerBtn" href=<?php echo base_url()."user/enter-code";?>>Take Test</a>
                        <a class="btn registerBtn" href=<?php echo base_url()."user/logout";?>>Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div> -->


    <div class="container-fluid editorContainer" style="margin:0px; padding: 0px;">
        <div class="container-fluid headContainer" style="margin:0px; padding: 0px;">
            <nav class="navbar navbar-white bg-white">
                <div class="container">
                    <img src="https://www.skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary Logo">
                    <div style="float:right">
                        <a class="btn registerBtn" href=<?php echo base_url()."user/home";?>>Home</a>
                        <a class="btn registerBtn" href=<?php echo base_url()."user/profile";?>>Profile</a>
                        <!-- <a class="btn registerBtn" href=<?php// echo base_url()."user/enter-code";?>>Take Test</a> -->

                        <?php 

                        if (isset($_SESSION['loginType']) && $_SESSION['loginType'] == "interview") {
                            echo '<a class="btn registerBtn" href= '.base_url().'user/interview >Interview</a>'; 
                        }
                        ?>
                        <a class="btn registerBtn" href=<?php echo base_url()."user/logout";?>>Logout</a>
                    </div>
                </div>
            </nav>
        </div>
        <nav class="navbar navbar-white bg-white mobileNavigation">
            <div class="container">
                <img src="https://www.skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary Logo">
                    <div id="mySidenavigation" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a class="btn mobileNavBtn" href=<?php echo base_url()."user/home";?>>Home</a>
                        <a class="btn mobileNavBtn" href=<?php echo base_url()."user/profile";?>>Profile</a>
 <?php 

                        if (isset($_SESSION['loginType']) && $_SESSION['loginType'] == "interview") {
                            echo '<a class="btn registerBtn" href= '.base_url().'user/interview >Interview</a>'; 
                        }
                        ?>

                        <!-- <a class="btn mobileNavBtn" href=<?php //echo base_url()."user/enter-code";?>>Take Test</a> -->
                        <a class="btn mobileNavBtn" href=<?php echo base_url()."user/logout";?>>Logout</a>
                    </div>
            </div>
            <div style="float:right">
                <span onclick="openNav()" class="icon">&#9776;</span>
            </div>
        </nav>
    </div>

