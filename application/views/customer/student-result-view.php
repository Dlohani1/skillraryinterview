<input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $student_name; ?> answer result view</h1>
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
            <h4>SkillRary Student result view</h4>



<!-- <div class="container">
      <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."admin/mcq-customers-search";?>>

          <div class="searchBox">

                <div class="row">

                      <div class="col-md-2 ">
                        <label>Code</label>
                        <input type="text" id="searchcode" name="searchcode" class="form-control " placeholder="Search Code" value="<?php echo 'searchcode'; ?>" >
                      </div>

                      <div class="col-md-3">
                        <label>Name</label>
                        <input type="text" id="searchname" name="searchname" class="form-control" placeholder="Search Name" value="<?php echo 'searchname'; ?>">
                      </div>

                      <div class="col-md-3">
                        <label>Email</label>
                        <input type="text" id="searchemail" name="searchemail" class="form-control" placeholder="Search Email" value="<?php echo 'searchemail'; ?>">
                      </div>

                      <div class="col-md-2">
                        <label>Contact No</label>
                        <input type="number" id="searchcontact" name="searchcontact" class="form-control" placeholder="Search Contact" value="<?php echo 'searchcontact'; ?>">
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
 -->

          <div class="container">

            <div class="table-responsive">
                
              <table id="mytable" class="table table-bordred table-striped">
                   
                  <thead>
                    <th>Sl No.</th>                    
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Student Answer</th>
                    <th>Student Comment</th>
                    <th>View Answer Option</th>
                  </thead>
                  
                  <tbody>

        <?php 
          $i = $this->uri->segment(5);

      
          if (count($student) > 0)
            foreach($student as $key => $value) { 
                  $i ++;
            // echo $value->student_id;
            //    echo $value->question_id;
            //    echo $value->answer_id;
            //    echo $value->correct_ans;
            //    echo $value->mcq_test_id;
            //    echo $value->section_id;
            //    echo $value->question;
            //    echo $value->answer;

              if ($value->correct_ans) {
                $status = 'Correct';
              }else{
                $status = 'Wrong';
              }

              echo '<tr>
                        <td>'.$i.'</td>

                        <td>'.$value->question.'</td>


                        <td>'.$value->answer.'</td>

                        <td>'.$status.'</td>

                          <td>'.$value->comment.'</td>

                        <td>
                          <p data-placement="top"  data-toggle="tooltip" title="See">
                            <button class="btn btn-primary btn-xs answer_option" data-title="See" data-toggle="modal"  data-question_id="'.$value->question_id.'" data-mcq_test_id="'.$value->mcq_test_id.'">
                                <span class="glyphicon glyphicon-eye-open"></span>
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
<div class="modal fade" id="show_answer_option_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Answer Option</h4>

        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body">

        <div id="see_answer_option"></div>

      </div>
      <div class="modal-footer">


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
   // $.ajaxSetup({
   //      data: {
   //          '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
   //      }
   //  });

  $(".answer_option").on("click", function() {

      let question_id = $(this).data('question_id');

      let mcq_test_id = $(this).data('mcq_test_id');



      var baseUrl = document.getElementById("base_url").value;

          $.ajax({
            url: baseUrl+"customer/see-answer-option",
           
            type: 'post',
            data: { "question_id" : question_id, 'mcq_test_id':mcq_test_id},
            success: function( data, textStatus, jQxhr ){

                        let studentData = JSON.parse(data);

                          var getAnswer = "<ol>";
                          for(let i = 0; i< studentData.length; i++){
                              let answerOption = studentData[i]['answer'];

                              getAnswer += '<li>'+answerOption+'</li>';
                          }
                          getAnswer += "</ol>";

                $('#see_answer_option').html(getAnswer);

            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log( errorThrown );
            }
        });

      $('#show_answer_option_modal').modal('show');

  });    


</script> 