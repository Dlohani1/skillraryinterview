



<style>
    .auto-customer {
      position: absolute;
   
    list-style-type:none;
    cursor: pointer;
}
</style>







            <input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
            
            <input type="hidden" id="sectionNo" value="0"/>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit MCQs</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Edit MCQ</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <!--  <p class="mb-0">This page is an example of using static navigation. By removing the <code>.sb-nav-fixed</code> class from the <code>body</code>, the top navigation and side navigation will become static on scroll. Scroll down this page to see an example.</p> -->
                                   <div class="container-fluid">
        <div class="container">
            <!-- <h2 align="center" style="color: #33a478;font-weight: 600;">Create Test</h2> -->
            <input type="hidden" id="base_url" name="base_url" value= "<?php echo base_url();?>" />
            <div class="row">
                <div class="col-md-8 offset-md-2 firstSection">
                    <form name="fstForm" action="#">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Drive Details</label>
                                <input type="date" name="drive-date" class="form-control" id="drive-date" placeholder="Enter Date" value="<?php echo ($drive_data != null) ?$drive_data[0]->drive_drive_date : ''; ?>">
                                <br/><input type="time" name="drive-time" class="form-control" id="drive-time" placeholder="Enter time" value="<?php echo ($drive_data != null) ?$drive_data[0]->drive_drive_time : '' ; ?>">
                                <br/><input type="text" name="drive-place" class="form-control" id="drive-place" placeholder="Enter place" value="<?php echo  ($drive_data != null) ?$drive_data[0]->drive_drive_place : '' ;?>">
                                <input type="hidden" name="check_mcq_test_id" class="form-control" id="check_mcq_test_id" value="<?php echo  $mcq_test_data[0]->mcq_test_id;?>">

                                <input type="hidden" name="check_mcq_test_id" class="form-control" id="check_mcq_test_id" value="<?php echo  $mcq_test_data[0]->mcq_test_id;?>">

                                <input type="hidden" name="check_drive_id" class="form-control" id="check_drive_id" value="<?php echo   ($drive_data != null) ?$drive_data[0]->drive_id : 0;?>">

                                <br/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title" value="<?php echo ($mcq_test_data != null) ?$mcq_test_data[0]->mcq_test_title : '' ; ?>">
                                <input type="hidden" id="mcqTestId" />
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Type</label>
                                <select type="text" name="type" class="form-control" id="type" onchange="addSection()">
                                   <!--  <option selected >Select Single/Multiple Test</option>
                                    <option value="1">Single</option> -->
                                    <option value="2" selected disabled>Multiple</option>
                                </select>
                            </div>
                        </div><br/>
                        <div class="row" id="showSection" style="display:none">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Total Section</label>
                                <input type="text" name="section" class="form-control" id="section" value='1' disabled>
                            </div>
                        </div>
                        <br/>
                        <div class="editSubbtn">
                           <!--  <span><button type="button" onclick="return editFirstForm()" class="ESbutn">Edit</button></span>&nbsp;&nbsp; -->
                            <!-- <span><button type="button" class="ESbutn" onclick="return submitFirstForm();">Submit</button></span> -->
                            <span><button type="button" class="ESbutn" id="firstFormSubmit" onclick="firstForm();">Update</button></span>
                        </div>
                    </form>
                </div>
            </div>
            <br/>
            <div class="row" id="secondPart" style="display: block;">
                <div class="col-md-8 offset-md-2 firstSection">
                <!--     <form name="secondForm" action="#">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">English</label>
                                <input type="text" name="ETime" class="form-control" id="englishTime" placeholder="Select total time in seconds">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Reasoning</label>
                                <input type="text" name="RTime" class="form-control" id="reasoningTime" placeholder="Select total time in seconds">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Quantitative</label>
                                <input type="text" name="QTime" class="form-control" id="quantitativeTime" placeholder="Select total time in seconds">
                            </div>
                        </div><br/>
                        <div class="editSubbtn"> -->
                            <!-- <span><button type="button" onclick="return editSecondForm()" class="ESbutn">Edit</button></span>&nbsp;&nbsp; -->

                           <!--  <span><button type="button" class="ESbutn" onclick="return submitSecondForm();">Submit</button></span>
                        </div>
                    </form> -->

                    
   <h4 align="center">Enter Section Details</h4>
   <br />
   <form method="post" id="insert_form">
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Section Name</th>
       <th>Total Questions</th>
       <th>Questions Required</th>
       <th>Total Time (in sec)</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add" onclick="addNewSection()"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <!-- <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div> -->
    <span><button type="button" class="ESbutn" onclick="return secondFormSubmit();">Update</button></span>
    <span><button type="button" id="createTest" style="display: none" class="ESbutn" onclick="return createTest();">Create Test</button></span>
    </div>
   </form>
                </div>
            </div>

                <div class="row" id="subSectionPart" style="display:none">
                  <div class="col-md-8 offset-md-2 firstSection">
                    <!-- <div class="col-md-10 offset-md-1"> -->
                        <h4 align="center">Enter Section Details</h4>
                    <br />
                    <table class="tableWidth" id="section_table">
                        <tr>
                            <th colSpan="7" style="text-align: center;background: yellow;border: 1px solid black;">
                                Enter No. of Questions
                            </th>
                        </tr>
                        <tr>
                            <th class="thborder">Section</th>
                            <th class="thborder">Sub Topic</th>
                            <th class="thborder">Easy</th>
                            <th class="thborder">Moderate</th>
                            <th class="thborder">Difficult</th>
                            <th class="thborder">Total Qns</th>
                            <th class="thborder">Difficulty</th>
                        </tr>
                    
                    </table>
                </div>
            </div>
            

            <br/>
            <input type="hidden"  value="0" id = "linkCount" />
            <div class="row" id="code-test" style="display: none;">
                
                <div class="col-md-8 offset-md-2 firstSection">

                    <form name="lstForm" action="#">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Add Code Test</label>
                                <input type="checkbox" id="add-code-test" />
                                <a href="https://code.skillrary.com/admin/login" target="_blank"> Click here to create code test </a>
                                <input type="text" name="code" class="form-control" id="code" placeholder="Enter Code" autocomplete="off">
                            </div>
                        </div><br/>
                        <div class="editSubbtn">
                           <span><button type="button" class="ESbutn" id="codeSubmit" onclick="return enterCode();">Submit</button></span>
                        </div>
                    </form>
                </div>
            </div>

            <br/>


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
                <!-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; SkillRary Assessment 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div> -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../admin-css-js/js/scripts.js"></script>


        <script>
            //document.getElementById("mcq-link").click();

             


            function enterCode() {
                var code = document.getElementById('code').value;
                var mcqId = document.getElementById("mcqTestId").value ;
                var baseUrl = document.getElementById("base_url").value;
                $.ajax({
                    url: baseUrl+"saveCodeTest",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "mcqId" : mcqId,"code": code } ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);
                        window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        // console.log('data', data);
                        document.getElementById("code").disabled = true;

                        document.getElementById("codeSubmit").disabled = true;
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        // console.log( errorThrown );
                    }
                });
            }


            function firstForm() {


                // console.log('ll', window.location.host)
                var baseUrl = document.getElementById("base_url").value;

                if (document.getElementById("title").value.trim().length > 0) {
                    $.ajax({
                    url: baseUrl+"/addTest",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "test-title": $('#title').val(), "test-type": $('#type').val(), "drive-date": $('#drive-date').val(), "drive-time": $('#drive-time').val(), "drive-place": $('#drive-place').val() , "check_mcq_test_id": $('#check_mcq_test_id').val(), "check_drive_id": $('#check_drive_id').val() } ,
                    success: function( data, textStatus, jQxhr ){
                        //$('#response pre').html( JSON.stringify( data ) );
                        // console.log('data', data);

                        document.getElementById("mcqTestId").value = data;
                        //document.getElementById("nextBtnn").disabled = false;
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                    });

                    document.getElementById("title").disabled = true;
                    document.getElementById("type").disabled = true;
                    document.getElementById("section").disabled = true;
                    var no =  document.getElementById("section").value;


                    for (var i=1;i<=no;i++){
                        // addNewSection(i);
                    }
                    document.getElementById("secondPart").style.display = "block";

                    var baseUrl = document.getElementById("base-url").value;

                    //getSection(1);

                    //document.getElementById("code-test").style.display = "block";
                } else {
                    alert('MCQ Title cannot be empty');
                }

            }

            function getTotal(a,b) {
                // console.log('aa',a, "b",b)

                var baseUrl = document.getElementById("base-url").value;
                $.ajax({
                    type: "POST",
                    url: baseUrl+"question/getTotalQuestion",
                     data: { 'Id': b},
                    success: function(data){
                    // Parse the returned json data
                    var opts = $.parseJSON(data);
                    // console.log('dd',opts)

                    document.getElementById("item_name_"+a).value=opts.total_question;
                    // Use jQuery's each to iterate over the opts value
                    //$.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                  }  
                });
            }
            


            function getSection(id) {

                // console.log('dd',id)
                //$('#item_unit_'+id).empty();
                var baseUrl = document.getElementById("base-url").value;
                $.ajax({
                    type: "POST",
                    url: baseUrl+"question/getSection",
                    success: function(data){
                    // Parse the returned json data
                    var opts = $.parseJSON(data);
                    // Use jQuery's each to iterate over the opts value
                    $.each(opts, function(i, d) { 
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#item_unit_'+id).append('<option onclick=getTotal("'+id+'","'+d.id+'") value="' + d.id + '">' + d.name + '</option>');
                    $('#item_units_'+id).append('<option onclick=getTotal("'+id+'","'+d.id+'") value="' + d.id + '">' + d.name + '</option>');
                });
            }
        });
            }
            function secondFormSubmit() {
                var baseUrl = document.getElementById("base_url").value;

               document.getElementById("title").disabled = true;
               document.getElementById("type").disabled = true;
               document.getElementById("section").disabled = true;

               var noId = document.getElementsByClassName("item_unit");
                var no = noId.length;
                var mcqId = <?php echo  $mcq_test_data[0]->mcq_test_id;?>;


                var sectionId = "";

                var questionNos = "";

                var  sectionTime = "";

                var check_exist_id = "";

                var check = 0;

                for (var j = 0; j <mcq_time_data.length; j++) {

                    document.getElementById("add_question_link_"+j).href = baseUrl+"add-question/"+mcqId+"/"+document.getElementById("item_units_"+j).value;
                            if (j >0) {
                                sectionId += ",";
                                questionNos += ",";
                                sectionTime += ",";
                                check_exist_id += ",";
                            }


                            sectionId += document.getElementById("item_units_"+j).value;
                            questionNos += document.getElementById("item_names_"+j).value;

                            sectionTime += document.getElementById("item_questions_"+j).value;
                            check_exist_id += document.getElementById("check_exist_ids_"+j).value;
                            check = 1;
                }



                for (var i=1;i<=no;i++){

                    // console.log(document.getElementById("check_exist_id_"+i).value);
                    document.getElementById("item_unit_"+i).disabled = true;
                    document.getElementById("item_name_"+i).disabled = true;
                    document.getElementById("item_quantity_"+i).disabled = true;
                    document.getElementById("add_question_"+i).style.display="block";
                    document.getElementById("add_question_link_"+i).href = baseUrl+"add-question/"+mcqId+"/"+document.getElementById("item_unit_"+i).value;
                    


                    if (check == 1) {
                        sectionId += ",";
                        questionNos += ",";
                        sectionTime += ",";
                        check_exist_id += ",";
                    }



                    if (i >1 && check == 0) {
                        sectionId += ",";
                        questionNos += ",";
                        sectionTime += ",";
                        check_exist_id += ",";
                    }


                    sectionId += document.getElementById("item_unit_"+i).value;
                    questionNos += document.getElementById("item_name_"+i).value;

                    sectionTime += document.getElementById("item_question_"+i).value;



                    check_exist_id += document.getElementById("check_exist_id_"+i).value;

                    // console.log(check_exist_id);

                    // sectionTime += document.getElementById("item_quantity_"+i).value;
                }

                document.getElementById("createTest").style.display = "block";

                totalSection = no + mcq_time_data.length;
                $.ajax({
                    url: baseUrl+"/editTestTime",
                    type: 'post',
                    data: {'mcqId': mcqId, 'sectionIds': sectionId, 'totalSection':totalSection, 'totalQuestion':questionNos, 'sectionTime': sectionTime , 'check_exist_id': check_exist_id},
                  
                    success: function( data ){

                        console.log(data);
                      //  $('#response pre').html( JSON.stringify( data ) );
                        // console.log('data', data);
               
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        // console.log( errorThrown );
                    }
                });

                for (var i=1;i<=no;i++){
                    document.getElementById("item_unit_"+i).disabled = true;
                    document.getElementById("item_name_"+i).disabled = true;
                    document.getElementById("item_quantity_"+i).disabled = true;
                    document.getElementById("add_question_"+i).style.display="block";
                }
                //thirdFormSubmit();
            }

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


            function testLink() {



                // console.log('test');
                var val = document.getElementById("linkCount").value;
                if (val >2) {

                    document.getElementById("code-test").style.display = "block";
                } else {
                    document.getElementById("linkCount").value =  val+1;    
                }
                


            }



            function checkQuestion() {
               
            }

            function addNewSection(i) {
                var sectionCount = document.getElementById("sectionNo").value ;
                document.getElementById("sectionNo").value = parseInt(sectionCount) + 1;
                if (i == undefined) {
                    
                    var i = document.getElementById("sectionNo").value;
                }


//// var mcq_time_data = <?php //echo json_encode($mcq_time_data); ?>;

// for (var i = 0; i < mcq_time_data.length; i++) {
//     mcq_time_id = mcq_time_data[i]['mcq_time_id'];
//     mcq_time_mcq_test_id = mcq_time_data[i]['mcq_time_mcq_test_id'];
//     mcq_time_section_id = mcq_time_data[i]['mcq_time_section_id'];
//     mcq_time_total_question = mcq_time_data[i]['mcq_time_total_question'];
//     section_id = mcq_time_data[i]['section_id'];
//     section_name = mcq_time_data[i]['section_name'];
// }




                var html = '';
                html += '<tr>';
                html += '<td><select id="item_unit_'+i+'" name="item_unit[]" class="form-control item_unit"><option value="">Select</option></select></td>';
                
                html += '<td><input type="text" id="item_name_'+i+'" name="item_name[]" class="form-control item_name" value="4"/></td>';
                
                html += '<td><input type="text" onchange="checkQuestion()" id="item_quantity_'+i+'" name="item_quantity[]" class="form-control item_quantity" /></td>';
                
                html += '<td><input type="text" id="item_question_'+i+'" name="item_question[]" class="form-control item_quantity" /></td>';
                
                html += '<input type="hidden" id="check_exist_id_'+i+'" name="check_exist_id[]" class="form-control check_exist_id" value="'+0+'"/>';

                html += '<td id="add_question_'+i+'" style="display:none;"><a onclick="testLink()" target="_blank" id = "add_question_link_'+i+'"> Add Questions</a></td>';

                html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
                $('#item_table').append(html);
                getSection(i);

            }


            function thirdFormSubmit() {
            }

            $(document).on('click', '.remove', function(){
                var sectionCount = document.getElementById("sectionNo").value ;

                //document.getElementById("sectionNo").value = parseInt(sectionCount)-1;

                $(this).closest('tr').remove();
            });



            // $( "#firstFormSubmit" ).trigger( "click" );



        var mcq_time_data = <?php echo json_encode($mcq_time_data); ?>;
        var get_total_question = <?php echo json_encode($get_total_question); ?>;

        for (var i = 0; i <mcq_time_data.length; i++) {
            mcq_time_id = mcq_time_data[i]['mcq_time_id'];
            mcq_time_mcq_test_id = mcq_time_data[i]['mcq_time_mcq_test_id'];
            mcq_time_section_id = mcq_time_data[i]['mcq_time_section_id'];
            mcq_time_total_question = mcq_time_data[i]['mcq_time_total_question'];

            mcq_time_total_question = (get_total_question[i] == undefined) ? 0:  get_total_question[i]['total_question'];

            mcq_time_completion_time = mcq_time_data[i]['mcq_time_completion_time'];
            section_id = mcq_time_data[i]['section_id'];
            section_name = mcq_time_data[i]['section_name'];

            var html = '';
                        html += '<tr>';
                        html += '<td><select id="item_units_'+i+'" name="item_units[]" class="form-control item_units"><option value="'+section_id+'">'+section_name+'</option></select></td>';

                        html += '<td><input type="text" id="item_names_'+i+'" name="item_names[]" class="form-control item_names" value="'+12+'"/></td>';
                        
                        html += '<td><input type="text" onchange="checkQuestion()" id="item_quantitys_'+i+'" name="item_quantitys[]" class="form-control item_quantitys" value="'+mcq_time_total_question+'"/></td>';
                        
                        html += '<td><input type="text" id="item_questions_'+i+'" name="item_questions[]" class="form-control item_quantitys" value="'+mcq_time_completion_time+'"/></td>';

                        html += '<input type="hidden" id="check_exist_ids_'+i+'" name="check_exist_ids[]" class="form-control check_exist_ids" value="'+mcq_time_id+'"/>';
                        
                        html += '<td id="add_question_'+i+'" style="display:none;"><a onclick="testLink()" target="_blank" id = "add_question_link_'+i+'"> Add Questions</a></td>';

                        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
                        $('#item_table').append(html);
                        getSection(i);

        }



        </script>







        
      

    </body>
</html>
