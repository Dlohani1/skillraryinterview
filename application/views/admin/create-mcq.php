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

            <style>
        .firstSection{
            background: white;
            box-shadow: 2px 2px 10px 0px #aaa;
            padding: 30px;
        }
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
            margin-bottom: 0px;
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
                                    <a class="nav-link" href="create-test">Create</a>
                                    <a class="nav-link" href="view-mcq">View</a>
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
                                    <a class="nav-link" href="add-question">Create</a>
                                   <!--  <a class="nav-link" href="layout-sidenav-light.html">View</a> -->
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
                                    <a class="nav-link" href="view-results">View</a>
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
                                <label class="labelColor">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title">
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
                                <input type="text" name="section" class="form-control" id="section" value='3' disabled>
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
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
      <tr>
       <th>Section Name</th>
       <th>Total Questions</th>
       <th>Total Time (in sec)</th>
       <!-- <th><button type="button" name="add" class="btn btn-success btn-sm add" onclick="addNewSection()"><span class="glyphicon glyphicon-plus"></span></button></th> -->
      </tr>
     </table>
     <!-- <div align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Insert" />
     </div> -->
     <span><button type="button" class="ESbutn" onclick="return secondFormSubmit();">Submit</button></span>
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
                            <th colSpan="7" style="text-align: center;background: yellow;border: 1px solid black;">Enter No. of Questions</th>
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
            <div class="row" id="code-test" style="display: none;">
                
                <div class="col-md-8 offset-md-2 firstSection">

                    <form name="lstForm" action="#">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Add Code Test</label>
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
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
                        document.getElementById("code").disabled = true;

                        document.getElementById("codeSubmit").disabled = true;
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });
            }


            function firstForm() {

                console.log('ll', window.location.host)
                var baseUrl = document.getElementById("base_url").value;
                $.ajax({
                    url: baseUrl+"/addTest",
                   
                    type: 'post',
                    
                    // data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
                    data: { "test-title": $('#title').val(), "test-type": $('#type').val() } ,
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
                var no =  document.getElementById("section").value;


                for (var i=1;i<=no;i++){
                    addNewSection(i);
                }
                document.getElementById("secondPart").style.display = "block";
                document.getElementById("code-test").style.display = "block";
            }

            function secondFormSubmit() {
                var baseUrl = document.getElementById("base_url").value;
                console.log('a')
               // document.getElementById("title").disabled = true;
               // document.getElementById("type").disabled = true;
               // document.getElementById("section").disabled = true;
                var no =  document.getElementById("section").value;

                var mcqId = document.getElementById("mcqTestId").value ;
                // var time1 = document.getElementById("time1").value ;
                // var time2 = document.getElementById("time2").value ;
                // var time3 = document.getElementById("time3").value ;

                var sectionId = "";

                var questionNos = "";

                var  sectionTime = "";

                for (var i=1;i<=no;i++){
                    document.getElementById("item_unit_"+i).disabled = true;
                    document.getElementById("item_name_"+i).disabled = true;
                    document.getElementById("item_quantity_"+i).disabled = true;
                    document.getElementById("add_question_"+i).style.display="block";
                    document.getElementById("add_question_link_"+i).href = baseUrl+"add-question/"+mcqId+"/"+document.getElementById("item_unit_"+i).value;

                    if (i > 1) {
                        sectionId += ",";
                        questionNos += ",";
                        sectionTime += ",";
                    }

                    sectionId += document.getElementById("item_unit_"+i).value;
                    questionNos += document.getElementById("item_name_"+i).value;
                    sectionTime += document.getElementById("item_quantity_"+i).value;
                }

                console.log('sect', sectionId, questionNos, sectionTime)

                $.ajax({
                    url: baseUrl+"/addTestTime",
                    type: 'post',
                    data: {'mcqId': mcqId, 'sectionIds': sectionId, 'totalSection':no, 'totalQuestion':questionNos, 'sectionTime': sectionTime},
                  
                    success: function( data ){
                        //$('#response pre').html( JSON.stringify( data ) );
                        console.log('data', data);
               
                    },
                    error: function( jqXhr, textStatus, errorThrown ){
                        console.log( errorThrown );
                    }
                });

                // for (var i=1;i<=no;i++){
                //     document.getElementById("item_unit_"+i).disabled = true;
                //     document.getElementById("item_name_"+i).disabled = true;
                //     document.getElementById("item_quantity_"+i).disabled = true;
                //     document.getElementById("add_question_"+i).style.display="block";
                // }
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

            function addNewSection(i) {
                var html = '';
                html += '<tr>';
                html += '<td><select id="item_unit_'+i+'" name="item_unit[]" class="form-control item_unit"><option value="">Select</option><option value="1">English</option><option value="2">Reasoning</option><option value="3">Quantitative</option><option value="4">Code Test </option></select></td>';
                html += '<td><input type="text" id="item_name_'+i+'" name="item_name[]" class="form-control item_name" /></td>';
                html += '<td><input type="text" id="item_quantity_'+i+'" name="item_quantity[]" class="form-control item_quantity" /></td>';
                html += '<td id="add_question_'+i+'" style="display:none;"><a target="_blank" id = "add_question_link_'+i+'"> Add Questions</a></td></tr>';

                // html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
                $('#item_table').append(html);
            }

            function thirdFormSubmit() {
            }

            $(document).on('click', '.remove', function(){
                $(this).closest('tr').remove();
            });

        </script>
      

    </body>
</html>
