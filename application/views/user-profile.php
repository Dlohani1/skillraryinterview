<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<script>
     $.ajaxSetup({
        data: {
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        }
    });

function validateUpdateProfile(){
        
          
        var error = true;

        var emailpattern = /^([a-zA-Z0-9.-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
        var email = document.getElementById('emaillogin').value;

        var perPattern = /^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$/
        var highper = document.getElementById('highSPerU').value;
        var schoolper = document.getElementById('schoolperU').value;
        var udper = document.getElementById('udperU').value; 

        var passing_year_pattern = /^([0-9]{4})+$/;
        var ten_passing_year = document.getElementById('TPY').value;
        var twlevth_passing_year = document.getElementById('HPY').value;
        var degree_passing_year = document.getElementById('DPY').value;

        var namepattern = /^[a-zA-Z]{0,50}$/;
        var fname = document.getElementById('Fname').value;
        var lname = document.getElementById('Lname').value;

        if(document.regform.firstname.value.length == '0'){
            document.getElementById("errorFstName").innerHTML = "This field is required";
            error = false;
        } else if(!namepattern.test(fname)){
            document.getElementById("errorFstName").innerHTML = "Enter valid name";
            error = false;
        }
        else {
            document.getElementById("errorFstName").innerHTML = "";
        }
        if(document.regform.lastname.value.length == '0'){
            document.getElementById("errlstnm").innerHTML = "This field is required";
            error = false;
        }  else if(!namepattern.test(lname)){
            document.getElementById("errlstnm").innerHTML = "Enter valid name";
            error = false;
        }else {
            document.getElementById("errlstnm").innerHTML = "";
        }
        if(document.regform.cno.value.length == '0'){
            document.getElementById("errcno").innerHTML = "This field is required";
            error = false;
        } else if(document.regform.cno.value.length > '10' || document.regform.cno.value.length < '10'){
            document.getElementById("errcno").innerHTML = "Enter valid number";
            error = false;
        } else {
            document.getElementById("errcno").innerHTML = "";
        }
    
        if(document.regform.email.value.length == '0') { 
            document.getElementById("erremail").innerHTML = "This field is required";
            error = false;
           
        }else if(!emailpattern.test(email)) {
         
            document.getElementById("erremail").innerHTML = "Please enter valid email";
            error = false;
        } 
        else {
            document.getElementById("erremail").innerHTML = "";
        }
        if(document.regform.dob.value.length == '0'){
            document.getElementById("errordob").innerHTML = "This field is required";
            error = false;
        } else {
            document.getElementById("errordob").innerHTML = "";
        }

        if(document.regform.gender.selectedIndex == '0'){
            document.getElementById("errorgender").innerHTML = "This field is required";
            error = false;
        } else {
            document.getElementById("errorgender").innerHTML = "";
        }
        // tenth
        if(document.regform.tenth_branch.value.length == '0'){
            document.getElementById("errortenth_branch").innerHTML = "This field is required";
        } else {
            document.getElementById("errortenth_branch").innerHTML = "";
        }
        
        if(document.regform.tenth_py.value.length == '0'){
            document.getElementById("errortenth_py").innerHTML = "This field is required";
            error = false;
        } else  if(document.regform.tenth_py.value.length < '4'){
            document.getElementById("errortenth_py").innerHTML = "Please enter valid year";
            error = false;
        } else  if(document.regform.tenth_py.value.length > '4'){
            document.getElementById("errortenth_py").innerHTML = "Please enter valid year";
            error = false;
        } else if(!passing_year_pattern.test(ten_passing_year)){
            document.getElementById("errortenth_py").innerHTML = "Please enter valid number";
            error = false;
        }else {
            document.getElementById("errortenth_py").innerHTML = "";
        }


        if(document.regform.tenth_per.value.length == '0'){ 
            document.getElementById("errortenth_per").innerHTML = "This field is required";
            error = false;
        } else if(document.regform.tenth_per.value != "100"){
            if(!perPattern.test(schoolper)){
                document.getElementById("errortenth_per").innerHTML = "Please enter valid percentage";
                error = false;
            }
        } else{
            document.getElementById("errortenth_per").innerHTML = "";
        }


        // twelveth
        if(document.regform.twelveth_branch.value.length == '0'){
            document.getElementById("errortwelveth_branch").innerHTML = "This field is required";
        } else {
            document.getElementById("errortwelveth_branch").innerHTML = "";
        }

        if(document.regform.twelveth_py.value.length == '0'){
            document.getElementById("errortwelveth_py").innerHTML = "This field is required";
        } else  if(document.regform.twelveth_py.value.length < '4'){
            document.getElementById("errortwelveth_py").innerHTML = "Please enter valid year";
            error = false;
        } else  if(document.regform.twelveth_py.value.length > '4'){
            document.getElementById("errortwelveth_py").innerHTML = "Please enter valid year";
            error = false;
        } else if(!passing_year_pattern.test(twlevth_passing_year)){
            document.getElementById("errortwelveth_py").innerHTML = "Please enter valid number";
            error = false;
        }else {
            document.getElementById("errortwelveth_py").innerHTML = "";
        }

        if(document.regform.twelveth_per.value.length == '0'){

            document.getElementById("errortwelveth_per").innerHTML = "This field is required";

        }else if(document.regform.twelveth_per.value != "100"){
            if(!perPattern.test(highper)){
                document.getElementById("errortwelveth_per").innerHTML = "Please enter valid percentage";
                error = false;
            }
        }else {
            document.getElementById("errortwelveth_per").innerHTML = "";
        }
        // under graduation
        if(document.regform.college.value.length == '0'){
            document.getElementById("errorcollege").innerHTML = "This field is required";
        } else {
            document.getElementById("errorcollege").innerHTML = "";
        }
        if(document.regform.degree_py.value.length == '0'){
            document.getElementById("errordegree_py").innerHTML = "This field is required";
        } else  if(document.regform.degree_py.value.length < '4'){
            document.getElementById("errordegree_py").innerHTML = "Please enter valid year";
            error = false;
        } else if(document.regform.degree_py.value.length > '4'){
            document.getElementById("errordegree_py").innerHTML = "Please enter valid year";
            error = false;
        } else if(!passing_year_pattern.test(degree_passing_year)){
            document.getElementById("errordegree_py").innerHTML = "Please enter valid number";
            error = false;
        } else {
            document.getElementById("errordegree_py").innerHTML = "";
        }
        if(document.regform.branch.value.length == '0'){
            document.getElementById("errorbranch").innerHTML = "This field is required";
        } else {
            document.getElementById("errorbranch").innerHTML = "";
        }
        if(document.regform.degree.value.length == '0'){
            document.getElementById("errordegree").innerHTML = "This field is required";
        } else {
            document.getElementById("errordegree").innerHTML = "";
        }
        if(document.regform.degree_per.value.length == '0'){
            document.getElementById("errordegree_per").innerHTML = "This field is required";
        }else if(document.regform.degree_per.value != "100"){
            if(!perPattern.test(udper)){
                document.getElementById("errordegree_per").innerHTML = "Please enter valid percentage";
                error = false;
            }
        } else {
            document.getElementById("errordegree_per").innerHTML = "";
        }
        if(document.regform.university.value.length == '0'){
            document.getElementById("erroruniversity").innerHTML = "This field is required";
        } else {
            document.getElementById("erroruniversity").innerHTML = "";
        }
        // graduation
        // if(document.regform.collegem.value.length == '0'){
        //     document.getElementById("errorcollegem").innerHTML = "This field is required";
        // } else {
        //     document.getElementById("errorcollegem").innerHTML = "";

        // }

        // if(document.regform.degree_pym.value.length == '0'){
        //     document.getElementById("errordegree_pym").innerHTML = "This field is required";
        // } else if(document.regform.degree_pym.value.length > '4'){
        //     document.getElementById("errordegree_pym").innerHTML = "Please enter valid year";
        //     error = false;
        // } 
        // if(document.regform.branchm.value.length == '0'){
        //     document.getElementById("errorbranchm").innerHTML = "This field is required";
        // }
        // if(document.regform.degreem.value.length == '0'){
        //     document.getElementById("errordegreem").innerHTML = "This field is required";
        // }
        // if(document.regform.degree_perm.value.length == '0'){
        //     document.getElementById("errordegree_perm").innerHTML = "This field is required";
        // }else  if(!perPattern.test(gper)){
        //     document.getElementById("errordegree_perm").innerHTML = "Please enter valid percentage";
        //     error = false;
        // } 
        // if(document.regform.universitym.value.length == '0'){
        //     document.getElementById("erroruniversitym").innerHTML = "This field is required";
        // }
        if(document.regform.state.value.length == '0'){
            document.getElementById("errorstate").innerHTML = "This field is required";
            error = false;
        } else {
            document.getElementById("errorstate").innerHTML = "";
        }
        if(document.regform.city.value.length == '0'){
            document.getElementById("errorcity").innerHTML = "This field is required";
            error = false;
        } else {
            document.getElementById("errorcity").innerHTML = "";
        }
        if(document.regform.pwl.value.length == '0'){
            document.getElementById("errorpwl").innerHTML = "This field is required";
            error = false;
        } else {
            document.getElementById("errorpwl").innerHTML = "";
        }
        return error;
}
function Upload() {
      
      var fileUpload = document.getElementById("fileUpload");
   
      var regex = new RegExp("(.jpg|.png|.jpeg)$");
      if (regex.test(fileUpload.value.toLowerCase())) {
          if (typeof (fileUpload.files) != "undefined") {
              var reader = new FileReader();
              reader.readAsDataURL(fileUpload.files[0]);
              reader.onload = function (e) {
                  var image = new Image();
                  image.src = e.target.result;
                  image.onload = function () {
                      var height = this.height;
                      var width = this.width;
                      if (height > 180 || width > 180) {
                        // document.getElementById('demo').innerHTML = "Image height and width must not exceed 180px.";
                        // e.preventDefault();
                        return false;
                      } else if(height < 180 || width <  180){
                        document.getElementById('demo').innerHTML = "";
                        $("#exampleModalCenter").modal("hide");
                        document.getElementById("fileUpload").value = "";
                          return false;
                      }
                  };
              }
          }
      } else {
          document.getElementById('demo').innerHTML = "Please select a valid Image file.";
          return false;
      }
   
  }
  function closeButtonLogin(){
      document.getElementById('demo').innerHTML = "";
      document.getElementById("fileUpload").value = "";
  }
   function showField1(isGap1 = 0){
        
    if (isGap1 > 0) {
    
        document.getElementById("hManyYUser").style.display = "block";
    } else {
        document.getElementById("hManyYUser").style.display = "none";
    }
}
</script>

    <?php

    $img = "images/boy.png";

        // if (null !== $userData['profile-pic']) {
        //     $img = $userData['profile-pic'];
        // } else {
        //     $img = "images/boy.png";
        //     if ($userData['gender'] == "2") {
        //         $img = "images/girl.png";
        //     }
        // }
       
        ?>

        <div class="container" id="contentBox">
            <div class="row">
                <div class="col-md-4">
                    <div class="profileBox">
                        <div align="center">
                         <button class="editButton" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-camera" aria-hidden="true"></i> Edit</button>
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Create Your Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeButtonLogin();">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="upload/do_upload" onsubmit="return Upload()" method="post" enctype="multipart/form-data">
                                             <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                            <div class="form-group">
                                                <button class="resume_upload" type="button">
                                                    <span class="btn_lbl">Browse</span>
                                                    <span class="btn_colorlayer"></span>
                                                    <input type="file" name="profilePic" id="fileUpload" />
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


                            <button type="button" style="display:none" id="modal-btn" class="btn btn-primary" data-toggle="modal" data-target="#userModal">
    Open modal
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="userModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Please Note :</h4>
          <button type="button"  id="closeModal" style="display:none" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php 
            $userCred = $_SESSION['username'];
            ?>
            <p>
                Your Username is  <span> <strong><?php echo " ".$userCred['username']." " ; ?></strong> </span> and password is  <span><strong>
                <?php echo " ".$userCred['password']; ?></strong> </span>
            </p>
            <input type="checkbox" onclick="readNote()" name="read" id="read" /> <strong>Noted</strong>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" style="display:none" id="okbtn" class="btn btn-secondary" data-dismiss="modal">OK</button>
        </div>
        
      </div>
    </div>
  </div>

                            <img src=<?php echo base_url().$img;?> class="imgLogo"/>
                        </div><br/>
                        <p align="center"></p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="LoginBox">
                        <h4 style="text-align: center;">Create Profile</h4>
                        <hr/>
                        <p class="updatedText"> <?php if (isset($_SESSION['success'])) { echo $_SESSION['success'];} ?> </p>
                        <form name="regform" method="post" action="<?php echo base_url()."user/update-profile";?>"  onsubmit="return validateUpdateProfile();" >
                             <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                            <input type="hidden" name="isCreate" value="1" />
                              <fieldset>
                                <legend id="sectionHeading">Personal Details:</legend>
                                    <div class="row rowGap">
                                        <div class="col-md-6"> 
                                                <label>First name<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" id="Fname" name="firstname" value="<?php echo set_value('firstname'); ?>" class="form-control"  autocomplete="off"><br/>
                                                <p id="errorFstName" class="errMessage"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Last name<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" id="Lname" name="lastname" value="<?php echo set_value('lastname'); ?>"  class="form-control"  autocomplete="off"><br/>
                                                <p id="errlstnm" class="errMessage"></p>
                                            </div>
                                        </div>
                                    
                                    <div class="row rowGap">
                                        <div class="col-md-6">
                                            <label>Mobile<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                            <input type="number" name="cno" value="<?php echo set_value('cno'); ?>"  class="form-control"  autocomplete="off"><br/>
                                            <p id="errcno" class="errMessage"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Email<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                            <input type="email" name="email"  <?php if (isset($userData['email'])) { echo "readonly";}?> value="<?php if (isset($userData['email'])) { echo $userData['email'];} else {echo set_value('email');} ?>"  id="emaillogin" class="form-control"  autocomplete="off"><br/>
                                            <p id="erremail" class="errMessage"></p>
                                            <?php echo "<span style='color:red'>".form_error('email')."</span>"; ?>
                                        </div>
                                    </div>

                                    <div class="row rowGap">
                                        <div class="col-md-6">
                                            <label>Date of Birth<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                            <input type="date" name="dob" value="<?php echo set_value('dob'); ?>"  class="form-control formControl"  autocomplete="off"><br/>
                                            <p id="errordob" class="errMessage"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Gender<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                            <select name="gender" class="form-control formControl" autocomplete="off">
                                                <option value="0">Select gender</option>
                                                <option value="1" <?php if (set_value('gender') == "1") { echo "selected";} ?> >Male
                                                </option>
                                                <option value="2" <?php if (set_value('gender') == "2") { echo "selected";} ?> >Female
                                                </option>
                                            </select><br/>
                                            <p id="errorgender" class="errMessage"></p>
                                        </div>
                                    </div>
                                </fieldset><br/>
                                <fieldset>
                                    <legend id="sectionHeading">Educational Details:</legend>
                                        <h6 class="tenthDetails">10<sup>th</sup> Grade:</h6>
                                        <hr class="hrDesignUpdate">
                                            <div class="row rowGap">
                                                <div class="col-md-4">
                                                    <label>Board</label><sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                    <input type="text" name="tenth_branch"   class="form-control"  autocomplete="off"><br/>
                                                    <p id="errortenth_branch" class="errMessage"></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Passing Year<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                    <input type="text" name="tenth_py" value="<?php echo set_value('tenth_py'); ?>" id="TPY"  class="form-control"  autocomplete="off"><br/>
                                                    <p id="errortenth_py" class="errMessage"></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Percentage<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                    <input type="text" id="schoolperU" name="tenth_per" value="<?php echo set_value('tenth_per'); ?>"   class="form-control" autocomplete="off"><br/>
                                                    <p id="errortenth_per" class="errMessage"></p>
                                                </div>
                                            </div>
                                        <h6 class="twelvethDetails">12<sup>th</sup> Grade:</h6>
                                        <hr class="hrDesignUpdate">
                                            <div class="row rowGap">
                                                <div class="col-md-4">
                                                    <label>Board</label><sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                    <input type="text" name="twelveth_branch"   class="form-control"  autocomplete="off"><br/>
                                                    <p id="errortwelveth_branch" class="errMessage"></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Passing Year<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                    <input type="text" name="twelveth_py" id="HPY" value="<?php echo set_value('twelveth_py'); ?>" class="form-control"  autocomplete="off"><br/>
                                                    <p id="errortwelveth_py" class="errMessage"></p>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Percentage<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                    <input type="text" id="highSPerU" name="twelveth_per" value="<?php echo set_value('twelveth_per'); ?>" class="form-control"  autocomplete="off"><br/>
                                                    <p id="errortwelveth_per" class="errMessage"></p>
                                                </div>
                                            </div>

                                        <h6 class="twelvethDetails">Graduate:</h6>
                                        <hr class="hrDesignUpdate">
                                        <div class="row rowGap">
                                            <div class="col-md-4">
                                                <label>College<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" name="college" class="form-control" autocomplete="off"><br/>
                                                <p id="errorcollege" class="errMessage"></p>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <label>Passing Year<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" name="degree_py" id="DPY" value="<?php echo set_value('degree_py'); ?>" class="form-control"  autocomplete="off"><br/>
                                                <p id="errordegree_py" class="errMessage"></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Branch<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" name="branch"  value="<?php echo set_value('branch'); ?>"  class="form-control"  autocomplete="off"><br/>
                                                <p id="errorbranch" class="errMessage"></p>
                                            </div>
                                        </div>
                                        <div class="row rowGap">
                                            <div class="col-md-4">
                                                <label>Degree<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" name="degree" value="<?php echo set_value('degree'); ?>" class="form-control" autocomplete="off"><br/>
                                                <p id="errordegree" class="errMessage"></p>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <label>Percentage<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" id="udperU" name="degree_per" value="<?php echo set_value('degree_per'); ?>"  class="form-control"  autocomplete="off"><br/>
                                                <p id="errordegree_per" class="errMessage"></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label>University<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" name="university" class="form-control" autocomplete="off"><br/>
                                                <p id="erroruniversity" class="errMessage"></p>
                                            </div>
                                        </div>

                                        <h6 class="twelvethDetails">Post Graduate:</h6>
                                        <hr class="hrDesignUpdate">
                                        <div class="row rowGap">
                                            <div class="col-md-4">
                                                <label>College
                                                   <!--  <sup><span style="color:red;font-size: 16px;">*</span></sup> -->
                                                </label>
                                                <input type="text" name="collegem" class="form-control" autocomplete="off"><br/>
                                                <p id="errorcollegem" class="errMessage"></p>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <label>Passing Year
                                                    <!-- <sup><span style="color:red;font-size: 16px;">*</span></sup> -->
                                                </label>
                                                <input type="number" name="degree_pym" class="form-control"  autocomplete="off"><br/>
                                                <p id="errordegree_pym" class="errMessage"></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label>Branch
                                                    <!-- <sup><span style="color:red;font-size: 16px;">*</span></sup> -->
                                                </label>
                                                <input type="text" name="branchm"  class="form-control"  autocomplete="off"><br/>
                                                <p id="errorbranchm" class="errMessage"></p>
                                            </div>
                                        </div>
                                        <div class="row rowGap">
                                            <div class="col-md-4">
                                                <label>Degree
                                                    <!-- <sup><span style="color:red;font-size: 16px;">*</span></sup> -->
                                                </label>
                                                <input type="text" name="degreem" class="form-control" autocomplete="off"><br/>
                                                <p id="errordegreem" class="errMessage"></p>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                <label>Percentage
                                                   <!--  <sup><span style="color:red;font-size: 16px;">*</span></sup> -->
                                                </label>
                                                <input type="text" id="gperU" name="degree_perm" class="form-control"  autocomplete="off"><br/>
                                                <p id="errordegree_perm" class="errMessage"></p>
                                            </div>
                                            <div class="col-md-4">
                                                <label>University
                                                   <!--  <sup><span style="color:red;font-size: 16px;">*</span></sup> -->

                                                </label>
                                                <input type="text" name="universitym" class="form-control" autocomplete="off"><br/>
                                                <p id="erroruniversitym" class="errMessage"></p>
                                            </div>
                                        </div>
                                        <div class="row rowGapDegree">
                                            <div class="col-md-4">
                                                <label>Year Gap in Degree
                                                   <!--  <sup><span style="color:red;font-size: 16px;">*</span></sup> -->
                                                </label><br/>
                                                <input type="radio" name="gap" selected autocomplete="off" onclick="showField1()"> No
                                                 &nbsp;&nbsp;&nbsp;
                                                <input type="radio" name="gap" autocomplete="off" onclick=" showField1(1)"> Yes
                                          
                                            </div>
                                            <div class="col-md-8" style="display: none;" id="hManyYUser">
                                                <label>How many years?</label>
                                                <input type="text" name="universitym" class="form-control" autocomplete="off"><br/>
                                                
                                            </div>
                                        </div>

                                    </fieldset><br/>
                                     <fieldset>
                                        <legend id="sectionHeading">Other Details:</legend>
                                        <div class="row rowGap">
                                            <div class="col-md-6">
                                                <label>Residence State<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" name="state" value="<?php echo set_value('state'); ?>"  class="form-control formControl"  autocomplete="off"><br/>
                                                <p id="errorstate" class="errMessage"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Residence City<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" name="city" value="<?php echo set_value('city'); ?>"  class="form-control formControl"  autocomplete="off"><br/>
                                                <p id="errorcity" class="errMessage"></p>
                                            </div>
                                        </div>
                                        <div class="row rowGap">
                                            <div class="col-md-6">
                                                <label>Preffered Work Location<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                                <input type="text" name="pwl" value="<?php echo set_value('pwl'); ?>"  class="form-control"   autocomplete="off">
                                                <p id="errorpwl" class="errMessageLast"></p>
                                            </div>
                                        </div><br/>
                                    </fieldset><br/>
                            <div align="center">
                                <div>
                                    <button type="submit" class="subtn"> Create Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           <!--  <div class="row" style="margin-top: -40%">
                <div class="col-md-4">
                    <div class="dashboardBox">
                        <ul class="dashboardList">
                            <li class="liList">Home</li>
                            <li class="liList">Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
<script>

window.onload = test();

function test() {
    var  username = <?php echo $_SESSION['username']; ?>;

    if (localStorage.getItem("isRead") != 1 && undefined !== username) {
        $('#userModal').modal({backdrop: 'static', keyboard: false})
        document.getElementById("modal-btn").click();
    }
}

function readNote() {
    
    //document.getElementById("closeModal").click();

    document.getElementById("okbtn").style.display="block";
     // Store
    localStorage.setItem("isRead", "1");
}


</script>
