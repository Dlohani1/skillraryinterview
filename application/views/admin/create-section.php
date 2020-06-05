<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>


<input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Section Details</h1>
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
          <div class="col-md-12">
            <h4>Section</h4>
            <div class="container">
              <div class="searchBox">

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

              <form autocomplete='off' enctype="multipart/form-data" method="POST" action=<?php echo base_url()."admin/saveSection";?>>

                         <div class="row">
                            <div class="col-md-3 offset-md-1">
                              <input type="text" name="searchSection" required class="form-control" id="searchSection" placeholder="Enter section" autocomplete="off"><br/>
                              <button type="submit" value="Submit">Create section
                          </button>
                            </div>
                         </div>

               </form>

              </div>

              <br>
 
              <form  autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."admin/add-section-search";?>>

                  <div class="searchBox">

                        <div class="row">

                             
                              <div class="col-md-6">
                                <label>Search Section</label>
                                <input type="text" id="" name="searchSection" class="form-control" placeholder="Search Section" value="<?php echo $searchSection; ?>">
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
                   
                    <th>Sl no.</th>
                    <th>Section</th>
                    <th>Change Status</th>
                    <th>Status</th>
                  </thead>
                  
                  <tbody>

                    <?php 

                      $i = $this->uri->segment(3);
                      if (count($section) > 0)
                        foreach($section as $key => $value) { 

                            $i++;
                            $checked = "";
                            
                            if($value->is_active){
                               $checked = "checked";
                            } 

                            if($value->is_active){
                               $status = "Active";
                            } else{
                               $status = "Inactive";
                            }


                      echo '<tr>
                          <td>'.$i.'</td>
                          <td>'.$value->section_name.'</td>
                        
                          <td>
                            <label class="switch"> <input type="checkbox" '.$checked.'  class="activeinactive"  onclick="checkActive('.$value->id.','.$value->is_active.')">

                                 <span class="slider round" title="Status" data-toggle="tooltip"></span>
                            </label>
                          </td>

                          <td id="check_status">'.$status.'</td>
                      </tr>';
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
                      
                    </div>
                </main>

<script>
   $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });


  function checkActive(id, value){


    var baseUrl = document.getElementById("base_url").value;
                
      $.ajax({
        method: "POST",
        data: { "id" : id, "value" : value} ,
        url: baseUrl+"admin/delete-section",
        success: function(response){

          // response = (response['value'] == 1)? 'Active': 'Inactive';

          window.location.reload();
            // $('#check_status').text(response);

            // window.location.assign(window.location.href)
        }
      });

      
  }



</script>











