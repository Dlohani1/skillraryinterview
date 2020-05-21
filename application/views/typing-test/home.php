<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="SkillRary's Free Typing Test">
    <link rel="shortcut icon" href="https://skillrary.com/uploads/images/fav-sr-64x64-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> -->

    <title>SkillRary | Speed Typing test</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style type="text/css">
    .container-one:before {
        content: '';
        display: block;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        position: absolute;
        /*-webkit-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        -moz-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);*/
        -webkit-box-shadow: initial;
        -moz-box-shadow: initial;
        box-shadow: initial;
        z-index: 1;
    }
.container-one{
    position: relative;
    background-color: #ffffff;
    border: 1px solid black;
    border-radius: 10px;
 /*   border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;*/
    overflow: hidden;
}
.innercontainer-one{
    padding: 25px 0 68px;
    position: relative;
    z-index: 1;
}
.speedContainer {
    background: #33A478;
    padding: 5px 20px;
}
.boxCntnt{
    font-size: 24px;
    /*color: #156a89;*/
    color: #33A478;
    text-align: center;
    padding: 0 20px;
    margin-bottom: 20px;
}

.button-grp{
    cursor: pointer;
    position: relative;
    outline: none;
    display: inline-block;
    padding: 8px 12px;
    background-color: #eff8f9;
    color: #234575;
    width: 120px;
    text-align: center;
    border: 1px solid #a5b8bf;
    border-radius: 6px;
    font-size: 15px;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
}
.container-one:after {
    content: '';
    display: block;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 90px;
    background-color: #d0e3f1;
    border-top: 1px solid #bcbcbc;
   /* background: -moz-linear-gradient(top, #efefef 0%, #e8e8e8 100%);
    background: -webkit-linear-gradient(top, #efefef 0%, #e8e8e8 100%);
    background: linear-gradient(to bottom, #efefef 0%, #e8e8e8 100%);*/
   /* background: linear-gradient(to right, #33a478eb 10%, rgba(0, 0, 0, 0.76) 100%);
    background: -webkit-linear-gradient(to right, #33a478eb 10%, rgba(0, 0, 0, 0.76) 100%);
    background: -moz-linear-gradient(to right, #33a478eb 10%, rgba(0, 0, 0, 0.76) 100%);*/
    background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.76), #33a478)

}
.start-btn {
    cursor: pointer;
    position: relative;
    outline: none;
    display: block;
    padding: 8px 0;
    background-color: #33A478;
    color: black;
    width: 156px;
    text-align: center;
    border: 2px solid #ffffff;
    margin: 0 auto;
    border-radius: 10px;
    font-size: 16px;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    font-weight: 600;
}
.custom-select {
    background-position-x: 95%;
    -webkit-appearance: none;
    -moz-appearance: none;
    width: 100%;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    outline: none;
    color: #33A478;
    border: 1px solid black;
    background-color: white;
    margin-bottom: 20px;
    padding-left: 15px;
    font-family: "Roboto", Arial, Tahoma, sans-serif;
}
.selectBoxGroup{
    width: 260px;
}
body{
    background-image: url("images/tenkey.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}
.WelcomeContent{
    padding: 7px 15px 0px;
    position: relative;
    z-index: 1;
    border: 1px solid black;
    border-radius: 5px;
   /* border-top-left-radius: 10px;
    border-top-right-radius: 10px;*/
    background: white;
}


.boxCntnt {
    position: relative;
    float: left;
    color: #33A478;
    font-size: 27px;
    text-align: center;
    /*padding: 0 4px 0px 20px;*/
    margin-bottom: 23px;
    height: 35px;
}
.boxCntnt span{
    position: absolute;
    top: 0;
    right: 0;
    background: white;
    width: 100%;
    border-left: .1em solid black;
    -webkit-animation: typing 3s steps(16) forwards,
                                         cursor 1s infinite;
    animation: typing 3s steps(16) forwards,
                         cursor 1s infinite;
}
/* Animation */
@-webkit-keyframes typing{
    from { width: 100%; height: 35px;}
    to { width: 0;height: 35px;}
}
@-webkit-keyframes cursor{
    50% { border-color: white;}
}
@keyframes typing{
    from{ width: 100%;height: 35px;}
    to{ width: 0;height: 35px;}
}
@keyframes cursor{
    50% { border-color: white;}
}

</style>   
</head>
<body>
 <form method="POST" action="<?=base_url().'typing-test/start';?>"  onsubmit="return checkFilledData()" >
<!-- <form method="POST" action="#"> -->

<div class="container-fluid speedContainer">
    <img src="https://skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="srlogo">
</div><br/><br/><br/>

<div class="container">

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="WelcomeContent">
                <h2 class="boxCntnt">Welcome to the Skillrary Typing Test<span>&nbsp;</span></h2>
                <p style="text-align: center;font-size: 18px">Select the timer and content in this screen. On the next screen, the timer won't start until you start typing! <br/> Continue typing through the content until the timer ends.</p>
            </div>
        
        </div>
    </div>
</div><br/>

<div class="container" align="center">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="container-one">
                <div class="innercontainer-one">
                    <!-- <h2 class="boxCntnt">Welcome to the #1 typing speed test with over 4 million tests completed every
                                            month!</h2><br/>   -->  
                   <!--  <div class="input-group-button">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn button-grp" >1 minute test</button>
                            <button type="button" class="btn button-grp" >3 minute test</button>
                            <button type="button" class="btn button-grp" >5 minute test</button>
                        </div>
                    </div><br>
                    <div class="input-group-button">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn button-grp" >Text</button>
                            <button type="button" class="btn button-grp" >Sentences</button>
                            <button type="button" class="btn button-grp" >Words</button>
                        </div>
                    </div> -->
                    <div class="selectBoxGroup">
                        <select id="getMinute" class="custom-select">
                            <option value="1">1 minute test</option>
                            <option value="2">2 minutes test</option>
                            <option value="3">3 minutes test</option>
                            <option value="4">4 minutes test</option>
                            <option value="5">5 minutes test</option>
                            <option value="10">10 minutes test</option>
                        </select>
                        <span id="selectBoxGroupError"></span>
                        <select id="mySelectBox" name="select" class="custom-select" required>
                            <option value="">None Selected</option>
                        </select> 
                        <span id="mySelectBoxError"></span>
                    </div>
                 
                    <br>
                    <button type="submit" onclick="submitForm()" class="start-btn">Start Typing Test</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
    var s = '[{"optionText":"A","value":"1"},{"optionText":"B","value":"2"}]';
    var jsonData = $.parseJSON(s);
    var $select = $('#mySelectBox');
    $(jsonData).each(function (index, data) {    
        var $option = $("<option/>").attr("value", data.value).text(data.optionText);
        $select.append($option);
        // console.log(data.value)
    });
</script>

<script type="text/javascript">
    
    function submitForm(){
        
        let getMinute = $('#getMinute :selected').text();
        localStorage.getMinute = getMinute;
    }



    function checkFilledData() {
        let getMinute = $('#getMinute :selected').text();
        let mySelectBox = $('#mySelectBox :selected').text();
        let result = true;
            if(getMinute ==''){
               $('#selectBoxGroupError').text('Select any one option.').css('color', 'red');
               result = false;
            }

            if(mySelectBox == '' || mySelectBox == 'None Selected'){
                $('#mySelectBoxError').text('Select any one option.').css('color', 'red');
                result = false;
            }
        return result;
    }

</script>



</body>
</html>