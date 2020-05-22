<input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Interview Details</h1>
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
          <div class="col-md-12">
            <h4>Users List</h4> 
            <div class="container">
              <!-- <div class="searchBox"> -->
<!--                 <div class="row">
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
<!--           <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <label>Add Roles</label>
                                <input type="text" name="role-name" class="form-control" id="role-name" placeholder="Enter Role" autocomplete="off"><br/><button onclick="createRole()">Create Role</button>
                            </div>

                        </div> -->

        <!-- </div> -->

        <div class="container">
      <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."interviewer/assignedInterviewsSearch";?>>

          <div class="searchBox">

                <div class="row">

                      <div class="col-md-6 ">
                        <label>Search Date</label>
                        <input type="date" id="searchdate" name="searchdate" class="form-control " placeholder="Search Date" value="<?php echo $searchdate; ?>" >
                      </div>

                      <div class="col-md-2">
                          <label>Search</label><br>
                          <button type="submit" value="Submit">
                            <i  style="font-size:28px;color:lightblue" class="fa fa-search"></i>
                          </button>
                      </div>

                       <div class="col-md-1">
                        <label></label>
                         <input type="button" id="back" class="btn btn-primary" name="" value="Clear">
                      </div>

                </div>

          </div>
      </form>
  </div>
 
                           
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
                    <th>Email</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Mode</th>
                    <!-- <th>Test Started </th> -->
                     <!-- <th>Total Section</th>
                     <th>Total Question</th> -->
                    <!--  <th>Delete</th>
                      <th>Download</th> -->
                      
                    <th>Action</th>
                   </thead>
    <tbody>

        <?php 
        // $i = 0;

                 $i = $this->uri->segment(3)+0;


        if (count($users) > 0)
        foreach($users as $key => $value) { 
          //print_r($value);
          // foreach ($records as $row){ $i++; 
            $i++;

		 $a = $value->interview_date;
          $d = date_parse_from_format("Y-m-d", $a);

          $day = $d['day'];
          $year = $d['year'];

          $month = date("F",strtotime($value->interview_date));

            echo '<tr><td>'.$i.'</td><td>'.$value->user_email.'</td> <td>'.$day." ".$month.",".$year.'</td> <td>'.$value->interview_time.'</td><td>'.$value->interview_mode.'</td> <td>';
//             <button class="btn btn-primary"  id="joinMeeting"> Start Interview </button>
// <button class="btn btn-info"  id="addFeedback"> Add Feedback </button>
// <button class="btn btn-warning"  id="closeInterview"> Close Interview </button>


if ($value->is_active == "0") { echo '
<button class="btn btn-default" disabled onclick="startMeeting('.$value->id.')"> Start Interview </button>
<button class="btn btn-default" disabled onclick="setUser('.$value->id.')"  data-title="Edit" data-toggle="modal" data-target="#edit" >Add Feedback</button>
<button  class="btn btn-default" disabled onclick="closeInterview('.$value->id.')">  Close Interview </button>'; 
 
 } else {
echo '
<button class= "btn btn-info"  onclick="startMeeting('.$value->id.')"> Start Interview </button>
<button class="btn btn-success " onclick="setUser('.$value->id.')" data-title="Edit" data-toggle="modal" data-target="#myModal" >Add Feedback</button>
<button  class="btn btn-danger" onclick="closeInterview('.$value->id.')"> Close Interview </button>';
}
echo '</td> </tr>';
        }
        ?>
<!--     <td><a href="view-students/'.$value->id.'"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></td>
      <td><a href="download-students/'.$value->id.'"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-download-alt"></span></button></a></td> -->
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

