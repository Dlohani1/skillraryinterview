<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <style type="text/css">
        .MainHead{
            font-size: 24px;
            font-weight: 600;
        }
        .instructions{
            font-size: 30px;
            font-weight: 600;
        }
        .instructionsContainer{
            margin-top: 3%;
        }
        .subHead{
            font-size: 22px;
            font-weight: 600;
        }
        .textContainer{
            margin-top: 5%;
        }
        .contentP{
            font-size: 20px;
        }
        .thborder{
            border: 1px solid black !important;
            text-align: center !important;
            background: #696868;
            color: white;
        }
        /* .thborder{
            border: 1px solid black !important;
            text-align: center !important;
            background: red;
            color: white;
        } */
        .tdborder{
            border: 1px solid black !important;
            text-align: center !important;
            color:black;
        } 
        .listInstructions{
            list-style-type: decimal;
        }
        .listInstructions li{
            font-size: 20px;
        }
        .checkbox-custom {
            display: none;
        }
        .checkbox-custom-label {
            display: inline-block;
            position: relative;
            vertical-align: middle;
            margin: 5px;
            cursor: pointer;
            width: 32%;
            font-size: 15px;
        }
        .checkbox-custom + .checkbox-custom-label:before {
            content: '';
            background: #fff;
            border-radius: 5px;
            border: 2px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            width: 19px;
            height: 20px;
            padding: 2px;
            margin-right: 10px;
        }
        .checkbox-custom:checked + .checkbox-custom-label:after {
            content: "";
            padding: 2px;
            position: absolute;
            width: 1px;
            height: 11px;
            border: 5px solid #28a745;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
            top: 6px;
            left: 11px;
        }
        .startBtn{
            background: black;
            color: white;
            padding: 10px 50px;
            font-size: 22px;
            border: 1px solid black;
            border-radius: 5px;
        }
        .tableWidth{
            width: 100%;
        }
        .boxIns{
            padding: 1px 10px;
            font-size: 22px;
            margin-top: 0px;
            border-radius: 5px;
            background: #28A745;
            position: absolute;
        }
        .boxIns1{
            padding: 1px 10px;
            font-size: 22px;
            margin-top: 0px;
            border-radius: 5px;
            position: absolute;
            background: #6C757D;
        }
        .boxIns2{
            padding: 1px 10px;
            font-size: 22px;
            margin-top: 0px;
            border-radius: 5px;
            position: absolute;
            background: purple;
        }
        .boxIns3{
            padding: 1px 10px;
            font-size: 22px;
            margin-top: 0px;
            border-radius: 5px;
            position: absolute;
            background: skyblue;   
        }
        .iconIns{
            float: left;
            font-size: 32px;
        }
        .contentIns{
            margin-left: 40px;
            /* position: absolute; */
        }
        .otherUl{
            list-style-type: none;
        }
        .otherUl li{
            line-height: 30px;
            font-size: 20px;
        }
        .countColorIns{
            color: white;
        }
        .contentNote{
            font-size: 16px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container instructionsContainer">

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h4 class="MainHead">READ THE INSTRUCTIONS BEFORE PROCEEDING FURTHER</h4>
                <h1 class="instructions">INSTRUCTIONS</h1>
            </div>
        </div>
        <div class="textContainer">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h5 class="subHead">Quantitative Aptitude Test:</h5>
                    <p class="contentP">Concepts of mathematics including Time & work, speed & distance, algebra
                            equations, progressions, profit & loss, ratios, averages, geometry, data
                            integration, probability, venn diagram, statistics, interest, percentages,
                            number systems, mensuration, trigonometry etc.</p>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h5 class="subHead">Analytical Reasoning:</h5>
                    <p class="contentP">Visual reasoning, systems & conditions, relationships, logical reasoning,
                            attention to details, flowcharts, data sufficiency, coding-decoding, series, odd
                            one out, analogies.</p>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h5 class="subHead">English usage:</h5>
                    <p class="contentP">Reading comprehension, grammar including articles, prepositions, sentence
                            corrections, speech, tenses, verbal ability including synonyms, antonyms,
                            spellings, idioms & phrases.</p>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h5 class="subHead">Programming:</h5>
                    <p class="contentP"> When hired for technical roles, it is imperative for organisations to test a candidate's skills, knowledge and understanding of the core technical concepts. Domain specific assessments are designed aimed to determine the candidate's knowledge on the fundamentals and understanding of the applications such as Basic Programming, OOPS and Data Structures, Database, OS and other concepts.</p>
                </div>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <table class="table tableWidth">
                    <tr><th colspan="4" style="text-align: center;background: #D0CFCF ;border: 1px solid black;">Aptitude</th></tr>
                    <tr>
                        <th class="thborder">Section</th>
                        <th class="thborder">Module</th>
                        <th class="thborder">Total Questions</th>
                        <th class="thborder">Total Time</th>
                    </tr>
                    <?php
                    $totalTime = 0; 
                    if (isset($_SESSION['instructionData'])) {
                        $instruction = $_SESSION['instructionData'];
                        $isCodeTest = $instruction['isCodeId'];
                        unset($instruction['isCodeId']);
                        $rowSpan= count($instruction);
                        $i = 0;
                    foreach ($instruction as $key => $value) {
                       $value['section'];
                       $value['total'];
                       $value['time'];


                    ?>
                    <tr>
                        <?php 
                        if ($i < 1) {?>
                        <td class="tdborder" rowspan=<?=$rowSpan;?> style="vertical-align: middle;">Aptitude</td>
                    <?php } 
                        $testTime = $value['time']/60;
                        $totalTime += $testTime;
                        ?>
                        <td class="tdborder"><?=$value['section']
                        ;?></td>
                        <td class="tdborder"><?=$value['total']
                        ;?></td>
                        <td class="tdborder"><?=$testTime." Minutes"
                        ;?></td>
                    </tr>
                    <?php  $i++;
                }}?>
                    <!-- <tr>
                        <td class="tdborder">C Programming</td>
                        <td class="tdborder">10</td>
                        <td class="tdborder">10 Minutes</td>
                    </tr>
                    <tr>
                        <td class="tdborder">C++</td>
                        <td class="tdborder">10</td>
                        <td class="tdborder">10 Minutes</td>
                    </tr> -->
                   
                </table>
            </div>
        </div><br/>
        <?php
        if ($isCodeTest > 0){?>
        <div class="row">
                <div class="col-md-10 offset-md-1">
                    <table class="table tableWidth">
                        <tr><th colspan="4" style="text-align: center;background: #D0CFCF ;border: 1px solid black;">Programming</th></tr>
                        <tr>
                            <th class="thborder">Section</th>
                            <th class="thborder">Module</th>
                            <th class="thborder">Total Questions</th>
                            <th class="thborder">Total Time</th>
                        </tr>
                        <tr>
                            <td class="tdborder" rowspan="2" style="vertical-align: middle;">Programming</td>
                            <td class="tdborder">Program 1</td>
                            <td class="tdborder">1</td>
                            <td class="tdborder">15 Minutes</td>
                        </tr>
                        <tr>
                            <td class="tdborder">Program 2</td>
                            <td class="tdborder">1</td>
                            <td class="tdborder">15 Minutes</td>
                        </tr>
                       <!--  <tr>
                            <td class="tdborder">Quantitative</td>
                            <td class="tdborder">10</td>
                            <td class="tdborder">10 Minutes</td>
                        </tr> -->
                       
                    </table>
                </div>
            </div><br/><br/>
        <?php } ?>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h5 class="subHead">General Instructions:</h5> 
                <p class="contentP">Total of <?=$totalTime;?> Minutes duration will be given to attempt all the questions.</p>
                <!-- When the clock runs out the exam ends by default - you are not required to end or submit your exam. -->
                <p class="contentP">The clock has been set at the server and the countdown timer at the top right corner of your screen will display the time remaining for you to complete the exam. </p> 
                <p class="contentP">The question palette at the right of screen shows one of the following statuses of each of the questions numbered.</p>
                <ul class="otherUl">
                    <li>
                        <div>
                            <p class="iconIns"><span class="boxIns1"><span class="countColorIns" id="ansCount">0</span></span></p>
                            <p class="contentIns">You have not visited the question yet.</p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="iconIns"><span class="boxIns"><span class="countColorIns" id="ansCount">2</span></span></p>
                            <p class="contentIns">You have answered the question.</p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="iconIns"><span class="boxIns3"><span class="countColorIns" id="ansCount">1</span></span></p>
                            <p class="contentIns">You have viewed the question.</p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <p class="iconIns"><span class="boxIns2"><span class="countColorIns" id="ansCount">4</span></span></p>
                            <p class="contentIns">You have answered the question but marked it for review.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 offset-md-1" >
                <span class="contentNote">( The Marked for Review status simply acts as a reminder that you have set to look at the question again.If an answer is selected for a question that is Marked for Review the answer will be considered in the final evaluation. )</span>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h5 class="subHead">DO'S:*</h5>
                <ul class="listInstructions">
                    <li>Read all the instructions carefully before you begin your assessment.</li>
                    <li>Attempt all the sections of the Pre-assessment as different companies use different sections.</li>
                    <li>After you click on 'Submit' wait for the screen to show 'Successfully Submitted' before you start the next chapter.</li>
                </ul>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h5 class="subHead">DONT'S:*</h5>
                <ul class="listInstructions">
                    <li>Do not use mobile phones, calculators or any electronic devices during the test. Usage of any of these lead to cancellation from the assessment.</li>
                    <li>Do not switch window, this action gets monitored using supervision technologies and every time you leave the window it will be considered as cheating which will lead to disqualification. </li>
                </ul>
            </div>
        </div><br/>
        <p id="demo" style="text-align:center;color:red;font-weight:600"></p>
	<center><a style="text-decoration: none;" target="_blank" href="<?php echo base_url().'user/join-meeting';?>" ><button id="startTest" class="btn btn-success" style="display:none"> Connect to Proctor </button></a></center>
        <?php 
        //if ($_SESSION['startTest']) {
?>
        <div align="center" id="startAssessment" style="display:block">
            <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox">
            <label for="checkbox-1" class="checkbox-custom-label">I agree and follow all the instructions mentioned by SkillRary</label>
            <!-- <input id="checkbox-1" name="checkbox-1" type="checkbox">
            <label for="checkbox-1" >I agree and follow all the instructions mentioned by SkillRary</label> -->
        
            <br/>
            <button style="color:green" class="startBtn" onclick="enterCode()" id="testBtn"><?php if (isset($_SESSION['resumeTest']) && $_SESSION['resumeTest'] == 1) { echo "Resume Assessment";} else {echo "Start Assessment"; } ?></button>
        </div><br/>
            <?php //}
 ?>
	<input type="hidden" id="base_url" value= "<?php echo base_url(); ?>" />
   </div>


    <script>

 $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

// Set the date we're counting down to
//var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();

var isTestProctored = <?php if (isset($_SESSION['isTestProctored'])) { echo $_SESSION['isTestProctored'];} else { echo "0";}  ; ?>;


if (isTestProctored == "1") {

//var testDate = <?php //echo "'".$_SESSION['testDate']."'"; ?>;

var testDate = <?php if (isset($_SESSION['testDate'])) { echo "'".$_SESSION['testDate']."'";} else { echo "''";}   ?>;

//var testTime = <?php //echo "'".$_SESSION['testTime']."'"; ?>;

var testTime = <?php if (isset($_SESSION['testTime'])) { echo "'".$_SESSION['testTime']."'";} else { echo "''";}  ?>;

//var meetingUrl = <?php //echo "'".$_SESSION['joinUrl']."'"; ?>;

var meetingUrl = <?php if (isset($_SESSION['joinUrl'])) { echo "'".$_SESSION['joinUrl']."'";} else { echo "''";}   ?>;

//var countDownDate = new Date ("2020-04-06 08:23").getTime();

//var testTime = "06:18";
var testData = testDate + " "+ testTime;
//alert(testData);
var countDownDate = new Date(testData).getTime();
//alert(testData);

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  if (days > 0 ) {
  document.getElementById("demo").innerHTML = "Your test will start in "+ days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  } else if (hours > 0) {
    document.getElementById("demo").innerHTML = "Your test will start in "+ hours + "h "
  + minutes + "m " + seconds + "s ";
  } else if (minutes > 0) {
    document.getElementById("demo").innerHTML = "Your test will start in "
  + minutes + "m " + seconds + "s ";
  }else {
    document.getElementById("demo").innerHTML = "Your test will start in "+ seconds + "s ";
  }
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "";
    //var startBtn = document.getElementById("startTest");
    //var startAssessment = document.getElementById("startAssessment");
    enterCode(true);
	//startBtn.style.display = "block";
    //startAssessment.style.display = "block";
	
//startBtn.onclick = joinMeeting;

  }
}, 1000);

}

