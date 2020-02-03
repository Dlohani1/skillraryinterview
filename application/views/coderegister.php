<style>

.errMessage{
    position: absolute;
    margin-top: -23px;
    font-size: 13px;
    color: red;
}
.errMessageLast{
    position: absolute;
    margin-top: -21px;
    font-size: 13px;
    color: red;
}
.rowGap{
    margin-bottom: -10px;
}
</style>

<script>
function validateregister(){

    var error = true;
   
    if(document.logForm.firstname.value.length == '0'){
        document.getElementById("errfstnm").innerHTML = "This field is required";
        error = false;
    } else {
        document.getElementById("errfstnm").innerHTML = "";
    }

    if(document.logForm.lastname.value.length == '0'){
        document.getElementById("errlstnm").innerHTML = "This field is required";
        error = false;
    } else {
        document.getElementById("errlstnm").innerHTML = "";
    }
    if(document.logForm.cno.value.length == '0') {
        document.getElementById("errcno").innerHTML = "This field is required";
        error = false;
    } else if(document.logForm.cno.value.length < '10' || document.logForm.cno.value.length > '10' ) {
        document.getElementById("errcno").innerHTML = "Maximum 10 characters are required"; 
        error = false;
    }  else {
            document.getElementById("errcno").innerHTML = ""; 
        }

    if(document.logForm.gender.value == '0'){
        document.getElementById("errorgender").innerHTML = "This field is required";
        error = false;
    } else {
      document.getElementById("errorgender").innerHTML = "";  
    }


    
       

   
        var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var email = document.getElementById('emaillogin').value;

        if(document.logForm.email.value.length == '0') {
            document.getElementById("erremail").innerHTML = "This field is required";
            error = false;
        } else if(!pattern.test(email)) {

            document.getElementById("erremail").innerHTML = "Please enter valid email";
            error = false
        } else {
           document.getElementById("erremail").innerHTML = ""; 
        }

    if(document.logForm.password.value.length == '0'){
        document.getElementById("errpass").innerHTML = "This field is required";
        error = false;
    } else {
        document.getElementById("errpass").innerHTML = "";
    }

    return error;
    
}

</script>

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="LoginBox">
                        <h4 style="text-align: center;">Register</h4>
                        <hr/>
                        
                        <form name="logForm" method="post" action="register">
                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label class="labelText">First name<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="text" name="firstname"  value="<?php echo set_value('firstname'); ?>" class="form-control"  autocomplete="off"><br/>
                                    <p id="errfstnm" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="labelText">Last name<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="text" name="lastname" value="<?php echo set_value('lastname'); ?>" class="form-control"  autocomplete="off"><br/>
                                    <p id="errlstnm" class="errMessage"></p>
                                </div>
                            </div>

                            <div class="row rowGap">
                                <div class="col-md-6">
                                    <label class="labelText">Gender<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <select name="gender" class="form-control formControl" autocomplete="off">
                                        <option value="0">Select gender</option>
                                        <option value="1" <?php echo set_value('gender') == "1" ? 'selected' :''; ?>>Male</option>
                                        <option value="2" <?php echo set_value('gender') == "2" ? 'selected' :''; ?>>Female</option>
                                    </select><br/>
                                    <p id="errorgender" class="errMessage"></p>
                                </div>
                                <div class="col-md-6">
                                    <label class="labelText">Mobile<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="number" value="<?php echo set_value('cno'); ?>" name="cno" class="form-control"  autocomplete="off"><br/>
                                    <p id="errcno" class="errMessage"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="labelText">Email<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="email" name="email" value="<?php echo set_value('email'); ?>" id="emaillogin" class="form-control"  autocomplete="off"><br/>
                                    <p id="erremail" class="errMessage"></p>
                                    <?php echo form_error('email'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label class="labelText">Password<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="form-control"  autocomplete="off"><br/>
                                    <p id="errpass" class="errMessageLast"></p>
                                </div>
                            </div><br/>
                            <div align="center">
                                <div>
                                    <button type="submit" onclick="return validateregister();" class="subtn">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>