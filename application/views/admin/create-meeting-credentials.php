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

  .auto-customer {
    list-style-type:none;
    cursor: pointer;
  }
</style>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Meeting Credentials</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Details</li>
      </ol>
      <div class="card mb-4">
        <div class="card-body">
          <div class="container-fluid">
            <div class="container">
              <div class="row">
                <input type="hidden" id="base_url" name="base_url" value= "<?php echo base_url();?>" />
                <input type="hidden" id="assessId" name="assessId"  />
                <input type="hidden" id="round" name="round"  />
                <div class="col-md-12">
                  <h4>Add Meeting Credentials</h4>
                  <div class="container"  id="detail">
                    <div class="row">
                      <form method="post" action="save-meeting-credentials" onsubmit="return validate()">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                      <div class="column">
                       <label>GotoMeeting Email Id</label>
                        <input type="email" name="meeting-email" class="form-control" id="meeting-email" placeholder="Enter Email" autocomplete="off">
                        <span id = "meeting_email_error" style="color:red"></span>
                        <br/>
                        <label>GotoMeeting Password</label>
                        <input type="text" name="password" class="form-control" id="password" placeholder="Enter password" autocomplete="off">
                        <span id = "password_error" style="color:red"></span>
                      </div>
                      <div class="column">
                         <label>Add Customer</label>
                        <input type="text" name="customer" class="form-control" id="customer_code" placeholder="Enter Customer " autocomplete="off">
                        <div id="customerList"></div>
                        <span id = "customer_code_error" style="color:red"></span>
                      </div>
                      <div class="column">
                        <button type="submit">Generate Credentials</button>
                      </div>
                    </form>
                    </div>
                  </div>


<br>

<form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."admin/add-meeting-credentials-search";?>>

          <div class="searchBox">

                <div class="row">

                      <div class="col-md-2 ">
                        <label>Code</label>
                        <input type="text" id="searchcode" name="searchcode" class="form-control " placeholder="Code" value="<?php echo $searchcode; ?>" >
                      </div>


                      <div class="col-md-2 ">
                        <label>Customer Name</label>
                        <input type="text" id="customername" name="customername" class="form-control " placeholder="Customer Name" value="<?php echo $customername; ?>" >
                      </div>


                      <div class="col-md-2">
                        <label>Name</label>
                        <input type="text" id="searchname" name="searchname" class="form-control" placeholder="Name" value="<?php echo $searchname; ?>">
                      </div>

                      <div class="col-md-2">
                        <label>Last Name</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Last Name" value="<?php echo $lastname; ?>">
                      </div>

                      <div class="col-md-2">
                        <label>Email</label>
                        <input type="text" id="searchEmail" name="searchEmail" class="form-control" placeholder="Email" value="<?php echo $searchEmail; ?>">
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





          <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                  <th>Id</th>                    
                  <th>Code</th>
                  <th>Customer Name</th>
                  <th>Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                 <!--  <th>Action</th> -->
                      
                       <!-- <th>Delete</th> -->
                   </thead>
    <tbody>

        <?php 
        $i = $this->uri->segment(3);
        if (count($customers) > 0)
        foreach($customers as $key => $value) { 
          //print_r($value);
            $i++;
            echo '<tr><td>'.$i.'</td><td>'.$value->customer_code.'</td><td>'.$value->customer_name.'</td><td>'.$value->first_name.'</td><td>'.$value->last_name.'</td><td>'.$value->email.'</td>
      
   </tr>';
        }
        ?>

    
   
    
   
    
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
        </div>
      </div>
    </div>
  </main>

<script>
  var baseUrl = document.getElementById("base_url").value;
  $('#customer_code').keyup(function(){ 
    var query = $(this).val();
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
})
 $(document).on('click', 'li', function(){  
    $('#customer_code').val($(this).text());  
    $('#customerList').fadeOut();
  });

 function validate() {
  var customerCode = document.getElementById("customer_code").value;
  var password = document.getElementById("password").value;
  var meetingEmail = document.getElementById("meeting-email").value;
  var isError = true;

  if (customerCode.trim().length == 0) {
      isError = false;
      document.getElementById("customer_code_error").innerHTML = "Please enter code";
  } else {
      document.getElementById("customer_code_error").innerHTML = "";
  }

  if (password.trim().length == 0) {
      isError = false;
      document.getElementById("password_error").innerHTML = "Please enter value";
  }  else {
      document.getElementById("password_error").innerHTML = "";
  }

  if (meetingEmail.trim().length == 0) {
      isError = false;
      document.getElementById("meeting_email_error").innerHTML = "Please enter email";
  } else {
      document.getElementById("meeting_email_error").innerHTML = "";
  }

  return isError;
 }
</script>