<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://skillrary.com/uploads/images/fav-sr-64x64-logo.png" type="image/x-icon">

<!--     <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> --> 
<!--     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->
  <!--   <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> -->
    <title>SkillRary Student Report</title>
    <style>
        .canvasjs-chart-credit{
            display: none;
        }
        .round{
            width: 10%;
            font-weight: 600;
        }
        .interviewername{
            height: 40px;
        }
        .interviewer{
            width: 25%;
        }
        .feedback{
            padding-left: 5px;
            border: 1px solid black !important;
            text-align: left !important;
            color: black;
            vertical-align: initial;
        }
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
        .thMainBorder{
            border: 1px solid black !important;
            text-align: center !important;
            background: #696868;
            color: white !important;
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
</head>
<body>
    <div class="container containerBg">
        <div class="logoClass">
            <!-- <img src="srlogo.png" alt="logo" class="imgLogo"><span class="skill">Skill</span><span class="rary">Rary</span> -->
            <img src="<?php echo base_url()."images/skillrary_logo.png";?>" alt="logo">
        </div>
    </div>

    <div class="container">
        <div class="row firstHeadingRow">
            <p class="firstHeading">SkillRary Candidate Report</p>
        </div><br/>
        <div class="row">
            <table class="tableWidth">
                <tr>
                    <td class="tdborder" rowspan="6" width="15%"><img src=<?php if (strlen($studentData->profile_image) > 0) {
                        echo base_url().$studentData->profile_image;} else { if ($studentData->gender == 1) {echo base_url()."images/boy.png";} else {echo base_url()."images/girl.png";}}?> style="width: 130px;"></td>
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
                    <td class="tdborder"><?php echo $studentData->city_name;?></td>
                    <td class="tdborder"><b>Date of Birth (Gender)</b></td>
                    <td class="tdborder"><?php echo $studentData->dob;?> <?php if ($studentData->gender == 1) {echo "(Male)";} else {echo "(Female)";}?></td>
                </tr>
                <tr>
                    <td class="tdborder"><b>College Name</b></td>
                    <td class="tdborder"><?php echo $studentData->degree_college_name;?></td>
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
                    <th class="thborder thMainBorder" width="18%">Section</th>
                    <th class="thborder thMainBorder" width="25%">Module</th>
                    <th class="thborder thMainBorder" width="10%">Total marks</th>
                    <th class="thborder thMainBorder" width="20%">Minimum qualifying marks</th>
                    <th class="thborder thMainBorder" width="17%">Marks secured by you</th>
                    <th class="thborder thMainBorder" width="10%">Status</th>
                </tr>
                <tr>
                    <td class="tdborder" rowspan="3"><b>Aptitude</b></td>
                <?php 
                $totalAptitudeMarks = 0;
                $totalAptitudeQualifyingMarks = 0;
                $totalUserAptitudeMarks = 0;
                for ($i=0; $i < count($result['Aptitude']); $i++) {
                    if ($i > 0) {
                        echo '<tr>';
                    }
                    $totalMarks = $result['Aptitude'][$i]['total_question'];                   
                    $minMarks =  $result['Aptitude'][$i]['total_question']/2;
                    $userMarks = $result['Aptitude'][$i]['user_ans'];

                    if ($totalMarks < 10 ) {
                        $totalMarks *= 10;
                        $minMarks *= 10;    
                        $userMarks *= 10;
                    }
                    $totalAptitudeMarks += $totalMarks;
                    $totalAptitudeQualifyingMarks += $minMarks;
                    $totalUserAptitudeMarks += $userMarks;

                    ?>

                
                    <td class="tdborder"><?php echo $result['Aptitude'][$i]['section']; ?></td>
                    <td class="tdborder"><?php echo $totalMarks; ?></td>
                    <td class="tdborder"><?php echo $minMarks; ?></td>
                    <td class="tdborder"><?php echo $userMarks ?></td>
                    <td class="tdborder">
                        <?php

                        if ($userMarks >= $minMarks) {
                            echo "PASS";
                        } else {
                            echo "FAIL";
                        }
                        ?>

                    </td>
                    </tr>
            <?php } ?>

                <!-- <tr>
                    <td class="tdborder">Analytical</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">6</td>
                    <td class="tdborder">Pass</td>
                </tr>
                <tr>
                    <td class="tdborder">Quantitative</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">Pass</td>
                </tr> -->

                <?php 
                if ($result['Programming'] != "0") {?>
                <tr>
                    <td class="tdborder" rowspan="3"><b>Programming</b></td>
                    <td class="tdborder">Programming</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">7</td>
                    <td class="tdborder">Pass</td>
                </tr>
            <?php } ?>
              <!--   <tr>
                    <td class="tdborder" colspan="2" rowspan="2" width="38%"><b>Total Marks Secured</b></td>
                    <td class="tdborder">30</td>
                    <td class="tdborder">15</td>
                    <td class="tdborder">18</td>
                    <td class="tdborder"><b>Pass</b></td>
                </tr> -->

            </table>
        </div>
    </div>
<br/>
  <div class="container">
        <h3>Final Result</h3>
          <div class="row">
            <table class="tableWidth">
                
                <tr>
                    <th class="thborder thMainBorder" width="18%">Section</th>
                    <th class="thborder thMainBorder" width="10%">Total marks</th>
                    <th class="thborder thMainBorder" width="25%">Minimum qualifying marks</th>
                    <th class="thborder thMainBorder" width="17%">Marks secured by you</th>
                    <!-- <th class="thborder thMainBorder" width="10%">Status</th> -->
                    <th class="thborder thMainBorder" width="10%">Final Status</th>
                </tr>
                <tr>
                    <td class="tdborder"><b>Aptitude</b></td>
                    <td class="tdborder"><?php echo $totalAptitudeMarks; ?></td>
                    <td class="tdborder"><?php echo $totalAptitudeQualifyingMarks; ?></td>
                    <td class="tdborder"><?php echo $totalUserAptitudeMarks; ?></td>
                    <td class="tdborder" rowspan="3">
                        <?php
                            if ($totalUserAptitudeMarks >= $totalAptitudeQualifyingMarks) {
                                echo "<b>PASS</b>";
                            } else {
                                echo "<b>FAIL</b>";
                            }
                        ?>
                    </td>

                    <!-- <td class="tdborder" rowspan="3"><b>PASS</b></td> -->
                </tr>
                 <?php 
                if ($result['Programming'] != "0") {?>
                <tr>
                    <td class="tdborder"><b>Programming</b></td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">7</td>
                    <td class="tdborder">Pass</td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
<br/>

 <?php 
                if ($result['Programming'] != "0") {?>
     <div class="container">
        <h3>Code Test Progress</h3>
        <!-- <p class="pText">This section provides an overview of a candidates performance in different sections of Assessment.</p> -->
        <!-- <div class="row">
            <table class="tableWidth">
                
                <tr>
                    <th class="thborder thMainBorder" width="18%">Section</th>
                    <th class="thborder thMainBorder" width="20%">Module</th>
                    <th class="thborder thMainBorder" width="10%">Total marks</th>
                    <th class="thborder thMainBorder" width="25%">Minimum qualifying marks</th>
                    <th class="thborder thMainBorder" width="17%">Marks secured by you</th>
                    <th class="thborder thMainBorder" width="10%">Status</th>
                </tr>
                <tr>
                    <td class="tdborder" rowspan="3"><b>Aptitude</b></td>
                    <td class="tdborder">English</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">7</td>
                    <td class="tdborder">Pass</td>
                </tr>
                <tr>
                    <td class="tdborder">Analytical</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">6</td>
                    <td class="tdborder">Pass</td>
                </tr>
                <tr>
                    <td class="tdborder">Quantitative</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">Pass</td>
                </tr>
                <tr>
                    <td class="tdborder" rowspan="3"><b>Programming</b></td>
                    <td class="tdborder">Programming</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">7</td>
                    <td class="tdborder">Pass</td>
                </tr>
                 <tr>
                    <td class="tdborder" colspan="2" rowspan="2" width="38%"><b>Total Marks Secured</b></td>
                    <td class="tdborder">30</td>
                    <td class="tdborder">15</td>
                    <td class="tdborder">18</td>
                    <td class="tdborder"><b>Pass</b></td>
                </tr> -->

      <!--       </table>
        </div>
<br/>  -->
          <div class="row">
            <table class="tableWidth">
                
                <tr>
                    <th class="thborder thMainBorder" width="18%">Program</th>
                    <th class="thborder thMainBorder" width="20%">Language Selected</th>
                    <th class="thborder thMainBorder" width="10%">Code Lines</th>
                    <th class="thborder thMainBorder" width="25%">Compile Count</th>                    
                    <th class="thborder thMainBorder" width="10%">Time Taken</th>
                    <th class="thborder thMainBorder" width="17%">Status</th>
                </tr>
                <tr>
                    <td class="tdborder"><b>Program 1</b></td>
                    <td class="tdborder">Java</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">7</td>
                    <td class="tdborder">Pass</td>
                </tr>
                <tr>
                    <td class="tdborder"><b>Program 2</b></td>
                    <td class="tdborder">Java</td>
                    <td class="tdborder">10</td>
                    <td class="tdborder">5</td>
                    <td class="tdborder">7</td>
                    <td class="tdborder">Pass</td>
                </tr>

            </table>
        </div>
    </div><br/>
    <?php } ?>
<!--     <div class="container">
        <div class="row">
            <table class="tableWidth">
                <tr>
                    <td class="tdborder" rowspan="3" width="18%"><b>Cognitive</b></td>
                    <td class="tdborder" width="20%">English</td>
                    <td class="tdborder" width="10%">100</td>
                    <td class="tdborder" width="25%">50</td>
                    <td class="tdborder" width="17%">70</td>
                    <td class="tdborder" width="10%">Pass</td>
                </tr>
                <tr>
                    <td class="tdborder">Reasoning</td>
                    <td class="tdborder">100</td>
                    <td class="tdborder">50</td>
                    <td class="tdborder">60</td>
                    <td class="tdborder">Pass</td>
                </tr>
                <tr>
                    <td class="tdborder">Quantitative</td>
                    <td class="tdborder">100</td>
                    <td class="tdborder">50</td>
                    <td class="tdborder">50</td>
                    <td class="tdborder">Pass</td>
                </tr>
                <tr>
                    <td class="tdborder" colspan="2" rowspan="2" width="38%"><b>Total Marks Secured</b></td>
                    <td class="tdborder">300</td>
                    <td class="tdborder">150</td>
                    <td class="tdborder">180</td>
                    <td class="tdborder"><b>Pass</b></td>
                </tr>
            </table>
        </div>
    </div><br/>
    <div class="container">
        <div class="row">
            <table class="tableWidth">
               
            </table>
        </div>
    </div><br/> -->
    <div class="container">
        <h3>Interview Feedback</h3>
        <table class="tableWidth">
            <tr>
                <td rowspan="2" class="thborder round thMainBorder">Round 1</td>
                <td class="thborder interviewer thMainBorder">
                    Interviewer Name
                </td>
                <td rowspan="2" class="feedback">
                    Feedback:
                </td>
            </tr>
            <tr>
                <td class="thborder interviewername thMainBorder">
                    
                </td>
            </tr>
        </table><br/>
        <table class="tableWidth">
            <tr>
                <td rowspan="2" class="thborder round thMainBorder">Round 2</td>
                <td class="thborder interviewer thMainBorder">
                    Interviewer<br/>Name
                </td>
                <td rowspan="2" class="feedback">
                    Feedback:
                </td>
            </tr>
            <tr>
                <td class="thborder interviewername thMainBorder">
                    
                </td>
            </tr>
        </table><br/>
        <table class="tableWidth">
            <tr>
                <td rowspan="2" class="thborder round thMainBorder">Round 3</td>
                <td class="thborder interviewer thMainBorder">
                    Interviewer<br/>Name
                </td>
                <td rowspan="2" class="feedback">
                    Feedback:
                </td>
            </tr>
            <tr>
                <td class="thborder interviewername thMainBorder">
                    
                </td>
            </tr>
        </table><br/>

        <table class="tableWidth">
            <tr>
                <td rowspan="2" class="thborder round thMainBorder">Final Round</td>
                <td class="thborder interviewer thMainBorder">
                    Interviewer<br/>Name
                </td>
                <td rowspan="2" class="feedback">
                    Feedback:
                </td>
            </tr>
            <tr>
                <td class="thborder interviewername thMainBorder">
                    
                </td>
            </tr>
        </table><br/>    
        <p class="pText"  style="visibility: hidden;">Based upon the observation made and the candidates Interview and qualification , here you can comment whether you think the person should be further considered for this position or not. Tick any one box for each area , on the basis of your opinion Based upon the observation made and the candidates Interview and qualification , here you can comment whether you think the person should be further considered for this position or not. Tick any one box for each area , on the basis of your opinion.</p>

        <p class="pText">Based upon the observation made and the candidates Interview and qualification , here you can comment whether you think the person should be further considered for this position or not. Tick any one box for each area , on the basis of your opinion</p>
        <div class="row">
                
                <div class="col-md-9">
                <table class="tableWidth">
                    <tr><th class="thborder thMainBorder" colspan="4">DIFFERENT AREAS</th></tr>
                    <tr>
                        <th class="thborder thMainBorder">Areas</th>
                        <th class="thborder thMainBorder">Good</th>
                        <th class="thborder thMainBorder">Average</th>
                        <th class="thborder thMainBorder">Not Acceptable</th>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Communication Skills</b></td>
                        <td  class="thborder"><input type="checkbox"></td>
                        <td  class="thborder"><input type="checkbox"></td>
                        <td  class="thborder"><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Problem Solving Skills</b></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Job Specific Skills</b></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Experience</b></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Overall Personality</b></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                        <td  class="tdborder"><input type="checkbox"></td>
                    </tr>
                </table>
                </div>
                <div class="col-md-3">
                    <table class="tableWidth">
                        <tr><th class="thborder thMainBorder" colspan="2">Overall Evaluation</th></tr>
                        <tr>
                            <td class="thborder thMainBorder">Performance</td>
                            <td class="thborder thMainBorder">Tick Any one</td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Excellent</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Good</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Average</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Below Average</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Poor</td>
                            <td  class="thborder"><input type="checkbox"></td>
                        </tr>
                    </table>
                </div>
        </div><br/>
   
        <p>Final Decision:  Hired <input type="checkbox">&nbsp;&nbsp;&nbsp; Rejected <input type="checkbox">&nbsp;&nbsp;&nbsp; On hold <input type="checkbox"></p>
        
        Additional Comments:<input type="text"><br/>
        <input type="text"><br/>
        <input type="text"><br/>
        <input type="text"><br/>

    </div>
    </div><br/><br/>
</body>
</html>