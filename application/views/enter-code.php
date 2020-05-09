<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
.modal-content{
    margin-top: 50%;
    min-width: 550px;
}
.closeBtn{
    background: #33A478;
}
.modal-body{
    padding: 2rem 1rem 1rem 1rem;
}
button.close{
    margin-top: -25px;
}
.login-button:focus{
    box-shadow: initial;
}
@media only screen and (max-width: 600px){
    .modal-content{
        margin-top: 50%;
        min-width: 352px !important;
    }
}
</style>
<?php //print_r($interviewData); ?>
<!------ Include the above in your HEAD tag ---------->
<br/><br/>
        <div class="container" style="padding: 90px 40px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <span id="demo" class="text-success"></span>
                    <table class="table table-hover">
    <thead>
      <tr>
        <th>Interview Date </th>
        <th>Interview Time</th>
        <th>Interview Mode</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        if (!count($interviewData)) {
            echo "<tr><td> No Interview Schedule.</td></tr>";
        } else {
            foreach ($interviewData as $key => $value) {
  		        $interviewDate = $value->interview_date;
                $interviewTime = $value->interview_time;
		$a = $value->interview_date;
          	$d = date_parse_from_format("Y-m-d", $a);
	
         	 $day = $d['day'];
          	$year = $d['year'];

          	$month = date("F",strtotime($value->interview_date));
                echo '<tr><td>'.$day." ".$month.",".$year.'</td><td>'.$value->interview_time.'</td><td>'.$value->interview_mode.'</td><td><span id="msg">Link not Active</span>';
		if ($value->is_active == "1") {
		echo '<a href="'.$value->user_join_url.'" target="_blank" id = "joinLink" style="display:none" >Join Interview </a>';
		} else {
		echo '<strong>Closed</strong';
		}
		echo '</td></tr>';
            }
        }
        ?>
      
      
    </tbody>
  </table>
                   <!--  <div class="card">
                        <div class="card-header" style="background-color: #33A478;font-weight: 600">Enter Code :</div>
                        <div class="card-body">

                            <form class="form-horizontal" method="post" action="checkCode" >

                                <div class="form-group">
                                    <label for="email" class="cols-sm-2 control-label"></label>
                                    <p style="color:red"> <?php //if (isset($_SESSION['success'])) { echo $_SESSION['success'] ; }?> </p>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span> -->
                                            <!-- <input type="text" 
                                            value = "<?php //if (isset($_SESSION['code'])) { echo $_SESSION['code'] ; } else { echo set_value('code');}?> "
                                            class="form-control" name="code" id="code" autocomplete="off"/>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="form-group ">
                                    <button onclick="checkCode()" type="submit" style="background-color: #33A478;font-weight: 600" class="btn  btn-md login-button"  data-toggle="modal" data-target="#myModal">

                                    Take Test</button>
                                    <button type="submit" style="background-color: #33A478;font-weight: 600" class="btn  btn-md login-button" >
                                        Take Test
                                    </button>
                                </div>
                                <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                   
                                    <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        With our online editor, you can edit the code, and click on a button to view the result.
                                    </div>

                                    <div class="modal-footer" align="center">
                                        <a href="checkCode"><button type="button" class="btn closeBtn">Proceed</button></a>
                                    </div>

                                    </div>
                                </div>
                                </div>
                
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <script>
 $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

            function checkCode() {

                if (document.getElementById("code").value.trim().length > 0) {
                    $.ajax({
                        url: "/checkAttempt",
                        type: 'post',
                        data: {'code': document.getElementById("code").value},
                      
                        success: function( data ){
                            //$('#response pre').html( JSON.stringify( data ) );
                            console.log('data', data);
                   
                        },
                        error: function( jqXhr, textStatus, errorThrown ){
                            console.log( errorThrown );
                        }
                    });
                } else {
                    alert('Please enter code');
                    
                }
            }


//            var countDownDate = new Date ("2020-05-09 10:23").getTime();

var testDate = "<?php echo $interviewDate;?>";
var testTime = "<?php echo $interviewTime;?>";
var testData = testDate + " "+ testTime;
//alert(testData);
var countDownDate = new Date(testData).getTime();
//alert(testData);

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    //alert(distance);
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  if (days > 0 ) {
  document.getElementById("demo").innerHTML = "Your test will start in "+ days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  } else if (hours > 0) {
    document.getElementById("demo").innerHTML = "Your test will start in "+ hours + "h "
  + minutes + "m " + seconds + "s ";
  } else if (minutes > 0) {
    document.getElementById("demo").innerHTML = "Your test will start in "
  + minutes + "m " + seconds + "s ";
  }else {
    document.getElementById("demo").innerHTML = "Your test will start in "+ seconds + "s ";
  }
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "";
    document.getElementById("joinLink").style.display="block";
    document.getElementById("msg").style.display="none";
    // var startBtn = document.getElementById("startTest");
    // var startAssessment = document.getElementById("startAssessment");
    // enterCode(true);
    // startBtn.style.display = "block";
    // startAssessment.style.display = "block";
    
//startBtn.onclick = joinMeeting;

  }
}, 1000);



        </script>
