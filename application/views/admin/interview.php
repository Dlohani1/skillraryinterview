<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

<style>
  /* Style the container/contact section */
#detail {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 10px;
}

/* Create two columns that float next to eachother */
.column {
  float: left;
  width: 50%;
  margin-top: 6px;
  padding: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.accordion {
  /*background-color: #eee;*/
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}

</style>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Schedule Interview </h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Details</li>
      </ol>
    <div class="card mb-4">
      <div class="card-body">
      <!--  <p class="mb-0">This page is an example of using static navigation. By removing the <code>.sb-nav-fixed</code> class from the <code>body</code>, the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.</p> -->
      <div class="container-fluid">
      <div class="container">
      <div class="row">
         <input type="hidden" id="base_url" name="base_url" value= "<?php echo base_url();?>" />
         <input type="hidden" id="assessId" name="assessId"  />
 <input type="hidden" id="round" name="round"  />
          <div class="col-md-12">
            <h4>INTERVIEWs</h4>
            <div class="container"  id="detail">
            <div class="row">
              <div class="column">
                <label>User Count</label>
                <input type="number" name="generate" class="form-control" id="generate" placeholder="Enter Number to generate code" autocomplete="off">
                <span id ="generate_error" style="color:red"></span>
              </div>

              <!--  <div class="column">
                <label>Interview Code (if any) </label> -->
                <input type="hidden" name="code" class="form-control" id="interview-code" placeholder="Enter code" autocomplete="off">



                <input type="hidden" id="mcqTestId" value= "<?php// echo $mcq['mcq-details']->id;?>">
                 <!-- <label for="fname">Assessment : </label> <strong><?php //echo $mcq['mcq-details']->title;?></strong> <br/>
                  <label for="fname">Assessment Code : </label> <strong><?php //echo $mcq['mcq-details']->code;?></strong> <br/>
 -->  

                  <!--   <label style="display: none">Select MCQs</label>
                    <select  style="display: none" class="form-control inputBox" id="mcqId">
                      <option value=0> Select </option> -->
                      
        <?php 

       // if (count($interviewData['mcqs-list']) > 0) {
        //foreach($interviewData['mcqs-list'] as $key => $value) {?>
        <!-- <option value=<?php //echo $value->id; ?>> <?php //echo $value->title;?> </option> -->
        <?php// } }?>                       
                    <!-- </select>
             


              </div> -->
              <div class="column">
               <button style="margin-top:30px" onclick="generateUsrPwd()">Generate IDs</button>
              </div>
            </div>




            </div>
          </div>
            <div class="container">
              <!-- <div class="searchBox"> -->
                <!-- <div class="row">
                  <div class="col-md-3 offset-md-1">
                    <label>MCQ Name</label>
                    <input type="text" class="form-control inputBox" value= "<?php //echo $mcq['mcq-details']->title;?>">
                    <input type="hidden" id="mcqTestId" value= "<?php //echo $mcq['mcq-details']->id;?>">
                  </div>
                  <div class="col-md-3 offset-md-1">
                    <label>Total Questions</label>
                    <input type="text" class="form-control inputBox">
                  </div>
                  <div class="col-md-2 offset-md-1">
                    <label>Code</label>
                    <input type="text" class="form-control inputBox">
                  </div>
                <div>
             </div>
          </div> -->
          <!-- <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <label>User Count</label>
                                <input type="number" name="generate" class="form-control" id="generate" placeholder="Enter Number to generate code" autocomplete="off"><br/><button onclick="generateUsrPwd()">Generate IDs</button>
                            </div>

                        </div> -->

        <!-- </div> -->

                           
        <!-- <div class="container">
        <div class="searchBox">
            <div class="row">
                <div class="col-md-3 offset-md-1">
                    <label>MCQ Name</label>
                    <input type="text" class="form-control inputBox">
                </div>
                <div class="col-md-3 offset-md-1">
                    <label>Total Questions</label>
                    <input type="text" class="form-control inputBox">
                </div>
                <div class="col-md-2 offset-md-1">
                    <label>Code</label>
                    <input type="text" class="form-control inputBox">
                </div>
            </div><br/>
            <div>
                <div align="right">
                    <button class="searchBtn">Search</button>
                </div>
            </div>
        </div><br/>
        </div>
 -->

 <!-- test -->
 <!-- <button class="accordion" id="one" ><b> Deepak </b> username : <b>test</b></button>
<div class="panel">
<button type="button" onclick="myFunction()">Try it</button>
 <table id="myTable" border = "1">
 <thead>
  <th> Round </th>
  <th> Send </th>
  <th> Feedback </th>
  <th> Result </th>
 </thead>
</table>
</div> -->
<br/>
<?php

  $i = 0;

  if (count($interviewData['users']) > 0) {
    foreach($interviewData['users'] as $key => $value) {
      $i++;
      $sendInvite = 0;
//print_r($value); die;
      $firstname = "";
      if (isset($value->first_name)) {
        $firstname = $value->first_name;
      }
      $lastname = "";
      if (isset($value->last_name)) {
        $lastname = $value->last_name;
      }
      $email = "";
      if (isset($value->email)) {
        $email = $value->email;
      }
      $contactNo = "";
      if (isset($value->contact_no)) {
        $contactNo = $value->contact_no;
      }
      $status = "NA";
      if ($value->interview_status == "1") {
        $status = "PASSED";
      } else if ($value->interview_status == "2") {
         $status = "REJECTED";
      } else if ($value->interview_status == "3") {
       $status = "ON HOLD";
      } else {
        $status = "NA";
      }
      ?>


      <button class="accordion" id="btn_<?=$i?>"> <?=$i;?> Name : <strong><?=$firstname." ".$lastname;?>  </strong> Email: <strong> <?=$email;?> </strong> Usename: <strong> <?=$value->username;?> </strong> Password: <strong> <?=$value->password;?> </strong> Final Status: <strong> <?=$status;?> </strong></button>
      <div class="panel">
        <br/>
        <button onclick="addNewSection(<?=$i.','.$value->id;?>)"> Add Rounds</button>
        <button onclick="saveStatus(<?=$value->id;?>)"> Add Final Status</button>
        <table class="table table-bordered" id="test_<?=$i;?>" border="1">
          <thead>
            <th>Round</th>
            <th>Send</th>
            <th>Result</th>
            <th>Next Round</th>
            <th>Status</th>
          </thead>
          <?php 
           

          for($j=1;$j<=$value->totalRound;$j++) {

            echo "<tr><td>Round $j</td><td><button onclick='setUserId($j,$value->id)' class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-envelope'></span></button></td><td><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#myModal1' onclick='showInterviewFeedback($j,$value->id)'><span class='glyphicon glyphicon-comment'></span></button></td><td><button class='btn btn-primary btn-xs' onclick='nextRound($j,$value->id)'><span class='glyphicon glyphicon-ok'></span></button></td>";
            //echo "<td>NA</td>";
              $field = "round_".$j;
            if ($value->$field == "1") {
              echo '<td><strong>PASSED</strong></td>';
            } else if ($value->$field == "2") {
              echo '<td><strong>REJECTED</strong></td>';
            } else if ($value->$field == "3") {
              echo '<td><strong>ON HOLD</strong></td>';
            } else {
              echo '<td>NA</td>';  
            }
            echo "</tr>";
          }
          ?>
        </table>
      </div>
<?php
    }
  }

?>
<!-- <button class="accordion">Section 2</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Section 3</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div> -->

<!-- test -->
        <!-- <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead> -->
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
		              <!--   <th>Sl. no </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact-no</th>
                    <th>Username</th>
                    <th>Password</th -->
                     <!-- <th>Total Section</th>
                     <th>Total Question</th> -->
                     <!-- <th>view</th>
                      <th>Download</th> -->
                      
                      <!--  <th  colspan = 4>Interview actions</th>
                   </thead>
    <tbody>
  <tr><td></td><td></td><td></td><td></td><td></td><td></td><td><strong>Round1</strong></td><td><strong>Round2</strong></td><td><strong>Round3</strong></td><td><strong>Status</strong></td></tr> -->

        <?php 

	// $i = 0;

 //        if (count($interviewData['users']) > 0)
 //        foreach($interviewData['users'] as $key => $value) {
	//   $i++;
 //          $sendInvite = 0;

          // if (in_array($value->id, $mcq['proctoredIds'])) {
          //   $sendInvite = 1;
          // }

          // $firstname = "";
          // if (isset($value->first_name)) {
          //   $firstname = $value->first_name;
          // }
          // $lastname = "";
          // if (isset($value->last_name)) {
          //   $lastname = $value->last_name;
          // }
          // $email = "";
          // if (isset($value->email)) {
          //   $email = $value->email;
          // }
          // $contactNo = "";
          // if (isset($value->contact_no)) {
          //   $contactNo = $value->contact_no;
          // }


          // echo '<tr><td>'.$i.'</td><td><a  href="#" data-toggle="modal" data-target="#myModal" onclick="showStudentDetails('.$value->studentId.')">'.$firstname." ".$lastname.'</a></td><td>'.$email.'</td><td>'.$contactNo.'</td><td>'.$value->username.'</td><td>'.$value->password.'</td>';
          	 // echo '<tr><td>'.$value->username.'</td><td>'.$value->password.'</td>';
     // <td><a href="view-students/'.$value->id.'"><button disabled class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></td>
      //<td><a href="download-students/'.$value->id.'"><button disabled class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-download-alt"></span></button></a></td> ';

      /*if ($sendInvite) {
        echo '<td><p data-placement="top" data-toggle="tooltip" title="Invite">

      <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId('.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button><span class="glyphicon glyphicon-ok"></span>

      </p></td>';
    } else {
      echo '<td><p data-placement="top" data-toggle="tooltip" title="Invite">

      <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId('.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button></span>

      </p></td>';
    }*/
    // $intervieweeId = $value->id;
    // $round1 = "";
    // $round1Status = "";
    // $round2Status = "";
    // $round3Status = "";
    // $round2 = "disabled";
    // $round3 = "disabled";
    // $textClass1 ="text-success";
    // $textClass2 ="text-success";
    // $textClass3 ="text-success";

    // if ($interviewData['round-result'][$intervieweeId]['round1']) {
    //   $round1 = "";
    // }

    // if ($interviewData['round-result'][$intervieweeId]['round2']) {
    //   $round2 = "";
    // }

    // if ($interviewData['round-result'][$intervieweeId]['round3']) {
    //   $round3 = "";
    // }

    // if ($value->active_round == "1") {
    //   $round1 = "";
    //   $round2 = "disabled";
    //   $round3 = "disabled";

    //   $round1Status = "";
    //   $round2Status = "";
    //   $round3Status = "";
    // }

    // if ($value->active_round == "2") {
    //   $round1 = "disabled";
    //   $round2 = "";
    //   $round3 = "disabled";

    //   $round1Status = "PASSED";

    //   $round2Status = "";
    //   $round3Status = "";
    // }

    // if ($value->active_round == "3") {
    //   $round2 = "disabled";
    //   $round1 = "disabled";
    //   $round3="";
    //   $round1Status = "PASSED";      
    //   $round2Status = "PASSED";
    //   $round3Status = "";
    // }

    // if ($value->interview_status == "1") {
        
    //   $round2 = "disabled";
    //   $round1 = "disabled";
    //   $round3 = "disabled";
    //   $round1Status = "PASSED";      
    //   $round2Status = "PASSED";
    //   $round3Status = "PASSED";

      // if ($value->active_round == "1") {
      //   $round1Status = "PASSED";      
      //   $round2Status = "";
      //   $round3Status = "";
      // } else if ($value->active_round == "2") {
      //   $round1Status = "PASSED";      
      //   $round2Status = "PASSED";
      //   $round3Status = "";
      // } else if ($value->active_round == "3") {
      //   $round1Status = "PASSED";      
      //   $round2Status = "";
      //   $round3Status = "";
      // }

    // } else if ($value->interview_status == "2") {
    
    //   $round2 = "disabled";
    //   $round1 = "disabled";
    //   $round3 = "disabled";
    //   $round1Status = "PASSED";      
    //   $round2Status = "PASSED";
    //   $round3Status = "PASSED";

     
    //   if ($value->active_round == "1") {
    //     $round1Status = "REJECTED";      
    //     $round2Status = "";
    //     $round3Status = "";
    //     $textClass1 ="text-danger";
    //   } else if ($value->active_round == "2") {
    //     $round1Status = "PASSED";      
    //     $round2Status = "REJECTED";
    //     $round3Status = "";
    //     $textClass2 ="text-danger";
    //   } else if ($value->active_round == "3") {
    //     $round1Status = "PASSED";      
    //     $round2Status = "PASSED";
    //     $round3Status = "REJECTED";
    //     $textClass3 ="text-danger";
    //   }

    // } else if ($value->interview_status == "3") {
     
    //   $round1 = "disabled";
    //   $round2 = "disabled";
    //   $round3 = "disabled";
    //   $round1Status = "PASSED";      
    //   $round2Status = "PASSED";
    //   $round3Status = "On HOLD";

      
    //   if ($value->active_round == "1") {
    //     $round1Status = "ON HOLD";      
    //     $round2Status = "";
    //     $round3Status = "";
    //     $textClass1 ="text-warning";
    //   } else if ($value->active_round == "2") {
    //     $round1Status = "PASSED";      
    //     $round2Status = "ON HOLD";
    //     $round3Status = "";
    //     $textClass2 ="text-warning";
    //   } else if ($value->active_round == "3") {
    //     $round1Status = "PASSED";      
    //     $round2Status = "PASSED";
    //     $round3Status = "ON HOLD";
    //     $textClass3 ="text-warning";
    //   }
    // }
    // if ($value->active_round == "4") {
    //   $round3 =  "disabled";
    //   $round2 =  "disabled";
    //   $round1 = "disabled";
    //   $round1Status = "PASSED";
    //   $round2Status = "PASSED";
    //   $round3Status = "PASSED";
    // }

      

// if ($sendInvite) {
//         echo '<td><p data-placement="top" data-toggle="tooltip" title="Invite">

//       <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId('.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button><span class="glyphicon glyphicon-ok"></span>

//       </p></td>';
//     } else {
//       echo '<td><span data-placement="top" data-toggle="tooltip" title="Invite">

//       <button '.$round1.' class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId(1,'.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button>&nbsp;</span>
// <span data-placement="top" data-toggle="tooltip" title="Comment">

//       <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#myModal1" onclick="showInterviewFeedback(1,'.$value->id.')"><span class="glyphicon glyphicon-comment"></span></button>      &nbsp;
//       </span>
//       <span data-placement="top" data-toggle="tooltip" title="Round">
//       <button '.$round1.' class="btn btn-primary btn-xs" onclick="nextRound(2,'.$value->id.')"><span class="glyphicon glyphicon-ok">
//       </span></button> <p class="'.$textClass1.'">'.$round1Status.'</p></td>

//       <td>

//       <button '.$round2.' class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId(2,'.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button>&nbsp;

//       <button  class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#myModal1" onclick="showInterviewFeedback(2,'.$value->id.')"><span class="glyphicon glyphicon-comment"></span></button>      &nbsp;

      
//       <button '.$round2.' class="btn btn-primary btn-xs" onclick="nextRound(3,'.$value->id.')"><span class="glyphicon glyphicon-ok">

//       </button><p class="'.$textClass2.'">'.$round2Status.'</p></td>


//       <td>

//       <button '.$round3.' class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId(3,'.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button>&nbsp;

      
//       <button  class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#myModal1" onclick="showInterviewFeedback(3,'.$value->id.')"><span class="glyphicon glyphicon-comment"></span></button>
//       &nbsp;

      
//       <button '.$round3.' class="btn btn-primary btn-xs" onclick="nextRound(4,'.$value->id.')"><span class="glyphicon glyphicon-ok"></span></button>
//       <p class="'.$textClass3.'">'.$round3Status.'</p></td>';

//       if ($value->interview_status == "1") {
//         echo '<td><strong>PASSED</strong></td>';
//       } else if ($value->interview_status == "2") {
//         echo '<td><strong>REJECTED</strong></td>';
//       } else if ($value->interview_status == "3") {
//         echo '<td><strong>ON HOLD</strong></td>';
//       } else {
//         echo '<td>NA</td>';  
//       }
      
//     }
//     echo '</tr>';
//         }
        ?>
    
    <!-- <tr>
    <th><input type="checkbox" id="checkall" /></th>
    <td>Mohsin</td>
    <td>Irshad</td>
    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
    <td>isometric.mohsin@gmail.com</td>
    <td>+923335586757</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
 <tr> -->
    <!-- <th><input type="checkbox" id="checkall" /></th> -->
    <!-- <td>Mohsin</td>
    <td>Irshad</td>
    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
    <td>isometric.mohsin@gmail.com</td>
    <td>+923335586757</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
 <tr> -->
    <!-- <th><input type="checkbox" id="checkall" /></th> -->
    <!-- <td>Mohsin</td>
    <td>Irshad</td>
    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
    <td>isometric.mohsin@gmail.com</td>
    <td>+923335586757</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
    
 <tr> -->
    <!-- <th><input type="checkbox" id="checkall" /></th> -->
   <!--  <td>Mohsin</td>
    <td>Irshad</td>
    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
    <td>isometric.mohsin@gmail.com</td>
    <td>+923335586757</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>
    
    
 <tr> -->
    <!-- <th><input type="checkbox" id="checkall" /></th> -->
<!--     <td>Mohsin</td>
    <td>Irshad</td>
    <td>CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan</td>
    <td>isometric.mohsin@gmail.com</td>
    <td>+923335586757</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr> -->
    
   
    
   
    
  <!--   </tbody>
        
</table> -->

<!-- <div class="clearfix"></div> -->
<!-- <ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul> -->
                
            <!-- </div> -->
            
        </div>
  </div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-top: -5%;

margin-right: -30%;

color: red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Invitation Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " id="userEmail" type="text" placeholder="Enter Email">
        </div>
        <div class="form-group">
        <label>Select Meeting IDs</label>
        <select  class="form-control inputBox" id="testId">
        <option value=0> Select </option>

        <?php 

        if (count($interviewData['meeting-id']) > 0) {$i = 1;
        foreach($interviewData['meeting-id'] as $key => $value) { ?>
        <option value=<?php echo $value->id; ?>> <?php echo "Room ".$i;?> </option>
        <?php $i++;} }?>                       
        </select>
        </div>

        <div class="form-group">
          <label>Interviewer</label>
       <!-- <select  class="form-control inputBox" id="interviewerId"> -->
          <select id="interviewerId" multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm " class="selectpicker w-100">
                      <!-- <option value=0> Select</option> -->
                      
        <?php 

        if (count($interviewData['interviewer-list']) > 0) {
        foreach($interviewData['interviewer-list'] as $key => $value) { ?>
        <option value=<?php echo $value->id; ?>> <?php echo $value->first_name." ".$value->last_name;?> </option>

	<?php } }?>                       
                    </select>
        </div>
        <div class="form-group">
          <label> Interview Schedule </label>

          <br/>
           <div class='input-group date' id='datetimepicker1'>
                    <input type='text' id="date-time" class="form-control"  />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                <br/>

         <!-- Date: <input type="date" id="testDate" /> Time : <input type="time" id="testTime"/> -->    
         Mode : <select class="form-group inputBox" id="interviewMode">
                      <option value=0 disabled> Select</option>
                       <option value=1 selected=> Online</option>
                        <option value=2 disabled> Offline</option>
              </select>
              <span id="error" style="color:red"></span></br>
               <label> Duration (in hrs) </label>
                <input type="number" id="duration" name="duration" min="1" max="5">

                

         
        
        </div>

        <!-- <div class="form-group">
          <label> Interview Mode</label>

             <select  class="form-control inputBox" id="interviewerMode">
                      <option value=0> Select</option>
                       <option value=1> Online</option>
                        <option value=2> Offline</option>
              </select>

             
        
        </div> -->

                <div class="form-group">
          <label> Venue </label>

          <input type="text" id="interviewVenue" />   
        
        </div>

       <!--  <div class="form-group">
          <label> Comment </label>
          <textarea id= "comment"></textarea> 
        
        </div> -->

      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-success btn-lg" style="width: 100%;" onclick="sendInterviewInvite()"><span class="glyphicon glyphicon-ok-sign"></span>Schedule</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
                                </div>
                            </div>
                        </div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin-top: -5%;

margin-right: -33%;

color: red;">&times;</button>
          <h4 class="modal-title">Interviewee Detail</h4>
        </div>
        <div class="modal-body">
                  <table id="classTable" class="table table-bordered">
          <thead>
          </thead>
          <tbody id="student">
           
          </tbody>
        </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


   <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin-top: -3%;
    margin-right: -17%;
    color: red;">&times;</button>
          <h4 class="modal-title">View Feedback</h4>
        </div>
        <div class="modal-body">
          <div class="row">
                
                <div class="col-md-9">
                <table class="tableWidth" id="">
                     <thead id="feedbackTblHead">
          </thead>
          <tbody id="feedbackTbl">
         
            <tr id = "test1">
            <!-- <td class="tdborder thMainBorder"><b>Communication Skills</b></td> -->
            </tr>
             <tr id = "test2">
          <!--   <td class="tdborder thMainBorder"><b>Problem Solving Skills</b></td> -->
            </tr>

 <tr id = "test3">
           <!--  <td class="tdborder thMainBorder"><b>Job Specific Skills</b></td> -->
            </tr>
 <tr id = "test4">
           <!--  <td class="tdborder thMainBorder"><b>Experience</b></td> -->
            </tr>
 <tr id = "test5">
          <!--   <td class="tdborder thMainBorder"><b>Overall Personality</b></td> -->
            </tr>
 <tr id = "test6">
           <!--  <td class="tdborder thMainBorder"><b>Overall Evaluation</b></td> -->
            </tr>
 <tr id = "test7">
          <!--   <td class="tdborder thMainBorder"><b>Status</b></td> -->
            </tr>

          </tbody>
                    <!-- <tr>
                        <td class="tdborder thMainBorder"><b>Communication Skills</b></td>
                        <td  class="thborder"><input type="checkbox" value="1" name="cs[]" class="cs"></td>
                        <td  class="thborder"><input type="checkbox" value="2" name="cs[]" class="cs"></td>
                        <td  class="thborder"><input type="checkbox" value="3" name="cs[]" class="cs"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Problem Solving Skills</b></td>
                        <td  class="tdborder"><input type="checkbox"  value="1" name="pss[]" class="pss"></td>
                        <td  class="tdborder"><input type="checkbox"  value="2" name="pss[]" class="pss"></td>
                        <td  class="tdborder"><input type="checkbox"  value="3" name="pss[]" class="pss"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Job Specific Skills</b></td>
                        <td  class="tdborder"><input type="checkbox"  value="1" name="jss[]" class="jss"></td>
                        <td  class="tdborder"><input type="checkbox"  value="2" name="jss[]" class="jss"></td>
                        <td  class="tdborder"><input type="checkbox"  value="3" name="jss[]" class="jss"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Experience</b></td>
                        <td  class="tdborder"><input type="checkbox"  value="1" name="exp[]" class="exp"></td>
                        <td  class="tdborder"><input type="checkbox"  value="2" name="exp[]" class="exp"></td>
                        <td  class="tdborder"><input type="checkbox"  value="3" name="exp[]" class="exp"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Overall Personality</b></td>
                        <td  class="tdborder"><input type="checkbox"  value="1" name="op[]" class="op"></td>
                        <td  class="tdborder"><input type="checkbox"  value="2" name="op[]" class="op"></td>
                        <td  class="tdborder"><input type="checkbox"  value="3" name="op[]" class="op"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Overall Evaluation</b></td>
                        <td  class="tdborder"><input type="checkbox"  value="1" name="op[]" class="op"></td>
                        <td  class="tdborder"><input type="checkbox"  value="2" name="op[]" class="op"></td>
                        <td  class="tdborder"><input type="checkbox"  value="3" name="op[]" class="op"></td>
                    </tr>
                     <tr>
                        <td class="tdborder thMainBorder"><b>Final Decision</b></td>
                        <td  class="tdborder"><input type="checkbox"  value="1" name="op[]" class="op"></td>
                        <td  class="tdborder"><input type="checkbox"  value="2" name="op[]" class="op"></td>
                        <td  class="tdborder"><input type="checkbox"  value="3" name="op[]" class="op"></td>
                    </tr>
                    <tr>
                        <td class="tdborder thMainBorder"><b>Comment</b></td>
                        <td  class="tdborder"><input type="checkbox"  value="1" name="op[]" class="op"></td>
                        <td  class="tdborder"><input type="checkbox"  value="2" name="op[]" class="op"></td>
                        <td  class="tdborder"><input type="checkbox"  value="3" name="op[]" class="op"></td>
                    </tr> -->
                </table>
                </div>
                <!-- <div class="col-md-3">
                    <table class="tableWidth">
                        <tr><th class="thborder thMainBorder" colspan="2">Overall Evaluation</th></tr>
                        <tr>
                            <td class="thborder thMainBorder">Performance</td>
                            <td class="thborder thMainBorder">Tick Any one</td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Excellent</td>
                            <td  class="thborder"><input type="checkbox" value="1" name="oe[]" class="oe"></td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Good</td>
                            <td  class="thborder"><input type="checkbox"  value="2" name="oe[]" class="oe"></td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Average</td>
                            <td  class="thborder"><input type="checkbox" value="3" name="oe[]" class="oe"></td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Below Average</td>
                            <td  class="thborder"><input type="checkbox"  value="4" name="oe[]" class="oe"></td>
                        </tr>
                        <tr>
                            <td  class="thborder thMainBorder">Poor</td>
                            <td  class="thborder"><input type="checkbox" value="5" name="oe[]" class="oe"></td>
                        </tr>
                    </table>
                </div> -->
        </div><br/>
   
        <!-- <p>Final Decision:  Hired <input type="checkbox" value="1" name="fs[]" class="fs">&nbsp;&nbsp;&nbsp; Rejected <input type="checkbox" name="fs[]" class="fs" value="2" >&nbsp;&nbsp;&nbsp; On hold <input type="checkbox" name="fs[]" class="fs" value="3" ></p>
        
        Additional Comments: <textarea id="addfeedback" > </textarea><br/>
 -->        </div>
        <div class="modal-footer">
<!--           <button type="button" onclick="saveComment()" class="btn btn-warning btn-lg" ><span class="glyphicon glyphicon-ok-sign"></span>Save </button> -->
          <button type="button" id="closeboxx" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

                        <div style="height: 100vh;"></div>
                        <div class="card mb-4">
                            <!-- <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div> -->
                        </div>
                    </div>
                </main>

<script>
  var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
      //panel.style.maxHeight = "auto";
    } 
  });
}

