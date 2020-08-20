<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

<style>
   .accordion_container {
            width: 500px;
        }
        .accordion_head {
            /*background-color:skyblue;*/
            color: black;
            cursor: pointer;
            font-family: arial;
            font-size: 14px;
            margin: 0 0 1px 0;
            padding: 7px 11px;
            font-weight: bold;
        }
        .accordion_body {
            background: lightgray;
        }
        .accordion_body p{
            padding: 18px 5px;
            margin: 0px;
        }
        .plusminus{
            float:right;
        }
        th{
            text-align: center;
        }
        td{
            text-align: center;
        }
        .icon{
            padding: 6px 8px;
            background: lightgray;
            color: #33A478;
            font-size: 20px;
        }
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

/*.accordion {
  background-color: #eee;
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
}*/

/*.accordion:after {
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
}*/

</style>
<style>
.gifModalDialog{
    margin: 0 auto;
    display: table;
    position: absolute;
    left: 0;
    right: 0;
    top: 35%;
    -webkit-transform: translateY(-35%);
    -moz-transform: translateY(-35%);
    -ms-transform: translateY(-35%);
    -o-transform: translateY(-35%);
    width: 500px;
    transform: translateY(-35%);
}
.modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: white !important;
    background-clip: padding-box;
    border: 1px solid transparent !important;
    border-radius: .3rem;
    outline: 0;
}
.modal {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0;
    background: #fffcfc8a !important;
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
               <!-- <button style="margin-top:30px" onclick="removeUsrPwd()">Remove IDs</button> -->
              </div>
            </div>




            </div>
          </div>



<div class="container">
      <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."customer/interview-result-search/$interviewCode";?>>

          <div class="searchBox">

                <div class="row">

                    <!--   <div class="col-md-2 ">
                        <label>Code</label>
                        <input type="text" id="searchcode" name="searchcode" class="form-control " placeholder="Search Code" value="<?php echo $searchcode; ?>" >
                      </div> -->

                      <div class="col-md-3">
                        <label>Name</label>
                        <input type="text" id="searchname" name="searchname" class="form-control" placeholder="Search Name" value="<?php echo $searchname; ?>">
                      </div>

                      <div class="col-md-3">
                        <label>Email</label>
                        <input type="text" id="searchemail" name="searchemail" class="form-control" placeholder="Search Email" value="<?php echo $searchemail; ?>">
                      </div>

                      <div class="col-md-2">
                        <label>Contact</label>
                        <input type="number" id="searchcontact" name="searchcontact" class="form-control" placeholder="Search Contact" value="<?php echo $searchcontact; ?>">
                      </div>

                      <div class="col-md-2">
                          <label>Search</label><br>
                          <button type="submit" value="Submit">
                            <i  style="font-size:28px;color:lightblue" class="fa fa-search"></i>
                          </button>

                      </div>

                </div>

          </div>
      </form>
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

//   $i = 0;

//   if (count($interviewData['users']) > 0) {
//     foreach($interviewData['users'] as $key => $value) {
//       $i++;
//       $sendInvite = 0;
// //print_r($value); die;
//       $firstname = "";
//       if (isset($value->first_name)) {
//         $firstname = $value->first_name;
//       }
//       $lastname = "";
//       if (isset($value->last_name)) {
//         $lastname = $value->last_name;
//       }
//       $email = "";
//       if (isset($value->email)) {
//         $email = $value->email;
//       }
//       $contactNo = "";
//       if (isset($value->contact_no)) {
//         $contactNo = $value->contact_no;
//       }
//       $status = "NA";
//       if ($value->interview_status == "1") {
//         $status = "PASSED";
//       } else if ($value->interview_status == "2") {
//          $status = "REJECTED";
//       } else if ($value->interview_status == "3") {
//        $status = "ON HOLD";
//       } else {
//         $status = "NA";
//       }
      ?>


<!--       <button class="accordion" id="btn_<?=$i?>"> <?=$i;?> Name : <strong><?=$firstname." ".$lastname;?>  </strong> Email: <strong> <?=$email;?> </strong> Usename: <strong> <?=$value->username;?> </strong> Password: <strong> <?=$value->password;?> </strong> Final Status: <strong> <?=$status;?> </strong></button>
      <div class="panel">
        <br/>
        <button onclick="addNewSection1(<?=$i.','.$value->id;?>)"> Add Rounds</button>
        <button onclick="saveStatus1(<?=$value->id;?>)"> Add Final Status</button>
        <table class="table table-bordered" id="testt_<?=$i;?>" border="1">
          <thead>
            <th>Round</th>
            <th>Send</th>
            <th>Result</th>
            <th>Next Round</th>
            <th>Status</th>
          </thead> -->
          <?php 
           

          // for($j=1;$j<=$value->totalRound;$j++) {

          //   echo "<tr><td>Round $j</td><td><button onclick='setUserId($j,$value->id)' class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-envelope'></span></button></td><td><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#myModal1' onclick='showInterviewFeedback($j,$value->id)'><span class='glyphicon glyphicon-comment'></span></button></td><td><button class='btn btn-primary btn-xs' onclick='nextRound($j,$value->id)'><span class='glyphicon glyphicon-ok'></span></button></td>";
          //   //echo "<td>NA</td>";
          //   $field = "round_".$j;
          //   if ($value->$field == "1") {
          //     echo '<td><strong>PASSED</strong></td>';
          //   } else if ($value->$field == "2") {
          //     echo '<td><strong>REJECTED</strong></td>';
          //   } else if ($value->$field == "3") {
          //     echo '<td><strong>ON HOLD</strong></td>';
          //   } else {
          //     echo '<td>NA</td>';  
          //   }
          //   echo "</tr>";
          // }
          ?>
        <!-- </table>
      </div> -->
<?php
  //   }
  // }

?>
<!-- <button class="accordion">Section 2</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordion">Section 3</button>
<div class="panel">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div> -->
 <table class="table table-striped table-bordered">
    <thead>
      <tr>
        <th style="color: #33A478">SL.No</th>
        <th style="color: #33A478">Name</th>
        <th style="color: #33A478">Email</th>
        <th style="color: #33A478">Contact No</th>
        <th style="color: #33A478">Username</th>
        <th style="color: #33A478">Password</th>
        <th style="color: #33A478">Status</th>
        <th style="color: #33A478">Interview Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php

    $i = $this->uri->segment(4);

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
        $status = "<span class='text-success'>PASSED</span>";
      } else if ($value->interview_status == "2") {
         $status = "<span class='text-danger'>REJECTED</span>";
      } else if ($value->interview_status == "3") {
       $status = "<span class='text-warning'>ON HOLD</span>";
      } else {
        $status = "<span class='text-default'>NA</span>";
      }
      ?>


      <tr>
        <td><?=$i;?></td>
        <td><a  href="#" data-toggle="modal" data-target="#myModal" onclick="showStudentDetails(<?=$value->studentId;?>)"><?=$firstname." ".$lastname;?></a></td>
        <td><?=$email;?></td>
        <td><?=$contactNo;?></td>
        <td><?=$value->username;?></td>
        <td><?=$value->password;?></td>
        <td><?=$status;?></td>
        <td width="500"> 
            <div class="accordion_head"><span class="icon">+</span></div>
            <div class="accordion_body" style="display: none;">
            <table width="100%" id="test_<?=$i;?>" border="1">
                <thead>
                <tr>
                    <th colspan="4"><button onclick="addNewSection(<?=$i.','.$value->id;?>)"> Add Rounds</button>
                    </th>
                    <th colspan="3"> <button onclick="saveStatus(<?=$value->id;?>)"> Add Final Status</button>
                    </th>                    
                </tr>
                <tr>
                    <th width="30%">Round</th>
                    <th width="90%">Schedule</th>
                    <!-- <th width="30%">Update Schedule</th>
                    <th width="30%">View Schedule</th> -->
                    <th width="30%">Result</th>
                    <th width="30%" colspan="2">Status</th>
                </tr>
                <?php 
           
          for($j=1;$j<=$value->totalRound;$j++) {

            echo "<tr><td onclick='setInterviewId($value->id,$j)' data-toggle='modal' data-target='#interviewerModal' >Round $j</td>

              <td>
                <button title='Schedule' disabled onclick='setUserId($j,$value->id)' class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-envelope'></span></button>
                <button title='View Schedule' onclick='viewDateTime($j,$value->id)' class='btn btn-primary btn-xs' data-title='View Schedule' data-toggle='modal' data-target='#view_date_time' ><span title='View Schedule' class='glyphicon glyphicon-check'></span></button>
                <button title='Update Schedule' onclick='setUserId($j,$value->id)' class='btn btn-primary btn-xs' data-title='Update Schedule' data-toggle='modal' data-target='#interview_date_time' ><span class='glyphicon glyphicon-edit'></span></button>

                <button title='Create Meeting' onclick='setUserId($j,$value->id,true)' class='btn btn-primary btn-xs' ><span title='Create Meeting' class='glyphicon glyphicon-phone'></span></button>
              </td>
              <td><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#myModal1' onclick='showInterviewFeedback($j,$value->id)'><span class='glyphicon glyphicon-comment'></span></button></td><td><button class='btn btn-primary btn-xs' onclick='nextRound($j,$value->id)'><span class='glyphicon glyphicon-ok'></span></button></td>";
            //echo "<td>NA</td>";
            $field = "round_".$j;
            if ($value->$field == "1") {
              echo '<td class="text-success">PASSED</td>';
            } else if ($value->$field == "2") {
              echo '<td class="text-danger">REJECTED</td>';
            } else if ($value->$field == "3") {
              echo '<td class="text-info">ON HOLD</td>';
            } else {
              echo '<td>NA</td>';  
            }
            echo "</tr>";
          }
          ?>
                </thead>
                <tbody>
                
            </tbody>
            </table>
            </div>
        </td>
      </tr>
       <?php } }?>
    </tbody>
  </table>

        <?php 

	
        ?>
    
    
  <p><?php echo $links; ?></p>

