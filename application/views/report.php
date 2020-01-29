<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>SkillRary Assessment Report</title>
    <style>
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
    </style>
</head>
<body>
    <?php //print_r($student); die; ?>
    <div class="container">
        <div class="row">
                    <table class="tableWidth">
                        <tr>
                           <td class="tdborder"><b>Name</b></td>
                           <td class="tdborder"><?php echo $student->first_name." ".$student->last_name;?></td>
                           <td class="tdborder"><b>SkillRary ID</b></td>
                           <td class="tdborder">763476765745647</td>
                        </tr>
                        <tr>
                            <td class="tdborder"><b>Email-ID</b></td>
                           <td class="tdborder"><?php echo $student->email;?></td>
                           <td class="tdborder"><b>Mobile No</b></td>
                           <td class="tdborder"><?php echo $student->contact_no;?></td>
                        </tr>
                        <tr>
                            <td class="tdborder"><b>Residence City</b></td>
                            <td class="tdborder"><?php echo $student->city;?></td>
                            <td class="tdborder"><b>Date of Birth </b></td>
                            <td class="tdborder"><?php echo $student->dob;?></td>
                        </tr>
                        <tr>
                            <td class="tdborder"><b>Percentage Marks(Passing year)</b></td>
                            <td class="tdborder" colspan="3"><div class="row">
                                <div class="col-md-4"><?php echo "10th-".$student->tenth_percentage."(".$student->tenth_passing_year.")";?></div><div class="col-md-4"><?php echo "<br/>12th-".$student->twelveth_percentage."(".$student->twelveth_passing_year.")";?></div><div class="col-md-4"><?php echo "<br/><br/> college-".$student->degree_percentage."(".$student->degree_passing_year.")";?></div></div></td>
                        </tr>
                        <tr>
                            <td class="tdborder"><b>College</b></td>
                            <td class="tdborder">City Engineering College, Bangalore</td>
                            <td class="tdborder"><b>Degree (Stream)</b></td>
                            <td class="tdborder"><?php echo $student->degree."(".$student->stream.")";?> </td>
                        </tr>
                    </table>
                    
                    <!-- <h3 style="margin-top:30px">Score</h3><br>
                    <table class="tableWidth">
                        <tr>
                           <th class="thborder">Module</th>
                           <th class="thborder" width="10%">National Percentile</th>
                           <th class="thborder" width="10%">College Percentile</th>
                           <th class="thborder" width="10%">AMCAT SCORE</th>
                           <th class="thborder" colspan="6">Sub-Module Name, Grade[A:Good,B:Average,C:Needs Improvement]</th>
                        </tr>
                        <tr>
                            <td class="tdborder"><b>English</b></td>
                            <td class="tdborder">98%</td>
                            <td class="tdborder">99%</td>
                            <td class="tdborder">735</td>
                            <td class="tdborder">Grammer</td>
                            <td class="tdborder">A</td>
                            <td class="tdborder">Vocabulary</td>
                            <td class="tdborder">A</td>
                            <td class="tdborder">Comprehension</td>
                            <td class="tdborder">A</td>
                        </tr>
                        <tr>
                            <td class="tdborder"><b>Quantitaive Ability</b></td>
                            <td class="tdborder">98%</td>
                            <td class="tdborder">99%</td>
                            <td class="tdborder">735</td>
                            <td class="tdborder">Grammer</td>
                            <td class="tdborder">A</td>
                            <td class="tdborder">Vocabulary</td>
                            <td class="tdborder">A</td>
                            <td class="tdborder">Comprehension</td>
                            <td class="tdborder">A</td>
                        </tr>
                        <tr>
                            <td class="tdborder"><b>Computer Programming</b></td>
                            <td class="tdborder">98%</td>
                            <td class="tdborder">99%</td>
                            <td class="tdborder">735</td>
                            <td class="tdborder">Grammer</td>
                            <td class="tdborder">A</td>
                            <td class="tdborder">Vocabulary</td>
                            <td class="tdborder">A</td>
                            <td class="tdborder">Comprehension</td>
                            <td class="tdborder">A</td>
                        </tr>
                        <tr>
                            <td class="tdborder"><b>Logic Ability</b></td>
                            <td class="tdborder">98%</td>
                            <td class="tdborder">99%</td>
                            <td class="tdborder">735</td>
                            <td class="tdborder">Grammer</td>
                            <td class="tdborder">A</td>
                            <td class="tdborder">Vocabulary</td>
                            <td class="tdborder">A</td>
                            <td class="tdborder">Comprehension</td>
                            <td class="tdborder">A</td>
                        </tr>
                    </table> -->

                </div>
                <h3 style="margin-top:30px;text-align: center;">Interview Feedback</h3><br>
                <p>Based upon the observation made and the candidates Interview and qualification , here you can comment whether you think the person should be further considered for this position or not. Tick any one box for each area , on the basis of your opinion</p>
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
                                        <th class="thborder">Performance</th>
                                        <th class="thborder">Tick Any one</th>
                                        
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
                <p>Final Decision :  Hired <input type="checkbox"> Rejected <input type="checkbox"> On hold <input type="checkbox"></p>
                <p>Comments:</p>
        </div>
</body>
</html>