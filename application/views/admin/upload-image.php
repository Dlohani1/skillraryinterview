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
      <h1 class="mt-4">Image Upload</h1>
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
            <h4>Image upload</h4>
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
        <!--   <div class="row">
                            <div class="col-md-3 offset-md-1">
                                <label>Add Roles</label>
                                <input type="text" name="role-name" class="form-control" id="role-name" placeholder="Enter Role" autocomplete="off"><br/><button onclick="createRole()">Create Role</button>
                            </div>

                        </div>

        </div>
 -->
                           
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
 <b>Change Image<b/><br><br>
     <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="POST" action=<?php echo base_url()."admin/upload-image-save";?>  onsubmit="return validateForm()">

          <div class="searchBox">

                <div class="row">

                      <div class="col-md-4">
                        <label>Logo Image</label>
                        <input type="file" id="logo_image" name="logo_image" class="form-control" placeholder="logo-image">
                        <div id="error_logo_image"></div>
                      </div>

                       <div class="col-md-4">
                        <label>Banner Image</label>
                        <input type="file" id="banner_image" name="banner_image" class="form-control" placeholder="banner-image">
                        <div id="error_banner_image"></div>

                      </div>

                      <div class="col-md-2">
                          <label>Submit</label><br>
                          <button type="submit" value="Submit">Submit
                            <!-- <i  style="font-size:28px;color:lightblue" class="fa fa-search"></i> -->
                          </button>
                      </div>

                </div>

          </div>
      </form>




        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                   <th>Sl no.</th>
                    <th>Logo Image</th>
                     <th>Banner Image</th>
                     <th>Change Status</th>
                     <th>Status</th>
                      <!--<th>Download</th>
                      
                        <th>Delete</th> -->
                   </thead>
    <tbody>

        <?php 
        $i = $this->uri->segment(3);

        if (count($images) > 0)
        foreach($images as $key => $value) { 
          $id = $value->id;
          $logo_image_url = $value->logo_image_url;
          $banner_image_url = $value->banner_image_url;


$checked = "";
                            
                            if($value->is_active){
                               $checked = "checked";
                            } 

                            if($value->is_active){
                               $status = "Active";
                            } else{
                               $status = "Inactive";
                            }




// <a href="#" id="pop">
//     <img id="imageresource" src="$logo_image_ur" style="width: 400px; height: 264px;">
//     $logo_image_ur
// </a>


            $i++;
            echo '<tr>
                      <td>'.$i.'</td>
                      <td>'.$value->logo_image_url.'


<p data-placement="top"  data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs pop_up_logo_upload" data-title="Edit" data-toggle="modal"  data-id="'.$id.'"  data-logo_image_url="'.$logo_image_url.'"  >

    <span class="glyphicon glyphicon-pencil"></span>

</button></p></td>














                      <td>'.$value->banner_image_url.'



<p data-placement="top"  data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs pop_up_banner_upload" data-title="Edit" data-toggle="modal"  data-id="'.$id.'" data-banner_image_url="'.$banner_image_url.'" >

    <span class="glyphicon glyphicon-pencil"></span>

</button></p></td>





                      <td>
                            <label class="switch"> <input type="checkbox" '.$checked.'  class="activeinactive"  onclick="checkActive('.$value->id.','.$value->is_active.')">

                                 <span class="slider round" title="Status" data-toggle="tooltip"></span>
                            </label>
                          </td>







                      <td>'.$status.'</td>
      
                 </tr>';
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


<!-- <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
            <div class="modal-header">
        
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>

                <h4 class="modal-title custom_align" id="Heading">Edit Images</h4>

            </div>

            <div class="modal-body">
                    
                      <div class="form-group">
                       <input class="form-control " type="text"  placeholder="Mohsin">
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
 -->

      <!-- </div> -->
    <!-- /.modal-content --> 
    <!-- </div> -->
      <!-- /.modal-dialog --> 
<!-- </div> -->
    
    

<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodallogo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

 <form  enctype="multipart/form-data" method="POST" action=<?php echo base_url()."admin/upload-image-save";?> onsubmit="return validateFormLogoUpdate()">>

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreviewlogo" style="width: 400px; height: 264px;" >


                        <label>Update Logo Image</label>

                        <input type="hidden" id="hidden_logo_image_id" name="hidden_logo_image_id">


                         <input type="hidden" name="updateImage" value="1">
                        <input type="file" id="update_logo_image" name="logo_image" class="form-control">
                        <div id="error_update_logo_image" ></div>



      </div>
      <div class="modal-footer">


           <button type="submit" value="Submit">Submit
                          </button>
      </div>
    </div>
      </form>
  </div>
</div>



<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodalbanner" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
 <form  enctype="multipart/form-data" method="POST" action=<?php echo base_url()."admin/upload-image-save";?> onsubmit="return validateFormBannerUpdate()">>

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Image preview</h4>
      </div>
      <div class="modal-body">
        <img src="" id="imagepreviewbanner" style="width: 400px; height: 264px;" >


                        <label>Update Banner Image</label>

                        <input type="hidden" id="hidden_banner_image_id" name="hidden_logo_image_id">

                        <input type="hidden" name="updateImage" value="2">

                        <input type="file" id="update_banner_image" name="banner_image" class="form-control">
                        <div id="error_update_banner_image" ></div>



      </div>
      <div class="modal-footer">


           <button type="submit" value="Submit">Submit
                          </button>
      </div>

    </div>
  </form>
  </div>
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
  $(document).click(function(event) {
    $('#error_update_banner_image').empty();
    $('#error_update_logo_image').empty();
  })
   $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

               function createRole() {
                var baseUrl = document.getElementById("base_url").value;
                
                var role = document.getElementById("role-name").value;
                //var mcqId = document.getElementById("mcqTestId").value ;
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


             }



var base_url =  "<?php echo base_url();?>"

  $(".pop_up_logo_upload").on("click", function() {

    $('#hidden_logo_image_id').val($(this).data('id'));
     if ($(this).data('logo_image_url').length > 0) {
       $('#imagepreviewlogo').attr('src', base_url+$(this).data('logo_image_url'));
      $('#imagepreviewlogo').show();
    } else {
      $('#imagepreviewlogo').hide();
    }

  
   $('#imagemodallogo').modal('show');

});

  $(".pop_up_banner_upload").on("click", function() {

    $('#hidden_banner_image_id').val($(this).data('id'));

    if ($(this).data('banner_image_url').length > 0) {
      $('#imagepreviewbanner').attr('src', base_url+$(this).data('banner_image_url'));
      $('#imagepreviewbanner').show();
    } else {
      $('#imagepreviewbanner').hide();
    }
  

   $('#imagemodalbanner').modal('show');

});


  // $('#update_banner_image_name').click(function () {

  //   let hidden_banner_image_id = $('#hidden_banner_image_id').val();

  //   var file = $('#update_banner_image')[0].files[0];
  //   let file_name = file.name;

  //   $.ajax({
  //     url: base_url+"admin/upload-image-update",
  //     type: 'post',
  //     data: {
  //       "id": hidden_banner_image_id,
  //       "file_name": file_name,
  //       "type": "banner"
  //     } ,
  //     success: function( data, textStatus, jQxhr ){

  //         console.log('data',data);
  //         window.location.reload();
  //     },
  //     error: function( jqXhr, textStatus, errorThrown ){
  //         console.log( errorThrown );
  //     }
  //   });
  // });

  // $('#update_logo_image_name').click(function () {

  //   let hidden_banner_image_id = $('#hidden_logo_image_id').val();

  //   var file = $('#update_logo_image')[0].files[0];
  //   let file_name = file.name;

  //   $.ajax({
  //     url: base_url+"admin/upload-image-update",
  //     type: 'post',
  //     data: {
  //       "id": hidden_banner_image_id,
  //       "file_name": file_name,
  //       "type": "logo"
  //     } ,
  //     success: function( data, textStatus, jQxhr ){
  //       console.log('data',data);
  //         //window.location.reload();
  //     },
  //     error: function( jqXhr, textStatus, errorThrown ){
  //         console.log( errorThrown );
  //     }
  //   });
  // });


function checkActive(id, value){
  $.ajax({
    method: "POST",
    data: { "id" : id, "value" : value} ,
    url: base_url+"admin/upload-image-delete",
    success: function(response){
      window.location.reload();
    }
  });
}

function validateForm(event){
  let error = true;
  let logo_image = $('#logo_image').val();
  let banner_image = $('#banner_image').val();
  if(logo_image == ''){
    $('#error_logo_image').html('<span style="color:red">Please upload logo image</span>');
    error = false;
 }
   if(banner_image == ''){
    $('#error_banner_image').html('<span style="color:red">Please upload Banner image</span>');
     error = false;
 }
return  error;
}


function validateFormBannerUpdate(event){
  let error = true;
  let file = $('#update_banner_image').val();
  if(file == ''){
    $('#error_update_banner_image').html('<span style="color:red">Please upload logo image</span>');
    error = false;
 }
  
return  error;
}

function validateFormLogoUpdate(event){
   let error = true;
   let file = $('#update_logo_image').val();
   if(file == ''){
      $('#error_update_logo_image').html('<span style="color:red">Please upload logo image</span>');
      error = false;
   }
  
return  error;
}

</script>