<p><?php echo $this->pagination->create_links(); ?></p>

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
        <button type="button" class="close" id="closebox" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Add Comment</h4>
      </div>
          <div class="modal-body">
          <!-- <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div> -->
        <div class="form-group">

    
         <input type="hidden" id="commentId" />
        <textarea rows="2" class="form-control" id = "feedback" placeholder="Enter Feedback"></textarea>

        </div>

  <div class="form-group">
            <label> Interview Status </label>

            <input type="radio" name="status" value="1"> PASS
            <input type="radio" name="status" value="2"> FAIL
            <input type="radio" name="status" value="3"> HOLD

        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" onclick="saveComment()" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Save </button>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" style="margin-top: -3%;
    margin-right: -17%;
    color: red;">&times;</button>
          <h4 class="modal-title">Add Feedback</h4>
        </div>
        <div class="modal-body">
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
                </div>
        </div><br/>
   
        <p>Final Decision:  Hired <input type="checkbox" value="1" name="fs[]" class="fs">&nbsp;&nbsp;&nbsp; Rejected <input type="checkbox" name="fs[]" class="fs" value="2" >&nbsp;&nbsp;&nbsp; On hold <input type="checkbox" name="fs[]" class="fs" value="3" ></p>
        
        Additional Comments: <textarea id="addfeedback" > </textarea><br/>
        </div>
        <div class="modal-footer">
          <button type="button" onclick="saveComment()" class="btn btn-warning btn-lg" ><span class="glyphicon glyphicon-ok-sign"></span>Save </button>
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



  $('#back').click(function () {

      let baseUrl = '<?php echo base_url(); ?>';
      let url =  baseUrl+"interviewer/assignedInterviews";
      window.location.href = url;
    });


  
 $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });


		//function createMeeting(id) {

		//alert(id);
		//}

 		function startMeeting(id) {
                var baseUrl = document.getElementById("base_url").value;

                //var role = document.getElementById("role-name").value;
                //var mcqId = document.getElementById("mcqTestId").value ;
                //var baseUrl = document.getElementById("base_url").value;
                  $.ajax({
                    url: baseUrl+"admin/startMeeting",

                    type: 'post',

                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: {"call":"interview", "assessId" : id} ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
			window.open(data);
			//alert(data);
                         //document.getElementById("joinMeeting").style.display = "block";

			var element = document.getElementById("joinMeeting");
  			element.classList.add("btn-warning");
			element.classList.remove("btn-default");
                        // document.getElementById("codeSubmit").disabled = true;
                        //window.location.reload();
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


               function joinMeeting(id) {
                var baseUrl = document.getElementById("base_url").value;
                
                //var role = document.getElementById("role-name").value;
                //var mcqId = document.getElementById("mcqTestId").value ;
                //var baseUrl = document.getElementById("base_url").value;
                  $.ajax({
                    url: baseUrl+"admin/joinMeeting",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "assessId" : id} ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                  	      // document.getElementById("code").disabled = true;
					window.open(data);
	                        // document.getElementById("codeSubmit").disabled = true;
                        //window.location.reload();
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

              function closeInterview(id) {
                var baseUrl = document.getElementById("base_url").value;

                //var role = document.getElementById("role-name").value;
                //var mcqId = document.getElementById("mcqTestId").value ;
                //var baseUrl = document.getElementById("base_url").value;
                  $.ajax({
                    url: baseUrl+"admin/closeInterview",

                    type: 'post',

                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "assessId" : id} ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);

		                      // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);

			alert("Interview Closed");
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

              function saveComment() {
                var baseUrl = document.getElementById("base_url").value;

                var id = document.getElementById("commentId").value;
                //var comment = document.getElementById("feedback").value;

                var comment = document.getElementById("addfeedback").value;

                
                var error = 0;
                if (comment.trim().length > 0 ) {
                  error = 1;
                }

		            // var ele = document.getElementsByName('status'); 
                
                //   var status = 0;

                //   for(var i = 0; i < ele.length; i++) { 
                //       if(ele[i].checked) {
                //         status = ele[i].value;
                //         break;
                //       }                       
                //   }
                
                var ele = document.getElementsByName('cs[]'); 
                
                var cs = 0;

                for(var i = 0; i < ele.length; i++) { 
                    if(ele[i].checked) {
                      cs = ele[i].value;
                      break;
                    }
                                          
                }

                
                var ele = document.getElementsByName('pss[]'); 
                
                var pss = 0;

                for(var i = 0; i < ele.length; i++) { 
                    if(ele[i].checked) {
                      //error = 0;
                      pss = ele[i].value;
                      break;
                    }                  
                }

                
                var ele = document.getElementsByName('jss[]'); 
                
                var jss = 0;

                for(var i = 0; i < ele.length; i++) { 
                    if(ele[i].checked) {
                      //error = 0;
                      jss = ele[i].value;
                      break;
                    }                    
                }

                
                var ele = document.getElementsByName('exp[]'); 
                
                var exp = 0;

                for(var i = 0; i < ele.length; i++) { 
                    if(ele[i].checked) {
                      //error = 0;
                      exp = ele[i].value;
                      break;
                    }                  
                }


                var ele = document.getElementsByName('op[]'); 
                
                var op = 0;

                for(var i = 0; i < ele.length; i++) { 
                    if(ele[i].checked) {
                      //error = 0;
                      op = ele[i].value;
                      break;
                    }                     
                }

                
                var ele = document.getElementsByName('fs[]'); 
                
                var fs = 0;

                for(var i = 0; i < ele.length; i++) { 
                    if(ele[i].checked) {
                      //error = 0;
                      fs = ele[i].value;
                      break;
                    }                   
                }

                var ele = document.getElementsByName('oe[]'); 
                
                var oe = 0;

                for(var i = 0; i < ele.length; i++) { 
                    if(ele[i].checked) {
                      //error = 0;
                      oe = ele[i].value;
                      break;
                    }                  
                }


                if (!cs || !pss || !jss || !exp || !op || !oe || !fs || !error )  {
                  alert ("Please fill all the values");
                } else {

                

                 


                  $.ajax({
                    url: baseUrl+"admin/interviewFeedback",

                    type: 'post',

                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: {
                      "CommunicationSkill" : cs,
                      "ProblemSolvingSkill" : pss,
                      "JobSpecificSkill" : jss,
                      "exp":exp,
                      "OverallPersonality": op,
                      "OverallEvaluation" : oe,
                      "FinalStatus":fs,
                      "feedback":comment.trim(),
                      "assessId" : id
                    },


                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);

                          // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);

                        alert("Comment Added");
                        document.getElementById("feedback").value = "";
                        document.getElementById("closeboxx").click();
                        window.location.reload();
                        // document.getElementById("codeSubmit").disabled = true;
                        //window.location.reload();
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


              function setUser(id) {
                document.getElementById("commentId").value = id;
              }

              $(".cs").change(function()
                                  {
                                      $(".cs").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
               $(".pss").change(function()
                                  {
                                      $(".pss").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
                $(".jss").change(function()
                                  {
                                      $(".jss").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
                 $(".exp").change(function()
                                  {
                                      $(".exp").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
                  $(".op").change(function()
                                  {
                                      $(".op").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
                   $(".oe").change(function()
                                  {
                                      $(".oe").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });
                    $(".fs").change(function()
                                  {
                                      $(".fs").prop('checked',false);
                                      $(this).prop('checked',true);
                                  });

</script>