<div class="clearfix"></div>

        </div>
  </div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" id="closeSchedule" data-dismiss="modal" aria-hidden="true" style="margin-top: -5%;

margin-right: -30%;

color: red;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Invitation Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " id="userEmail" type="text" placeholder="Enter Email">
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
            <input onblur="checkRoom()" type='text' id="date-time" class="form-control"  />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
        <br/>
         <div class="form-group">
          <label> Duration (in hrs) </label>
          <input type="number" id="duration" name="duration" min="1" max="5" value="1">
        </div>
        <br/>
        <div class="form-group">
          <label>Select Meeting IDs</label>
          <select  class="form-control inputBox" id="testId">
            <option value=0> Select </option>
            <?php 
            // if (count($interviewData['meeting-id']) > 0) {
            //   $i = 1;
            //   foreach($interviewData['meeting-id'] as $key => $value) { ?>
            <!-- <option value=<?php echo $value->id; ?>> <?php echo "Room ".$i;?> </option> -->
              <?php// $i++;
            //   }
            // }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label> Interview Mode</label>
          <select class="form-group inputBox" id="interviewMode">
            <option value=0 disabled> Select</option>
            <option value=1 selected=> Online</option>
            <option value=2 disabled> Offline</option>
          </select>
          <span id="error" style="color:red"></span></br>
        </div>

        <div class="form-group"  style="display:none">

          <label> Venue </label>
          <input type="text" id="interviewVenue" value="test"/>
        </div>
         <!-- Date: <input type="date" id="testDate" /> Time : <input type="time" id="testTime"/> -->

        <!-- <div class="form-group">
          <label> Interview Mode</label>

             <select  class="form-control inputBox" id="interviewerMode">
                      <option value=0> Select</option>
                       <option value=1> Online</option>
                        <option value=2> Offline</option>
              </select>

             
        
        </div> -->

               

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
    
    








