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
        /* border-radius: 100px; */
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
        top: 17%;
        transform: translate(-50%,-17%);
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
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</body>
</html>