function joinMeeting() {
    var meetingUrl = <?php if (isset($_SESSION['joinUrl'])) { echo "'".$_SESSION['joinUrl']."'";} else { echo "''";}   ?>;
    window.open(meetingUrl);
}

        function enterCode(check = null) {
	    var id = <?php echo $_SESSION['assessId']; ?>;
            var isChrome = !!window.chrome; // "!!" converts the object to a boolean value
            console.log(isChrome); // Just to visualize what's happening

            /** Example: User uses Firefox, therefore isChrome is false; alert get's triggered */
            //if (isChrome !== true) { 
             //alert("Please use Google Chrome to access this site.\nSome key features do not work in browsers other than Chrome.");
          // } else {

                var remember = document.getElementById("checkbox-1");
                if (remember.checked || check) {

	              var baseUrl = document.getElementById("base_url").value;
                  $.ajax({
                    url: baseUrl+"admin/startTest",

                    type: 'post',

                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "assessId" : id} ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);

                                      // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
			//alert(data);
//window.open(src, "newWin", "width="+screen.availWidth+",height="+screen.availHeight)
			if (data == "1" && null == check) {
				 //var win = window.open("mcq-question","", "fullscreen=1,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no");

                 var win = window.open("mcq-question", "newWin", "width="+screen.availWidth+",height="+screen.availHeight)
                    win.onbeforeunload = function(){
                        console.log('unload');
                        //window.location.href="user/view-results";
                        var baseUrl = document.getElementById("base_url").value;
                          $.ajax({
                            url: baseUrl+"admin/startTest",

                            type: 'post',

                            // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                            data: { "assessId" : id} ,
                            success: function( data, textStatus, jQxhr ){
                                console.log('daa',data)
                                if (data == "2") {
                                    var startBtn = document.getElementById("startTest");
                                    var startAssessment = document.getElementById("startAssessment");

                                    startBtn.style.display = "none";
                                    startAssessment.style.display = "none";
                                   document.getElementById("demo").innerHTML = "Test has HALTED, Please contact support";
                                } else if (data == "3")  {
                                    window.location.href="user/view-results";
                                } else {
                                     var testBtn = document.getElementById("testBtn");

                                    testBtn.innerHTML = "Resume";
                                }
                            }
                        });

                        //
                    }


			} else if (data == "2") {
                 document.getElementById("demo").innerHTML = "Test has HALTED, Please contact support";
                //alert("Test has HALTED, Please contact support to resume.");
            } else {
                if (!check) {

                       $.alert({
                            title: 'SkillRary Alert',
                            content: 'Test not ACTIVE, Please contact support.',
                        });
				//alert("Test not ACTIVE, Please contact support.");
                } else if (check && data == 1) {

                    var startBtn = document.getElementById("startTest");
                    var startAssessment = document.getElementById("startAssessment");

                    startBtn.style.display = "block";
                    startAssessment.style.display = "block";

                }
			}
                        // document.getElementById("code").disabled = true;

                        // document.getElementById("codeSubmit").disabled = true;
                        //window.location.reload();
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });


                //window.location.href='mcq-question';
               /* var win = window.open("mcq-question", "","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=4000,height=4000");

                    // var win = window.open("mcq-question","", "fullscreen=1,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no");
                    win.onbeforeunload = function(){
                        console.log('unload');
                        window.location.href="user/view-results";
                    }*/ 
                } else {
                    $.alert({
                        title: 'SkillRary Alert',
                        content: 'Please accept the instructions',
                    });
                }
            }            
       // }
    </script>
    
</body>
</html>
