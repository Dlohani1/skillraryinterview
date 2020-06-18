<?php 
// echo"<pre>";
// var_dump($mcq) ;
// die;
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
            




    <!-- for search filter start -->

          <div class="container">
                <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."customer/view-mcq-data-search/$mcqId";?>>

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
  
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                  <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                  <!-- <th>Student Id</th>
                  <th>Assess User Pwd</th> -->
                  <th>Sl no </th>
                  <!-- <th style="display: none;">Student Id</th> -->
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Join Link</th>  
                   </thead>
    <tbody>

        <?php 
        $mcqId = $mcq['mcq-details']->id;
	
        $i = $this->uri->segment(4);
        $baseurl = base_url();

        if (count($mcq['mcq-users']) > 0)
        foreach($mcq['mcq-users'] as $key => $value) {
			$i++;
          
          
          
          
            //echo '<tr><td>'.$i.'</td><td><a  href="#" data-toggle="modal" data-target="#myModal" onclick="showStudentDetails('.$value->studentId.')">'.$value->first_name." ".$value->last_name.'</a></td><td>'.$value->email.'</td></tr>';
      //<td>'.$value->studentId.'</td>
    echo '<tr><td>'.$i.'</td><td>'.$value->first_name.' '.$value->last_name.'</td><td>'.$value->email.'</td><td><a  target="_blank" class="info_link" href='.$baseurl.'invigilator/joinInvigilatorMeeting/'.$value->pid.'> Join </a></td></tr>';
   
   
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

  $('.info_link').click(function(){

var baseUrl  = "<?php  echo base_url(); ?>";

    $.ajax({
              url: baseUrl+"invigilator/joinInvigilatorMeeting",
              type: 'post',
              data: { "join_url" : $(this).text()} ,
                    success: function( data, textStatus, jQxhr ){
                        console.log(data);
                        
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });


    
  });
  
</script>