<div class="modal fade" id="interview_date_time" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title custom_align" >Update Date and Time</h4>
        <button type="button" class="close" id="UpdateDateandTime" data-dismiss="modal" aria-hidden="true">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">


        <div class="form-group">
          <label> Date </label>
          <input type="date" id="update_date" name="update_date">
        </div>

        <div class="form-group">
          <label> Time </label>
          <input type="time" id="update_time" name="update_time">
        </div>
          

       <!--  <div class="form-group">
          <label>Interviewer</label>
          <select id="interviewer_id" class="form-control" >
            <option value="0">Select</option>
          <?php 

            if (count($interviewData['interviewer-list']) > 0) {
              foreach($interviewData['interviewer-list'] as $key => $value) { ?>
                <option value=<?php echo $value->id; ?>> <?php echo $value->first_name." ".$value->last_name;?> </option>

          <?php
              }
            }
          ?>

          </select>
        </div> -->


      </div>

      <div class="modal-footer ">
        <button type="button" class="btn btn-success btn-lg" style="width: 100%;" onclick="updateDateTime()"><span class="glyphicon glyphicon-ok-sign"></span>Update</button>
      </div>
    </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
</div>
    






<div class="modal fade" id="view_date_time" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title custom_align" >View Date and Time</h4>
        <button type="button" class="close" id="viewDateandTime" data-dismiss="modal" aria-hidden="true">
          <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button>
      </div>

      <div class="modal-body">

        <div id="viewDateandTimeDiv"></div>

      <!--   <div class="form-group">
          <label> Date </label>
          <p name="view_date" id="view_date"> </p>
        </div>

        <div class="form-group">
          <label> Time </label>
          <p name="view_time" id="view_time"> </p>
        </div>
          
        <div class="form-group">
          <label>Interviewer</label>
          <p name="view_interviewer" id="view_interviewer"> </p>
        </div>
      </div>
 -->
      <div class="modal-footer ">
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
<!-- Load Img -->

  <button type="button" style="display:none" id="loadImg" class="btn btn-light" data-toggle="modal" data-target="#imgModal">
    Open
  </button>

  <div class="modal" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog gifModalDialog">
      <div class="modal-content">

        <div class="modal-body" align="center">
          <img src="https://thumbs.gfycat.com/IlliterateConfusedAmericancrayfish-small.gif">
        </div>

        <div>
            <button type="button" style="display:none" id="hideImg" class="btn btn-light" data-dismiss="modal">Close</button>
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

 <div class="modal fade" id="interviewerModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Add Interviewers</p>
          <select id="newinterviewerId" multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm " class="selectpicker w-100">
                      <!-- <option value=0> Select</option> -->
                      
        <?php 

        if (count($interviewData['interviewer-list']) > 0) {
        foreach($interviewData['interviewer-list'] as $key => $value) { ?>
        <option value=<?php echo $value->id; ?>> <?php echo $value->first_name." ".$value->last_name;?> </option>

  <?php } }?>
                           
