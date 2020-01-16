<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<br/><br/>
<div class="container">
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Enter Code :</div>
                            <div class="card-body">

                                <form class="form-horizontal" method="post" action="checkCode" >

                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label"></label>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                               <!--  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span> -->
                                                <input type="text" 
                                                value = "<?php if (isset($_SESSION['code'])) { echo $_SESSION['code'] ; }?> "
                                                class="form-control" name="code" id="code" autocomplete="off"/>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block login-button">

                                        Take Test</button>
                                    </div>
                                    
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
</div>