<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <title>Student Report</title>
    <style>
        .pText{
            font-size: 18px;
        }
        .grade{
            width: 4%;
        }
        .strongareaBox{
            border: 1px solid black;
            padding: 10px;
            margin-top: 20%;
        }
        .firstHeading{
            margin: 0px;
            padding: 6px 25px;
            font-size: 27px;
        }
        .firstHeadingRow{
            background-image: linear-gradient(to right, rgba(0,0,0), rgba(51,	164,	120) , rgba(0,0,0));
            border-radius: 20px 0px 0px 20px;
            color: white;
        }
        .thborder{
            border: 1px solid black !important;
            text-align: center !important;
            color: black;
        }
        .tdborder{
            border: 1px solid black !important;
            text-align: center !important;
            color:black;
        }
        .tableWidth{
            width: 100%;
        }
        .tableWidth1{
            width: 70%;
        }
        .logoClass{
            float: right;
            margin-top: 15px;
            /* background-color: black !important; */
            padding: 4px 12px;
            /* width: 23%; */
            display: inline-flex;
        }
        .containerBg{
            background: white;
            height: 120px;
            padding: 0px;
        }
        .skill{
            color: white;
            font-size: 40px;
            top: -2px;
            left: 10px;
            position: relative;
        }
        .rary{
            color: #33A478;
            font-size: 40px;
            top: -2px;
            left: 5px;
            position: relative;
        }
        .imgLogo{
            width: 50px;
            /* margin-top: -21px; */
        }
        #oilChart{
            /* transform: rotate(25deg); */
        }
        input[type=text] {
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 1px solid #3b3c3d;
        }
        input[type=text]:focus{
            outline: none;
        }

    </style>
    <script>

    window.onload = function () {
        var oilCanvas = document.getElementById("oilChart");
            Chart.defaults.global.defaultFontFamily = "Lato";
            Chart.defaults.global.defaultFontSize = 18;

            var oilData = {
                labels: [
                        "English",
                        "Reasoning",
                        "Quantitative",
                        "Code Test",
                    ],
                datasets: [
                    {
    
                        data: [25,25,25,25],
                        backgroundColor: [
                            "#f2ea8d",
                            "#858c89",
                            "#7ecf93",
                            "#c4a6de",
                        ],
                        
                    }]
            };

            var pieChart = new Chart(oilCanvas, {
            type: 'pie',
            data: oilData
            });
    }

    </script>
