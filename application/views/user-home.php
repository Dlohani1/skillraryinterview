<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <title>Login</title>
    <style type="text/css">
        body{
            background-color: #f5f5f5;
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
            margin: 0px;
            padding: 0px;
        }
        .registerBtn{
            background: #33A478;
            font-size: 18px !important;
            font-weight: 600 !important;
            letter-spacing: 0px !important;
        }
        .welcomeBox{
            margin-top: 10%;
            background: white;
            padding: 30px 0px 0px;
            text-align: center;  
            font-size: 45px;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
        .designBox{
            height: 200px;
            width: 100%;
            background: #33A478;
        }
        .welcomeText{
            color: black;
            font-weight: 600;
            text-shadow: 1px 5px 0px rgba(0,0,0,0.2);
            margin-top: 3%;
            margin-left: 22%;
            position: absolute;
        }
        .bubbleCircle3{
            position: absolute;
            opacity: 0.5;
            width: 100%;
            border-top-left-radius: 200px;
            border-bottom-left-radius: 200px;
            background: linear-gradient(125deg, #33A478, #33A478 30%, black);
        }
        .bubbleCircle33{
            margin-top: 36px;
            position: relative;
            float: right;
            max-width: 90%;
            height: 60px;
        }
        .bubbleCircle4{
            position: absolute;
            opacity: 0.5;
            width: 100%;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 200px;
            background: linear-gradient(125deg, #33A478, #33A478 30%, black);
        }
        .bubbleCircle44{
            margin-top: -31.5%;
            position: relative;
            float: left;
            max-width: 130px;
            height: 130px;
        }
        .nameUser{
            line-height: 20px;
            margin-left: 25%;
            margin-top: 3%;
        }
        .label{
            color: #33A478;
            font-weight: 600;
            font-size: 22px;
            float: left;
        }
        .name{
            color: black;
            font-size: 22px;
            float: left;

        }
        .profileImage{
            width: 120px;
            border-radius: 100px;
        }
    </style>
</head>
<body>
        <?php
        if (null !== $userData['profile-pic']) {
            $img = $userData['profile-pic'];
        } else {
            $img = "images/boy.png";
            if ($userData['gender'] == "2") {
                $img = "images/girl.png";
            }
        }
       ?>
    <div class="container-fluid editorContainer">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="card welcomeBox">
                        <div align='center'>
                            <img src=<?php echo base_url().$img;?> class="profileImage">
                        </div>
                        <div>
                            <div class="bubbleCircle3 bubbleCircle33"></div>
                            <p class="welcomeText">Welcome <?php echo $userData['first_name']." ".$userData['last_name']; ?></p>
                        </div>

                        <div class="nameUser">

                            <p><span class="label">Email: &nbsp;</span>
                            <span class="name"> <?php echo $userData['email']; ?></span></p><br/>
                        <p><span class="label">Mobile: &nbsp;</span><span class="name"> <?php echo $userData['contact_no']; ?></span></p>
                            <!-- <p><span class="label">Gender</span> : <span class="name">ABCD</span></p> -->
                        </div>

                                                        <?php if (isset($_SESSION['success'])) { echo "<small style='color:red'>".$_SESSION['success']."<small>";} ?>
                        <!-- <div class="bubbleCircle4 bubbleCircle44"></div> -->
                        <div style="margin-top: 3%">
                        <img src=<?php echo base_url()."images/cloud.png";?> width="100%" height="70px">
                        </div>
                    </div>

                </div>
            </div>
            <!-- <div class="col-md-7 offset-md-3">
            <div class="designBox">
                <p></p>
            </div>
            </div> -->
        </div>
    </div>
</body>
</html>