function myFunction() {
  var table = document.getElementById("myTable");
  var row = table.insertRow(1);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);  
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);

  cell1.innerHTML = "NEW CELL1";
  cell2.innerHTML = "NEW CELL2";
  cell3.innerHTML = "NEW CELL2";
  cell4.innerHTML = "NEW CELL2";
  document.getElementById("one").click();
  document.getElementById("one").click();
}

function addNewSection(i,id) {
  // var sectionCount = document.getElementById("sectionNo").value ;
  // document.getElementById("sectionNo").value = parseInt(sectionCount) + 1;
  // if (i == undefined) {
  //   var i = document.getElementById("sectionNo").value;
  // }

  var rowCount = document.getElementById('test_'+i).rows.length;

  var html = '';
  html += '<tr>';
  html += '<td>Round '+rowCount+'</td>';

  html += '&nbsp;<td><button onclick="setUserId('+rowCount+','+id+')" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-envelope"></span></button></td>';

  html += '&nbsp;<td> <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#myModal1" onclick="showInterviewFeedback('+rowCount+','+id+')"><span class="glyphicon glyphicon-comment"></span></button></td>';
  html +='<td><button class="btn btn-primary btn-xs" onclick="nextRound('+rowCount+','+id+')" ><span class="glyphicon glyphicon-ok"></span></button></td>';
  html += '&nbsp;<td>NA</td>';
  $('#test_'+i).append(html);
  document.getElementById("btn_"+i).click();
  document.getElementById("btn_"+i).click();
}
// $(document).ready(function () {
// $("#testDate").datepicker({
// minDate: 0
// });
// });
 $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        
