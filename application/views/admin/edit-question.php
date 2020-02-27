<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SkillRary Adminn</title>
        <link href=<?php echo base_url()."admin/admin-css-js/css/styles.css"; ?> rel="stylesheet" />
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
                   
           
           
<?php

//print_r($questionData);
?> 

<div class="container">
  <h2>Question Bank</h2>
  <input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
  <form class="form-horizontal" method="post" action=<?php echo base_url()."admin/save";?> enctype="multipart/form-data">
   <div class="form-group">
      <input type="hidden" name="questionId" value = <?php echo $questionData['question_id'];?> />
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
            <option value="1" <?php if ($questionData['level_id'] == "1" ) { echo "selected";}?>>Easy</option>
            <option value="2" <?php if ($questionData['level_id'] == "2" ) { echo "selected";} ?>>Moderate</option>
            <option value="3" <?php if ($questionData['level_id'] == "3" ) { echo "selected";} ?>>Difficult</option>
        </select>
      </div>
    </div>

<?php 
$questionType = $questionData['question_type'];
?>

    <div class="form-group">
      <label class="control-label col-sm-2" for="sub-section">Question Type:</label>
      <div class="col-md-8">
        <select id="questionType" name="questionType" >
            <!-- <option value="0" >Select </option> -->
            <option value="1"  <?php if ($questionType == "1") { echo " selected "; } else { echo "disabled";} ?>>Single Ans</option>
            <option value="2" disabled>Multiple Ans</option>
            <option value="3"  <?php if ($questionType == "3") { echo " selected "; } else { echo "disabled";} ?>>True/False</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="question">Question:</label>
      <div class="col-md-8">          
        <!-- <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question"> -->
        <textarea id="question" name="question"><?php echo $questionData['question']?></textarea>
       <!--  <textarea id="reading" name="reading" ></textarea> -->
      </div>
    </div>
<?php
if ($questionType == 1) { ?>

    <div class="form-group">
      <label class="control-label col-sm-2" for="question">Add Image:</label>
      <div class="col-md-8">          
        <!-- <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question"> -->
        <input type="file" id="qimg" name="qimg" />
      </div>
    </div>

<div class="form-group" id="singleOptions" >
    <label class="control-label col-sm-2" for="pwd">Answers:</label>
    <div class="col-md-8">          
        <input type="radio" <?php if ($questionData['options'][0]['correct']) {echo "checked";} ?> name="correct" value="1"> Select if correct option<input type="text" class="form-control" id="option1" value=<?php echo $questionData['options'][0]['option']; ?> name="ans1">
           <input type="hidden" class="form-control" value=<?php echo $questionData['options'][0]['id']; ?> name="ans1Id"> 

        <input type="radio" <?php if ($questionData['options'][1]['correct']) {echo "checked";} ?> name="correct" value="2"> Select if correct option<input type="text" class="form-control" id="option2" value=<?php echo $questionData['options'][1]['option']; ?> name="ans2">

        <input type="hidden" class="form-control"  value=<?php echo $questionData['options'][1]['id']; ?> name="ans2Id">


        <input type="radio" <?php if ($questionData['options'][2]['correct']) {echo "checked";} ?> name="correct" value="3"> Select if correct option<input type="text" class="form-control" id="option3" value=<?php echo $questionData['options'][2]['option']; ?> name="ans3">

        <input type="hidden" class="form-control" value=<?php echo $questionData['options'][2]['id']; ?> name="ans3Id">


        <input type="radio" <?php if ($questionData['options'][3]['correct']) {echo "checked";} ?> name="correct" value="4"> Select if correct option<input type="text" class="form-control" id="option4" value=<?php echo $questionData['options'][3]['option']; ?> name="ans4">

        <input type="hidden" class="form-control" value=<?php echo $questionData['options'][3]['id']; ?> name="ans4Id">
    </div>
</div>
<?php } else if ($questionType == 3) {
    $q = $questionData['options'][0]['option'];


    ?>

<div class="form-group" id="trueFalse" >
    <label class="control-label col-sm-2" for="pwd">Answers:</label>
    <input type="hidden" name="answer_id" value=<?php echo $questionData['options'][0]['id']; ?> >
    <div class="col-md-8">          
        <input type="radio" name="true_false" <?php if ($q == "true") { echo "checked "; } ?> value="1"> True
        <input type="radio" name="true_false" <?php if ($q == "false") { echo "checked "; } ?> value="2"> False
    </div>
</div>
<?php } ?>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-md-8">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
<script>
$( document ).ready(function() {
    
//$('#section').empty()
    //var dropDown = document.getElementById("carId");
    //var carId = dropDown.options[dropDown.selectedIndex].value;
    var baseUrl = document.getElementById("base-url").value;

    var sel = <?php echo $questionData['section_id']; ?>;


    var val = 0;

    $.ajax({
            type: "POST",
            url: baseUrl+"/question/getSection",
            success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data

                    var isSelected = "";

                    if (d.id == sel) {
                        isSelected = " selected";
                    }
                    $('#section').append('<option '+ isSelected+' value="' + d.id + '">' + d.name + '</option>');
                });
            }
        });

        getSubSection();
  
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

var sel = <?php echo $questionData['section_id']; ?>;
var subSectionId = <?php echo $questionData['sub_section_id']; ?>;
console.log('ab', sel);

if (sel != 0) {

$('#subsection').empty()
    //var dropDown = document.getElementById("carId");
    //var carId = dropDown.options[dropDown.selectedIndex].value;
    var baseUrl = document.getElementById("base-url").value;

    $.ajax({
            type: "POST",
            url: baseUrl+"/question/getSubSection",
            data: { 'Id':sel },
            success: function(data){ console.log('data', data);
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                 $('#subsection').append('<option value="0"> Select </option>');
                $.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    var isSelected = "";

                    if (d.id == subSectionId) {
                        isSelected = " selected";
                    }
    
                    $('#subsection').append('<option '+isSelected+' value="' + d.id + '">' + d.name + '</option>');
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src=<?php echo base_url()."admin/admin-css-js/js/scripts.js"; ?> ></script>
    </body>
</html>

