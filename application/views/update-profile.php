<script>
function validateUpdateProfile(){
        if(document.regform.dob.value.length == '0'){
            document.getElementById("errordob").innerHTML = "This field is required";
        }
        if(document.regform.gender.selectedIndex == '0'){
            document.getElementById("errorgender").innerHTML = "This field is required";
        }
        if(document.regform.tenth_py.value.length == '0'){
            document.getElementById("errortenth_py").innerHTML = "This field is required";
        }
        if(document.regform.tenth_per.value.length == '0'){
            document.getElementById("errortenth_per").innerHTML = "This field is required";
        }
        if(document.regform.twelveth_py.value.length == '0'){
            document.getElementById("errortwelveth_py").innerHTML = "This field is required";
        }
        if(document.regform.twelveth_per.value.length == '0'){
            document.getElementById("errortwelveth_per").innerHTML = "This field is required";
        }
        if(document.regform.twelveth_per.value.length == '0'){
            document.getElementById("errortwelveth_per").innerHTML = "This field is required";
        }
        if(document.regform.degree.value.length == '0'){
            document.getElementById("errordegree").innerHTML = "This field is required";
        }
        if(document.regform.degree_per.value.length == '0'){
            document.getElementById("errordegree_per").innerHTML = "This field is required";
        }
        if(document.regform.degree_py.value.length == '0'){
            document.getElementById("errordegree_py").innerHTML = "This field is required";
        }
        if(document.regform.stream.value.length == '0'){
            document.getElementById("errorstream").innerHTML = "This field is required";
        }
        if(document.regform.state.value.length == '0'){
            document.getElementById("errorstate").innerHTML = "This field is required";
        }
        if(document.regform.city.value.length == '0'){
            document.getElementById("errorcity").innerHTML = "This field is required";
        }
        if(document.regform.pwl.value.length == '0'){
            document.getElementById("errorpwl").innerHTML = "This field is required";
        }
        return false;
}

</script>

    <?php

        $img = "images/boy.png";
if ($userData['gender'] == "2") {
        $img = "images/girl.png";
    } ?>

        <div class="container" id="contentBox">
            <div class="row">
                <div class="col-md-4">
                    <div class="profileBox">
                        <div align="center">
                            <img src=<?php echo base_url().$img;?> class="imgLogo"/>
                        </div><br/>
                        <p align="center"></p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="LoginBox">
                        <h4 style="text-align: center;">Update Profile</h4>
                        <hr/>
                        <p style="color:red"> <?php if (isset($_SESSION['success'])) { echo $_SESSION['success'];} ?> </p>
                        <form name="regform" method="post" action="update-profile">
                            <div class="row rowGap">
                                <div class="col-md-6">
                                        <label class="labelText">First name<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                        <input type="text" name="firstname" value="<?php echo $userData['first_name']; ?>" class="form-control"  autocomplete="off"><br/>
                                        <p id="errfstnm" class="errMessage" ></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="labelText">Last name<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                        <input type="text" name="lastname" value="<?php echo $userData['first_name']; ?>"  class="form-control"  autocomplete="off"><br/>
                                        <p id="errlstnm" class="errMessage"></p>
                                    </div>
                                </div>
                            
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label class="labelText">Mobile<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" name="cno" value="<?php echo $userData['contact_no']; ?>"  class="form-control"  autocomplete="off"><br/>
                                    <p id="errcno" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="labelText">Email<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
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
                                    <button type="submit" onclick="validateUpdateProfile();" class="subtn">Update Profile</button>
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
