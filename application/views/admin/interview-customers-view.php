<input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Customer Details</h1>
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

 
<div class="container">
      <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="POST" action=<?php echo base_url()."admin/interview-customers-list-search";?>>

          <div class="searchBox">

                <div class="row">

                      <div class="col-md-2 ">
                        <label>Code</label>
                        <input type="text" id="searchcode" name="searchcode" class="form-control " placeholder="Search Code" value="<?php echo $searchcode; ?>" >
                      </div>

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
                        <input type="text" id="searchcontact" name="searchcontact" class="form-control" placeholder="Search Contact" value="<?php echo $searchcontact; ?>">
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


          <div class="col-md-12">
            <h4>SkillRary Interviews</h4>
            <div class="container">
<!--               <div class="searchBox">
                <div class="row">
                  <div class="col-md-3 offset-md-1">
                    <label>Name</label>
                    <input type="text" id="customer_name" name="customer_name" class="form-control inputBox" value= "<?php //echo $mcq['mcq-details']->title;?>">
                   
                  </div>
                  <div class="col-md-3 offset-md-1">
                    <label>Email</label>
                    <input type="text" id="customer_email" name="customer_email" class="form-control inputBox">
                  </div>
                  <div class="col-md-2 offset-md-1">
                    <label>Contact No</label>
                    <input type="text" id="customer_contactno" name="customer_contactno" class="form-control inputBox">
                  </div>
                <div>
             </div>
          </div>
<div class="row">
                  <div class="col-md-3 offset-md-1">
                    <label>Address</label>
                    <input type="text" id="customer_address" name="customer_address" class="form-control inputBox" value= "<?php //echo $mcq['mcq-details']->title;?>">
                  </div>
                
          </div>

                <div align="right">
                    <button class="searchBtn" onclick="saveCustomer()">ADD</button>
                </div>
            

        </div> -->

                           
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
                  <th>Id</th>                    
                  <th>Code</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact No</th>
                  <th>Action</th>
                      
                       <!-- <th>Delete</th> -->
                   </thead>
    <tbody>

        <?php 
        $i = 0;
        if (count($customers) > 0)
        foreach($customers as $key => $value) { 
          //print_r($value);
          $i++;
          echo '<tr><td>'.$i.'</td><td>'.$value->customer_code.'</td><td>'.$value->customer_name.'</td><td>'.$value->customer_email.'</td><td>'.$value->customer_contactno.'</td> <td><a title="View Interviews"  href="view-interview/'.$value->id.'"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a>&nbsp;<a title="Add Interviewer" href="add-interviewers/'.$value->id.'"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-plus"></span></button></a></td></tr>';
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

<script>
   $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

               function saveCustomer() {
                var baseUrl = document.getElementById("base_url").value;
                
                //var role = document.getElementById("role-name").value;
                //var mcqId = document.getElementById("mcqTestId").value ;
                var baseUrl = document.getElementById("base_url").value;

                var name = document.getElementById("customer_name").value;
                var email = document.getElementById("customer_email").value;
                var contact = document.getElementById("customer_contactno").value;
                var address = document.getElementById("customer_address").value;

                  $.ajax({
                    url: baseUrl+"admin/save-customers",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: {
                      "customer_name":name,
                      "customer_email":email,
                      "customer_contactno":contact,
                      "customer_address": address
                    } ,
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
</script>