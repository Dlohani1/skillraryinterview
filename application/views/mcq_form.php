<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
    <title>MCQ Form</title>
    <style type="text/css">

        html{
            position:relative; 
            min-height: 100%;
        }
        .timeDiv{
            margin-top: 2%;
        }
        .optionList{
            list-style-type: none;
            margin: 0px;
            padding: 0px;
            line-height: 42px;
        }
        .questionSection{
            min-height:calc(65vh - 60px);
        }

        .countColor {
            color:white;
        }

        .footer{
            height:30px;
        }
        .column {
            float: left;
            width: 80%;
            padding: 10px;
            
        }
        .column1 {
            float: left;
            width: 20%;
            padding: 10px;
            border: 2px solid black;
            /* margin-top: 8%;*/
            /* height: 85vh; */
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .icon{
            float: left;
            font-size: 32px;
        }
        .content{
            margin-left: 40px;
            margin-top: 12px;
            position: absolute;
        }

        #checkIcon{
            font-size: 10px;
            background: mediumseagreen;
            padding: 5px;
            left: -12px;
            top: 13px;
            position: relative;
            border-radius: 10px;
            color: white;
        }
        .parent {
            margin-top: 4%;
            display: flex;
            flex-wrap: wrap;
            height: 300px;
            overflow: hidden;
            overflow-y: auto;
        }
        .child {
            width: 25%;
            box-sizing: border-box;
            text-align: center;
        }
        .iconAnswered{
            font-size: 24px;
        }
        .saveBtn{
            background: #33A478;
            border: 2px solid #33A478;
            padding: 6px 5px;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            font-size: 18px;
            width: 240px;
            margin-left: 30px;
        }
        .saveBtn1{
            background: purple;
            border: 2px solid purple;
            padding: 6px 13px;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            font-size: 18px;
            width: 240px;
            margin-bottom: 5px;
        }

        .clearBtn{
            background: grey;
            border: 2px solid grey;
            padding: 6px 13px;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            font-size: 18px;
            width: 240px;
            margin-bottom: 5px;
            margin-left: 15px;
        }

        .submitBtn{
            background: #33A478;
            border: 2px solid #33A478;
            color: white;
            font-size: 18px;
            padding: 5px 19px;
            border-radius: 5px;
            font-weight: 600;
            margin-top: 15%;
        }
        #questionMCQ{
            color: #33A478;
            font-size: 20px;
            font-weight: 600;
        }
        .bntbtn{
            padding: 5px;
            width: 100%;
            background: #33A478;
            border: 2px solid #33a478;
            font-size: 20px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .box1{
            padding: 6px 10px;
            font-size: 22px;
            border-radius: 5px;
            background: #28A745;
        }
        .box2{
            padding: 6px 10px;
            font-size: 22px;
            border-radius: 5px;
            background: #DC3545;
        }
        .box3{
            padding: 6px 10px;
            font-size: 22px;
            border-radius: 5px;
            background: #6C757D;
        }
        .box4{
            padding: 6px 10px;
            font-size: 22px;
            border-radius: 5px;
            background: purple;
        }
        .box5{
            padding: 6px 10px;
            font-size: 22px;
            border-radius: 5px;
            background: skyblue;   
        }
        .firstbox{
            margin: 20px 0px;
        }
        .imgProfile{
            width: 100px;
            border-radius: 20px;
        }
        .username{
            padding-left: 20px;
            position: absolute;
            line-height: 30px;
        }
        .closeBtn{
            background: #33A478;
            border: 1px solid #33A478;
            padding: 6px 20px;
            border-radius: 5px;
        }
        .closeBtnRow{
            margin-bottom: 0px;
            float: right;
        }
        @media only screen and (max-width: 600px){
            .column {
                float: left;
                width: 55%;
                padding: 10px;
            }
            .column1 {
                float: left;
                width: 45%;
                padding: 10px;
                border: 2px solid black;
            }
            .imgProfile{
                width: 100px;
                border-radius: 20px;
            }
            .username {
                padding-left: 11px;
                position: inherit;
                line-height: 30px;
            }
            .iconAnswered {
                font-size: 14px;
            }
            .saveBtn{
                background: #33A478;
                border: 2px solid #33A478;
                padding: 6px 5px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }
            .saveBtn1{
                background: purple;
                border: 2px solid purple;
                padding: 6px 13px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }

            .clearBtn{
                background: grey;
                border: 2px solid grey;
                padding: 6px 13px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }
            .mobileno{
                margin-left: 10px;
            }
            .gender{
                margin-left: 10px;
            }
        }
        @media all and (device-width: 768px) and (device-height: 1024px) and (orientation:portrait) {
            .column {
                float: left;
                width: 76%;
                padding: 10px;
            }
            .column1 {
                float: left;
                width: 24%;
                padding: 10px;
                border: 2px solid black;
            }
            .imgProfile{
                width: 100px;
                border-radius: 20px;
            }
            .username {
                padding-left: 11px;
                position: inherit;
                line-height: 30px;
            }
            .iconAnswered {
                font-size: 14px;
            }
            .saveBtn{
                background: #33A478;
                border: 2px solid #33A478;
                padding: 6px 5px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }
            .saveBtn1{
                background: purple;
                border: 2px solid purple;
                padding: 6px 13px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }

            .clearBtn{
                background: grey;
                border: 2px solid grey;
                padding: 6px 13px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }
            .mobileno{
                margin-left: 10px;
            }
            .gender{
                margin-left: 10px;
            }
            .content{
                margin-top: inherit;
                margin-left: inherit;
                position: inherit;
            }
            .buttonRow{
                display: block;
            }
        }
        @media only screen and (min-width: 1024px) and (max-width: 1366px) and (-webkit-min-device-pixel-ratio: 1.5) {
            .column {
                float: left;
                width: 76%;
                padding: 10px;
            }
            .column1 {
                float: left;
                width: 24%;
                padding: 10px;
                border: 2px solid black;
            }
            .imgProfile{
                width: 190px;
                border-radius: 20px;
            }
            .username {
                padding-left: 11px;
                position: inherit;
                line-height: 30px;
            }
            .iconAnswered {
                font-size: 14px;
            }
            .saveBtn{
                background: #33A478;
                border: 2px solid #33A478;
                padding: 6px 5px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }
            .saveBtn1{
                background: purple;
                border: 2px solid purple;
                padding: 6px 13px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }

            .clearBtn{
                background: grey;
                border: 2px solid grey;
                padding: 6px 13px;
                border-radius: 5px;
                color: white;
                font-weight: 600;
                font-size: 18px;
                width: 170px;
            }
            .mobileno{
                margin-left: 10px;
            }
            .gender{
                margin-left: 10px;
            }
            .content{
                margin-top: inherit;
                margin-left: inherit;
                position: inherit;
            }
            .buttonRow{
                display: block;
            }
        }
</style>
    <script>
        function closeBtn(){
            console.log('unload test');
            //window.location.href="user/view-results";
            window.close();
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="column">
                <!-- <div class="row">
                    <div class="col-md-12 text-right">
                        <p class="closeBtnRow"><button class="closeBtn" style="margin-left:10px" onclick="closeBtn()">Close</button></p>
                    </div>
                   
                </div><hr> -->
                <div class="row">
                    <div class="col-md-12 text-right">
                        <!-- Time Left: 20:00 -->
                         <div id="showtime"></div>
                    </div>
                </div>
                <hr>
                <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <button id="section1" class="bntbtn" onclick="getQuestion(1)">English</button>
                    </div>
                    <div class="col-md-3">
                        <button id="section2" class="bntbtn" disabled onclick="getQuestion(2)">Reasoning</button>
                    </div>
                    <div class="col-md-3">
                        <button id="section3" class="bntbtn" disabled onclick="getQuestion(3)">Quantitative</button>
                    </div>
                    <div class="col-md-3">
                        <button id="section4" class="bntbtn" disabled onclick="getQuestion(4)">Code Test</button>
                    </div>
                </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-8 offset-md-1" id="questionMCQ">Question Type : MCQ</div>
                    <div class="col-md-6 text-right" onload="starttime()">
                        <!-- Marks for Correct Answer | Negative Marks : 0.33 -->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div id="questionId" class="col-md-8 offset-md-1"></div>
<!--                     <div id ="code-test" style="display:none">
                      Select Language : 
                      <select id="code-lang">
                        <option value="0">Select </option>
                        <option value="1">Java </option>
                        <option value="2">Python</option>
                    </select>

                    <button onclick="loadIframe()">Start Test </button>
                    </div> -->
                     <div id="code-test" style="display:none" class="container-fluid">
                        <div class="row">
                            <div class="col-md-4 offset-md-1"> Select Language : </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <select id="code-lang" class="form-control">
                                    <option value="0">Select </option>
                                    <option value="1">Java </option>
                                    <option value="2">Python</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button onclick="loadIframe()" style="background: #33A478;padding: 7px 8px;
                                    border: 1px solid #33A478;">
                                    Start Test
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
              <!--   <hr> -->

                <input type="hidden" id="sectionId" value="1" />
                <input type="hidden" id="totalQuestion" value="0" />
                <input type="hidden" id="totalTime" />
                <input type="hidden" id="questionIdSave" />
                <input type="hidden" id="saveAnsId" />
                <input type="hidden" id="studentSessionId" value=<?php echo $_SESSION['id']; ?> />
                <input type="hidden" id="codeTestId" value=<?php echo $_SESSION['codeTestId']; ?> />
                <input type="hidden" id="mcqSessionId" value=<?php echo $_SESSION['mcqId']; ?> />
                <input type="hidden" id = "countdown" />
                <div class="questionSection">
                    <div class="row">
                        <div class="col-md-8 offset-md-1">
                            <p id="questionData"></p>
                    <div>
                        <ul id="optionsList" class="optionList">
                        </ul>
                    </div>
<!-- <div id="save-next" style="margin-top: 10%">
<button class="saveBtn" onclick="saveNext()">Save & Next</button>
</div> -->
<div class="row buttonRow" style="margin-top:10%">
    <div class="col-md-4"  id="mark-btn">
        <button class="saveBtn1" onclick="saveNext(1)">Mark for Review & Next</button>
    </div>
    <div class="col-md-4"  id="clear-btn">
        <button class="clearBtn" onclick="clearResponse()">Clear Response</button>
    </div>
    <div class="col-md-4" id="save-next" >
        <button class="saveBtn" onclick="saveNext(2)">Save & Next</button>
    </div>
</div>
                   <iframe id="myIframe" style="width:100%;height:100%; display: none"></iframe>
                        </div>
                    </div>
                </div>

                                <div class="footer">
                    <div class="row" style="margin: 0px;padding: 0px;">
                        <div class="col-md-7">
                           <!--  <div class="row">
                                <div class="col-md-6">
                                    <button class="saveBtn1">Mark for Review & Next</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="saveBtn" onclick="clearResponse()">Clear Response</button>
                                </div>
                            </div> -->
                        </div>
                       <!-- <div id="save-next" class="col-md-5 text-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="saveBtn" onclick="saveNext()">Save & Next</button>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
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
            <div class="column1" id="questionPallate">

                <div class="firstbox">
<span><img src=<?php echo base_url().$img;?> class="imgProfile"/></span>
<span class="username">
<span>Name: <?php echo $userData['first_name']." ".$userData['last_name'] ; ?></span><br/>
<span class="mobileno">Mobile: <?php echo $userData['contact_no']; ?></span><br/>
<span class="gender">Gender: <?php if ($_SESSION['userGender'] == "1") {echo "Male";} else { echo "Female";}?></span>
</span>
</div>
                <div>
                    <div class="row" style="margin:0px;padding:0px;">
<div class="col-md-6">
<div>
<p class="icon"><span class="box1"><span class="countColor" id="ansCount" style="visibility: hidden;">0</span></span></p>
<p class="content">Answered</p>
</div>
</div>
<div class="col-md-6">
<div>
<!-- <p class="icon"><span class="box2"><span style="visibility: hidden;">5</span></span></p>
<p class="content">Not Answered</p>
 -->
<p class="icon"><span class="box3"><span class="countColor" id="notViewed" style="visibility: hidden;">5</span></span></p>
<p class="content">Not Viewed</p>

</div>
</div>
</div><br/>

<div class="row" style="margin:0px;padding:0px;">
<div class="col-md-6">
<div>
<p class="icon"><span class="box5"><span class="countColor" id="viewedCount"style="visibility: hidden;">0</span></span></p>
<!-- <p class="content">Not Visited</p> -->
<p class="content">Viewed</p>
</div>
</div>
<div class="col-md-6">
<div>
<p class="icon"><span class="box4"><span class="countColor" id="markedCount" style="visibility: hidden;">0</span></span></p>
<p class="content">Marked For Review</p>
</div>
</div>
</div><br/>

<div class="row" style="margin:0px;padding:0px;">
<div class="col-md-12">
<div>
<!--<p class="icon"><span class="box4"><span style="visibility: hidden;">5</span></span></p><i class="fa fa-check" id="checkIcon" aria-hidden="true"></i></p>
<p class="content1">Answered & Marked for Review</p>-->
</div>
</div>
</div>
                </div>
                <hr>
                <div class="row"  style="margin:0px;padding:0px;">
                    <p></p>
                </div>
                <hr>
                <div>
                    <p>Choose a Question</p>
                    <div id="question_no" class="parent">
                        <p class="child" style="display:none"><span class="badge badge-secondary" id="iconAnswered">1</span></p>

                    </div>
                </div><br/>
               <!--  <div class="container">

                        <div align="center">
                           
                            <button class="submitBtn">Submit</button>
                        </div>
  
                </div> -->
            </div>
        </div>
    </div>

<script>
$( document ).ready(function() {
    
//$('#section').empty()
    //var dropDown = document.getElementById("carId");
    //var carId = dropDown.options[dropDown.selectedIndex].value;
    
  getQuestion(1)
});

function loadIframe() {

    var id = document.getElementById("code-lang").value;
    if (id > 0) {
        var mcqId = document.getElementById("mcqSessionId").value;
    var userId  = document.getElementById("studentSessionId").value;
    var codeId = document.getElementById("codeTestId").value;
    var url = "https://code.skillrary.com/url_assessment/"+userId+"/"+id+"/"+codeId+"/"+mcqId;
    var win = window.open(url, "_self", "fullscreen=1,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no");
    // document.getElementById('myIframe').src = "https://code.skillrary.com/url_assessm"+userId+"/"+id+"/9";

    // document.getElementById("myIframe").style.display = 'block';

//     win.onunload = function() {
//   if (window.opener && typeof(window.opener.onPopupClosed) == 'function') {
//     window.opener.onPopupClosed();
//   }
// };

// window.onPopupClosed = function() {
//   alert("You closed the pop up!");
// };
win.onbeforeunload = function(){
        console.log('unload test');
        window.location.href="user/home";
    }    
    } else {
        alert('Please select a language to code')
    }
    
}

function getQuestion(sectionId) {
    if (sectionId == 1) {

        setTime();
    }
    if (sectionId == 4) {
        document.getElementById("code-test").style.display = 'block';
        document.getElementById("questionId").style.display = 'none';    
        document.getElementById("questionData").style.display = 'none';
        document.getElementById("optionsList").style.display = 'none';
        document.getElementById("optionsList").style.display = 'none';
        document.getElementById("questionMCQ").innerHTML="Code Test";
        document.getElementById("showtime").style.display = 'none';
        document.getElementById("questionPallate").style.display = 'none';        
        document.getElementById("save-next").style.display = 'none';
        document.getElementById("clear-btn").style.display = 'none';
        document.getElementById("mark-btn").style.display = 'none';
        
    } else {
        var mcqId = document.getElementById("mcqSessionId").value;
        var student = document.getElementById("studentSessionId").value;
        $.ajax({
            type: "POST",
            url: "getQuestion",
            data:{"id":student, "section_id":sectionId, "mcq_id":mcqId},
            success: function(data){
                var opts = $.parseJSON(data);
                console.log('total', opts[0].total);
                console.log('data', opts[0].questions);

                document.getElementById("totalQuestion").value = opts[0].total;
                
                document.getElementById("notViewed").innerHTML = parseInt(opts[0].total)-1;
                document.getElementById("notViewed").style.visibility = "visible";
                document.getElementById("viewedCount").style.visibility = "visible";
                document.getElementById("totalTime").value = opts[0].time;
                document.getElementById("markedCount").style.visibility = "visible";
                document.getElementById("ansCount").style.visibility = "visible";
                // Parse the returned json data
                // var opts = $.parseJSON(data);
                // // Use jQuery's each to iterate over the opts value
                // $.each(opts, function(i, d) { console.log('d',d);
                //     // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                //     $('#section').append('<option value="' + d.id + '">' + d.name + '</option>');
                // });
                $('#question_no').empty()
                $.each(opts[0].questions, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    var j = i;
                    var k = i;
                    $('#question_no').append("<p class='child'><span class='badge badge-secondary iconAnswered' id='iconAnswered"+ ++k + "' onclick='fetchQuestion("+d+","+ ++j +")'>"+ ++i +"</span></p>");
                });
                console.log('a')
                window.totalsec = document.getElementById("totalTime").value;
                
                starttime();
                fetchQuestion(opts[0].questions[0], 1);
            }
        });
    }
}

function fetchQuestion(id,no) {
    if (document.getElementById("iconAnswered"+no).style.backgroundColor != "purple" && document.getElementById("iconAnswered"+no).style.backgroundColor != "green" ) {
         if (document.getElementById("iconAnswered"+no).style.backgroundColor != "lightblue") {
              var val = document.getElementById("notViewed").innerHTML ;
                if (no > 1 && val != 0) {               

                document.getElementById("notViewed").innerHTML  =  parseInt(val) - 1;
                }
                document.getElementById("iconAnswered"+no).style.backgroundColor = "lightblue";
                var viewedCount = document.getElementById("viewedCount").innerHTML;
                document.getElementById("viewedCount").innerHTML = parseInt(viewedCount) + 1;       
         }
        
       
    }
     
    
    document.getElementById("questionId").innerHTML = "Question No. "+no;
    //$( "#iconAnswered"+id ).toggleClass( "a", addOrRemove );
    document.getElementById("questionIdSave").value = id;
    var mcqId = document.getElementById("mcqSessionId").value;
    var student = document.getElementById("studentSessionId").value;

    $.ajax({
            type: "POST",
            url: "fetchQuestion",
            data:{"id":student, "section_id":1, "mcq_id": mcqId, "question_id":id},
            success: function(data){
                var opts = $.parseJSON(data);
                console.log('total', opts.userAnswer.id);
                document.getElementById("questionData").innerHTML= opts.question;
                // console.log('data', opts[0].questions);
                // // Parse the returned json data
                // // var opts = $.parseJSON(data);
                // // // Use jQuery's each to iterate over the opts value
                // // $.each(opts, function(i, d) { console.log('d',d);
                // //     // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                // //     $('#section').append('<option value="' + d.id + '">' + d.name + '</option>');
                // // });
                $('#optionsList').empty()
                $.each(opts.options, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    var sel = "";
                    if (undefined !== opts.userAnswer.id) {
                        if (d.id == opts.userAnswer.id) {
                            sel = "checked";
                        }
                    }
                    $('#optionsList').append("<li> <input  "+sel+" name='answer' type='radio' onclick='saveAns(this)' value="+ d.id +"> "+ d.option+" </li>");
                });
                
                if (document.getElementById("countdown").value > 0) {
                    clearTime();
                    setTime();
                }

            }
        });
}

