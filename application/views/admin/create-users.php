<style>
    .auto-customer {
      position: absolute;
   
    list-style-type:none;
    cursor: pointer;
}
</style>
<input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
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
          <div class="col-md-12">
            <h4>MCQs Roles</h4>
            <div class="container">
              <div class="searchBox">
                          <div class="row">
                  <div class="col-md-3 offset-md-1">
                    <label>First Name</label>
                    <input type="text" id="first-name" class="form-control inputBox" value= "<?php //echo $mcq['mcq-details']->title;?>">
                  </div>
                  <div class="col-md-3 offset-md-1">
                    <label>Last Name</label>
                    <input type="text" id="last-name" class="form-control inputBox">
                  </div>
                  <div class="col-md-2 offset-md-1">
                    <label>Email </label>
                    <input type="text" id="user-email" class="form-control inputBox">
                    
                  </div>
                  <!-- <div class="col-md-2 offset-md-1">
                    <br/>
                   <button onclick="createUser()">Create User</button>
                  </div> -->
                <div>
             </div>
          </div>
                <div class="row">
                  <div class="col-md-3 offset-md-1">
                    <label>User Name</label>
                    <input type="text" id="username" class="form-control inputBox" value= "<?php //echo $mcq['mcq-details']->title;?>">
                  </div>
                  <div class="col-md-3 offset-md-1">
                    <label>Password</label>
                    <input type="text" id="password" class="form-control inputBox">
                  </div>
                  <div class="col-md-2 offset-md-1">
                    <label>Roles</label>
                    <select  class="form-control inputBox" id="roleId">
                      <option value=0> Select </option>
                      
        <?php 

        if (count($roles) > 0) {
        foreach($roles as $key => $value) {?>
        <option value=<?php echo $value->id; ?>> <?php echo $value->roles;?> </option>
        <?php } }?>                       
                    </select>
                  </div>
                  <!-- <div class="col-md-2 offset-md-1">
                    <br/>
                   <button onclick="createUser()">Create User</button>
                  </div> -->
                <div>
             </div>
          </div>


          <div class="row">
                  <div class="col-md-3 offset-md-1">
                    <label>Contact No</label>
                    <input type="number" id="user-cno" class="form-control inputBox" value= "<?php //echo $mcq['mcq-details']->title;?>">
                  </div>
                  
                  <div id="custCode" class="col-md-3 offset-md-1" style="display: none;">
                    <label class="labelColor">Customer Code </label>
                    <span id = "codeError" style="color:red"></span>
                    <input type="text" name="customer_code" class="form-control" id="customer_code" placeholder="Enter code">
                    <div id="customerList"></div>
                    <input type="hidden" id="validCode" value="0"/>
                  </div>
                  <!-- <div class="col-md-3 offset-md-1">
                    <label>Last Name</label>
                    <input type="text" id="last-name" class="form-control inputBox">
                  </div>
                  <div class="col-md-2 offset-md-1">
                    <label>Email </label>
                    <input type="text" id="user-email" class="form-control inputBox">
                    
                  </div> -->
                  <div class="col-md-2 offset-md-1">
                    <br/>
                   <button onclick="createUser()">Create User</button>
                  </div>
                <div>
             </div>
          </div>
<!--           <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <label>Add Roles</label>
                                <input type="text" name="role-name" class="form-control" id="role-name" placeholder="Enter Number to generate code" autocomplete="off"><br/><button onclick="createRole()">Create Role</button>
                            </div>

                        </div> -->

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




<!-- <div class="container"> -->
  <br>
     <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."admin/create-users-search";?>>

          <div class="searchBox">

                <div class="row">

                      <div class="col-md-4 ">
                        <label>Search Username</label>
                        <input type="text" id="searchusername" name="searchusername" class="form-control " placeholder="Search Code" value="<?php echo $searchusername; ?>" >
                      </div>

                      <div class="col-md-4">
                        <label>Search Role</label>
                        <input type="text" id="searchrole" name="searchrole" class="form-control" placeholder="Search Role" value="<?php echo $searchrole; ?>">
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
  <!-- </div> -->






        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
		  <th> Sl.no </th>
                   <th>Username</th>
                    <th>Password</th>
                     <th>Role</th>
                     <!-- <th>Total Question</th> -->
                    <!--  <th>Delete</th>
                      <th>Download</th> -->
                      
                       <!-- <th>Delete</th> -->
                   </thead>
    <tbody>

        <?php 
	
          $i = $this->uri->segment(3);
        if (count($user) > 0)
        foreach($user as $key => $value) { 
          //print_r($value);
		$i++;
            echo '<tr><td>'.$i.'</td><td>'.$value->username.'</td><td>'.$value->password.'</td> <td>'.$value->roles.'</td> 
      
   </tr>';
        }
        ?>
<!--     <td><a href="view-students/'.$value->id.'"><button disabled class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></td>
      <td><a href="download-students/'.$value->id.'"><button disabled class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-download-alt"></span></button></a></td> -->
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
   $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

               function createUser() {
                
                var roleId = document.getElementById("roleId").value;
                var username = document.getElementById("username").value.trim();
                var password = document.getElementById("password").value.trim();
                var firstName = document.getElementById("first-name").value.trim();
                var lastName = document.getElementById("last-name").value.trim();
                var userEmail = document.getElementById("user-email").value.trim();
                var userCno = document.getElementById("user-cno").value.trim();

                var customerCode = document.getElementById("customer_code").value.trim();

                if (roleId > 0 && username.length > 0 && password.length > 0) {

                  var baseUrl = document.getElementById("base-url").value;
                    $.ajax({
                      url: baseUrl+"admin/saveUser",
                     
                      type: 'post',
                      
                      // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                      data: { "first-name": firstName,"last-name": lastName,"user-email": userEmail,"user-cno": userCno,"roleId" : roleId, "username":username, "password":password, "customer-code":customerCode} ,
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
                   alert("Username/Password/Roles is required");
                }                    


                        // $.alert({
                        //     title: 'SkillRary Alert!',
                        //     content: 'Username Password Generated',
                        // });


             }
</script>



<script type="text/javascript">
  
  $('#back').click(function () {

      let baseUrl = '<?php echo base_url(); ?>';
      let url =  baseUrl+"admin/create-users";
      window.location.href = url;
    });

</script>


<script type="text/javascript">
  
  $('#customer_code').keyup(function(){ 
    var query = $(this).val();
    let baseUrl = '<?php echo base_url(); ?>';
    if(query != '')
    {
     $.post(baseUrl+"admin/fetch-customers",
      {
        customerCode:query
      },
      function(data, status){
        console.log('ds',data)
        $('#customerList').fadeIn();  
        $('#customerList').html(data);
      });
    }
    else{
      $('#customerList').hide();
    }
})

  $(document).on('click', 'li', function(){
    document.getElementById("validCode").value = 1;
    $('#customer_code').val($(this).text());  
    $('#customerList').fadeOut();
  });

  $( "#roleId" ).change(function() {
    
    var d = $( "#roleId" ).val();
    
    if(d == 8){
      $("#custCode").show();
    }
    else{
      $("#custCode").hide();
    }
});
  
</script>