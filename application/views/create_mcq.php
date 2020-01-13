<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>


.totalQuestion {
	width:10%;
}

.add_form_field
{
    background-color: #1c97f3;
    border: none;
    color: white;
    padding: 8px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
 border:1px solid #186dad;
}

input{
    border: 1px solid #1c97f3;
    width: 260px;
    height: 40px;
 margin-bottom:14px;
}

.delete{
    background-color: #fd1200;
    border: none;
    color: white;
    padding: 5px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
}

* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #4CAF50;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
<body>

<form id="regForm" method="post" action="addMcq">
    <input type="hidden" id="mcqTestId" name="mcqTestId">
  <h1>Create Test:</h1>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Test:
    <p><input id ="testTitle" placeholder="Title" oninput="this.className = ''" name="fname"></p>
    <p><input id ="testType" placeholder="Enter 1 for Single, 2 for Multiple Section test" oninput="this.className = ''" name="lname"></p>
  	</div>

  <div class="tab">Add Sections:

     <p> English : <input type="text" id="time1" name="time1" placeholder="total time in sec" /> </p>
   <p> Reasoning : <input type="text" id="time2" name="time2" placeholder="total time in sec" /> </p>
   <p> Quantitative : <input type="text" id="time3" name="time3" placeholder="total time in sec" /> </p>


  </div>
<!--   <div class="tab">Birthday:
    <p><input placeholder="dd" oninput="this.className = ''" name="dd"></p>
    <p><input placeholder="mm" oninput="this.className = ''" name="nn"></p>
    <p><input placeholder="yyyy" oninput="this.className = ''" name="yyyy"></p>
  </div> -->
  <div class="tab">Login Info:
    <!-- <p><input placeholder="Username..." oninput="this.className = ''" name="uname"></p>
    <p><input placeholder="Password..." oninput="this.className = ''" name="pword" type="password"></p> -->
   <!--  <p> English : <input type="text" name="time1" placeholder="total time in sec" /> </p>
   <p> Reasoning : <input type="text" name="time2" placeholder="total time in sec" /> </p>
   <p> Quantitative : <input type="text" name="time3" placeholder="total time in sec" /> </p> -->
<div class="container">


  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" onclick="test(1)">English</a></li>
    <li><a data-toggle="tab" href="#menu1" onclick="test(2)">Reasoning</a></li>
    <li><a data-toggle="tab" href="#menu2" onclick="test(3)">Quantitative</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div>
      Sub-Section :
      <select id="sub1" name="sub-Section1"></select>
      Difficulty Level :
      <select id="level1" name="difficulty-level">
        <option value="1">Easy</option>
        <option value="2">Moderate</option>
        <option value="3">Difficult</option>
      </select>
      Total Question:
      <input class="totalQuestion" type="text" name="total" id = "total1" > 
      <button type="button" onclick="addQuestion(1)">Add </button>
                </div>
    </div>
    <div id="menu1" class="tab-pane fade">
<div>
      Sub-Section :
      <select id="sub2" name="sub-Section2"></select>
      Difficulty Level :
      <select id="level2" name="difficulty-level">
        <option value="1">Easy</option>
        <option value="2">Moderate</option>
        <option value="3">Difficult</option>
      </select>
      Total Question:
      <input class="totalQuestion" type="text" name="total" id = "total2" >
      <button type="button" onclick="addQuestion(2)">Add </button>  
                </div>
    </div>
    <div id="menu2" class="tab-pane fade">
     <div>
      Sub-Section :
      <select id="sub3" name="sub-Section3"></select>
      Difficulty Level :
      <select id="level3" name="difficulty-level">
        <option value="1">Easy</option>
        <option value="2">Moderate</option>
        <option value="3">Difficult</option>
      </select>
      Total Question:
      <input class="totalQuestion" type="text" name="total" id = "total3" >
      <button type="button" onclick="addQuestion(3)">Add </button>  
                </div>
    </div>

  </div>
</div>

  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)" disabled>Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
       <!-- <button type="button" id="nextBtnn" onclick="nextPrev(2)" disabled>Add time</button> -->
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px; display:none">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  if (currentTab == 1) {
	console.log('first call'); 

    $.ajax({
        url: "addTest",
       
        type: 'post',
        
        data: { "test-title": $('#testTitle').val(), "test-type": $('#testType').val() } ,
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


  }

  if (currentTab == 2) {
  console.log('second call'); 
    var mcqId = document.getElementById("mcqTestId").value ;
    var time1 = document.getElementById("time1").value ;
    var time2 = document.getElementById("time2").value ;
    var time3 = document.getElementById("time3").value ;
    $.ajax({
        url: "addTestTime",
        type: 'post',
        data: {'mcqId': mcqId,'time1':time1, 'time2':time2, 'time3':time3},
      
        success: function( data ){
            //$('#response pre').html( JSON.stringify( data ) );
    console.log('data', data);
   
        },
        error: function( jqXhr, textStatus, errorThrown ){
            console.log( errorThrown );
        }
    });


  }

  console.log('cc', currentTab)
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {

  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<script>

$( document ).ready(function() {
    
test(1);
  
});

function addQuestion(sectionId) {
var subSectionId = "";
var levelId = "";
var totalQuestion = "";
if (sectionId == 1) {
subSectionId = document.getElementById("sub1").value;
levelId = document.getElementById("level1").value;
totalQuestion = document.getElementById("total1").value;
} else if (sectionId == 2) {
subSectionId = document.getElementById("sub2").value;
levelId = document.getElementById("level2").value;
totalQuestion = document.getElementById("total2").value;
} else if (sectionId == 3) {
subSectionId = document.getElementById("sub3").value;
levelId = document.getElementById("level3").value;
totalQuestion = document.getElementById("total3").value;
}

console.log('s', subSectionId, levelId , totalQuestion);
var mcqTestId = document.getElementById("mcqTestId").value;
$.ajax({
    type: "POST",
    url: "addQuestion",
    data: {'mcqTestId': mcqTestId, 'sectionId': sectionId,  'subSectionId': subSectionId,  'levelId': levelId,  'totalQuestion': totalQuestion},
    success: function(data){
        // Parse the returned json data

        alert('Added Question Successfully');
        console.log('data', data);
        // Use jQuery's each to iterate over the opts value

    }
});


}

function test(sectionId) {
	console.log('test');
$('#sub'+sectionId).empty()
    //var dropDown = document.getElementById("carId");
    //var carId = dropDown.options[dropDown.selectedIndex].value;
    $.ajax({
            type: "POST",
            url: "question/getSubSection",
            data: { 'Id': sectionId  },
            success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#sub'+sectionId).append('<option value="' + d.id + '">' + d.name + '</option>');
                });
            }
        });

}

</script>
</body>
</html>

