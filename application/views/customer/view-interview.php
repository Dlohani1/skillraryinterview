            <?php 
              $customerId = $this->uri->segment(3);
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Interviews</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?=ucfirst($customer);?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <!--  <p class="mb-0">This page is an example of using static navigation. By removing the <code>.sb-nav-fixed</code> class from the <code>body</code>, the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.</p> -->
                                <!-- <div class="container-fluid">
                                    <div class="container">
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
                                            <div align="right"> -->
                                                <!-- <button class="searchBtn">Search</button> -->
                                                <!-- <input type="submit" value="search" />
                                            </div>
                                        </div>
                                    </div><br/> -->

                              <div class="container-fluid">
                                <div class="container">

                                    <?php 
                    if($this->session->flashdata('success'))
                    {
                        echo '<div class="alert alert-primary bg-success" >'.$this->session->flashdata('success').'</div>';
                    } 

                    if($this->session->flashdata('error'))
                    {
                        echo '<div class="alert alert-white bg-danger" >'.$this->session->flashdata('error').'</div>';
                    } 
                  ?>
                                   <div class="row">
        <div class="col-md-12">
        <h4>Interview Group</h4>

        <div class="container">
          <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."customer/view-interview-search";?>>
            <div class="searchBox">
              <div class="row">
                <div class="col-md-6">
                  <label>Code</label>
                  <input type="text" id="searchcode" name="searchcode" class="form-control" placeholder="Search Code" value="<?php echo $searchcode; ?>">
                </div>
                <div class="col-md-2">
                  <label>Search</label><br>
                  <button type="submit" value="Submit" class="btn-primary">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>


        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                   <thead>
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                       <th>Sl.no</th>
                        <th>Interview Code</th>
                        <th>Total Students</th>
                        <!-- <th>Total Question</th> -->
                        <th>view</th>
                        <!-- <th>Edit</th>
                        <th>Delete</th> -->
                   </thead>
                    <tbody>
                        <?php
                         $i = $this->uri->segment(3)+0;

                          foreach($interview as $key => $value) {
                            $i++;
                            echo "<tr>
                            <td>$i</td>

                            <td>$value->interview_code
                              <span title='edit code' style='cursor: pointer;' class='glyphicon glyphicon-pencil edit_interview_group_code' data-title='Edit' data-toggle='modal'  data-id='".$value->interview_code."'  data-interview_code='".$value->interview_code."'  ></span>
                            </td>
                            <td>$value->total_students</td><td><a href=".base_url()."customer/interview-result/$value->interview_code><button class='btn btn-primary btn-xs' ><span class='glyphicon glyphicon-eye-open'></span></button></a></td></tr>";
                          }
                        ?>
  </tbody>       
</table>
<p><?php echo $links; ?></p>
<div class="clearfix"></div>
</div>            
</div>
</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
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

<script type="text/javascript">
  

 $(".edit_interview_group_code").on("click", function() {

    let interview_code = $(this).data('interview_code')
    let id = $(this).data('id');

    $('#hidden_interview_code_id').val(id);
    $('#update_interview_code').val(interview_code);
    $('#hidden_old_interview_code').val(interview_code);

    $('#edit_interview_group_code_modal').modal('show');

  });

 function validatInterviewGroupCode() {
    var update_interview_code = document.getElementById("update_interview_code").value;

    var isError = true;

    if (update_interview_code.trim().length == 0) {
        isError = false;
        $("#error_update_interview_code").text("Please enter interview code.");
        $("#error_update_interview_code").css('color','red');
    } 

    return isError;
 }

</script>



<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="edit_interview_group_code_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

 <form autocomplete='off' enctype="multipart/form-data" method="POST" action=<?php echo base_url()."customer/edit-interview-group-code";?>  onsubmit="return validatInterviewGroupCode()" >

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Interview Group Code </h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">

                        <label>Update Interview Group Code</label>

                        <input type="hidden" id="hidden_interview_code_id" name="hidden_interview_code_id">
                        <input type="hidden" id="hidden_old_interview_code" name="hidden_old_interview_code">

                        <input type="text" id="update_interview_code" name="update_interview_code" required class="form-control">
                        <div id="error_update_interview_code" ></div>
      </div>
      <div class="modal-footer">
           <button type="submit" value="Submit">Update</button>
      </div>
    </div>
      </form>
  </div>
</div>
