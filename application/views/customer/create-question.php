          <script src='https://cdn.tiny.cloud/1/lnsezku8yem3815vbxl499zobwl7hiehkejxya4ajhlonxot/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
             <script>
  tinymce.init({
    selector: '#question'
  });
  </script> 
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Add Questions</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add Question</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <!--  <p class="mb-0">This page is an example of using static navigation. By removing the <code>.sb-nav-fixed</code> class from the <code>body</code>, the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.</p> -->
                                   <div class="container-fluid">
        <div class="container">
            <!-- <h2 align="center" style="color: #33a478;font-weight: 600;">Create Test</h2> -->
            <div class="row">
                <div class="col-md-10 offset-md-2 firstSection">
                   
           
           
            

            <div class="container">

                                        <div align="left">
                         <button class="editButton" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-camera" aria-hidden="true"></i> Upload Question</button>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Questions</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeButtonLogin();">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="uploadQuestion" onsubmit="return Upload()" method="post" enctype="multipart/form-data">
                                             <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                            <div class="form-group">
                                                
                                                    <span class="btn_lbl">Select Type</span>
                                                    <select  id="sectionUpload" name="sectionUpload">
                                                        <option> Select </option>
                                                    </select>
                                                
                                              
                                            </div>

                                            <div class="form-group">
                                                <button class="resume_upload" type="button">
                                                    <span class="btn_lbl">Browse</span>
                                                    <span class="btn_colorlayer"></span>
                                                    <input type="file" name="questionFile" id="fileUpload" />
                                                </button>
                                                <p id="demo" class="errortag"></p>
                                            </div>
                                            <div>
                                                <input type="submit" value="Upload" class="subbtn" >
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div><br/>
  <h2>Question Bank</h2>
  <input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
  <form class="form-horizontal" method="post" action="save" enctype="multipart/form-data">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
   <div class="form-group">
      <label class="control-label col-sm-2" for="section">Section:</label>
      <div class="col-md-8">
        <select id="section" name="sectionId" onchange="getSubSection()"><option value="0">Select Section </option></select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="sub-section">Sub Section:</label>
      <div class="col-md-8">
        <select id="subsection" onclick="changeValue(this)"  name="subsection" ><option>NA</option></select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="sub-section">Difficulty Level:</label>
      <div class="col-md-8">
        <select id="level" name="levelId" >
            <option value="0">Select level </option>
            <option value="1">Easy</option>
            <option value="2">Moderate</option>
            <option value="3">Difficult</option>
        </select>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="question">Question:</label>
      <div class="col-md-8" style="width:48%">          
        <!-- <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question"> -->
        <!-- <textarea id="question" name="question"></textarea> -->
         <div id="question" name="question"></div>
       <!--  <textarea id="reading" name="reading" ></textarea> -->
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="question">Add Image:</label>
      <div class="col-md-8">          
        <!-- <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question"> -->
        <input type="file" id="qimg" name="qimg" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="sub-section">Question Type:</label>
      <div class="col-md-8">
        <select id="questionType" name="questionType"  onchange="changeType()">
            <option value="0" >Select </option>
            <option value="1">Single Ans</option>
            <option value="2" disabled>Multiple Ans</option>
            <option value="3" >True/False</option>
        </select>
      </div>
    </div>

<div class="form-group" id="singleOptions" style="display: none">
    <label class="control-label col-sm-2" for="pwd">Answers:</label>
    <div class="col-md-6">          
        <input type="radio" name="correct" value="1"> Select if correct option<input type="text" class="form-control" id="option1" placeholder="Enter Answer" name="ans1">
        <input type="radio" name="correct" value="2"> Select if correct option<input type="text" class="form-control" id="option2" placeholder="Enter Answer" name="ans2">
        <input type="radio" name="correct" value="3"> Select if correct option<input type="text" class="form-control" id="option3" placeholder="Enter Answer" name="ans3">
        <input type="radio" name="correct" value="4"> Select if correct option<input type="text" class="form-control" id="option4" placeholder="Enter Answer" name="ans4">
    </div>
</div>

<div class="form-group" id="trueFalse" style="display: none">
    <label class="control-label col-sm-2" for="pwd">Answers:</label>
    <div class="col-md-8">          
        <input type="radio" name="true_false" value="1"> True
        <input type="radio" name="true_false" value="2"> False

    </div>
</div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-md-8">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
<script>
$( document ).ready(function() {
     $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

    
//$('#section').empty()
    //var dropDown = document.getElementById("carId");
    //var carId = dropDown.options[dropDown.selectedIndex].value;
    var baseUrl = document.getElementById("base-url").value;

    $.ajax({
            type: "POST",
            url: baseUrl+"/question/getSection",
            success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#section').append('<option value="' + d.id + '">' + d.name + '</option>');
                    $('#sectionUpload').append('<option value="' + d.id + '">' + d.name + '</option>');
                });
            }
        });
  
});

function changeValue(field) {

    console.log('field', field.value)

    // if (field.value == 7) {

    //     document.getElementById("reading").style.display="none";
    //     document.getElementsByClassName("tox-tinymce").style.display="block";
        
    // } else {
    //     document.getElementById("reading").style.display="none";
    // }

}


