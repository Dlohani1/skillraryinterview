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
        -webkit-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        -moz-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        z-index: 1;
    }
    .container-one{ 
        position: relative;
        background-color: #ffffff;
        border: 1px solid #99a8c3;
        border-radius: 10px;
        overflow: hidden;
    }
    .contentCntnr{
        /*box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.36);*/
        position: relative;
        background-color: #ffffff;
        border: 1px solid black;
        border-radius: 10px 10px 0 0;
        width: 600px;
        height: 228px;
        /*overflow: auto;*/
        /*white-space: pre-wrap;*/
        margin: 0 auto;
        text-align: justify;    
        padding: 15px;
        /*overflow: hidden;*/
    }
    .content{ 
        width: 600px; 
        height: 228px;
        text-align:justify; 
        /*background-color:green; 
        color:white; */
        padding-left:10px; 
        padding-right:10px; 
        font-size: 18px;
    } 

    .inner-border { 
        position: absolute; 
        left: 0; 
        overflow-x: hidden; 
        overflow-y: scroll; 
    } 
    .inner-border::-webkit-scrollbar { 
        display: none; 
    } 
    .tstContiner{
        padding-bottom: 30px;
        position: relative;
        height: 335px;
        margin-bottom: 10px;
        margin-top: 45px;
    }
    .speedContainer {
        background: #33A478;
        padding: 5px 20px;
    }
    .boxCntnt{
        font-size: 20px;
        color: #156a89;
        text-align: center;
        padding: 0 20px;
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
        background: -moz-linear-gradient(top, #efefef 0%, #e8e8e8 100%);
        background: -webkit-linear-gradient(top, #efefef 0%, #e8e8e8 100%);
        background: linear-gradient(to bottom, #efefef 0%, #e8e8e8 100%);
    }
    .start-btn {
        cursor: pointer;
        position: relative;
        outline: none;
        display: block;
        padding: 8px 0;
        background-color: #ff9c00;
        color: #ffffff;
        width: 156px;
        text-align: center;
        border: 4px solid #ffffff;
        margin: 0 auto;
        border-radius: 10px;
        font-size: 18px;
        -webkit-transition: all 0.3s;
        transition: all 0.3s;
    }
    .typingModule{
            padding-right: 110px;   
    }
    .tstwritng{
        font-size: 18px;
        max-width: 550px;
        width: 100%;
        text-align: initial;
        z-index: 1;
        position: relative;
        max-width: 600px;
        height: 90px;
        margin: -1px auto;
        line-height: 26px;
        padding: 6px 20px;
        outline: none;
        overflow: hidden;
        /*background-color: #d0e3f1;*/
        -webkit-box-shadow: inset 0 -4px 8px rgba(0, 0, 0, 0.36);
        -moz-box-shadow: inset 0 -4px 8px rgba(0, 0, 0, 0.36);
        box-shadow: inset 0 -4px 8px rgba(0, 0, 0, 0.36);
        /*background: -moz-linear-gradient(top, #efefef 0%, #e8e8e8 100%);
        background: -webkit-linear-gradient(top, #efefef 0%, #e8e8e8 100%);
        background: linear-gradient(to bottom, #efefef 0%, #e8e8e8 100%);*/
        background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.76), #33a478);
        border-left: 1px solid #99a8c3;
        border-right: 1px solid #99a8c3;
        border-top: 1px solid #99a8c3;
        border-radius: 0 0 10px 10px;
        color: white;
        resize: none;
    }
    .tstwritngClick{
        z-index: 2;
        position: absolute;
        left: 42%;
        top: 75%;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        bottom: 60px;
        width: 100%;
        max-width: 470px;
        text-align: center;
        animation: blink1 2s linear infinite;
        -webkit-animation: blink1 2s linear infinite;
        font-size: 20px;
        color: beige;
    }
    .tstwritngClick:focus{
        outline: none;
    }
    @keyframes blink1{
        50% { opacity: 0; }
    }
    /*.testTimer{
        display: block;
        position: absolute;
        top: 14px;
        right: 0;
        width: 90px;
        height: 54px;
        -webkit-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        -moz-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        background: #fff;
        border: 1px solid #99a8c3;
        border-radius: 10px;
        line-height: 54px;
        text-align: center;
        font-size: 24px;
        color: #4747a3;
    }*/
    .testTimer{
        display: block;
        position: absolute;
        top: -55px;
        left: 100px;
        width: 90px;
        height: 40px;
        /* -webkit-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36); */
        -moz-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        /* box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36); */
        background: #fff;
        border: 1px solid black;
        border-radius: 10px;
        /* line-height: 54px; */
        text-align: center;
        font-size: 24px;
        color: #33A478;
        font-family: Verdana, sans-serif;
    }
    .testTimer:before {
        content: 'Time Left:';
        display: inline-block;
        position: absolute;
        /* width: 100%; */
        top: 9px;
        left: -95px;
        font-size: 15px;
        color: #33A478;
         font-weight: 600; 
        line-height: 18px;
        /* margin-top: -18px; */
        height: 18px;
        text-align: center;
        /*letter-spacing: 1px;*/
    }
    /*.testTimer:before {
        content: 'TIME LEFT';
        display: block;
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
        font-size: 10px;
        font-weight: bold;
        line-height: 18px;
        margin-top: -18px;
        height: 18px;
        text-align: center;
    }*/
  /*  .timeSpeed{
        display: block;
        position: absolute;
        top: 120px;
        right: 0;
        width: 90px;
        height: 120px;
        padding: 0 10px 55px;
        -webkit-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        -moz-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        background: #fff;
        border: 1px solid #99a8c3;
        border-radius: 10px;
        line-height: 54px;
        text-align: center;
        font-family: Verdana, sans-serif;
        font-size: 24px;
        color: #4747a3;
    }
    .timeSpeed:before {
        content: 'TYPING SPEED';
        display: block;
        position: absolute;
        width: 100%;
        top: -2px;
        left: 0;
        font-size: 10px;
        font-weight: bold;
        line-height: 18px;
        margin-top: -18px;
        height: 18px;
        text-align: center;
    }
    .timeSpeed:after{
        content: 'WPM';
        display: block;
        font-size: 10px;
        font-weight: 300;
        color: #000;
        line-height: 18px;
        text-align: center;
        height: 18px;
        margin-top: -10px;
        border-bottom: 1px solid #858585;
    }*/
      .timeSpeed{
        display: block;
        position: absolute;
        top: 55px;
        right: 0;
        width: 90px;
        /* height: 120px; */
        padding: 0 10px 9px;
        /* -webkit-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36); */
        -moz-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        /* box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36); */
        background: #fff;
        border: 1px solid black;
        border-radius: 10px;
        line-height: 30px;
        text-align: center;
        font-family: Verdana, sans-serif;
        font-size: 24px;
        color: #33A478;
    }
    .timeSpeed:before {
        content: 'Typing Speed';
        display: block;
        position: absolute;
        width: 100%;
        top: -26px;
        left: 0;
        font-size: 15px;
        font-weight: 600;
        line-height: 18px;
        margin-top: -18px;
        height: 18px;
        text-align: center;
    }
    .timeSpeed:after{
       content: 'WPM';
        display: block;
        font-size: 10px;
        font-weight: 300;
        color: #000;
        line-height: 30px;
        text-align: center;
        height: 18px;
        margin-top: -10px;
         /*border-bottom: 1px solid #858585;*/
    }
     .errorCount{
       display: block;
        position: absolute;
        top: 175px;
        right: 0;
        width: 90px;
        /* height: 120px; */
        padding: 0 10px 16px;
        /* -webkit-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36); */
        -moz-box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36);
        /* box-shadow: inset 0 0 8px rgba(0, 0, 0, 0.36); */
        background: #fff;
        border: 1px solid black;
        border-radius: 10px;
        line-height: 30px;
        text-align: center;
        font-family: Verdana, sans-serif;
        font-size: 24px;
        color: #33A478;
    }
    .errorCount:before {
        content: 'mistyped words';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        display: block;
        font-size: 10px;
        font-weight: 300;
        color: #000;
        line-height: 18px;
        text-align: center;
        height: 18px;
    }
    .errorCount:after{
        content: 'Errors';
        display: block;
        position: absolute;
        width: 100%;
        left: 0;
        font-size: 15px;
        font-weight: bold;
        line-height: 30px;
        margin-top: -60px;
        height: 18px;
        text-align: center;
    }   
   /* .errorCount{
        display: block;
        position: absolute;
        top: 120px;
        right: 0;
        line-height: 54px;
        text-align: center;
        font-family: Verdana, sans-serif;
        font-size: 24px;
        color: #4747a3;
        width: 90px;
        margin-top: 55px;
    }
    .errorCount:before {
        content: 'mistyped words';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        display: block;
        font-size: 10px;
        font-weight: 300;
        color: #000;
        line-height: 18px;
        text-align: center;
        height: 18px;
    }
    .errorCount:after{
        content: 'ERRORS';
        display: block;
        position: absolute;
        width: 100%;
        left: 0;
        font-size: 10px;
        font-weight: bold;
        line-height: 18px;
        margin-top: 10px;
        height: 18px;
        text-align: center;
    }   */
  /*  .test-cancel{
        font-size: 18px;
        color: #4747a3;
        position: absolute;
        width: 90px;
        top: 270px;
        right: 0;
        text-align: center;
        cursor: pointer;
        font-weight: 500;
    }*/
    .test-cancel {
        font-size: 18px;
        color: #33A478;
        /* position: absolute; */
        width: 90px;
        margin-top: -437px;
        margin-right: -470px;
        /* text-align: center; */
        cursor: pointer;
        font-weight: 500;
    }
    div.disabled
    {
        pointer-events: none;
        opacity: 0.7;
    }
    .done{
        background: #33A478;
        color: black;
        padding: 6px 25px;
        border-radius: 10px;
        border: 2px solid #33A478;
        font-size: 18px;
        font-weight: 500;
    }
    </style>        
</head>
<body style="background: #f0f0f0">
<form method="POST"  action="<?=base_url().'typing-test/result';?>">
<div class="container-fluid speedContainer">
    <img src="https://skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="srlogo">
</div><br><br>

<div class="container" align="center">
    <div class="row justify-content-center">
        <div class="col-auto">
            <div class="tstContiner typingModule" style="display: block;">
                
                    <div class="contentCntnr">
                        <div class="inner-border">
                        <div class="content">
                       <span id="msg"><!-- If you require IE8-9 support, use Bootstrap 3. It is the most stable version of Bootstrap, and it is still supported by the team for critical bugfixes and documentation changes. However, new features will NOT be added to it.If you require IE8-9 support, use Bootstrap 3. It is the most stable version of Bootstrap, and it is still supported by the team for critical bugfixes and documentation changes. However, new features will NOT be added to it.If you require IE8-9 support, use Bootstrap 3. It is the most stable version of Bootstrap, and it is still supported by the team for critical bugfixes and documentation changes. However, new features will NOT be added to it.If you require IE8-9 support, use Bootstrap 3. It is the most stable version of Bootstrap, and it is still supported by the team for critical bugfixes and documentation changes. However, new features will NOT be added to it.If you require IE8-9 support, use Bootstrap 3. It is the most stable version of Bootstrap, and it is still supported by the team for critical bugfixes and documentation changes. However, new features will NOT be added to it.If you require IE8-9 support, use Bootstrap 3. It is the most stable version of Bootstrap, and it is still supported by the team for critical bugfixes and documentation changes. However, new features will NOT be added to it. --></span>


                    </div>
                    </div>
                    </div>



                    <!-- <div class="tstwritng"></div> -->
                    <div class="tstwritngClick disabled" id="tstComplete" contenteditable="true">Click or tap here and start typing!</div>
                    <textarea class="tstwritng" id="testEditArea" spellcheck="false" autocomplete="off" autocapitalize="off" autocorrect="off" autofocus></textarea><br><br>


                    <button class="done" id="test_done">Done</button>
                    <!-- <div class="testTimer" id="timer"></div> -->
                    <div class="testTimer" id="timer"></div>
                    <div class="timeSpeed" id="WPM">0</div>
                    <div class="errorCount" id="MTW">0</div>
                    <div class="test-cancel" id="btn">Cancel</div>
        </div>
    </div>
</div>
<!-- <button type="submit">submit form</button> -->
</form>

<script type="text/javascript">



    const typeWords = document.getElementById('testEditArea');
    let startTime;
    let endTime;

    // const startTyping = () => {
    //     let date = new Date();
    //     startTime = date.getTime();
    // }

    // const endTyping = () => {
    //     let date = new Date();
    //     endTime = date.getTime(); // get time in seconds 

    //     let totalTime = ((endTime - startTime)/1000);  // convert in seconds

    //     let totalStr  = typeWords.value;

    //     // let wordCount = wordCounter(totalStr);  

    //     // let speed = Math.round((wordCount / totalTime) * 60 ); //calculate per minute

    //     // let finalMsg = " You have typed total at " + speed + " words per minutes."

    //     // $('#MTW').html(errorWords); 

    // }

    const btn = document.getElementById('btn');

    btn.addEventListener('click', function () {
        if (this.innerText == 'Cancel') {
            // typeWords.setAttribute("contentEditable", false);
            typeWords.disabled = true;
            let totalStr  = typeWords.value;
           // console.log(totalStr)
            $('#testEditArea').val('');
            // $("#tstComplete").text("Test Complete");
            clearInterval(timer);


          

            // endTyping();
        }
    });


    // word comparee
    // wordsCompare(msg.innerText,totalStr);

    // let wordsCompare = (str1, str2) => {
    //     console.log(str1,str2)
    // let words1 = str1.trim().split(/\s+/);
    // let words2 = str2.trim().split(/\s+/);

    // let cnt = 0;

    // words2.forEach(function (item, index) {
    //     if(item == words1[index]){
    //         cnt++;                     //If user typed string is matched with given string then count
    //     }
    // });

    // let errorWords = (words2.length - cnt);  // Substract user typed string with Given string
    //    // console.log(errorWords);
    //    return errorWords;

    // }    
   

//dfffffff
// $(function () {
//     $('#testEditArea')
//         .keyup(checkSpeed);
// });

var iLastTime = 0;
var iTime = 0;
var iTotal = 0;
var iKeys = 0;
// let startTypingFlag = 1;

// function checkSpeed() {

//     // if (startTypingFlag) {

//     //     startTyping();
//     //     startTypingFlag = 0;
//     // }

//     iTime = new Date().getTime();

//     if (iLastTime != 0) {
//         iKeys++;
//         iTotal += iTime - iLastTime;

//         iWords = $('#testEditArea').val().trim().split(/\s/).length;
//         $('#WPM').html(Math.round((iWords / iTotal) * 6000, 2)); 
//     }

//     iLastTime = iTime;

//     // let errorWords =  wordsCompare(msg.innerText, $('#testEditArea').val().trim());
//      // $('#MTW').html(errorWords); 
// }

// let startTime;

let firstSetStartTime = 1;
const checkSpeed = () => {


    if (firstSetStartTime == 1) {
        let date = new Date();

        startTime = date.getTime();
        firstSetStartTime=0;
    }

    let date = new Date();
    endTime = date.getTime(); // get time in seconds 

    let totalTime = ((endTime - startTime)/1000);  // convert in seconds
        totalTime = (totalTime) ? totalTime : 1;
    let totalStr  = typeWords.value;
    let wordCount = wordCounter(totalStr);  

    let speed = Math.round((wordCount / totalTime) * 60 ); //calculate per minute
    $('#WPM').html(speed); 
}


const wordCounter = (str) => {
    let response = str.trim().split(/\s+/).length;
    return response;
}


    // $( "#testEditArea" ).keypress(function() {
    //     $(".tstwritngClick").css("display","none")
    // });

    var seconds=parseInt(localStorage.getMinute) * 60;

    var timer;

    function myFunction() {

        checkSpeed();

        let min = parseInt(seconds/60);
        let sec = parseInt(seconds%60);

        if(seconds > 60) {
            document.getElementById("timer").innerHTML = min + ':' + sec;
        }


        if(seconds < 60) {
            document.getElementById("timer").innerHTML = 0 + ':' + seconds;
        }
         
        if (seconds >0 ) {
             seconds--;
        } else {
            // console.log('timer--------------------------------------')
            $('#testEditArea').empty();
             $('<p>Text</p>').appendTo('#tstComplete');
            typeWords.setAttribute("contentEditable", false);
            // console.log("timer2==================== ")
            let totalStr  = typeWords.value; 

            clearInterval(timer);
            // endTyping();

            // let  MTW = $('#MTW').text(); 

            // let WPM = $('#WPM').text();

           
            // localStorage.WPM = WPM;
            // localStorage.MTW = MTW;
            // window.location.href = 'speedtyping-new2.html';


            let timeleft = $('#timer').text();

            let minute = timeleft.split(":")[0];
            let second = timeleft.split(":")[1];

            localStorage.minute = minute;
            localStorage.second = second;

            let  MTW = $('#MTW').text(); 
            let WPM = $('#WPM').text();
            localStorage.WPM = WPM;
            localStorage.MTW = MTW;
            window.location.href = 'speedtyping-new2.html';

         }
    }

    document.getElementById("testEditArea").onkeypress = function() {
     
      if(!timer) {
        timer = window.setInterval(function() {
          myFunction();
        },1000);
      }
    } 


    let getMinute = localStorage.getMinute;

    document.getElementById("timer").innerHTML= parseInt(parseInt(getMinute) * 60)/60 +':0'
    ;  

    // document.getElementById("timer").innerHTML="01:00"; 


 const setOfWords = [
                "We at SkillRary strive to provide simple yet powerful training or tuition on all domains. This organization has started with a mindset to share the knowledge that the internet or an individual has in a progressive manner. SkillRary is an online training programme, trying to get the best content for all on a very low cost and thereby helping everyone with a digital schooling and online education.",
                "Jane is a hard working and ambitious young Engineer. She started a smooth career with good hike and lots of appreciation for her work. But with the passage of time, Jane understood that her skill sets are getting obsolete and she is not able to cope up with the new technology and process. But how to improve skills after such a tiring day at work! Not only Jane, but almost all of us has faced this crisis period in our professional life and got puzzled thinking that where to learn new Technology and how!! Here is the place where SkillRary can help you out. SkillRary is equipped with latest Online technological courses, VDOs, Live classes, notes and reminders, guidance by the best Academician and lots more. The classroom at skillRary opens as per your convenience. So learn, study and enjoy the smooth online training program through SkillRary",
                "SkillRary provides computer based training (CBT), distance learning or e-learning, that takes place completely on the internet. The courses involve a variety of multimedia elements, including graphics, audio, video, and web-links which can be accessed to the enrolled clients.In addition to presenting course materials and content, SkillRary gives the students the opportunity for live interactions and real-time feedback in the form of quizzes and tests. Interactions between the instructor and students are also conducted via chat, e-mail or other web-based communication. Unlike any other, we here also let the students know which module has to be gone through first. All the modules are placed according to the lesson plans so that students will know what to refer first.SkillRary is self-paced and customizable to suit an individual's specific learning needs. Therefore it can be conducted at any time and place, provided there is a computer or smartphone with high-speed internet access. This makes it very convenient to the users who can modify their training to fit into their day-to-day schedule. All our users will be able to use our eLearning system to its full capacity."


                        ];


    const msg = document.getElementById('msg');
    var randomNumber = Math.floor(Math.random() * setOfWords.length);
    msg.innerText = setOfWords[randomNumber];
    // console.log(msg.innerText)

</script>


<!-- <script type="text/javascript">
    
    // $('#testEditArea').keypress(function () {
        // $('#tstComplete').text('');




// $('#testEditArea').val("testEd111111111111111111itAreaWordStr");
//     });


// let getMinute = localStorage.getMinute;

    // document.getElementById("timer").innerHTML= parseInt(getMinute) * 60;

</script> -->

<script>










    
$(document).ready(function(){
    
    $('#testEditArea').keyup(function () {

        $('#tstComplete').text('');
        var msgWordStr = "";
        let userTyped = $(this).val();
        let userTypedSplit = userTyped.trim().split(/\s+/);

        let userTypedChaaracters = userTyped.trim().length;          
        // let userTypedChaaracters = userTyped.trim().split(/\s+/).join(' ').length;

        localStorage.userTypedChaaracters = userTypedChaaracters;

        let msg = $('#msg').text();
        let msgSplit = msg.trim().split(/\s+/);

        // start compare word by word 
        let correctWordNeed = 0;
        for (var i = 0;  i < msgSplit.length; i++) {

            if (msgSplit[i] == userTypedSplit[i]) {
            
                msgWordStr += "<b style='color:#808080;'> "+msgSplit[i]+" </b>";
            }

             else if (msgSplit[i] != userTypedSplit[i] && userTypedSplit[i] == undefined) {
            correctWordNeed = correctWordNeed + 1;
                msgWordStr += "<span style='color:#212529;'> "+msgSplit[i]+" </span>";
            }


            else if (msgSplit[i] != userTypedSplit[i]) {
                msgWordStr += " "+"<b style='color:red;'> "+msgSplit[i]+" </b>";
                correctWordNeed = correctWordNeed + 1;

            }
          


        }

        $('#msg').html(msgWordStr);

        let correctWord= msgSplit.length - correctWordNeed;

        let countWordError = userTypedSplit.length - correctWord;
        $('#MTW').html(countWordError);



//         var testEditAreaWordStr = "";
//         for (var j = 0;  j < userTypedSplit.length; j++) {

//             if (msgSplit[j] == userTypedSplit[j]) {
//                 testEditAreaWordStr += '<b style="color:red;"> '+userTypedSplit[j]+' </b>';
//             }else{
//                 testEditAreaWordStr += " "+userTypedSplit[j];
//             }
//         }

    // $(this).html(testEditAreaWordStr);


        // // start compare character by character
        // var msgStr = "";

        // for (var i = 0; i < msg.length; i++) {
        //         if(msg[i] == userTyped[i]){
        //             msgStr += "<b style='color:green;'>"+msg[i]+"</b>";
        //         }else if(msg[i] == " "){
        //             msgStr += " ";;
        //         }else{
        //             msgStr += msg[i];
        //         }
        // }

        // $('#msg').html(msgStr);

    });
});



    $("#test_done").click(function (event) {

        event.preventDefault();

        let timeleft = $('#timer').text();

        let minute = timeleft.split(":")[0];
        let second = timeleft.split(":")[1];

        localStorage.minute = minute;
        localStorage.second = second;

        let  MTW = $('#MTW').text(); 
        let WPM = $('#WPM').text();
        localStorage.WPM = WPM;
        localStorage.MTW = MTW;
        window.location.href = 'result';

    });


</script>


</body>
</html>