function saveAns(ans) {
    console.log('ans', ans.value)

    document.getElementById("saveAnsId").value = ans.value;
}

function clearTime(){
     console.log('aadd', window.countdownTimer)
      clearTimeout(countdownTimer);
}

function saveNext(isMarked, timeUp = false) {
    
                
    var checkRadio = document.querySelector( 
        'input[name="answer"]:checked'); 
      
    if(checkRadio != null || (document.getElementById("countdown").value == window.totalsec)) {
        var str = document.getElementById("questionId").innerHTML;
        var res = str.split(".");
        console.log('rr', "iconAnswered"+res[1].trim());

        if (isMarked == 1) {
                //alert('aa')
            if (document.getElementById("iconAnswered"+res[1].trim()).style.backgroundColor != "purple") {

                if (document.getElementById("iconAnswered"+res[1].trim()).style.backgroundColor == "green") {
                    
                    var ansCount = document.getElementById("ansCount").innerHTML;

                    document.getElementById("ansCount").innerHTML = parseInt(ansCount) - 1;   
                } 

                document.getElementById("iconAnswered"+res[1].trim()).style.backgroundColor = "purple";
                var markedCount = document.getElementById("markedCount").innerHTML;

                document.getElementById("markedCount").innerHTML = parseInt(markedCount) + 1;  

                
            }              

        } else {
            if (document.getElementById("iconAnswered"+res[1].trim()).style.backgroundColor != "green") {

                if (document.getElementById("iconAnswered"+res[1].trim()).style.backgroundColor == "purple") {
                    
                    var markedCount = document.getElementById("markedCount").innerHTML;

                    document.getElementById("markedCount").innerHTML = parseInt(markedCount) - 1;   
                }

                var ansCount = document.getElementById("ansCount").innerHTML;

                document.getElementById("ansCount").innerHTML = parseInt(ansCount) + 1;
                document.getElementById("iconAnswered"+res[1].trim()).style.backgroundColor = "green";

            }
                
        }
        // document.getElementById("iconAnswered"+res[1].trim()).style.backgroundColor = "green";  
        console.log('checked');
        var qno = document.getElementById("questionId").innerHTML;

        var res = qno.split(" ");
        var b = parseInt(res[2])+1;
        console.log('bb', b);

        var sectionId = document.getElementById("sectionId").value;
        var questionId = document.getElementById("questionIdSave").value;
        var ansId = document.getElementById("saveAnsId").value;
        var student = document.getElementById("studentSessionId").value;
        var mcqId = document.getElementById("mcqSessionId").value;
        var timeTaken = document.getElementById("countdown").value;
        $.ajax({
            type: "POST",
            url: "saveAnswer",
            data:{"student_id":student, "answer_id":ansId, "section_id": sectionId, "mcq_id":mcqId, "question_id":questionId,"time_taken":timeTaken},

            success: function(data){
                console.log('ansr', data)
            }
        });



        if (b > document.getElementById("totalQuestion").value) {console.log('t')

            if (document.getElementById("sectionId").value == 1) {
                document.getElementById("sectionId").value = 2;
                document.getElementById("section1").disabled = true;
                document.getElementById("section2").disabled = false;
                
                // var yes = confirm("Please confirm to Submit. This will take you to next section");
  
                // if (yes){
                //     //alert('yes');
                    
                //     clearCount();
                //     $("#section2").click();
                // }

                clearTimeout(tim);
                $("#section2").click();
            } else if (document.getElementById("sectionId").value == 2) {
                document.getElementById("sectionId").value = 3;
                document.getElementById("section2").disabled = true;
                document.getElementById("section3").disabled = false;
                clearTimeout(tim);
                // var yes = confirm("Please confirm to Submit. This will take you to next section");
  
                // if (yes){
                //     //alert('yes');
                //     clearCount();
                //     $("#section3").click();
                // }

                clearCount();
                $("#section3").click();
                
            }  else if (document.getElementById("sectionId").value == 3) {
                document.getElementById("sectionId").value = 4;
                document.getElementById("section3").disabled = true;
                document.getElementById("section4").disabled = false;
                clearTimeout(tim);
                
                // var yes = confirm("Please confirm to Submit. This will take you to next section");
  
                // if (yes){
                //     //alert('yes');
                //     clearCount();
                //     $("#section4").click();
                // }

                clearCount();
                $("#section4").click();

            } else {
                window.location.href="redirect-to-code";
            }


            
        } else {
            $("#iconAnswered"+b).click();
            // if (isMarked == 1) {
            //     //alert('aa')
            //     document.getElementById("iconAnswered"+res[1].trim()).style.backgroundColor = "darkblue";  

            // }
            //$("#iconAnswered"+b).click();    
        }
    } 
    else {
        if (!timeUp) {
            alert('Please check atleast one option');    
        }
        
        console.log('No one selected');
    }
     
}

