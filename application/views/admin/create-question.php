<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SkillRary Admin</title>
        <link href="admin-css-js/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
          <script src='https://cdn.tiny.cloud/1/lnsezku8yem3815vbxl499zobwl7hiehkejxya4ajhlonxot/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: '#question'
  });
  </script>

   <style>
        /*.firstSection{
            background: white;
            box-shadow: 2px 2px 10px 0px #aaa;
            padding: 30px;
        }*/
        .labelColor{
            color: black;
            font-size: 17px;
            line-height: 10px;
        }
        .editSubbtn{
            float:right;
            margin-right: 120px;
        }
        .ESbutn{
            margin-bottom: 5px;
            padding: 4px 15px;
            background: #33a478;
            border: 1px solid #33A478;
        }
        .labelTest{
            color: #33A478;
            font-weight: 600;
            font-size: 20px;
        }
        .addBtn{
            background: #33A478;
            margin-top: 25px;
            border: 2px solid #33A478;
            padding: 3px 8px;
        }
        .tdborder,.thborder{
            border: 1px solid black !important;
            text-align: center !important;
            color:black;
        }
        .tableWidth {
            width:100%;
        }
        .navbar {
        	margin-bottom: 0px !important;
        }
    </style>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">SkillRary Admin</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
               <!--  <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div> -->
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
<!--                         <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a
                            > -->
                           <!--  <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="layout-static.html">Static Navigation</a><a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a></nav>
                            </div> -->
<!--                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                    </div>
                                </nav>
                            </div> -->
                            <!-- <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a
                            ><a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables</a
                            > -->

                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                MCQs
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/create-test";?>>Create</a>
                                    <a class="nav-link" href=<?php echo base_url()."admin/view-mcq";?>>View</a>
                                </nav>
                            </div>
                             <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsQ" aria-expanded="false" aria-controls="collapseLayouts"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Questions
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsQ" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/add-question";?>>Create</a>
                                    <a class="nav-link" href=<?php echo base_url()."admin/view-questions";?>>View</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsR" aria-expanded="false" aria-controls="collapseLayoutsR"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Results
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsR" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/view-results";?>>View</a>
                                </nav>
                            </div>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        SkillRary Admin
                    </div>
                </nav>
            </div>
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
                <div class="col-md-8 offset-md-2 firstSection">
                   
           
           
            

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
      <div class="col-md-8">          
        <!-- <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question"> -->
        <textarea id="question" name="question"></textarea>
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
    <div class="col-md-8">          
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
                <footer class="py-4 bg-light mt-auto">
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
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="admin-css-js/js/scripts.js"></script>


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

