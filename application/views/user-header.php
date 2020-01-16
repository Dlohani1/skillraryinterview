<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <title>SkillRary Assessment Portal</title>
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
        border-radius: 100px;
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
</style>


</head>
<body>
    <div class="container-fluid editorContainer">
        <div class="container-fluid headContainer">
            <nav class="navbar navbar-white bg-white">
                <div class="container">
                    <img src="https://www.skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary Logo">
                    <div style="float:right">
                        <a class="btn registerBtn" href="home">Home</a>
                        <a class="btn registerBtn" href="profile">Profile</a>
                        <a class="btn registerBtn" href="enter-code">Take Test</a>
                        <a class="btn registerBtn" href="logout">Logout</a>
                    </div>
                </div>
            </nav>
        </div>