function lastSave() {
     var sectionId = document.getElementById("sectionId").value;
        var questionId = document.getElementById("questionIdSave").value;
        var ansId = document.getElementById("saveAnsId").value;
        var student = document.getElementById("studentSessionId").value;
        var mcqId = document.getElementById("mcqSessionId").value;
        var timeTaken = document.getElementById("countdown").value;
        $.ajax({
            type: "POST",
            url: "saveAnswer",
            data:{"student_id":student, "answer_id":ansId, "section_id": sectionId, "mcq_id":mcqId, "question_id":questionId,"time_taken":timeTaken},

            success: function(data){
                console.log('ansr', data)
            }
        });
}

function clearCount() {
    document.getElementById("ansCount").innerHTML = 0;
    document.getElementById("markedCount").innerHTML = 0;
    document.getElementById("viewedCount").innerHTML = 0;
    document.getElementById("notViewed").innerHTML = 0;
}

function clearResponse() {
    $('input[name="answer"]').prop('checked', false);
} 

</script>
 <script>

    function InitializeMap() 
       {
           document.onkeydown = function () {
            if (122 == event.keyCode) {
                event.keyCode = 0;
                return false;
       }
      }
}

window.onload = InitializeMap;

// function disableF5(e) { if ((e.which || e.keyCode) == 116 || 82) e.preventDefault(); };
// $(document).on("keydown", disableF5);

