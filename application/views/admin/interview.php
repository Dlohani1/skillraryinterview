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
          <div class="col-md-12">
            <h4>INTERVIEWs</h4>
            <div class="container"  id="detail">
            <div class="row">
              <div class="column">
                <label>User Count</label>
                <input type="number" name="generate" class="form-control" id="generate" placeholder="Enter Number to generate code" autocomplete="off">

              </div>

               <div class="column">

                <input type="hidden" id="mcqTestId" value= "<?php// echo $mcq['mcq-details']->id;?>">
                 <!-- <label for="fname">Assessment : </label> <strong><?php //echo $mcq['mcq-details']->title;?></strong> <br/>
                  <label for="fname">Assessment Code : </label> <strong><?php //echo $mcq['mcq-details']->code;?></strong> <br/>
 -->  

                    <label>Select MCQs</label>
                    <select  class="form-control inputBox" id="mcqId">
                      <option value=0> Select </option>
                      
        <?php 

        if (count($interviewData['mcqs-list']) > 0) {
        foreach($interviewData['mcqs-list'] as $key => $value) {?>
        <option value=<?php echo $value->id; ?>> <?php echo $value->title;?> </option>
        <?php } }?>                       
                    </select>
             


              </div>
              <div class="column">
                   <label>Interview Code (if any) </label>
                <input type="text" name="code" class="form-control" id="interview-code" placeholder="Enter code" autocomplete="off">

                    <br/><button onclick="generateUsrPwd()">Generate IDs</button>
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
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact-no</th>
                   <th>Username</th>
                    <th>Password</th>
                     <!-- <th>Total Section</th>
                     <th>Total Question</th> -->
                     <!-- <th>view</th>
                      <th>Download</th> -->
                      
                       <th>Send Invite</th>
                   </thead>
    <tbody>

        <?php 

        if (count($interviewData['users']) > 0)
        foreach($interviewData['users'] as $key => $value) {

          $sendInvite = 0;

          // if (in_array($value->id, $mcq['proctoredIds'])) {
          //   $sendInvite = 1;
          // }

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


          echo '<tr><td>'.$firstname." ".$lastname.'</td><td>'.$email.'</td><td>'.$contactNo.'</td><td>'.$value->username.'</td><td>'.$value->password.'</td>';
           // echo '<tr><td>'.$value->username.'</td><td>'.$value->password.'</td>';
     // <td><a href="view-students/'.$value->id.'"><button disabled class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></td>
      //<td><a href="download-students/'.$value->id.'"><button disabled class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-download-alt"></span></button></a></td> ';

      if ($sendInvite) {
        echo '<td><p data-placement="top" data-toggle="tooltip" title="Invite">

      <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId('.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button><span class="glyphicon glyphicon-ok"></span>

      </p></td>';
    } else {
      echo '<td><p data-placement="top" data-toggle="tooltip" title="Invite">

      <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" onclick="setUserId('.$value->id.')"><span class="glyphicon glyphicon-envelope"></span></button></span>

      </p></td>';
    }
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
    
   
    
   
    
    </tbody>
        
</table>

<div class="clearfix"></div>
<!-- <ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul> -->
                
            </div>
            
        </div>
  </div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Invitation Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " id="userEmail" type="text" placeholder="Enter Email">
        </div>
 <div class="form-group">
       

                    <label>Select MCQs</label>
                    <select  class="form-control inputBox" id="testId">
                      <option value=0> Select </option>
                      
        <?php 

        if (count($interviewData['mcqs-list']) > 0) {
        foreach($interviewData['mcqs-list'] as $key => $value) {?>
        <option value=<?php echo $value->id; ?>> <?php echo $value->title;?> </option>
        <?php } }?>                       
                    </select>
        </div>

        <div class="form-group">
          <label>Interviewer</label>
        <select  class="form-control inputBox" id="interviewerId">
                      <option value=0> Select</option>
                      
        <?php 

        if (count($interviewData['interviewer-list']) > 0) {
        foreach($interviewData['interviewer-list'] as $key => $value) { ?>
        <option value=<?php echo $value->id; ?>> <?php echo $value->first_name." | ".$value->email." | ".$value->contact_no;?> </option>
        <?php } }?>                       
                    </select>
        </div>
        <div class="form-group">
          <label> Interview Schedule </label>

          <br/>

         Date: <input type="date" id="testDate" /> Time : <input type="time" id="testTime"/>    
         Mode : <select class="form-group inputBox" id="interviewMode">
                      <option value=0> Select</option>
                       <option value=1> Online</option>
                        <option value=2> Offline</option>
              </select>
        
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
          <label> Interview Venue </label>

          <input type="text" id="interviewVenue" />   
        
        </div>

       <!--  <div class="form-group">
          <label> Comment </label>
          <textarea id= "comment"></textarea> 
        
        </div> -->

      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;" onclick="sendInterviewInvite()"><span class="glyphicon glyphicon-ok-sign"></span>Schedule</button>
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
                        <div style="height: 100vh;"></div>
                        <div class="card mb-4">
                            <!-- <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div> -->
                        </div>
                    </div>
                </main>

<script>


                function setUserId(id) {
                  document.getElementById("assessId").value = id;                  
                }

               function generateUsrPwd() {
                
                var num = document.getElementById("generate").value;
                var mcqId = document.getElementById("mcqId").value ;
                var baseUrl = document.getElementById("base_url").value;
                var code = document.getElementById("interview-code").value
                  $.ajax({
                    url: baseUrl+"admin/generateInterviewUsrPwd",
                   
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


                        // $.alert({
                        //     title: 'SkillRary Alert!',
                        //     content: 'Username Password Generated',
                        // });


             }


             function sendInterviewInvite() {
               // alert('send');
                var interviewerId = document.getElementById("interviewerId").value ;
                var userEmail = document.getElementById("userEmail").value ;
                var testDate = document.getElementById("testDate").value ;
                var testTime = document.getElementById("testTime").value ;
                var interviewVenue = document.getElementById("interviewVenue").value ;
                var interviewMode = document.getElementById("interviewMode").value ;
                var testId = document.getElementById("testId").value ;
                var baseUrl = document.getElementById("base_url").value;

                var userId = document.getElementById("assessId").value;

                  $.ajax({
                    url: baseUrl+"admin/sendInterviewInvite",
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "userId" : userId, "mcqId" : testId, "email":userEmail, "testDate":testDate, "testTime":testTime, 
                    "interviewerId" : interviewerId, "interviewMode" : interviewMode, "interviewVenue" : interviewVenue} ,
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
</script>
