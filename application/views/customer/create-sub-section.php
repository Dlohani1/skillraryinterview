<input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">Sub Section Details Of <b><?php echo ($section_name) ;?></b> Section</h1>
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
            <h4>Sub Section</h4>
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

                <form autocomplete='off' enctype="multipart/form-data" method="POST" action=<?php echo base_url()."customer/saveSubSection";?> onsubmit="return validateSubSection()">

                      <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label>Create Sub Section</label>
                              <input type="text" name="sub_section_name" required class="form-control" id="sub_section_name" placeholder="Enter sub section" autocomplete="off"><br/>
                              <div id="error_sub_section_name" ></div>

                              <input type="hidden" id="section_id" name="section_id" value= "<?php echo $section_id;?>" />
                              <button type="submit" value="Submit">Create Sub Section
                              </button>
                        </div>
                      </div>
                </form>
              </div>

              <br>
 
              <form  autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."customer/add-sub-section-search/$section_id";?>>
                  <div class="searchBox">
                        <div class="row">
                              <div class="col-md-6">
                                <label>Search sub Section</label>
                                <input type="text" id="searchSubSection" name="searchSubSection" class="form-control" placeholder="Search Sub Section" value="<?php echo $searchSubSection; ?>">
                              </div>

                              <div class="col-md-2">
                                  <label>Search sub section</label><br>
                                  <button type="submit" value="Submit">
                                    <i  style="font-size:38px;color:lightblue" class="fa fa-search"></i>
                                  </button>
                              </div>
                        </div>
                  </div>
              </form>
                <h4 class="mt-4">Sub Section Details Of <b><?php echo ($section_name) ;?></b> Section</h4>

              <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                      <th>Sl no.</th>
                      <th>Sub Section</th>
                    </thead>
                   
                    <tbody>
                      <?php 
                        $i = $this->uri->segment(4);

                        if (count($subSection) > 0)
                          foreach($subSection as $key => $value) { 
                              $i++;

                              
                              echo '<tr>
                                    <td>'.$i.'</td>
                                    <td>'.$value->sub_section_name.'

                                    <p data-placement="top"  data-toggle="tooltip" title="Edit">
                                      <button class="btn btn-primary btn-xs pop_up_edit_sub_section" data-title="Edit" data-toggle="modal"  data-id="'.$value->id.'"  data-sub_section_name="'.$value->sub_section_name.'"  >
                                      <span class="glyphicon glyphicon-pencil"></span>
                                      </button>
                                    </p>

                                    </td>
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



    <!-- Creates the bootstrap modal where the image will appear -->
    <div class="modal fade" id="subSectionmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">

     <form autocomplete='off' enctype="multipart/form-data" method="POST" action=<?php echo base_url()."customer/edit-sub-section";?> onsubmit="return validateSubSectionUpdate()" >>

        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Sub Section Name</h4>
          </div>
          <div class="modal-body">

                            <label>Update Sub Section</label>
                                  <input type="hidden" id="section_id" name="section_id" value= "<?php echo $section_id;?>" />

                            <input type="hidden" id="hidden_sub_section_id" name="hidden_sub_section_id">

                            <input type="text" required id="update_sub_section_name" name="update_sub_section_name"  class="form-control">
                            <div id="error_update_sub_section_name" ></div>
          </div>
          <div class="modal-footer">
               <button type="submit" value="Submit">Submit</button>
          </div>
        </div>
          </form>
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


$(".pop_up_edit_sub_section").on("click", function() {

  let update_sub_section_name = $(this).data('sub_section_name')
  let id = $(this).data('id');

  $('#hidden_sub_section_id').val(id);
  $('#update_sub_section_name').val(update_sub_section_name);

  $('#subSectionmodal').modal('show');

});


 function validateSubSectionUpdate() {
    var update_sub_section_name = document.getElementById("update_sub_section_name").value;

    var isError = true;

    if (update_sub_section_name.trim().length == 0) {
        isError = false;
        $("#error_update_sub_section_name").text("Please enter Sub Section Name");
        $("#error_update_sub_section_name").css('color','red');
    } 

    return isError;
 }

  function validateSubSection() {
    var sub_section_name = document.getElementById("sub_section_name").value;

    var isError = true;

    if (sub_section_name.trim().length == 0) {
        isError = false;
        $("#error_sub_section_name").text("Please enter Sub Section Name");
        $("#error_sub_section_name").css('color','red');
    } 

    return isError;
 }


</script>