</head>
<body>
    <?php //print_r($studentData); ?>
    <div class="container containerBg">
        <div class="logoClass">
            <!-- <img src="srlogo.png" alt="logo" class="imgLogo"><span class="skill">Skill</span><span class="rary">Rary</span> -->
            <img src=<?php echo base_url()."images/skillrary_logo.png";?> alt="logo">
        </div>
    </div>
    <div class="container">
        <div class="row firstHeadingRow">
            <p class="firstHeading">SkillRary Candidate Report</p>
        </div><br/>
        <div class="row">
            <table class="tableWidth">
                <tr>
                    <td class="tdborder" rowspan="6" width="15%"><img src=<?php echo base_url().$studentData->profile_image;?> style="width: 130px;"></td>
                </tr>
                <!-- <tr>
                        <td class="tdborder"><b>Name</b></td>
                        <td class="tdborder">Tejaswini B</td>
                        <td class="tdborder"><b>SkillRary ID</b></td>
                        
                    </tr>
                    <tr>
                        <td class="tdborder"><b>Name</b></td>
                        <td class="tdborder">Tejaswini B</td>
                        <td class="tdborder"><b>SkillRary ID</b></td>
                        
                    </tr> -->
                <tr>
                    <td class="tdborder"><b>Name</b></td>
                    <td class="tdborder"><?php echo $studentData->first_name." ".$studentData->last_name;?></td>
                    <td class="tdborder"><b>SkillRary ID</b></td>
                    <td class="tdborder">763476765745647</td>
                </tr>
                <tr>
                    <td class="tdborder"><b>Email-ID</b></td>
                    <td class="tdborder"><?php echo $studentData->email;?></td>
                    <td class="tdborder"><b>Mobile No</b></td>
                    <td class="tdborder"><?php echo $studentData->contact_no;?></td>
                </tr>
                <tr>
                    <td class="tdborder"><b>Residence City</b></td>
                    <td class="tdborder"><?php echo $studentData->city;?></td>
                    <td class="tdborder"><b>Date of Birth (Gender)</b></td>
                    <td class="tdborder"><?php echo $studentData->dob;?> <?php if ($studentData->gender == 1) {echo "(Male)";} else {echo "(Female)";}?></td>
                </tr>
                <tr>
                    <td class="tdborder"><b>College Name</b></td>
                    <td class="tdborder">City Engineering College, Bangalore</td>
                    <td class="tdborder"><b>Degree (Stream)</b></td>
                    <td class="tdborder"><?php echo $studentData->degree;?> (<?php echo $studentData->stream;?>)</td>
                </tr>
                <tr>
                    <td class="tdborder"><b>Preferred Work Location</b></td>
                    <td class="tdborder"><b><?php echo $studentData->work_location;?></b></td>
                    <td class="tdborder"><b>Percentage Marks(Passing year)</b></td>
                    <td class="tdborder" colspan="3"><div class="row"><div class="col-md-4">10th-<?php echo $studentData->tenth_percentage."%";?><?php echo "(".$studentData->tenth_passing_year.")";?></div><div class="col-md-4">12th-<?php echo $studentData->twelveth_percentage."%";?> <?php echo "(".$studentData->twelveth_passing_year.")";?></div><div class="col-md-4">Degree-<?php echo $studentData->degree_percentage."%";?> <?php echo "(".$studentData->degree_passing_year.")";?></div></div></td>
                </tr>
            </table>
        </div>
    </div><br/>
    <div class="container">
        <h3>Score</h3>
        <p class="pText">This section provides an overview of a candidates performance in different sections of Assessment.</p>
        <div class="row">
                <table class="tableWidth">
                    <tr>
                        <th class="thborder">Module</th>
                        <!-- <th class="thborder" width="10%">National Percentile</th> -->
                        <th class="thborder" width="10%">Drive Percentile</th>
                        <th class="thborder" width="10%">SCORE</th>
                        <th class="thborder" colspan="6">Sub-Module Name, Grade[A:Good,B:Average,C:Needs Improvement]</th>
                    </tr>
                    <tr>
                        <td class="tdborder"><b>English</b></td>
                        <!-- <td class="tdborder">98%</td> -->
                        <td class="tdborder">99%</td>
                        <td class="tdborder">735</td>
                        <td class="tdborder">Grammer</td>
                        <td class="tdborder grade">A</td>
                        <td class="tdborder">Vocabulary</td>
                        <td class="tdborder grade">A</td>
                        <td class="tdborder">Comprehension</td>
                        <td class="tdborder grade">A</td>
                    </tr>
                    <tr>
                        <td class="tdborder"><b>Quantitaive Ability</b></td>
                        <!-- <td class="tdborder">98%</td> -->
                        <td class="tdborder">58%</td>
                        <td class="tdborder">520</td>
                        <td class="tdborder">Engineering Mathematics</td>
                        <td class="tdborder grade">B</td>
                        <td class="tdborder">Basic Mathematics</td>
                        <td class="tdborder grade">B</td>
                        <td class="tdborder">Applied Mathematics</td>
                        <td class="tdborder grade">A</td>
                    </tr>
                    <tr>
                        <td class="tdborder"><b>Computer Programming</b></td>
                        <!-- <td class="tdborder">98%</td> -->
                        <td class="tdborder">90%</td>
                        <td class="tdborder">555</td>
                        <td class="tdborder">OOP and Complexity Theory</td>
                        <td class="tdborder grade">A</td>
                        <td class="tdborder">Data Structures</td>
                        <td class="tdborder grade">A</td>
                        <td class="tdborder">Basic Programming</td>
                        <td class="tdborder grade">A</td>
                    </tr>
                    <!-- <tr>
                        <td class="tdborder"><b>Logic Ability</b></td>
                        <td class="tdborder">98%</td>
                        <td class="tdborder">85%</td>
                        <td class="tdborder">570</td>
                        <td class="tdborder">Inductive Reasoning</td>
                        <td class="tdborder">A</td>
                        <td class="tdborder">Deductive Reasoning</td>
                        <td class="tdborder">A</td>
                        <td class="tdborder">Abductive Reasoning</td>
                        <td class="tdborder">A</td>
                    </tr> -->
                </table>
        </div>
    </div><br/>
    <div class="container">
        <h3>Strengths and Weaknesses</h3>
        <p class="pText">This section enumerates the strong and weak areas of a candidate. The candidate can be further evaluated on these areas according to the job requirements by the interviewer</p>
        <div class="row">
            <div class="col-md-6 offset-md-1" style="padding: 0px;">
                <!-- <canvas id="oilChart" width="600" height="280"></canvas> -->
                <img src=<?php echo  base_url()."images/PieChart.png"; ?> style="width: 70%;"/>
            </div>
            <div class="col-md-4" style="padding: 0px;">
                <div class="strongareaBox">
                    <h4>Strong Areas</h4>
                    <ul>
                        <li>Grammer</li>
                        <li>Vocabulary</li>
                        <li>Comprehension</li>
                        <li>Applied Mathematics</li>
                        <li>OOP and Complexity Theory</li>
                        <li>Data Structures</li>
                        <li>Basic Programming</li>
                        <!-- <li>Inductive Reasoning</li>
                        <li>Deductive Reasoning</li>
                        <li>Abductive Reasoning</li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div><br/>
    <div class="container">
        <h3>Interview Feedback</h3>
        <p class="pText">Based upon the observation made and the candidates Interview and qualification , here you can comment whether you think the person should be further considered for this position or not. Tick any one box for each area , on the basis of your opinion</p>
        <div class="row">
                
                <div class="col-md-9">
                <table class="tableWidth">
                    <tr><th class="thborder" colspan="4">DIFFERENT AREAS</th></tr>
                    <tr>
                        <th class="thborder">Areas</th>
                        <th class="thborder">Good</th>
                        <th class="thborder">Average</th>
                        <th class="thborder">Not Acceptable</th>
                    </tr>
                    <tr>
                        <td class="tdborder"><b>Communication Skills</b></td>
                        <td  class="thborder"><input type="checkbox"></td>
                        <td  class="thborder"><input type="checkbox"></td>
                        <td  class="thborder"><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="tdborder"><b>Problem Solving Skills</b></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="tdborder"><b>Job Specific Skills</b></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="tdborder"><b>Experience</b></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="tdborder"><b>Overall Personality</b></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                    </tr>
                </table>
                </div>
                <div class="col-md-3">
                    <table class="tableWidth">
                        <tr><th class="thborder" colspan="2">Overall Evaluation</th></tr>
                        <tr>
                            <td class="thborder">Performance</td>
                            <td class="thborder">Tick Any one</td>
                        </tr>
                        <tr>
                            <td  class="thborder">Excellent</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td  class="thborder">Good</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td  class="thborder">Average</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td  class="thborder">Below Average</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td  class="thborder">Poor</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                    </table>
                </div>
        </div><br/>
   
        <p>Final Decision:  Hired <input type="checkbox">&nbsp;&nbsp;&nbsp; Rejected <input type="checkbox">&nbsp;&nbsp;&nbsp; On hold <input type="checkbox"></p>
        
        Comments:<input type="text"><br/>
        <input type="text"><br/>
        <input type="text"><br/>
        <input type="text"><br/>

    </div>
    </div><br/><br/>
</body>
</html>