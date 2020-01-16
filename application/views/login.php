<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Login</div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="signin">

                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label">Email</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email" />
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password" class="cols-sm-2 control-label">Password</label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter your Password" />
                                            </div>
                                        </div>
                                    </div>

                                    <p> Have a code ? <input type="checkbox" id="code" onchange="validate()" name="code" /> </p>

                                    <input type="text" name="enter-code" id="enter-code" hidden /> 


                                    <div class="form-group ">
                                        <br/>
                                        <br/>
                                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Login</button>
                                    </div>
                                    <!-- <div class="login-register">
                                        <a href="registration">Register</a>
                                    </div> -->
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
</script>