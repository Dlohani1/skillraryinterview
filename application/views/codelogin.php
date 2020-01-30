<style type="text/css">
    .errMessage{
        position: absolute;
        font-size: 13px
    }
</style>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="LoginBox">
                        <h4 style="text-align: center;">Login</h4>
                        <hr/>
                        <?php if (isset($_SESSION['error'])) { echo "<p style='color: red;
    text-align: center;'>".$_SESSION['error']."</p>";} ?>
                        <form method="post" action="signin" name="logForm">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <label class="labelText">Email<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="email" name="email" id="email" class="form-control"  autocomplete="off">
                                    <p id="erroremaillogin" class="errMessage" style="color:red"></p>
                                    <br/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <label class="labelText">Password<sup><span style="color:red;font-size: 16px;">*</span></sup></label>
                                    <input type="password" name="pwd" id="email" class="form-control"  autocomplete="off">
                                    <p id="errorpwdlogin" class="errMessage" style="color:red"></p>
                                    <br/>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    <label class="labelText">Have a code ?

                                        <!-- <sup>
                                            <span style="color:red;font-size: 16px;">*</span>
                                        </sup> -->
                                    </label>
                                    <input type="checkbox" id="code" onchange="validate()" name="code" /> 

                                    <input type="text" name="enter-code" id="enter-code" autocomplete="off" hidden /> 
                                    
                                </div>
                            </div>
                            <div align="center">
                                <div> <br/> <br/>
                                    <button type="submit" class="subtn" onclick="return validateLoginForm()" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type=text/javascript>
function validate(){
if (document.getElementById('code').checked){
         // alert("checked") ;

          document.getElementById("enter-code").hidden = false;
}else{
//alert("You didn't check it! Let me check it for you.")
document.getElementById("enter-code").hidden = true;
}
}

function validateLoginForm(){
    var pattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
        var email = document.getElementById('email').value;
        console.log('ee', email)
        var error = false;
        if(email.length == '0') { console.log('aa', document.logForm.email.value.length);
            document.getElementById("erroremaillogin").innerHTML = "This field is required";
           
        } else if(!pattern.test(email)) {

            document.getElementById("erroremaillogin").innerHTML = "Please enter valid email";
            
        } else {
            error = true;
        }

        if(document.logForm.pwd.value.length == '0'){
            document.getElementById("errorpwdlogin").innerHTML = "This field is required";
            error = false;
        } else {
            error = true;
        }


        return error;
    
}
</script>