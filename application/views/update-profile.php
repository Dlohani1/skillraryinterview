<script>
function validateUpdateProfile(){
        
        var error = true;

        var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var email = document.getElementById('emaillogin').value;

        if(document.regform.firstname.value.length == '0'){
            document.getElementById("errorFstName").innerHTML = "This field is required";
            error = false;
        }
        if(document.regform.lastname.value.length == '0'){
            document.getElementById("errlstnm").innerHTML = "This field is required";
            error = false;
        }
        if(document.regform.cno.value.length == '0'){
            document.getElementById("errcno").innerHTML = "This field is required";
            error = false;
        } else if(document.regform.cno.value.length > '10' || document.regform.cno.value.length < '10'){
            document.getElementById("errcno").innerHTML = "Enter valid number";
            error = false;
        }
    
        if(document.regform.email.value.length == '0') { 
            document.getElementById("erremail").innerHTML = "This field is required";
            error = false;
           
        } else if(!emailpattern.test(email)) {
            document.getElementById("erremail").innerHTML = "Please enter valid email";
            error = false;
        } 
        if(document.regform.dob.value.length == '0'){
            document.getElementById("errordob").innerHTML = "This field is required";
            error = false;
        }

        if(document.regform.gender.selectedIndex == '0'){
            document.getElementById("errorgender").innerHTML = "This field is required";
            error = false;
        }

        if(document.regform.tenth_py.value.length == '0'){
            document.getElementById("errortenth_py").innerHTML = "This field is required";
            error = false;
        } else  if(document.regform.tenth_py.value.length > '4'){
            document.getElementById("errortenth_py").innerHTML = "Please enter valid year";
            error = false;
        } 

        if(document.regform.tenth_per.value.length == '0'){
            document.getElementById("errortenth_per").innerHTML = "This field is required";
            error = false;
        } else if (document.regform.tenth_per.value.length > '2'){
                document.getElementById("errortenth_per").innerHTML = "Please enter valid percentage";
                error = false;
        } 

        if(document.regform.twelveth_py.value.length == '0'){
            document.getElementById("errortwelveth_py").innerHTML = "This field is required";
            error = false;
        } else if(document.regform.twelveth_py.value.length > '4'){
            document.getElementById("errortwelveth_py").innerHTML = "Please enter valid year";
            error = false;
        } 

        if(document.regform.twelveth_per.value.length == '0'){
            document.getElementById("errortwelveth_per").innerHTML = "This field is required";
            error = false;
        } else if(document.regform.twelveth_per.value.length > '2'){
            document.getElementById("errortwelveth_per").innerHTML = "Please enter valid percentage";
            error = false;
        } 

        if(document.regform.degree.value.length == '0'){
            document.getElementById("errordegree").innerHTML = "This field is required";
            error = false;
        }
        if(document.regform.degree_per.value.length == '0'){
            document.getElementById("errordegree_per").innerHTML = "This field is required";
            error = false;
        } else  if(document.regform.degree_per.value.length > '2'){
            document.getElementById("errordegree_per").innerHTML = "Please enter valid percentage";
            error = false;
        } 
        if(document.regform.degree_py.value.length == '0'){
            document.getElementById("errordegree_py").innerHTML = "This field is required";
        } else if(document.regform.degree_py.value.length > '4'){
            document.getElementById("errordegree_py").innerHTML = "Please enter valid year";
            error = false;
        } 
        if(document.regform.stream.value.length == '0'){
            document.getElementById("errorstream").innerHTML = "This field is required";
            error = false;
        }
        if(document.regform.state.value.length == '0'){
            document.getElementById("errorstate").innerHTML = "This field is required";
            error = false;
        }
        if(document.regform.city.value.length == '0'){
            document.getElementById("errorcity").innerHTML = "This field is required";
            error = false;
        }
        if(document.regform.pwl.value.length == '0'){
            document.getElementById("errorpwl").innerHTML = "This field is required";
            error = false;
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
</script>

    <?php

        if (null !== $userData['profile-pic']) {
            $img = $userData['profile-pic'];
        } else {
            $img = "images/boy.png";
            if ($userData['gender'] == "2") {
                $img = "images/girl.png";
            }
        }
       
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
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Update Your Profile</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeButtonLogin();">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="upload/do_upload" onsubmit="return Upload()" method="post" enctype="multipart/form-data">
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
                            <img src=<?php echo base_url().$img;?> class="imgLogo"/>
                        </div><br/>
                        <p align="center"></p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="LoginBox">
                        <h4 style="text-align: center;">Update Profile</h4>
                        <hr/>
                        <p class="updatedText"> <?php if (isset($_SESSION['success'])) { echo $_SESSION['success'];} ?> </p>
                        <form name="regform" method="post" action="update-profile"  onsubmit="return validateUpdateProfile();" >
                            <div class="row rowGap">
                                <div class="col-md-6"> 
                                        <label>First name<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                        <input type="text" name="firstname" value="<?php echo $userData['first_name']; ?>" class="form-control"  autocomplete="off"><br/>
                                        <p id="errorFstName" class="errMessage"></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last name<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                        <input type="text" name="lastname" value="<?php echo $userData['last_name']; ?>"  class="form-control"  autocomplete="off"><br/>
                                        <p id="errlstnm" class="errMessage"></p>
                                    </div>
                                </div>
                            
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label>Mobile<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" name="cno" value="<?php echo $userData['contact_no']; ?>"  class="form-control"  autocomplete="off"><br/>
                                    <p id="errcno" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label>Email<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="email" name="email" value="<?php echo $userData['email']; ?>"  id="emaillogin" class="form-control"  autocomplete="off"><br/>
                                    <p id="erremail" class="errMessage"></p>
                                </div>
                            </div>

                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label>Date of Birth<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="date" name="dob" value="<?php echo $userData['dob']; ?>"  class="form-control formControl"  autocomplete="off"><br/>
                                    <p id="errordob" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label>Gender<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <select name="gender" class="form-control formControl" autocomplete="off">
                                        <option value="0">Select gender</option>
                                        <option value="1" <?php if ($userData['gender']=="1") {
                                            echo "selected"; } ?>>Male</option>
                                        <option value="2" <?php if ($userData['gender']=="2") {
                                            echo "selected"; } ?>>Female</option>
                                    </select><br/>
                                    <p id="errorgender" class="errMessage"></p>
                                </div>
                            </div>
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label>10th Passing Year<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" name="tenth_py" value="<?php echo $userData['tenth_passing_year']; ?>"  class="form-control"  autocomplete="off"><br/>
                                    <p id="errortenth_py" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label>10th Percentage<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" name="tenth_per" value="<?php echo $userData['tenth_percentage']; ?>"  class="form-control" autocomplete="off"><br/>
                                    <p id="errortenth_per" class="errMessage"></p>
                                </div>
                            </div>
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label>12th Passing Year<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" name="twelveth_py" value="<?php echo $userData['twelveth_passing_year']; ?>"  class="form-control"  autocomplete="off"><br/>
                                    <p id="errortwelveth_py" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label>12th Percentage<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" name="twelveth_per" value="<?php echo $userData['twelveth_percentage']; ?>"  class="form-control"  autocomplete="off"><br/>
                                    <p id="errortwelveth_per" class="errMessage"></p>
                                </div>
                            </div>
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label>Degree<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="text" name="degree" class="form-control" value="<?php echo $userData['degree']; ?>"  autocomplete="off"><br/>
                                    <p id="errordegree" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label>Degree Percentage<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" name="degree_per" value="<?php echo $userData['degree_percentage']; ?>"  class="form-control"  autocomplete="off"><br/>
                                    <p id="errordegree_per" class="errMessage"></p>
                                </div>
                            </div>
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label>Degree Passing Year<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" name="degree_py" value="<?php echo $userData['degree_passing_year']; ?>"  class="form-control"  autocomplete="off"><br/>
                                    <p id="errordegree_py" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label>Stream<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="text" name="stream" value="<?php echo $userData['stream']; ?>"  class="form-control"  autocomplete="off"><br/>
                                    <p id="errorstream" class="errMessage"></p>
                                </div>
                            </div>
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label>Residence State<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="text" name="state" value="<?php echo $userData['state']; ?>"  class="form-control formControl"  autocomplete="off"><br/>
                                    <p id="errorstate" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label>Residence City<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="text" name="city" value="<?php echo $userData['city']; ?>"  class="form-control formControl"  autocomplete="off"><br/>
                                    <p id="errorcity" class="errMessage"></p>
                                </div>
                            </div>
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label>Preffered Work Location<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="text" name="pwl" value="<?php echo $userData['work_location']; ?>"  class="form-control"   autocomplete="off">
                                    <p id="errorpwl" class="errMessageLast"></p>
                                </div>
                            </div><br/>
                            <div align="center">
                                <div>
                                    <button type="submit" class="subtn">Update Profile</button>
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
