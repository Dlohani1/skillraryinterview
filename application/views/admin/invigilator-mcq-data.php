<?php 
$proctoredTest = 1;

if (!$mcq['mcq-details']->proctoredTest) {
  $proctoredTest = 0;
}  
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
            <!-- <div class="container"  id="detail">
            <div class="row">
              <div class="column">
                <label>User Count</label>
                <input type="number" name="generate" class="form-control" id="generate" placeholder="Enter Number to generate code" autocomplete="off"><br/><button onclick="generateUsrPwd()">Generate IDs</button>&nbsp;&nbsp;<button onclick="deleteUsrPwd()">Delete IDs</button>&nbsp;&nbsp;<button onclick="printUsrPwd()">Print IDs</button>&nbsp;&nbsp;<button onclick="downloadResult()">Print Result</button>
                  <select id = "resultFilter" onchange="setFilter()">
                  <option value="0" > All </option>
                  <option value="1" > Passed </option>
                  <option value="2" > Failed </option>
                </select>
                <input type="hidden" id="student-result" value="0" />
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
          </div> -->




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
                   </thead>
    <tbody>

        <?php 
        $mcqId = $mcq['mcq-details']->id;
	
        $i = $this->uri->segment(4);

        if (count($mcq['mcq-users']) > 0)
        foreach($mcq['mcq-users'] as $key => $value) {
			$i++;
          
          
          
          
            echo '<tr><td>'.$i.'</td><td><a  href="#" data-toggle="modal" data-target="#myModal" onclick="showStudentDetails('.$value->studentId.')">'.$value->first_name." ".$value->last_name.'</a></td><td>'.$value->email.'</td></tr>';
    
   
   
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

