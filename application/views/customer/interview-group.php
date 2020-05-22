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
      <h1 class="mt-4">Schedule Interview </h1>
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
                  <h4>INTERVIEWs</h4>
                  <div class="container"  id="detail">
                    <div class="row">
                      <form method="post" action="save-interview-group" onsubmit="return validate()">
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                      <div class="column">
                       <!--  <label>Add Customer</label>
                        <input type="text" name="customer" class="form-control" id="customer_code" placeholder="Enter Customer " autocomplete="off">
                        <span id = "customer_code_error" style="color:red"></span>
                        <br/> -->
                        <div id="customerList"></div>
                        <label>User Count</label>
                        <input type="number" name="generate" class="form-control" id="generate" placeholder="Enter Number to generate code" autocomplete="off">
                        <span id = "generate_error" style="color:red"></span>
                      </div>
                      <div class="column">
                        <label>Interview Group Code </label>
                        <input type="text" name="code" class="form-control" id="interview-code" placeholder="Enter code" autocomplete="off">
                        <span id = "interview_code_error" style="color:red"></span>

                      </div>
                      <div class="column">
                        <button type="submit">Create</button>
                      </div>
                    </form>
                    </div>
                  </div>

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
  var customerCode = "<?php $_SESSION['customerId']; ?>";
  var userCount = document.getElementById("generate").value;
  var interviewCode = document.getElementById("interview-code").value;
  var isError = true;

  if (customerCode.trim().length == 0) {
      isError = false;
      document.getElementById("customer_code_error").innerHTML = "Please enter code";
  } else {
    document.getElementById("customer_code_error").innerHTML = "";
  }

  if (userCount.trim().length == 0) {
      isError = false;
      document.getElementById("generate_error").innerHTML = "Please enter value";
  } else if (userCount.trim() < 0) {
      isError = false;
      document.getElementById("generate_error").innerHTML = "Please enter positive number";
  } else {
    document.getElementById("generate_error").innerHTML = "";
  }

  if (interviewCode.trim().length == 0) {
      isError = false;
      document.getElementById("interview_code_error").innerHTML = "Please enter code";
  } else {
    document.getElementById("interview_code_error").innerHTML = "";
  }

  return isError;
 }
</script>