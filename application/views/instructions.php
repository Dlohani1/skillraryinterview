<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            background: red;
            color: white;
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
                    <h5 class="subHead">Quantitative Aptitude Test</h5><br/>
                    <p class="contentP">Concepts of mathematics including Time & work, speed & distance, algebra
                            equations, progressions, profit & loss, ratios, averages, geometry, data
                            integration, probability, venn diagram, statistics, interest, percentages,
                            number systems, mensuration, trigonometry etc.</p>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h5 class="subHead">Analytical Reasoning</h5><br/>
                    <p class="contentP">Visual reasoning, systems & conditions, relationships, logical reasoning,
                            attention to details, flowcharts, data sufficiency, coding-decoding, series, odd
                            one out, analogies.</p>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h5 class="subHead">English usage</h5><br/>
                    <p class="contentP">Reading comprehension, grammar including articles, prepositions, sentence
                            corrections, speech, tenses, verbal ability including synonyms, antonyms,
                            spellings, idioms & phrases</p>
                </div>
            </div>
        </div><br/>

       <!--  <div class="row">
            <div class="col-md-10 offset-md-1">
                <table class="table table-bordered">
                    <tr><th colSpan="7" style="text-align: center;background: yellow;border: 1px solid black;">Cognitive - Digital Hiring</th></tr>
                    <tr>
                        <th class="thborder">Section</th>
                        <th class="thborder">Sub Topic</th>
                        <th class="thborder">Easy</th>
                        <th class="thborder">Moderate</th>
                        <th class="thborder">Difficult</th>
                        <th class="thborder">Total Qns</th>
                        <th class="thborder">Difficulty</th>
                    </tr>
                </table>
            </div>
        </div><br/><br/> -->

         <div class="row">
            <div class="col-md-10 offset-md-1">
                <table class="table table-bordered">
                    <tr><th colSpan="2" style="text-align: center;background: yellow;border: 1px solid black;">Cognitive - Digital Hiring</th></tr>
                    <tr>
                        <th class="thborder">Section</th>
                        
                        <!-- <th class="thborder">Easy</th>
                        <th class="thborder">Moderate</th>
                        <th class="thborder">Difficult</th> -->
                        <th class="thborder">Total Quesion</th>
                    </tr>

                    <?php 
                    for($i=0;$i<3;$i++) {
                        echo "<tr><td>".$data[$i]['section']."</td>
                        <td>".$data[$i]['total']."</td>
                        </tr>";
                    }

                    ?>
                </table>
            </div>
        </div><br/><br/>

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h5 class="subHead">DO'S:*</h5><br/>
                <ul class="listInstructions">
                    <li>Read all the instructions carefully before you begin your assessment.</li>
                    <li>Attempt all the sections of the Pre-assessment as different companies use different sections.</li>
                    <li>After you click on 'Submit' wait for the screen to show 'Successfully Submitted' before you start the next chapter</li>
                </ul>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-md-10 offset-md-1">
                <h5 class="subHead">DONT'S:*</h5><br/>
                <ul class="listInstructions">
                    <li>Do not use mobile phones, calculators or any electronic devices during the test. Usage of any of these lead to cancellation from the assessment.</li>
                    <li>Do not switch window, this action gets monitored using supervision technologies and every time you leave the window it will be considered as cheating which will lead to disqualification</li>
                </ul>
            </div>
        </div><br/>

        <div align="center">
            <input id="checkbox-1" class="checkbox-custom" name="checkbox-1" type="checkbox">
            <label for="checkbox-1" class="checkbox-custom-label">I agree and follow all the instructions mentioned by SkillRary</label>
        </div><br/>

        <div align="center">
            <button class="startBtn" onclick="enterCode()">Start Assessment</button>
        </div>
    </div>


    <script>
        function enterCode() {
             var remember = document.getElementById("checkbox-1");
          if (remember.checked) {
            window.location.href='mcq-question';
          } else {
            alert("Please accept the instructions");
          }
            
        }
    </script>
</body>
</html>