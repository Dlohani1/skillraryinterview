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
                        <h1 class="mt-4">Create MCQs</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create MCQ</li>
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
                                <input type="date" name="drive-date" class="form-control" id="drive-date" placeholder="Enter Date">
                                <br/><input type="time" name="drive-time" class="form-control" id="drive-time" placeholder="Enter time">
                                <br/><input type="text" name="drive-place" class="form-control" id="drive-place" placeholder="Enter place">
                                <br/>
                            </div>
                            </div>
                             <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Customer Code </label>
                                <span id = "codeError" style="color:red"></span>
                                <input type="text" name="customer_code" class="form-control" id="customer_code" placeholder="Enter code">
                                <div id="customerList"></div>
                                <input type="hidden" id="validCode" value="0"/>
                            </div>
                        </div> <br/> <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Proctored </label>
                                 <select type="text" name="is_proctored" class="form-control" id="is_proctored" >
                                    
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div> <br/>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title">
                                <input type="hidden" id="mcqTestId" />
                                <span id = "titleError" style="color:red"></span>
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
                            <span><button type="button" class="ESbutn" id="firstFormSubmit" onclick="firstForm();">Submit</button></span>
                        </div>
                    </form>
                </div>
            </div>
            <br/>
            <div class="row" id="secondPart" style="display: none;">
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
     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Section Name</th>
       <th>Total Questions</th>
       <th>Questions Required</th>
       <th>Total Time (in min)</th>
       <th><button type="button" name="add" class="btn btn-success btn-sm add" onclick="addNewSection()"><span class="glyphicon glyphicon-plus"></span></button></th>
      </tr>
     </table>
     <!-- <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div> -->
    <span><button type="button" class="ESbutn"  id="secondForm" onclick="return secondFormSubmit();">Submit</button></span>
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
            <div class="row" id="code-test" style="display:  none;">
                
                <div class="col-md-8 offset-md-2 firstSection">

                    <form name="lstForm" action="#">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Add Code Test</label>
                                <input type="checkbox" id="add-code-test" />
                               <!--  <a href="https://code.skillrary.com/admin/login" target="_blank"> Click here to create code test </a> -->
                                <input type="text" name="code" style="display:none" class="form-control" id="code" placeholder="Enter Code" autocomplete="off">
                            </div>
                        </div><br/>
                        <div class="editSubbtn">
                           <span><button type="button" style="display:none" class="ESbutn" id="codeSubmit" onclick="return enterCode();">Submit</button></span>
                        </div>
                    </form>
                </div>
            </div>

            <br/>
                   <div class="row" id="generateUP" style="display:none">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Generate UserName Password</label>
                                <input type="number" name="generate" class="form-control" id="generate" placeholder="Enter Number to generate code" autocomplete="off">
                                <button onclick="generateUsrPwd()">Generate IDs</button>
                            </div>
                        </div><br/>

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

            //document.getElementById("mcq-link").click();

             function generateUsrPwd() {

                alert('aa');
                var num = document.getElementById("generate").value;
                var mcqId = document.getElementById("mcqTestId").value ;
                var baseUrl = document.getElementById("base_url").value;
                  $.ajax({
                    url: baseUrl+"generateUsrPwd",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "mcqId" : mcqId, "num":num} ,
                    success: function( data, textStatus, jQxhr ){
                        //window.location.reload(true);
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        document.getElementById("code").disabled = true;

                        document.getElementById("codeSubmit").disabled = true;
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });


                        // $.alert({
                        //     title: 'SkillRary Alert!',
                        //     content: 'Username Password Generated',
                        // });


             }


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
                       // window.location.href="admin/view-mcq";
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        document.getElementById("code").disabled = true;

                        document.getElementById("codeSubmit").disabled = true;
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });


                // $.alert({
                //     title: 'SkillRary Alert!',
                //     content: 'Code Test Added Successfully',
                // });

            }
            var baseUrl = document.getElementById("base_url").value;
 $('#customer_code').keyup(function(){ 
    var query = $(this).val();
    if(query != '')
    {
     $.post(baseUrl+"admin/fetch-customers",
      {
        customerCode:query
      },
      function(data, status){
        console.log('ds',data)
        $('#customerList').fadeIn();  
        $('#customerList').html(data);
      });
    }
})
 $(document).on('click', 'li', function(){
    document.getElementById("validCode").value = 1;
    $('#customer_code').val($(this).text());  
    $('#customerList').fadeOut();
  });
            function firstForm() {

                console.log('ll', window.location.host)
                var baseUrl = document.getElementById("base_url").value;

                var customerCode = document.getElementById("customer_code").value.trim();

                var mcqTitle = document.getElementById("title").value.trim();

                var isError = true;
                if (mcqTitle.length  == 0) {
                    isError = false;
                    document.getElementById("titleError").innerHTML = "Please enter title";
                } else {
                    document.getElementById("titleError").innerHTML = "";
                }

                if (customerCode.length  == 0) {
                    isError = false;
                    document.getElementById("codeError").innerHTML = "Please enter code";
                } else {
                    document.getElementById("codeError").innerHTML = "";
                }

                if (document.getElementById("validCode").value == 0) {
                    isError = false;
                    alert("Code not valid");
                }

                if (isError) {
                // if (document.getElementById("title").value.trim().length > 0 && customerCode.length > 0) {
                    $.ajax({
                    url: baseUrl+"/addTest",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "test-title": $('#title').val(), "test-type": 2, "drive-date": $('#drive-date').val(), "drive-time": $('#drive-time').val(), "drive-place": $('#drive-place').val(), "customer-code": $('#customer_code').val(), "is-proctored": $('#is_proctored').val() } ,
                    success: function( data, textStatus, jQxhr ){
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
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
                    document.getElementById("customer_code").disabled = true;
                    document.getElementById("is_proctored").disabled = true;
                    var no =  document.getElementById("section").value;


                    for (var i=1;i<=no;i++){
                        addNewSection(i);
                    }
                    document.getElementById("secondPart").style.display = "block";
                    document.getElementById("code-test").style.display = "block";
                    
                    document.getElementById("generateUP").style.display = "block";

                    var baseUrl = document.getElementById("base-url").value;

                        // $.alert({
                        //     title: 'SkillRary Alert!',
                        //     content: 'Assessment Created Successfully',
                        // });

                    //getSection(1);

                    //document.getElementById("code-test").style.display = "block";
                }
            }


              
               function getTotalS(id,a) {
                //console.log('aa',a, "b",b)
                //var selectedId =  document.getElementById(id).selectedIndex;
                var selectedId =  document.getElementById(id).value;
                var baseUrl = document.getElementById("base-url").value;
                $.ajax({
                    type: "POST",
                    url: baseUrl+"question/getTotalQuestion",
                     data: { 'Id': selectedId},
                    success: function(data){
                    // Parse the returned json data
                    var opts = $.parseJSON(data);
                    console.log('dd',opts)

                    document.getElementById("item_name_"+a).value=opts.total_question;
                    // Use jQuery's each to iterate over the opts value
                    //$.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                  }  
                });
            }


            function getTotal(a,b) {
                console.log('aa',a, "b",b)

                var baseUrl = document.getElementById("base-url").value;
                $.ajax({
                    type: "POST",
                    url: baseUrl+"question/getTotalQuestion",
                     data: { 'Id': b},
                    success: function(data){
                    // Parse the returned json data
                    var opts = $.parseJSON(data);
                    console.log('dd',opts)

                    document.getElementById("item_name_"+a).value=opts.total_question;
                    // Use jQuery's each to iterate over the opts value
                    //$.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                  }  
                });
            }
            


            function getSection(id) {

                console.log('dd',id)
                //$('#item_unit_'+id).empty();
                var baseUrl = document.getElementById("base-url").value;
                $.ajax({
                    type: "POST",
                    url: baseUrl+"question/getSection",
                    success: function(data){
                    // Parse the returned json data
                    var opts = $.parseJSON(data);
                    // Use jQuery's each to iterate over the opts value
                    $.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                      $('#item_unit_'+id).click(function (e) {
                            //alert('click');
                            getTotalS("item_unit_"+id,  id);
                        });
                    $('#item_unit_'+id).append('<option value="' + d.id + '">' + d.name + '</option>');
                });
            }
        });
            }
            function secondFormSubmit() {
                var baseUrl = document.getElementById("base_url").value;
                console.log('a')
               document.getElementById("title").disabled = true;
               document.getElementById("type").disabled = true;
               document.getElementById("section").disabled = true;
               //var no =  document.getElementById("section").value;

               var noId = document.getElementsByClassName("item_unit");
                var no = noId.length;
                var mcqId = document.getElementById("mcqTestId").value ;

                // var time1 = document.getElementById("time1").value ;
                // var time2 = document.getElementById("time2").value ;
                // var time3 = document.getElementById("time3").value ;

                var sectionId = "";

                var questionNos = "";

                var  sectionTime = "";

                var  requiredQnos = "";
                console.log('nn',no)
                
                for (var i=1;i<=no;i++){
                    document.getElementById("item_unit_"+i).disabled = true;
                    document.getElementById("item_name_"+i).disabled = true;
                    document.getElementById("item_quantity_"+i).disabled = true;
                    //document.getElementById("add_question_"+i).style.display="block";
                    document.getElementById("add_question_link_"+i).href = baseUrl+"add-question/"+mcqId+"/"+document.getElementById("item_unit_"+i).value;

                    if (i > 1) {
                        sectionId += ",";
                        questionNos += ",";
                        sectionTime += ",";
                        requiredQnos += ",";
                    }

                    sectionId += document.getElementById("item_unit_"+i).value;
                    questionNos += document.getElementById("item_name_"+i).value;

                    
                    sectionTime += parseInt(document.getElementById("item_question_"+i).value)*60;
                    
                    requiredQnos += document.getElementById("item_quantity_"+i).value;
                }

                //document.getElementById("createTest").style.display = "block";

                document.getElementById("secondForm").disabled = true;

                console.log('sect', sectionId, questionNos, sectionTime)

                $.ajax({
                    url: baseUrl+"/addTestTime",
                    type: 'post',
                    data: {'mcqId': mcqId, 'sectionIds': sectionId, 'totalSection':no, 'totalQuestion':questionNos, 'requiredQnos':requiredQnos, 'sectionTime': sectionTime},
                    success: function( data ){
                      //  $('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);               
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });

                for (var i=1;i<=no;i++){
                    document.getElementById("item_unit_"+i).disabled = true;
                    document.getElementById("item_name_"+i).disabled = true;
                    document.getElementById("item_quantity_"+i).disabled = true;
                    document.getElementById("item_question_"+i).disabled = true;
                    //document.getElementById("add_question_"+i).style.display="block";
                }


                // $.alert({
                //     title: 'SkillRary Alert!',
                //     content: 'Sections Created Successfully',
                // });


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



                console.log('test');
                var val = document.getElementById("linkCount").value;
                if (val >2) { console.log('dd')
                    document.getElementById("code-test").style.display = "block";
                } else {
                    document.getElementById("linkCount").value =  val+1;    
                }
                


            }



            function checkQuestion() {
                console.log('ttest');
            }

            function addNewSection(i) {
                var sectionCount = document.getElementById("sectionNo").value ;
                document.getElementById("sectionNo").value = parseInt(sectionCount) + 1;
                if (i == undefined) {
                    
                    var i = document.getElementById("sectionNo").value;
                }

                var html = '';
                html += '<tr>';
                html += '<td><select id="item_unit_'+i+'" name="item_unit[]" class="form-control item_unit"><option value="">Select</option></select></td>';
                
                html += '<td><input readonly type="text" id="item_name_'+i+'" name="item_name[]" class="form-control item_name" /></td>';
                
                html += '<td><input type="text" onchange="checkQuestion()" id="item_quantity_'+i+'" name="item_quantity[]" class="form-control item_quantity" /></td>';
                
                html += '<td><input type="text" id="item_question_'+i+'" name="item_question[]" class="form-control item_quantity" /></td>';
                
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

                console.log('aa')
                $(this).closest('tr').remove();
            });


        $('input[type="checkbox"]').click(function(){

            if($(this).prop("id") == "add-code-test") {

                if($(this).prop("checked") == true) {
                    document.getElementById("code").style.display = "block";
                    document.getElementById("codeSubmit").style.display = "block";
                } else if($(this).prop("checked") == false){
                    document.getElementById("code").style.display = "none";
                    document.getElementById("codeSubmit").style.display = "none";
                }
            }
        });

        </script>
      

    </body>
</html>
