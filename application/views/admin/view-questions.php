
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Questions</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Questions</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <!--  <p class="mb-0">This page is an example of using static navigation. By removing the <code>.sb-nav-fixed</code> class from the <code>body</code>, the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.</p> -->

 
 
  <div class="container">
      <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."admin/view-questions-search";?>>

          <div class="searchBox">

                <div class="row">

                      <div class="col-md-4 ">
                        <label class="" for="sectionId">Section:</label>
                        <select id="section" name="section" onchange="getSubSection()">
                          <option value="0">Select Section</option>
                        </select>
                      </div>

                      <div class="col-md-4">
                          <label class="" for="subsection">Sub Section:</label>
                          <select id="subsection"   name="subsection" >
                              <option value="0">Select Sub Section</option>
                          </select>
                      </div>

                      <div class="col-md-2">
                          <label class="" for="difficultylevel">Level:</label>
                          <select id="difficultylevel" name="difficultylevel" >
                              <option value="0">Select Level</option>
                          </select>
                      </div>

                      <div class="col-md-1">
                          <!-- <label>Search</label><br> -->
                          <button type="submit" value="Submit"><i  style="font-size:28px;color:lightblue" class="fa fa-search"></i></button>
                      </div>               


                      <div class="col-md-1">
                         <input type="button" id="back" class="btn btn-primary" name="" value="Clear">
                      </div>
                </div>
          </div>
      </form>
  </div>



                                <div class="container-fluid">
                                    <div class="container">
  <div class="row">
    
         
        <div class="col-md-12">
        <!-- <h4>MCQs</h4>
            <div class="container">
                <div class="searchBox">
                    <div class="row">
                        <div class="col-md-3 offset-md-1">
                            <label>Section</label>
                            <input type="text" class="form-control inputBox">
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <label>Sub section</label>
                            <input type="text" class="form-control inputBox">
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <label>Difficulty Level</label>
                            <input type="text" class="form-control inputBox">
                        </div>
                        <div class="col-md-3 offset-md-1">
                            <label>Question Type</label>
                            <input type="text" class="form-control inputBox">
                        </div>
                    </div><br/>
                    <div>
                        <div align="right">
                            <button class="searchBtn">Search</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <br/>




       




        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <!-- <th><input type="checkbox" id="checkall" /></th> -->
                    <th>Sl.no</th>
                    <th>Question</th>
                    <th>Section</th>
                    <th>Sub Section</th>
                    <th>Difficulty Level</th>
                    <th>view</th>
                    <th>Edit</th>                      
                    <th>Delete</th>
                   </thead>
    <tbody>

        <?php
         $i = $this->uri->segment(3)+0;
        foreach($questionData as $key => $value) {
           $i++;
            $question = $value->question; 
            $section = $value->section_name;
            $subSection = $value->sub_section_name;
            $level = $value->level;

            $id = $value->id;

            echo '<tr><td>'.$i.'</td>
                    <td><span style="height: 18px;
                      width: 140px;
                      overflow: hidden;
                      position: relative;
                      display: inline-block;
                      margin: 0 5px 0 5px;
                      text-align: center;
                      text-decoration: none;
                      text-overflow: ellipsis;
                      white-space: nowrap;
                      color: #000;">'.$question.'</span>
                    </td>
                    <td>'.$section.'</td> <td>'.$subSection.'</td>
                    <td>'.$level.'</td>
                    <td><p data-placement="top" data-toggle="tooltip" title="view"><button disabled onclick="populateData()" class="btn btn-primary btn-xs" data-title="view" data-toggle="modal" data-target="#view"><span class="glyphicon glyphicon-eye-open"></span></button></p></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="'.base_url().
                    'admin/edit-question/'.$id.'"><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span></button></a></p></td>
                    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button disabled class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                </tr>';
        }
        ?>
    
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

<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="view" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">View Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin" id="questionDetail" value="hello">
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

    function populateData() {
        var i = 0;
        var a = i;
    }

    $('#view').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      // console.log('bb', button.data('whatever'))
      var recipient = button.data('whatever') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('#questionDetail').val('New message to ' + recipient)
      //modal.find('.modal-body input').val(recipient)
    })




// for select and auto select section


$( document ).ready(function() {
    var baseUrl = '<?php echo base_url(); ?>';


        $.ajax({
            type: "POST",
            url: baseUrl+"/question/getSection",
            success: function(data){

              
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) { 
                  // console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data

                  let searchParams = new URLSearchParams(window.location.search)
                  let section = searchParams.get('section');
                  
                  if(section == d.id){
                    $('#section').append('<option value="' + d.id +'" selected>' + d.name + '</option>');
                  }else{
                    $('#section').append('<option value="' + d.id +'">' + d.name + '</option>');
                  }

                });
            }
        });




      $.ajax({
                type: "POST",
                url: baseUrl+"/question/getQuestionLevel",
                success: function(data){
                    //Parse the returned json data
                    var opts = $.parseJSON(data);
                    // Use jQuery's each to iterate over the opts value
                    $.each(opts, function(i, d) { 
                      // console.log('d',d);
                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data


                      let searchParams = new URLSearchParams(window.location.search)
                      let difficultylevel = searchParams.get('difficultylevel');
                      
                      if(difficultylevel == d.id){
                        $('#difficultylevel').append('<option value="' + d.id +'" selected>' + d.level + '</option>');
                      }else{
                        $('#difficultylevel').append('<option value="' + d.id +'">' + d.level + '</option>');
                      }

                        // $('#difficultylevel').append('<option value="' + d.id + '">' + d.level + '</option>');
                    });
                }
            });

});


    let searchParams = new URLSearchParams(window.location.search)
    let sectionparam = searchParams.get('section');

    if (sectionparam) {
      getSubSection();
    }



  function getSubSection() {
      let section = document.getElementById("section").value;

      let searchParams = new URLSearchParams(window.location.search)
      let sectionparam = searchParams.get('section');

        if(section == 0){
            if(sectionparam != 0){
              section = sectionparam;
            }
        }
     
        if (section != 0) {

            $('#subsection').empty()

            var baseUrl = '<?php echo base_url(); ?>';

            $.ajax({
                type: "POST",
                url: baseUrl+"/question/getSubSection",
                data: { 'Id': section },
                success: function(data){ 
                    // Parse the returned json data
                    var opts = $.parseJSON(data);
                    // Use jQuery's each to iterate over the opts value
                    $('#subsection').append('<option value="0"> Select option </option>');
                    $.each(opts, function(i, d) {
                        // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                      let searchParams = new URLSearchParams(window.location.search)
                      let subsection = searchParams.get('subsection');
                      
                      if(subsection == d.id){
                        $('#subsection').append('<option value="' + d.id +'" selected>' + d.name + '</option>');
                      }else{
                        $('#subsection').append('<option value="' + d.id +'">' + d.name + '</option>');
                      }

                  });
                }
            });
        } else {
            $('#subsection').empty()
          $('#subsection').append('<option value="0">' + 'Select option' + '</option>');
        }
  }


    $('#back').click(function () {

      let baseUrl = '<?php echo base_url(); ?>';
      let url =  baseUrl+"admin/view-questions";
      window.location.href = url;
    });












      
</script>
    </body>
    
</html>
