<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <title>SkillRary Assessment</title>
    <style type="text/css">
        body{
            background-color: #f5f5f5;
        }
        .headContainer{
            margin: 0px;
            padding: 0px;
        }
        .bg-white{
            background: white !important;
            position: relative;
            z-index: 1;
            box-shadow: 0 8px 6px -6px #aaa;
        }
        .hrDesign{
            border-top: 1px solid white !important;
            padding: 0;
            width: 100%;
            margin-top: 0.5rem;
            margin-bottom: 0.5rem;
        }
        .editorContainer{
            margin: 0px;
            padding: 0px;
        }
        .registerBtn{
            background: #33A478;
            font-size: 18px !important;
            font-weight: 600 !important;
            letter-spacing: 0px !important;
        }
        .welcomeBox{
            margin-top: 10%;
            background: white;
            padding: 30px;
            text-align: center;  
            margin-bottom: 3%;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
        }
        .designBox{
            height: 200px;
            width: 100%;
            background: #33A478;
        }
        .subHeading{
            background-color: #696868;
        }
    </style>
</head>
<body>

    <div class="container-fluid editorContainer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="welcomeBox"  style="overflow-x:auto;">
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="4" style="background-color: #d0cfcf;">Results</th>
                            </tr>
                            <tr>
                                <th class="subHeading">Section</th>
                                <th class="subHeading">Total Question</th>
                                <th class="subHeading">Total Time (in sec)</th>
                                <th class="subHeading">User Completion Time </th>
                            </tr>
                            <?php

                            foreach ($results as $key => $value) { 
                                echo "<tr><td>".$value['section']."</td><td>".$value['total_question']."</td><td>".$value['total_time']."</td><td>".$value['user_time']."</td></tr>";

                            } 

                            if ($codeTestResult != 0) {
                               foreach ($codeTestResult as $key => $value) {

                                if ($value->time_taken > 60 ) {
                                    $min = intval($value->time_taken / 60);
                                    $sec = $value->time_taken % 60;
                                    $time = $min." min ".$sec. " sec";
                                } else {
                                    if ($value->time_taken> 0) {
                                        $time = $value->time_taken." sec";    
                                    } else {
                                        $time = "NA";
                                    }
                                    
                                }


                                    // echo "<tr><td>Code Test</td><td>Question".$key."</td><td>".$value->time_taken."</td><td>".$value->time_taken."</td></tr>";

                                }  
                            }
                            //print_r($codeTestResult);
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
