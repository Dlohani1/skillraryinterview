<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <title>SkillRary | Assessment</title>
    <style type="text/css">
        html {
            position: relative;
            min-height: 100%;
        }

        .curveContainer{
            margin: 0px;
            padding: 0px;
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
        .registerBtn{
            background: #33A478;
            font-size: 18px !important;
            font-weight: 600 !important;
            letter-spacing: 0px !important;
        }
        .curveBox{
            position: absolute;
            /* background-color: green; */
            width: 100%;
            bottom: 0;
            left: 0;
        }
        .codeimg{
            width: 80%;
            left: 50%;
            position: relative;
            transform: translateX(-50%);
        }
        .content{
            margin-top: 6%;
            /* margin-bottom: 2%; */
            min-height: calc(100vh - 180px); 
        }
        #imporveContent{
            margin-top: 6%;
        }
        .skillraryTest{
            font-weight: 600;
            color: #33A478;
            font-size: 38px;    
            margin-bottom: 40px;
        }
        .secondBox{
            background-color: white;
            padding: 10px;
        }
        #curveColor{
            fill: #33A478;
        }
    </style>
</head>
<body>
    <div class="container-fluid curveContainer">
        <div class="container-fluid headContainer">
            <nav class="navbar navbar-white bg-white">
                <div class="container">
                    <img src="https://www.skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary Logo">
                    <div style="float:right">
                        <a class="btn registerBtn" href="user/new-login">SIGNIN</a>&nbsp;&nbsp;
                        <a class="btn registerBtn" href="user/registration">SIGNUP</a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-fluid content">
            <div class="row">
                <div class="col-md-4 offset-md-1" id="imporveContent">
                    <h1 style="line-height: 60px;">Assess your <span style="color: #33A478;font-weight: 600;">Performance</span> & <span style="color: #33A478;font-weight: 600;">Coding</span> Skills to become a  better <span style="color: #33A478;font-weight: 600;">Developer</span></h1>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="secondBox">
                        <img src="<?php echo base_url().'images/laptopimage.jpg';?>" alt="img" class="codeimg"/><br/><br/><br/>
                        <div>
                            <h1 align="center" class="skillraryTest">Skillrary Assessment Portal</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="curveBox">
            <svg id="curve" data-name="Layer1" xmlns="https://www.w3.org/2000/svg" viewBox="0 0 1416.99 174.01">
                <path class="cls-1" id="curveColor" d="M0,280.8S283.66,59,608.94,163.56s437.93,150.57,808,10.34V309.54H0V280.8Z" transform="translate(0 -135.53)" />
            </svg>
        </div>
    </div>
</body>
</html>