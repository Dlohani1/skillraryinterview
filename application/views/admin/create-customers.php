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
          <?php 
          if($this->session->flashdata('success'))
          {
            echo '<div class="alert alert-primary bg-success" >'.$this->session->flashdata('success').'</div>';
          } 
        ?>
      <div class="container">

      <div class="row">
         <input type="hidden" id="base_url" name="base_url" value= "<?php echo base_url();?>" />
          <div class="col-md-12">
            <h4>SkillRary Customers</h4>
            <div class="container">
              <div class="searchBox">
                <div class="row">
                  <div class="col-md-3 offset-md-1">

                    <input type="hidden" id="hidden_customer_id" name="hidden_customer_id" value=0>


                    <label>Name</label>
                    <input type="text" id="customer_name" name="customer_name" class="form-control inputBox">
                    <span id="nameError" style="color:red"></span>
                  </div>
                  <div class="col-md-3 offset-md-1">
                    <label>Email</label>
                    <input type="text" id="customer_email" name="customer_email" class="form-control inputBox">
                    <span id="emailError" style="color:red"></span>
                    <input type="checkbox" id="isMCQ" name="isMCQ">MCQ
                  </div>
                  <div class="col-md-2 offset-md-1">
                    <label>Contact No</label>
                    <input type="number" id="customer_contactno" name="customer_contactno" class="form-control inputBox">
                    <span id="contactError" style="color:red"></span>                    
                    <input type="checkbox"  id="isInterview" name="isInterview">Interview
                  </div>
                <div>
             </div>
          </div>
          <div class="row">
            <div class="col-md-3 offset-md-1">
              <label>Address</label>
              <input type="text" id="customer_address" name="customer_address" class="form-control inputBox" >
              <span id="addressError" style="color:red"></span>
            </div>                
          </div>

                <div align="right">
                    <button class="searchBtn" id="add_or_update" onclick="saveCustomer()">ADD</button>
                </div>
            

        </div><br>




      <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."admin/create-customers-search";?>>

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
                        <label>Contact No</label>
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
                    <th>Sl.no</th>                    
                    <th>Code</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Edit</th>
                  </thead>
                  
                  <tbody>

                  <?php 
                    $i = $this->uri->segment(3);

                    if (count($customers) > 0)
                      foreach($customers as $key => $value) { 

                        $i++;
                        echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$value->customer_code.'</td>
                                <td>'.$value->customer_name.'</td>
                                <td>'.$value->customer_email.'</td>
                                <td>'.$value->customer_contactno.'</td>
                                <td>'.$value->username.'</td>
                                <td>'.$value->password.'</td>

                                <td>
                                    <p data-placement="top"  data-toggle="tooltip" title="Edit">
                                    <button class="btn btn-primary btn-xs edit_customer" data-title="Edit" data-id="'.$value->id.'" data-customer_name="'.$value->customer_name.'"  data-customer_email="'.$value->customer_email.'"  data-customer_contactno="'.$value->customer_contactno.'" data-customer_address="'.$value->customer_address.'" data-mcq="'.$value->mcq.'"  data-interview="'.$value->interview.'"  >
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                  </p>
                                </td>
                              </tr>';
                      }
                  ?>


<!--    <td><a href="view-mcq/'.$value->id.'"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></td> <td><a href="view-students/'.$value->id.'"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></td>
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
<p><?php echo $links; ?></p>
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
   // $.ajaxSetup({
   //      data: {
   //          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
   //      }
   //  });

               function saveCustomer() {
                var baseUrl = document.getElementById("base_url").value;
                
                //var role = document.getElementById("role-name").value;
                //var mcqId = document.getElementById("mcqTestId").value ;
                var baseUrl = document.getElementById("base_url").value;

                var name = document.getElementById("customer_name").value;
                var email = document.getElementById("customer_email").value;
                var contact = document.getElementById("customer_contactno").value;
                var address = document.getElementById("customer_address").value;
                var isMCQ =  document.getElementById("isMCQ").checked ? 1 : 0;
                var isInterview =  document.getElementById("isInterview").checked ? 1 : 0;
                var hidden_customer_id = document.getElementById("hidden_customer_id").value;

                var isError = true;

                if (name.trim().length == 0 ) {
                    isError = false;
                    document.getElementById("nameError").innerHTML="Please enter name";
                } else {
                    
                    document.getElementById("nameError").innerHTML="";
                }
                 var emailpattern = /^([a-zA-Z0-9.-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
                if (email.trim().length == 0 ) {
                    isError = false;
                    document.getElementById("emailError").innerHTML="Please enter email";
                } else if(!emailpattern.test(email)) {
                    isError = false;
                    document.getElementById("emailError").innerHTML="Please enter valid email address";
                } else {
                    document.getElementById("emailError").innerHTML="";
                }
                var phoneno = /^\d{10}$/;
                if (contact.trim().length == 0 ) {
                    isError = false;
                    document.getElementById("contactError").innerHTML="Please enter contact number";
                } else if(!contact.trim().match(phoneno)){
                    isError = false;
                    document.getElementById("contactError").innerHTML="Please enter 10 digit valid number";
                } else {    
                    document.getElementById("contactError").innerHTML="";
                }
                if (address.trim().length == 0 ) {
                    isError = false;
                    document.getElementById("addressError").innerHTML="Please enter address";
                } else {
                    
                    document.getElementById("addressError").innerHTML="";
                }
                  if (isError) {
                  $.ajax({
                    url: baseUrl+"admin/save-customers",
                    type: 'post',
                    data: {
                      "customer_name":name,
                      "customer_email":email,
                      "customer_contactno":contact,
                      "customer_address": address,
                      "mcq": isMCQ,
                      "interview": isInterview,
                      "hidden_customer_id": hidden_customer_id
                    } ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        // document.getElementById("code").disabled = true;
                        //  $.alert({
                        //     title: 'SkillRary Alert!',
                        //     content: 'Customer added Successfully',
                        // });
                        // document.getElementById("codeSubmit").disabled = true;
                        window.location.reload();
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });

                }
                       


             }


  $('.edit_customer').click(function () {
      
      $(window).scrollTop(0);
      
      let id = $(this).data('id');
      let customer_name = $(this).data('customer_name');
      let customer_email = $(this).data('customer_email');
      let customer_contactno = $(this).data('customer_contactno');
      let customer_address = $(this).data('customer_address');
      let mcq = $(this).data('mcq');
      let interview = $(this).data('interview');

      if (mcq) {
        $('#isMCQ').prop('checked', true);
      }

      if (interview) {
        $('#isInterview').prop('checked', true);
      }

      $('#hidden_customer_id').val(id);

      $('#customer_name').val(customer_name);

      $('#customer_email').val(customer_email);

      $('#customer_contactno').val(customer_contactno);

      $('#customer_address').val(customer_address);

      $('#add_or_update').html('Update');


  });

</script>

