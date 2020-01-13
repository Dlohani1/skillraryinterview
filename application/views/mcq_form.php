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
            margin-top: 8%;
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
            overflow-y: scroll;
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
            background: #4d82e4;
            border: 2px solid #4d82e4;
            padding: 6px 13px;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            font-size: 18px;
        }
        .saveBtn1{
            background: yellowgreen;
            border: 2px solid #a0a1a5;
            padding: 6px 13px;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            font-size: 18px;
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
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="column">
                <div class="row">
                    <p></p>
                </div><hr>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <!-- Time Left: 20:00 -->
                         <div id="showtime"></div>
                    </div>
                </div>
                <hr>
                <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <button id="section1" class="bntbtn" onclick="getQuestion(1)">English</button>
                    </div>
                    <div class="col-md-4">
                        <button id="section2" class="bntbtn" disabled onclick="getQuestion(2)">Reasoning</button>
                    </div>
                    <div class="col-md-4">
                        <button id="section3" class="bntbtn" disabled onclick="getQuestion(3)">Quantitative</button>
                    </div>
                </div>
                </div><hr>
                <div class="row">
                    <div class="col-md-6" id="questionMCQ">Question Type : MCQ</div>
                    <div class="col-md-6 text-right" onload="starttime()">
                        <!-- Marks for Correct Answer | Negative Marks : 0.33 -->
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div id="questionId" class="col-md-6"></div>
                </div>
                <hr>
                
                <input type="hidden" id="sectionId" value="1" />
                <input type="hidden" id="totalQuestion" value="0" />
                <input type="hidden" id="totalTime" />
                <input type="hidden" id="questionIdSave" />
                <input type="hidden" id="saveAnsId" />
                <input type="hidden" id="studentSessionId" value=<?php echo $_SESSION['id']; ?> />
                <input type="hidden" id="mcqSessionId" value=<?php echo $_SESSION['mcqId']; ?> />
                <div class="questionSection">
                    <p id="questionData"></p>
                    <div>
                        <ul id="optionsList" class="optionList">
                        </ul>
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
                        <div class="col-md-5 text-right">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="saveBtn" onclick="saveNext()">Save & Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column1">
                <div>
                    <div class="row" style="margin:0px;padding:0px;">
                        <div class="col-md-6">
                            <div>
                                <p class="icon"><span class="badge badge-success">4</span></p>
                                <p class="content">Answered</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <p class="icon"><span class="badge badge-danger">5</span></p>
                                <p class="content">Not Answered</p>
                            </div>
                        </div>  
                    </div><br/>

                    <div class="row" style="margin:0px;padding:0px;">
                        <div class="col-md-6">
                            <div>
                                <p class="icon"><span class="badge badge-secondary">5</span></p>
                                <p class="content">Not Visited</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <p class="icon"><span class="badge badge-info">1</span></p>
                                <p class="content">Marked For Review</p>
                            </div>
                        </div>  
                    </div><br/>

                    <div class="row" style="margin:0px;padding:0px;">
                        <div class="col-md-12">
                            <div>
                                <p class="icon"><span class="badge badge-info">1</span><i class="fa fa-check" id="checkIcon" aria-hidden="true"></i></p>
                                <p class="content">Answered & Marked for Review</p>
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
                <div class="container">
                    
                        <div align="center">
                           
                            <button class="submitBtn">Submit</button>
                        </div>
  
                </div>
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

function getQuestion(sectionId) {
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
                document.getElementById("totalTime").value = opts[0].time;
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
                window.totalsec = document.getElementById("totalTime").value;
                starttime();
                fetchQuestion(opts[0].questions[0], 1);
            }
        });
}

function fetchQuestion(id,no) {

document.getElementById("questionId").innerHTML = "Question No. "+no;
//$( "#iconAnswered"+id ).toggleClass( "a", addOrRemove );
document.getElementById("questionIdSave").value = id;
var mcqId = document.getElementById("mcqSessionId").value;
var student = document.getElementById("studentSessionId").value;
    console.log('test', id)
    $.ajax({
            type: "POST",
            url: "fetchQuestion",
            data:{"id":student, "section_id":1, "mcq_id": mcqId, "question_id":id},
            success: function(data){
                var opts = $.parseJSON(data);
                console.log('total', opts);
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
                    $('#optionsList').append("<li> <input name='answer' type='radio' onclick='saveAns(this)' value="+ d.id +"> "+ d.option+" </li>");
                });
            }
        });
}

function saveAns(ans) {
    console.log('ans', ans.value)

    document.getElementById("saveAnsId").value = ans.value;
}

function saveNext() {  
    var checkRadio = document.querySelector( 
        'input[name="answer"]:checked'); 
      
    if(checkRadio != null) {
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
        $.ajax({
            type: "POST",
            url: "saveAnswer",
            data:{"student_id":student, "answer_id":ansId, "section_id": sectionId, "mcq_id":mcqId, "question_id":questionId},

            success: function(data){
                console.log('ansr', data)
                // var opts = $.parseJSON(data);
                // console.log('total', opts);
                // document.getElementById("questionData").innerHTML= opts.question;
                // console.log('data', opts[0].questions);
                // // Parse the returned json data
                // // var opts = $.parseJSON(data);
                // // // Use jQuery's each to iterate over the opts value
                // // $.each(opts, function(i, d) { console.log('d',d);
                // //     // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                // //     $('#section').append('<option value="' + d.id + '">' + d.name + '</option>');
                // // });
                // $('#optionsList').empty()
                // $.each(opts.options, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                //     $('#optionsList').append("<li> <input name='answer' type='radio' value="+ d.id +"> "+ d.option+" </li>");
                // });
            }
        });



        if (b > document.getElementById("totalQuestion").value) {console.log('t')

            if (document.getElementById("sectionId").value == 1) {
                document.getElementById("sectionId").value = 2;
                document.getElementById("section1").disabled = true;
                document.getElementById("section2").disabled = false;
                clearTimeout(tim);
                $("#section2").click();
            } else if (document.getElementById("sectionId").value == 2) {
                document.getElementById("sectionId").value = 3;
                document.getElementById("section2").disabled = true;
                document.getElementById("section3").disabled = false;
                clearTimeout(tim);
                $("#section3").click();
            } else {
                window.location.href="user/login";
            }


            
        } else {
            $("#iconAnswered"+b).click();    
        }
    } 
    else {
        alert('Please check atleast one option');
        console.log('No one selected');
    }
     
}

function clearResponse() {
    $('input[name="answer"]').prop('checked', false);
} 

</script>
 <script>
    var pos = 0,
      test, test_status, question, choice, choices, chA, chB, chC, correct = 0;

    var questions = [
      ["Which of the following a is not a keyword in Java ?", "class", "interface", "extends", "C"],

      ["Which of the following is an interface ?", "Thread", "Date", "Calender", "A"],

      ["Which company released Java Version 8 ?", "Sun", "Oracle", "Adobe", "A"],

      ["What is the length of Java datatype int ?", "32 bit", "16 bit", "None", "C"],

      ["What is the default value of Java datatype boolean?", "true", "false", "0", "A"]
    ];

   

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
        } else {
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
                clearTimeout(tim);
                alert("Time Up");
                if (document.getElementById("sectionId").value == 3) {
                    window.location.href="user/login";
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