<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <title>Assessment Instructions</title>
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
                    <tr><th colspan="4" style="text-align: center;background: #D0CFCF ;border: 1px solid black;">Engineering</th></tr>
                    <tr>
                        <th class="thborder">Section</th>
                        <th class="thborder">Module</th>
                        <th class="thborder">Total Questions</th>
                        <th class="thborder">Total Time</th>
                    </tr>
                    <tr>
                        <td class="tdborder" rowspan="3" style="vertical-align: middle;">Engineering</td>
                        <td class="tdborder">Javascript</td>
                        <td class="tdborder">10</td>
                        <td class="tdborder">10 Minutes</td>
                    </tr>
                    <tr>
                        <td class="tdborder">C Programming</td>
                        <td class="tdborder">10</td>
                        <td class="tdborder">10 Minutes</td>
                    </tr>
                    <tr>
                        <td class="tdborder">C++</td>
                        <td class="tdborder">10</td>
                        <td class="tdborder">10 Minutes</td>
                    </tr>
                   
                </table>
            </div>
        </div><br/>
        <div class="row">
                <div class="col-md-10 offset-md-1">
                    <table class="table tableWidth">
                        <tr><th colspan="4" style="text-align: center;background: #D0CFCF ;border: 1px solid black;">Cognitive</th></tr>
                        <tr>
                            <th class="thborder">Section</th>
                            <th class="thborder">Module</th>
                            <th class="thborder">Total Questions</th>
                            <th class="thborder">Total Time</th>
                        </tr>
                        <tr>
                            <td class="tdborder" rowspan="3" style="vertical-align: middle;">Cognitive</td>
                            <td class="tdborder">English</td>
                            <td class="tdborder">10</td>
                            <td class="tdborder">10 Minutes</td>
                        </tr>
                        <tr>
                            <td class="tdborder">Reasoning</td>
                            <td class="tdborder">10</td>
                            <td class="tdborder">10 Minutes</td>
                        </tr>
                        <tr>
                            <td class="tdborder">Quantitative</td>
                            <td class="tdborder">10</td>
                            <td class="tdborder">10 Minutes</td>
                        </tr>
                       
                    </table>
                </div>
            </div><br/><br/>
        
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h5 class="subHead">General Instructions:</h5> 
                <p class="contentP">Total of 60 Minutes duration will be given to attempt all the questions.</p>
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
        
        <?php 
        if ($_SESSION['startTest']) {?>
        <div align="center">
            <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox">
            <label for="checkbox-1" class="checkbox-custom-label">I agree and follow all the instructions mentioned by SkillRary</label>
            <!-- <input id="checkbox-1" name="checkbox-1" type="checkbox">
            <label for="checkbox-1" >I agree and follow all the instructions mentioned by SkillRary</label> -->
        </div><br/>

        <div align="center">
            <button class="startBtn" onclick="enterCode()"><?php if (isset($_SESSION['resumeTest']) && $_SESSION['resumeTest'] == 1) { echo "Resume Assessment";} else {echo "Start Assessment"; } ?></button>
        </div><br/>
            <?php } ?>
    </div>


    <script>
        function enterCode() {
            var isChrome = !!window.chrome; // "!!" converts the object to a boolean value
            console.log(isChrome); // Just to visualize what's happening

            /** Example: User uses Firefox, therefore isChrome is false; alert get's triggered */
            if (isChrome !== true) { 
              alert("Please use Google Chrome to access this site.\nSome key features do not work in browsers other than Chrome.");
            } else {

                var remember = document.getElementById("checkbox-1");
                if (remember.checked) {
                //window.location.href='mcq-question';
                var win = window.open("mcq-question", "","toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=4000,height=4000");

                    // var win = window.open("mcq-question","", "fullscreen=1,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no");
                    win.onbeforeunload = function(){
                        console.log('unload');
                        window.location.href="user/view-results";
                    }  
                } else {
                    alert("Please accept the instructions");
                }
            }            
        }
    </script>
    
</body>
</html>