window.onload = function() {
    document.addEventListener("contextmenu", function(e){
      e.preventDefault();
    }, false);
    document.addEventListener("keydown", function(e) {
    //document.onkeydown = function(e) {
    // F5 Key
    if ((e.which || e.keyCode) == 116){
        disabledEvent(e);
    }
      // "I" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
        disabledEvent(e);
      }
      // "J" key
      if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
        disabledEvent(e);
      }
       // "R" key
       if (e.ctrlKey && e.shiftKey && e.keyCode == 82) {
        disabledEvent(e);
      }
      // "S" key + macOS
      if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
        disabledEvent(e);
      }
      // "U" key
      if (e.ctrlKey && e.keyCode == 85) {
        disabledEvent(e);
      }
      // "F12" key
      if (event.keyCode == 123) {
        disabledEvent(e);
      }
    }, false);
    function disabledEvent(e){
      if (e.stopPropagation){
        e.stopPropagation();
      } else if (window.event){
        window.event.cancelBubble = true;
      }
      e.preventDefault();
      return false;
    }
  };


    var countdownTimer;

    function setTime() {

        var seconds = 0;
        countdownTimer = setInterval(function() {
            ++seconds;

            document.getElementById("countdown").value = seconds;
        }, 1000);
    }

    var pos = 0,
      test, test_status, question, choice, choices, chA, chB, chC, correct = 0;

    // var questions = [
    //   ["Which of the following a is not a keyword in Java ?", "class", "interface", "extends", "C"],

    //   ["Which of the following is an interface ?", "Thread", "Date", "Calender", "A"],

    //   ["Which company released Java Version 8 ?", "Sun", "Oracle", "Adobe", "A"],

    //   ["What is the length of Java datatype int ?", "32 bit", "16 bit", "None", "C"],

    //   ["What is the default value of Java datatype boolean?", "true", "false", "0", "A"]
    // ];

   

    // function checkAnswer() {
    //   choices = document.getElementsByName("choices");
    //   choice = -1;
    //   for (var i = 0; i < choices.length; i++) {
    //     if (choices[i].checked) {
    //       choice = choices[i].value;
    //     }
    //   }
    //   if (choice == questions[pos][4]) {
    //     correct++;
    //   }
    //   pos++;
    //   //renderQuestion();
    // }

    //window.addEventListener("load", renderQuestion, false);


    function EndExam() {

        //location.href = "Loginpage.htm";
        // document.getElementById("section1").disabled = true;
        //     document.getElementById("section2").disabled = false;
        //     $("#section2").click();
            //starttime();


        if (document.getElementById("sectionId").value == 1) {
            document.getElementById("sectionId").value = 2;
            document.getElementById("section1").disabled = true;
            document.getElementById("section2").disabled = false;
            $("#section2").click();
        } else if (document.getElementById("sectionId").value == 2) {
            document.getElementById("sectionId").value = 3;
            document.getElementById("section2").disabled = true;
            document.getElementById("section3").disabled = false;
            $("#section3").click();
        } else if (document.getElementById("sectionId").value == 3) {
                document.getElementById("sectionId").value = 4;
                document.getElementById("section3").disabled = true;
                document.getElementById("section4").disabled = false;
                clearTimeout(tim);
                
                // var yes = confirm("Please confirm to Submit. This will take you to next section");
  
                // if (yes){
                //     //alert('yes');
                //     clearCount();
                //     $("#section4").click();
                // }

                clearCount();
                $("#section4").click();

            }else {
            $("#section1").click();
        }
        
    }


    // var tim;
    // var showscore = Math.round(correct / questions.length * 100);
    var totalsec = 10;
    // var totalsecoriginal = totalsec;
    // var f = new Date();

    function starttime() {
      showtime();
    }

    function showtime() {
        console.log('showtime', totalsec);
        // first check if exam finished
        // if (pos >= questions.length) {
        //     console.log('end');
        //     clearTimeout(tim);
        //     return;
        // }

        // 1 seconde eraf
        totalsec--;
        
        var min = parseInt(totalsec / 60, 10);
        var sec = totalsec - (min * 60);
        
          if (parseInt(sec) > 0) {
            document.getElementById("showtime").innerHTML = "Your Left Time is :" + min + " Minutes :" + sec + " Seconds";
            tim = setTimeout("showtime()", 1000);
          } else {
            if (parseInt(sec) == 0) {
              document.getElementById("showtime").innerHTML = "Your Left Time is :" + min + " Minutes :" + sec + " Seconds";
              if (parseInt(min) == 0) {
                document.getElementById("countdown").value = parseInt(document.getElementById("countdown").value ) + 1;
                lastSave();
                clearTimeout(tim);
                
                clearCount();

                alert("Time Up");
                //saveNext(2);
                // lastSave();
                
                if (document.getElementById("sectionId").value == 4) {
                    window.location.href="redirect-to-code";
                }
                                
                EndExam();
              } else {
                document.getElementById("showtime").innerHTML = "Your Left Time is :" + min + " Minutes :" + sec + " Seconds";
                tim = setTimeout("showtime()", 1000);
              }
            }

          }
    }

  </script>
</body>
</html>