function showInterviewFeedback(round,id) {
    var baseUrl = document.getElementById("base_url").value;
    $('#feedbackTblHead').empty();
    //$('#feedbackTbl').empty();

    $('#test1').empty();
    $('#test2').empty();
    $('#test3').empty();
    $('#test4').empty();
    $('#test5').empty();
    $('#test6').empty();
    $('#test7').empty();

   
    $.ajax({
                    url: baseUrl+"admin/showInterviewFeedback",
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                  data: { "id":id, "round": round} ,
                    success: function( data, textStatus, jQxhr ){

                    //   <tr><th class="thborder thMainBorder" colspan="4">DIFFERENT AREAS</th></tr>
                    // <tr>
                    //     <th class="thborder thMainBorder">Areas</th>
                        // <th class="thborder thMainBorder">Good</th>
                        // <th class="thborder thMainBorder">Average</th>
                        // <th class="thborder thMainBorder">Not Acceptable</th>
                    // </tr>
                    console.log('d', typeof(data))
                    if (data.length > 0) {
                     var eachrow = 
                               '<tr><th  style="font-size:18px" class="thborder thMainBorder" colspan="'+(data.length+1)+'">Feedback Details</th></tr><tr><th class="thborder thMainBorder"> Areas </th>';
                    
                   //$('#feedbackTblHead').append(eachrow);

                    for (i=1;i<= data.length;i++){

                       eachrow += '<th class="thborder thMainBorder"> Interviewer'+i+'</th>';

                               
                       
                    }
                    eachrow += '</tr>'
                    $('#feedbackTblHead').append(eachrow);

                    var tst1 = '<td  class="thborder">Communication Skill</td>'
                    var tst2 = '<td  class="thborder">Problem Solving Skill</td>'
                    var tst3 = '<td  class="thborder">Job Specific Skill</td>'
                    var tst4 = '<td  class="thborder">Experience</td>'
                    var tst5 = '<td  class="thborder">Overall Personality</td>'
                    var tst6 = '<td  class="thborder">Overall Evaluation</td>'
                    var tst7 = '<td  class="thborder">Status</td>'

                    $('#test1').append(tst1);
                    $('#test2').append(tst2);
                    $('#test3').append(tst3);
                    $('#test4').append(tst4);
                    $('#test5').append(tst5);
                    $('#test6').append(tst6);
                    $('#test7').append(tst7);


                     // for (i=0;i<data.length;i++){
                     //    console.log('dd', data[i])
                     //    if (data[i].communication_skill)
                     // }

                        $.each(data, function (index, item) {
                     //    console.log('a',item, index);

                        var ProblemSolvingSkill = "Good";
                        var JobSpecificSkill = "Good";
                        var Experience = "Good";
                        var OverallPersonality = "Good";
                        var OverallEvaluation = "Good";
                        var FinalDecision = "Hired";

                        switch(item.communication_skill) {
                          case "1" : var CommunicationSkill = "Good";break;
                          case "2" : var CommunicationSkill = "Average";break;
                          default : var CommunicationSkill = "Not Acceptable";break;
                         }
                        switch(item.problem_solving_skill) {
                          case "1" : var ProblemSolvingSkill = "Good";break;
                          case "2" : var ProblemSolvingSkill = "Average";break;
                          default : var ProblemSolvingSkill = "Not Acceptable";break;
                         }
                        switch(item.job_specific_skill) {
                          case "1" : var JobSpecificSkill = "Good";break;
                          case "2" : var JobSpecificSkill = "Average";break;
                          default : var JobSpecificSkill = "Not Acceptable";break;
                         }
                         switch(item.experience) {
                          case "1" : var Experience = "Good";break;
                          case "2" : var Experience = "Average";break;
                          default : var Experience = "Not Acceptable";break;
                         }
                         switch(item.overall_personality) {
                          case "1" : var OverallPersonality = "Good";break;
                          case "2" : var OverallPersonality = "Average";break;
                          default : var OverallPersonality = "Not Acceptable";break;
                         }
                         switch(item.overall_evaluation) {
                          case "1" : var OverallEvaluation = "Excellent";break;
                          case "2" : var OverallEvaluation = "Good";break;
                          case "3" : var OverallEvaluation = "Average";break;
                          case "4" : var OverallEvaluation = "Below Average";break;
                          default : var OverallEvaluation = "Poor";break;
                         }

                         switch(item.final_decision) {
                          case "1" : var FinalDecision = "Hired";break;
                          case "2" : var FinalDecision = "Rejected";break;
                          default : var FinalDecision = "On Hold";break;
                         }
                         

                        
                          // var eachrow = 
                          //        '<tr><td class="tdborder thMainBorder"><b>Communication Skills</b></td><td  class="thborder">'+CommunicationSkill+'</td></tr><tr><td class="tdborder thMainBorder"><b>Problem Solving Skills</b></td><td  class="thborder">'+ProblemSolvingSkill+'</td></tr><tr><td class="tdborder thMainBorder"><b>Job Specific Skills</b></td><td  class="thborder">'+JobSpecificSkill+'</td></tr><tr><td class="tdborder thMainBorder"><b>Experience</b></td><td  class="thborder">'+Experience+'</td></tr><tr><td class="tdborder thMainBorder"><b>Overall Personality</b></td><td  class="thborder">'+OverallPersonality+'</td></tr><tr><td class="tdborder thMainBorder"><b>Overall Evaluation</b></td><td  class="thborder">'+OverallEvaluation+'</td></tr><tr><td class="tdborder thMainBorder"><b>Final Status</b></td><td  class="thborder">'+FinalDecision+'</td></tr>';


                          //      $('#feedbackTbl').append(eachrow);

                               var tst1 = '<td  class="thborder">'+CommunicationSkill+'</td>'
                               var tst2 = '<td  class="thborder">'+ProblemSolvingSkill+'</td>'
                               var tst3 = '<td  class="thborder">'+JobSpecificSkill+'</td>'
                               var tst4 = '<td  class="thborder">'+Experience+'</td>'
                               var tst5 = '<td  class="thborder">'+OverallPersonality+'</td>'
                               var tst6 = '<td  class="thborder">'+OverallEvaluation+'</td>'
                               var tst7 = '<td  class="thborder">'+FinalDecision+'</td>'

                                $('#test1').append(tst1);
                                $('#test2').append(tst2);
                                $('#test3').append(tst3);
                                $('#test4').append(tst4);
                                $('#test5').append(tst5);
                                $('#test6').append(tst6);
                                $('#test7').append(tst7);
                        
                     });
                      } else {
                           var eachrow = 
                               '<tr><th class="thborder thMainBorder">No Comments Found</th></tr>';
                    
                   $('#feedbackTblHead').append(eachrow);

                      }
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        // document.getElementById("code").disabled = true;

                        // document.getElementById("codeSubmit").disabled = true;
                        //window.location.reload();
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });
  }

function showStudentDetails(userId) {
    var baseUrl = document.getElementById("base_url").value;
     $('#student').empty();
    $.ajax({
                    url: baseUrl+"admin/showStudentData",
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                  data: { "id":userId} ,
                    success: function( data, textStatus, jQxhr ){

                       $.each(data, function (index, item) {
                        //console.log(item, index);
                        if (null !== item) {
                        var eachrow = 
                               '<tr><td><strong>'+index+': </strong>'+item+ '</td></tr>';
                   $('#student').append(eachrow);
                }
                  });
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        // document.getElementById("code").disabled = true;

                        // document.getElementById("codeSubmit").disabled = true;
                        //window.location.reload();
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });
  }

function saveStatus(userId) {
  var baseUrl = document.getElementById("base_url").value;
  var status = prompt("Enter Round Status (Type 1 for PASS, 2 for REJECT, 3 for ON HOLD)");
  if (status !== null) {
  saveInterviewStatus(userId,status);
  alert('Saved');
  window.location.reload();
  }
}

function saveInterviewStatus(userId, status) {
    var baseUrl = document.getElementById("base_url").value;

    $.ajax({
                    url: baseUrl+"admin/saveInterviewStatus",
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "userId":userId,"status":status} ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        // document.getElementById("code").disabled = true;

                        // document.getElementById("codeSubmit").disabled = true;
                        window.location.reload();
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });
  }

  function nextRound(id,userId) {
    var baseUrl = document.getElementById("base_url").value;
    var status = prompt("Enter Round Status (Type 1 for PASS, 2 for REJECT, 3 for ON HOLD)");
    if (status !== null) {
      $.ajax({
        url: baseUrl+"admin/saveActiveRound",
        type: 'post',
        
        // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
        data: { "userId":userId,"round":id,"status":status} ,
        success: function( data, textStatus, jQxhr ){
            //window.location.reload(true);
           // window.location.href="admin/view-mcq";
            //$('#response pre').html( JSON.stringify( data ) );
            console.log('data', data);
            // document.getElementById("code").disabled = true;

            // document.getElementById("codeSubmit").disabled = true;
            window.location.reload();
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
      });
    }
  }

 function nextRoundOld(id,userId) {
  var baseUrl = document.getElementById("base_url").value;
                  //alert(round);
                  // document.getElementById("assessId").value = id;
                  // document.getElementById("round").value = round;
                  if (id !=4) {
                  var pass = confirm("Pass to next Round ?");       

                  if (pass) {

                    $.ajax({
                      url: baseUrl+"admin/saveActiveRound",
                      type: 'post',
                      
                      // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                      data: { "userId":userId,"round":id} ,
                      success: function( data, textStatus, jQxhr ){
                          //window.location.reload(true);
                         // window.location.href="admin/view-mcq";
                          //$('#response pre').html( JSON.stringify( data ) );
                          console.log('data', data);
                          // document.getElementById("code").disabled = true;

                          // document.getElementById("codeSubmit").disabled = true;
                          window.location.reload();
                      },
                      error: function( jqXhr, textStatus, errorThrown ){
                          console.log( errorThrown );
                      }
                    });

                    alert ('Moved to next round');
                  } else {
                     var status = prompt("Enter Round Status (Type 1 for PASS, 2 for REJECT, 3 for ON HOLD)");
                     if (status !== null) {
                      saveInterviewStatus(userId,status);
                      alert('Saved');
                      window.location.reload();
                     }
                  }
                  } else {
                    var status = prompt("Enter Round Status (Type 1 for PASS, 2 for REJECT, 3 for ON HOLD)");
                     if (status !== null) {
                      saveInterviewStatus(userId,status);
                      alert('Saved');
                      window.location.reload();
                     }
                  }          
                }


                function setUserId(round,id) {
                  //alert(round);
                  document.getElementById("assessId").value = id;
                  document.getElementById("round").value = round;                  
                }



               function generateUsrPwd() {
                
                var num = document.getElementById("generate").value;

                var isError = true;
                if (num.trim().length == 0) {
                  isError = false;
                  document.getElementById("generate_error").innerHTML = "Please enter value";
                } else if (num.trim() < 0) {
                  isError = false;
                  document.getElementById("generate_error").innerHTML = "Please enter positive value";
                } else {
                  document.getElementById("generate_error").innerHTML = "";
                }
                // var mcqId = document.getElementById("mcqId").value ;
                // alert(mcqId);
                var mcqId = 0;
                var baseUrl = document.getElementById("base_url").value;
                var code = "<?php echo $this->uri->segment(4);?>";
                var customerId = "<?php echo $this->uri->segment(3);?>";
                if (isError) {
                  $.ajax({
                    url: baseUrl+"admin/generateInterviewUsrPwd",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "num":num,"mcqId":mcqId, "code":code,"customer":customerId} ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        // document.getElementById("code").disabled = true;

                        // document.getElementById("codeSubmit").disabled = true;
                        window.location.reload();
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                
                });

                }
                        // $.alert({
                        //     title: 'SkillRary Alert!',
                        //     content: 'Username Password Generated',
                        // });


             }


function getSelectValues(select) {
  var result = [];
  var options = select && select.options;
  var opt;

  for (var i=0, iLen=options.length; i<iLen; i++) {
    opt = options[i];
 
    if (opt.selected) {
      result.push(opt.value || opt.text);
    }
 }
  return result;
}

function getHour(hour) {
  switch(hour) {
    case "1" : hour = "13";
               break;
    case "2" : hour = "14";
               break;
    case "3" : hour = "15";
               break;
    case "4" : hour = "16";
               break;
    case "5" : hour = "17";
               break;
    case "6" : hour = "18";
               break;
    case "7" : hour = "19";
               break;
    case "8" : hour = "20";
               break;
    case "9" : hour = "21";
               break;
    case "10" : hour = "22";
               break;
    case "11" : hour = "23";
               break;
    case "default" : hour = "12";
               break;
  }
  return hour;
}
             function sendInterviewInvite() {
               //alert('send');
                var pathArray = window.location.pathname.split('/');
                var customerId = pathArray[5];

                var interviewerId = document.getElementById("interviewerId").value ;
                var userEmail = document.getElementById("userEmail").value ;
                // var testDate = document.getElementById("testDate").value ;
                // var testTime = document.getElementById("testTime").value ;
                var interviewVenue = document.getElementById("interviewVenue").value ;
                var interviewMode = document.getElementById("interviewMode").value ;
                var testId = document.getElementById("testId").value ;
                var baseUrl = document.getElementById("base_url").value;

                var userId = document.getElementById("assessId").value;

            		var round = document.getElementById("round").value;
                var duration = document.getElementById("duration").value;

            		var interview = document.getElementById("interviewerId");
                var interviewerIds = getSelectValues(interview);

                var interviewDateTime =  document.getElementById("date-time").value;

                var res = interviewDateTime.split(" ");
                testDate = res[0];
                var timeSplit = res[1].split(":");
                var hour = timeSplit[0];
                if (res[2] == "PM") {
                  var hour = getHour(hour);

                }
                testTime = hour+":"+timeSplit[1];

                  $.ajax({
                    url: baseUrl+"admin/sendInterviewInvite",
                    type: 'post',

                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                
                    data: {"customerId":customerId,"duration":duration,"round":round, "userId" : userId, "meetingId" : testId, "email":userEmail, "testDate":testDate, "testTime":testTime, 
                    "interviewerId" : interviewerIds, "interviewMode" : interviewMode, "interviewVenue" : interviewVenue} ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        console.log('dd', data.status);
                        console.log('de',JSON.stringify( data ))
                        // document.getElementById("code").disabled = true;
                        if (data.status == "400") {
                            document.getElementById("error").innerHTML = data.data;
                        } else {
                        //document.getElementById("codeSubmit").disabled = true;
                       window.location.reload();
                      }
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });
             }
</script>
