<?php
// echo "<pre>";
// print_r($mcqList); 
// print_r($invigilatorList);
// die;
?>

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
         <input type="hidden" id="base_url" name="base_url" value= "<?php echo base_url();?>" />
          <div class="col-md-12">
            <h4>MCQs Roles</h4>
            <div class="container">
              <div class="searchBox">
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
          <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <label>Select MCQs</label>
                                <!-- <input type="text" name="role-name" class="form-control" id="role-name" placeholder="Enter Role" autocomplete="off"><br/><button onclick="createRole()">Create Role</button> -->
                              <select id='mcqlist'>
                                <option> Select MCQ </option>
                                <?php
                                  if (count($mcqList) > 0) {
                                    foreach($mcqList as $key => $value) {?> 
                                      <option value="<?= $value->id;?>"> <?= $value->title;?> </option>
                                    <?php } }?>
                              </select>
                              <button id="assignMcq"> Assign </button>
                              </div>

                        </div>

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

 <br>
    <!--  <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php //echo base_url()."admin/create-roles-search";?>>

          <div class="searchBox">

                <div class="row">

                      <div class="col-md-4">
                        <label>Search Role</label>
                        <input type="text" id="searchrole" name="searchrole" class="form-control" placeholder="Search Role" value="<?php //echo $searchrole; ?>">
                      </div>

                      <div class="col-md-2">
                          <label>Search</label><br>
                          <button type="submit" value="Submit">
                            <i  style="font-size:28px;color:lightblue" class="fa fa-search"></i>
                          </button>
                      </div>

                </div>

          </div>
      </form> -->




        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                   <th> Select </th>
                   <th>Sl.no</th>
                    <th>Invigilator</th>
                     <!-- <th>Total Section</th>
                     <th>Total Question</th> -->
                    <!--  <th>Delete</th>
                      <th>Download</th> -->
                      
                       <!-- <th>Delete</th> -->
                   </thead>
    <tbody>

        <?php 
        $i = 0;

        if (count($invigilatorList) > 0)
        foreach($invigilatorList as $key => $value) { 
          //print_r($value); die;
            $i++;
            echo '<tr><td><input type="checkbox" id="invigilator" name="invigilator[]" value="'.$value->invigilator_id.'"/> </td><td>'.$i.'</td><td>'.$value->first_name." ".$value->last_name.'</td> 
      
   </tr>';
        }
        ?>
   
    
   
    
    </tbody>
        
</table>
<p><?php //echo $links; ?></p>

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
                        <div style="height: 100vh;"></div>
                        <div class="card mb-4">
                            <!-- <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div> -->
                        </div>
                    </div>
                </main>

<script>

  $("#assignMcq").click(function(){

    var invigilatorList = []
var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

for (var i = 0; i < checkboxes.length; i++) {
  invigilatorList.push(checkboxes[i].value)
}



      var baseUrl  = "<?php  echo base_url(); ?>";
      $.ajax({
              url: baseUrl+"customer/assignMcqs",
              type: 'post',
              data: { "mcq_id" : $('#mcqlist').val(),"invigilator_list" :invigilatorList} ,
                    success: function( data, textStatus, jQxhr ){
                        console.log(data);
                        
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });

  });



//   $("#assignMcq").click(function(){
//   $.post("",
//   {
//     mcaqiId: $('').val(),
//     city: "Duckburg"
//   },
//   function(data, status){
//     alert("Data: " + data + "\nStatus: " + status);
//   });
// });
   
</script>

<!-- <script type="text/javascript">
  var baseUrl = document.getElementById("base_url").value;
                  $.ajax({
                    url: baseUrl+"admin/saveRole",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "role" : role} ,
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
</script>
 -->


