<!DOCTYPE html>
<html lang="en">
<head>
  <title>Question Bank</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://cdn.tiny.cloud/1/lnsezku8yem3815vbxl499zobwl7hiehkejxya4ajhlonxot/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
  <script>
  tinymce.init({
    selector: '#question'
  });
  </script>
</head>
<body>

<div class="container">
  <h2>Question Bank</h2>
  <form class="form-horizontal" method="post" action="save">
     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
   <div class="form-group">
      <label class="control-label col-sm-2" for="section">Section:</label>
      <div class="col-sm-10">
        <select id="section" name="sectionId" onchange="getSubSection()"><option value="0">Select Section </option></select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="sub-section">Sub Section:</label>
      <div class="col-sm-10">
        <select id="subsection" name="subsection" ><option>NA</option></select>
      </div>
    </div>

<div class="form-group">
      <label class="control-label col-sm-2" for="sub-section">Difficulty Level:</label>
      <div class="col-sm-10">
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
      <div class="col-sm-10">          
        <!-- <input type="text" class="form-control" id="question" placeholder="Enter Question" name="question"> -->
        <textarea id="question" name="question"></textarea>
      </div>
    </div>


<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Answers:</label>
      <div class="col-sm-10">          
        <input type="radio" name="correct" value="1"> Select if correct option<input type="text" class="form-control" style="width:71%" id="pwd" placeholder="Enter Answer" name="ans1">
      	<input type="radio" name="correct" value="2"> Select if correct option<input type="text" class="form-control" style="width:71%" id="pwd" placeholder="Enter Answer" name="ans2">
      	<input type="radio" name="correct" value="3"> Select if correct option<input type="text" class="form-control" style="width:71%" id="pwd" placeholder="Enter Answer" name="ans3">
      	<input type="radio" name="correct" value="4"> Select if correct option<input type="text" class="form-control" style="width:71%" id="pwd" placeholder="Enter Answer" name="ans4">
      </div>
    </div>


    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
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
    $.ajax({
            type: "POST",
            url: "getSection",
            success: function(data){
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) { console.log('d',d);
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#section').append('<option value="' + d.id + '">' + d.name + '</option>');
                });
            }
        });
  
});

function getSubSection() {
console.log('a', document.getElementById("section").value);
if (document.getElementById("section").value != 0) {

$('#subsection').empty()
    //var dropDown = document.getElementById("carId");
    //var carId = dropDown.options[dropDown.selectedIndex].value;
    $.ajax({
            type: "POST",
            url: "getSubSection",
            data: { 'Id': document.getElementById("section").value  },
            success: function(data){ console.log('data', data);
                // Parse the returned json data
                var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
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
</body>
</html>

