<?php 
$proctoredTest = 1;

if (!$mcq['mcq-details']->proctoredTest) {
  $proctoredTest = 0;
}  

$search = isset($_GET['passed']) ? $_GET['passed'] : 0;

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
</style>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Assessment Details</h1>
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
          <div class="col-md-12">
            <h4>MCQs</h4>
            <div class="container"  id="detail">
            <div class="row">
              <div class="column">
                <label>User Count</label>
                <input type="number" name="generate" class="form-control" id="generate" placeholder="Enter Number to generate code" autocomplete="off"><br/><button onclick="generateUsrPwd()">Generate IDs</button>&nbsp;&nbsp;<button onclick="deleteUsrPwd()">Delete IDs</button>&nbsp;&nbsp;<button onclick="printUsrPwd()">Print IDs</button>&nbsp;&nbsp;<button onclick="downloadResult()">Print Result</button>
                <select id = "resultFilter" onchange="setFilter()">
                  <option value="0" <?php if ($search == "0") { echo "selected"; }?>> All </option>
                  <option value="1" <?php if ($search == "1") { echo "selected"; }?>> Passed </option>
                  <option value="2" <?php if ($search == "2") { echo "selected"; }?>> Failed </option>
                </select>
                <input type="hidden" id="student-result" value="0" />
                <button onclick="search()">Search</button>
              </div>
              <div class="column">
                <input type="hidden" id="mcqTestId" value= "<?php echo $mcq['mcq-details']->id;?>">
                 <label for="fname">Assessment : </label> <strong><?php echo $mcq['mcq-details']->title; if ($proctoredTest) {echo " (Proctored)";} else {echo " (Not Proctored)";}?></strong> <br/>
                  <label for="fname">Assessment Code : </label> <strong><?php echo $mcq['mcq-details']->code;?></strong> <br/>

                  <label for="fname">Student Appeared : </label> <strong><?php echo $mcq['mcq-details']->totalStudent?></strong><br/>
           
                  <label for="fname">Pass Count : </label> <strong><?=$mcq['mcq-details']->passCount;?></strong><br/>

                  <label for="lname">Fail Count : </label> <strong><?=$mcq['mcq-details']->failCount;?></strong><br/> 
              </div>
            </div>
          </div>


          <!-- for search filter start -->

          <div class="container">
                <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."admin/view-mcq-data-search/$mcqId";?>>

                    <div class="searchBox">

                          <div class="row">

                                <div class="col-md-2 ">
                                  <label>Name</label>
                                  <input type="text" id="searchname" name="searchname" class="form-control " placeholder="Search Name" value="<?php echo $searchname ?? ''; ?>" >
                                </div>

                                <div class="col-md-3">
                                  <label>Email</label>
                                  <input type="text" id="searchemail" name="searchemail" class="form-control" placeholder="Search Email" value="<?php echo $searchemail ?? ''; ?>">
                                </div>

                                <div class="col-md-3">
                                  <label>Contact-no</label>
                                  <input type="number" id="contactno" name="contactno" class="form-control" placeholder="Search Contact-no" value="<?php echo $contactno ?? ''; ?>">
                                </div>

                                <div class="col-md-2">
                                  <label>Username</label>
                                  <input type="text" id="searchusername" name="searchusername" class="form-control" placeholder="Search Username" value="<?php echo $searchusername ?? ''; ?>">
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

          <!-- for search filter end -->



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
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                  <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                  <th>Sl.no</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact-no</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Status</th>
                  <th>Result</th>
                  <th>Student result</th> 
                     <!-- <th>view</th>
                      <th>Download</th> -->
                      <?php 
                      if ($proctoredTest) { 
                       echo "<th>Send Invite</th>";
                     }?>
                   </thead>
    <tbody>

        <?php 
          $mcqId = $mcq['mcq-details']->id;
	       // $i = 0;
         $i = $this->uri->segment(4);
        if (count($mcq['mcq-users']) > 0)
        foreach($mcq['mcq-users'] as $key => $value) {
		$i++;

        $disabled = '';
        if ($value->studentId == null) {
          $disabled = 'onclick="return false;"';
        }


          $sendInvite = 0;

          if (in_array($value->id, $mcq['proctoredIds'])) {
            $sendInvite = 1;
          }
          $status =$status = "<span style='color:grey;'>NA</span>";
          $viewResult = "disabled";
          $hrefLink = "javascript:void(0);";
          $linkColor = "btn btn-default btn-xs";
          $viewLinkEmpty = "";

          if (isset($value->status)) {
            $viewResult = "";
            $linkColor = "btn btn-primary btn-xs";
            $hrefLink = base_url().'download-pdf/'.$mcqId.'/'.$value->studentId;
            $viewLinkEmpty = "_blank";
            if ($value->status == "FAIL") {
              $status = "<span style='color:red;'>".$value->status."</span>";
            } else {
              $status = "<span style='color:green;'>".$value->status."</span>";  
            }
            
          }

          
            echo '<tr><td>'.$i.'</td><td><a  href="#" data-toggle="modal" data-target="#myModal" onclick="showStudentDetails('.$value->studentId.')">'.$value->first_name." ".$value->last_name.'</a></td></td><td>'.$value->email.'</td><td>'.$value->contact_no.'</td><td>'.$value->username.'</td><td>'.$value->password.'</td><td>'.$status.'</td>

            <td>
              <p data-placement="top" data-toggle="tooltip" title="View">
                <a target='.$viewLinkEmpty.' href='.$hrefLink.'>
                  <button class="'.$linkColor.'" >
                    <span class="glyphicon glyphicon-eye-open"></span>
                  </button>
                </a>
              </p>
            </td>

        <td>
            <a title="Student result"  href="'.base_url()."admin/view-student-result/$mcqId/".$value->studentId.'" '.$disabled .'>
              <button class="btn btn-primary btn-xs" >
                <span class="glyphicon glyphicon-eye-open"></span>
              </button>
            </a>

        </td>';

     // <td><a href="view-students/'.$value->id.'"><button disabled class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></td>
      //<td><a href="download-students/'.$value->id.'"><button disabled class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-download-alt"></span></button></a></td> ';
    if ($proctoredTest) {
      if ($sendInvite) {
        echo '<td><p data-placement="top" data-toggle="tooltip" title="Invite">

      <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId('.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button><span class="glyphicon glyphicon-ok"></span>

      </p></td>';
    } else {
      echo '<td><p data-placement="top" data-toggle="tooltip" title="Invite">

      <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId('.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button></span>

      </p></td>';
    }}
    echo '</tr>';
        }
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
    </tr>-->

    
   
    
    </tbody>
        
</table>
<p><?php echo $links; ?></p>


<div class="clearfix"></div>
<!-- <ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="?page=1">1</a></li>
  <li><a href="?page=2">2</a></li>
  <li><a href="?page=3">3</a></li>
  <li><a href="?page=4">4</a></li>
  <li><a href="?page=5">5</a></li>
  <li><a href="?page=6"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul> -->
                
            </div>
            
        </div>
  </div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" id="closebox" data-dismiss="modal" aria-hidden="true" style="margin-top: -5%;
    margin-right: -30%;
    color: red;
    font-size: 16px;"><span class="glyphicon glyphicon-remove" aria-hidden="true" ></span></button>
        <h4 class="modal-title custom_align" id="Heading">Invitation Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
            <label>User Email </label>
        <input class="form-control " id="userEmail" type="text" placeholder="Enter Email">
        </div>
        <div class="form-group">
          <label>Proctor</label>
        <select  class="form-control inputBox" id="proctorId">
                      <option value=0> Select Proctor</option>
                      
        <?php 

        if (count($mcq['mcq-proctor']) > 0) {
        foreach($mcq['mcq-proctor'] as $key => $value) { ?>
        <option value=<?php echo $value->id; ?>> <?php echo $value->first_name." | ".$value->email." | ".$value->contact_no;?> </option>
        <?php } }?>                       
                    </select>
        </div>

        <div class="form-group">
          <label> Schedule Test</label>
          <div class='input-group date' id='datetimepicker1'>
            <input type='text' id="date-time" class="form-control"  />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-success btn-lg" style="width: 100%;" onclick="sendTestInvite()"><span class="glyphicon glyphicon-ok-sign"></span>Send Invite</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin-top: -5%;

margin-right: -29%;

color: red;">&times;</button>
          <h4 class="modal-title">Student Detail</h4>
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
                        <div style="height: 100vh;"></div>
                        <div class="card mb-4">
                            <!-- <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div> -->
                        </div>

                    </div>

                </main>

<script>
    $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
                function setUserId(id) {
                  document.getElementById("assessId").value = id;                  
                }

               function generateUsrPwd() {
                
                var num = document.getElementById("generate").value;
                var mcqId = document.getElementById("mcqTestId").value ;
                var baseUrl = document.getElementById("base_url").value;
                if (num.trim().length > 0) {
                  $.ajax({
                    url: baseUrl+"generateUsrPwd",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "mcqId" : mcqId, "num":num} ,
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


                } else {
                  $.alert({
                            title: 'SkillRary Alert!',
                            content: 'Please enter valid number',
                        });
                }


                        // $.alert({
                        //     title: 'SkillRary Alert!',
                        //     content: 'Username Password Generated',
                        // });


             }
             function deleteUsrPwd() {
                var mcqId = document.getElementById("mcqTestId").value ;
                var baseUrl = document.getElementById("base_url").value;
                $.confirm({
                  title: 'SkillRary Alert!',
                  content: 'Do you want to delete generated username & password ?',
                  buttons: {
                      confirm: function () {
                        $.ajax({
                          url: baseUrl+"deleteUsrPwd",
                          type: 'post',
                          data: { "mcqId" : mcqId} ,
                          success: function( data, textStatus, jQxhr ){

                            console.log('data', data);

                            window.location.reload();
                          },
                          error: function( jqXhr, textStatus, errorThrown ){
                            console.log( errorThrown );
                          }
                        });
                      },
                      cancel: function () {
                        
                      }
                  }
                });
             }

            function printUsrPwd() {
              var mcqId = document.getElementById("mcqTestId").value;
              var baseUrl = document.getElementById("base_url").value;
              var url = baseUrl+"printUsrPwd?mcqId="+mcqId;
              window.open(url);
            }

            function downloadResult() {
              var filter = document.getElementById("student-result").value;
              var mcqId = document.getElementById("mcqTestId").value;
              var baseUrl = document.getElementById("base_url").value;
              var url = baseUrl+"admin/download-students/"+mcqId+"/"+filter;
              window.open(url);
            }

            function search() {
              var filter = document.getElementById("student-result").value;
              var mcqId = document.getElementById("mcqTestId").value;
              var baseUrl = document.getElementById("base_url").value;
              var url = baseUrl+"admin/view-mcq-data/"+mcqId+"?passed="+filter;
              window.location.href=url;
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
     

             function sendTestInvite() {
               // alert('send');
                var proctorId = document.getElementById("proctorId").value ;
                var userEmail = document.getElementById("userEmail").value ;
                // var testDate = document.getElementById("testDate").value ;
                // var testTime = document.getElementById("testTime").value ;
                var mcqId = document.getElementById("mcqTestId").value ;
                var baseUrl = document.getElementById("base_url").value;
                var assessId = document.getElementById("assessId").value;

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
                    url: baseUrl+"admin/sendInvite",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "assessId" : assessId, "mcqId" : mcqId, "email":userEmail, "testDate":testDate, "testTime":testTime, "proctorId" : proctorId} ,
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

		document.getElementById("closebox").click();
             }
             function setFilter() {
              var filterValue = document.getElementById("resultFilter").value;
              document.getElementById("student-result").value = filterValue;
             }
</script>