function getSubSection() {
console.log('a', document.getElementById("section").value);
if (document.getElementById("section").value != 0) {

$('#subsection').empty()
    //var dropDown = document.getElementById("carId");
    //var carId = dropDown.options[dropDown.selectedIndex].value;
    var baseUrl = document.getElementById("base-url").value;

    $.ajax({
            type: "POST",
            url: baseUrl+"/question/getSubSection",
            data: { 'Id': document.getElementById("section").value  },
            success: function(data){ console.log('data', data);
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                 $('#subsection').append('<option value="0"> Select </option>');
                $.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#subsection').append('<option value="' + d.id + '">' + d.name + '</option>');
                });
            }
        });
} else {
$('#subsection').empty()
	 $('#subsection').append('<option value="0">' + 'NA' + '</option>');
}
}
</script>


        </div>
    </div>
                            </div>
                        </div>
                        <div style="height: 100vh;"></div>
                        <!-- <div class="card mb-4">

                            <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div>
                    </div> -->
                    </div>
                </main>
             


        <script>


            function changeType() {
                console.log('test', document.getElementById("questionType").value)
                var questionType =  document.getElementById("questionType").value;
                if (questionType == 3) {
                    document.getElementById("singleOptions").style.display="none";  
                      
                    document.getElementById("trueFalse").style.display="block";
                } else if (questionType == 1) {
                     document.getElementById("trueFalse").style.display="none";
                    document.getElementById("singleOptions").style.display="block";

                }
                
            }


            // function firstForm() {

            //     console.log('ll', window.location.host)
            //     $.ajax({
            //         url: "/addTest",
                   
            //         type: 'post',
                    
            //         // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
            //         data: { "test-title": $('#title').val(), "test-type": $('#type').val() } ,
            //         success: function( data, textStatus, jQxhr ){
            //             //$('#response pre').html( JSON.stringify( data ) );
            //             console.log('data', data);
            //             document.getElementById("mcqTestId").value = data;
            //             //document.getElementById("nextBtnn").disabled = false;
            //         },
            //         error: function( jqXhr, textStatus, errorThrown ){
            //             console.log( errorThrown );
            //         }
            //     });

            //     document.getElementById("title").disabled = true;
            //     document.getElementById("type").disabled = true;
            //     document.getElementById("section").disabled = true;
            //     var no =  document.getElementById("section").value;


            //     for (var i=1;i<=no;i++){
            //         addNewSection(i);
            //     }
            //     document.getElementById("secondPart").style.display = "block";
            // }

            // function secondFormSubmit() {
            //     console.log('a')
            //    // document.getElementById("title").disabled = true;
            //    // document.getElementById("type").disabled = true;
            //    // document.getElementById("section").disabled = true;
            //     var no =  document.getElementById("section").value;

            //     var mcqId = document.getElementById("mcqTestId").value ;
            //     // var time1 = document.getElementById("time1").value ;
            //     // var time2 = document.getElementById("time2").value ;
            //     // var time3 = document.getElementById("time3").value ;

            //     var sectionId = "";

            //     var questionNos = "";

            //     var  sectionTime = "";

            //     for (var i=1;i<=no;i++){
            //         document.getElementById("item_unit_"+i).disabled = true;
            //         document.getElementById("item_name_"+i).disabled = true;
            //         document.getElementById("item_quantity_"+i).disabled = true;
            //         document.getElementById("add_question_"+i).style.display="block";
            //         document.getElementById("add_question_link_"+i).href = "/add-question/"+mcqId+"/"+document.getElementById("item_unit_"+i).value;

            //         if (i > 1) {
            //             sectionId += ",";
            //             questionNos += ",";
            //             sectionTime += ",";
            //         }

            //         sectionId += document.getElementById("item_unit_"+i).value;
            //         questionNos += document.getElementById("item_name_"+i).value;
            //         sectionTime += document.getElementById("item_quantity_"+i).value;
            //     }

            //     console.log('sect', sectionId, questionNos, sectionTime)

            //     $.ajax({
            //         url: "/addTestTime",
            //         type: 'post',
            //         data: {'mcqId': mcqId, 'sectionIds': sectionId, 'totalSection':no, 'totalQuestion':questionNos, 'sectionTime': sectionTime},
                  
            //         success: function( data ){
            //             //$('#response pre').html( JSON.stringify( data ) );
            //             console.log('data', data);
               
            //         },
            //         error: function( jqXhr, textStatus, errorThrown ){
            //             console.log( errorThrown );
            //         }
            //     });

            //     // for (var i=1;i<=no;i++){
            //     //     document.getElementById("item_unit_"+i).disabled = true;
            //     //     document.getElementById("item_name_"+i).disabled = true;
            //     //     document.getElementById("item_quantity_"+i).disabled = true;
            //     //     document.getElementById("add_question_"+i).style.display="block";
            //     // }
            //     //thirdFormSubmit();
            // }

            function addSection() {
                var no =  document.getElementById("type").value;

                if (no > 1) {
                    document.getElementById("showSection").style.display = "block";
                } else {
                    document.getElementById("showSection").style.display = "none";
                }
            }

            function checkValue(id) {



                var idN = id.id;
              
                var no =  idN.value;

                var error = false;
                var sel = "";
                for (var i=0; i < document.getElementById("type").value; i++) {
                    if (no == document.getElementById("item_unit_"+i).value) {

                    }
                }

                if (error) {
                    alert('section already selected');
                }

            }

            function addNewSection(i) {
                var html = '';
                html += '<tr>';
                html += '<td><select id="item_unit_'+i+'" name="item_unit[]" class="form-control item_unit"><option value="">Select</option><option value="1">English</option><option value="2">Reasoning</option><option value="3">Quantitative</option><option value="4">Code Test </option></select></td>';
                html += '<td><input type="text" id="item_name_'+i+'" name="item_name[]" class="form-control item_name" /></td>';
                html += '<td><input type="text" id="item_quantity_'+i+'" name="item_quantity[]" class="form-control item_quantity" /></td>';
                html += '<td id="add_question_'+i+'" style="display:none;"><a id = "add_question_link_'+i+'"> Add Questions</a></td></tr>';

                // html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
                $('#item_table').append(html);
            }

            $(document).on('click', '.remove', function(){
                $(this).closest('tr').remove();
            });

        </script>
    </body>
</html>