</select>
        </div>
        <div class="modal-footer">
          <input type="text" hidden id="interviewDetailId" />
          
          <input type="text" hidden id="roundValue" />
          <button onclick="addInterviewer()"> Add </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<script>

$(document).ready(function () {
    $(document).ajaxStart(function () {
        document.getElementById("loadImg").click();
    }).ajaxStop(function () {
        document.getElementById("hideImg").click();
    });
});

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

  var countRow = document.getElementById('test_'+i).rows.length;
  var rowCount = countRow - 1;
  var html = '';
  html += '<tr>';
  html += '<td>Round '+rowCount+'</td>';
  var createMeeting = true;
  html += '&nbsp;<td><button onclick="setUserId('+rowCount+','+id+')" class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-envelope"></span></button>';


  html += '&nbsp;<button onclick="setUserId('+rowCount+','+id+')" class="btn btn-primary btn-xs" data-title="Update Schedule" data-toggle="modal" data-target="#interview_date_time" ><span class="glyphicon glyphicon-edit"></span></button>';

  html += '&nbsp;<button onclick="viewDateTime('+rowCount+','+id+')"  class="btn btn-primary btn-xs" data-title="View Schedule" data-toggle="modal" data-target="#view_date_time" ><span class="glyphicon glyphicon-check"></span></button>';
  html += '&nbsp;<button onclick="setUserId('+rowCount+','+id+','+
  createMeeting+')" class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-phone" ></span></button></td>';

  html += '&nbsp;<td> <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#myModal1" onclick="showInterviewFeedback('+rowCount+','+id+')"><span class="glyphicon glyphicon-comment"></span></button></td>';
  html +='<td><button class="btn btn-primary btn-xs" onclick="nextRound('+rowCount+','+id+')" ><span class="glyphicon glyphicon-ok"></span></button></td>';
  html += '&nbsp;<td>NA</td>';
  $('#test_'+i).append(html);
  // document.getElementById("btn_"+i).click();
  // document.getElementById("btn_"+i).click();
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
                               '<tr><td><strong>'+index+': </strong></td><td>'+item+ '</td></tr>';
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


                function setUserId(round,id,createMeeting=false) {
                  document.getElementById("assessId").value = id;
                  document.getElementById("round").value = round;
                  if (createMeeting) {
                    createGotoMeeting(id,round);
                  }                  
                }

                function createGotoMeeting(id,round) {
                  var baseUrl = document.getElementById("base_url").value;
                  $.ajax({
                    url: baseUrl+"customer/createInterviewMeeting",

                    type: 'post',   
                    data: { "id": id ,"round": round} ,
                    success: function( data, textStatus, jQxhr ){
                      if (data == 0 ) {
                        alert("Something Went Wrong. Please Try Again !!");
                      }
                      if (data == 1 ) {
                        alert("Meeting Created Successfully.");
                      }
                      //$('#viewDateandTimeDiv').html(data);
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                      console.log( errorThrown );
                    }
                  });
                }

                function viewDateTime(round,id) {
                  var baseUrl = document.getElementById("base_url").value;
                  $.ajax({
                    url: baseUrl+"customer/viewInterviewerDateTime",

                    type: 'post',   
                    data: { "id": id } ,
                    success: function( data, textStatus, jQxhr ){

                      $('#viewDateandTimeDiv').html(data);
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                      console.log( errorThrown );
                    }
                  });

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
                var code = "<?php echo $this->uri->segment(3);?>";
                if (isError) {
                  $.ajax({
                    url: baseUrl+"customer/generateInterviewUsrPwd",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "num":num,"mcqId":mcqId, "code":code} ,
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

  function checkRoom() {
    var duration = document.getElementById("duration").value;
    var interviewDateTime =  document.getElementById("date-time").value;
    var res = interviewDateTime.split(" ");
    testDate = res[0];
    var timeSplit = res[1].split(":");
    var hour = timeSplit[0];

    if (res[2] == "PM") {
      var hour = getHour(hour);

    }
    testTime = hour+":"+timeSplit[1];
    //alert('test');
    var baseUrl = document.getElementById("base_url").value;
    $.ajax({
    url: baseUrl+"customer/checkRoom",
    type: 'post',

    data: {"testdate":testDate,"testTime":testTime ,"duration":duration,} ,
    success: function( data, textStatus, jQxhr ){
        //window.location.reload(true);
        // window.location.href="admin/view-mcq";
        //$('#response pre').html( JSON.stringify( data ) );
        // console.log('data', data);
        // console.log('dd', data.status);
        // console.log('de',JSON.stringify( data ))
        // document.getElementById("code").disabled = true;

        var opts = $.parseJSON(data);
        console.log('oo', opts)
        $('#testId').empty();
        // Use jQuery's each to iterate over the opts value
        $.each(opts, function(i, d) { console.log('d',d);
           j = i+1;
            // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
            $('#testId').append('<option value="' + d.id + '">Room ' + j + '</option>');
          });

        if (data.status == "400") {
            document.getElementById("error").innerHTML = data.data;
        } else {
        //document.getElementById("codeSubmit").disabled = true;
       //window.location.reload();
      }
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
  });
  }


 function sendInterviewInvite() {
 //alert('send');
  //var pathArray = window.location.pathname.split('/');
  //var customerId = pathArray[5];
  var customerId = "<?php echo $_SESSION['customerId'];?>";
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
  document.getElementById("closeSchedule").click();
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
        } 
        else {
        //document.getElementById("codeSubmit").disabled = true;
       window.location.reload();
      }
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
  });
}





    function updateDateTime() {
      var customerId = "<?php echo $_SESSION['customerId'];?>";

      var userId = document.getElementById("assessId").value;
      //var interviewer_id = document.getElementById("interviewer_id").value;

      var update_date = document.getElementById("update_date").value;
      var update_time = document.getElementById("update_time").value;
      var baseUrl = document.getElementById("base_url").value;
      document.getElementById("UpdateDateandTime").click();

      $.ajax({
        url: baseUrl+"customer/updateDateTime",
        type: 'post',

        // data: { "update_date": update_date, "update_time": update_time,"customerId": customerId,"userId": userId, "interviewer_id":interviewer_id } ,
        data: { "update_date": update_date, "update_time": update_time,"customerId": customerId,"userId": userId } ,

        success: function( data, textStatus, jQxhr ){
          //  datas = JSON.parse( data )

          // if (datas.status == 500 ) {
          //   document.getElementById("generate_error").innerHTML = datas.data;
          //   document.getElementById("generate_error").style.color = 'red';
          // }

          // if (datas.status == 200 ) {
          //   document.getElementById("generate_error").innerHTML = datas.data;
          //   document.getElementById("generate_error").style.color = 'green';
          // }
          if (data == "1") {
            alert("Interview Schedule Updated Successfully")
          } else {
            alert("Something Went Wrong. Please check")
          }
          document.getElementById("update_date").value = ''
          document.getElementById("update_time").value = '';

        },
        error: function( jqXhr, textStatus, errorThrown ){
          console.log( errorThrown );
        }
      });
    }



 $(".accordion_head").click(function(){
  if ($('.accordion_body').is(':visible')) {
    $(".accordion_body").slideUp(300);
    $(".plusminus").text('+');
  }
  if( $(this).next(".accordion_body").is(':visible')){
      $(this).next(".accordion_body").slideUp(300);
      $(this).children(".plusminus").text('+');
  }else {
      $(this).next(".accordion_body").slideDown(300); 
      $(this).children(".plusminus").text('-');
  }
        });
function setInterviewId(id, round) {

document.getElementById("interviewDetailId").value = id;
document.getElementById("roundValue").value = round;
 }
 function addInterviewer() {
  //var interviewerId = document.getElementById("newinterviewerId").value ;
  var interview = document.getElementById("newinterviewerId");
  var interviewerIds = getSelectValues(interview);
  var round = document.getElementById("roundValue").value;
  //alert(interviewerIds)
  var baseUrl = "<?php echo base_url();?>"
  var interviewerDetailId = document.getElementById("interviewDetailId").value;
 $.ajax({
    url: baseUrl+"admin/addInterviewer",
    type: 'post',

    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,

    data: { "round":round,"interviewerId" : interviewerIds, "interviewerDetailId" : interviewerDetailId} ,
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
          alert("Interviewer Added");
        //document.getElementById("codeSubmit").disabled = true;
       //window.location.reload();
      }
    },
    error: function( jqXhr, textStatus, errorThrown ){
        console.log( errorThrown );
    }
  });

}
</script>
