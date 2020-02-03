<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
.modal-content{
    margin-top: 50%;
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
</style>
<!------ Include the above in your HEAD tag ---------->
<br/><br/>
<div class="container" style="padding: 90px 40px;">
<div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" style="background-color: #33A478;font-weight: 600">Enter Code :</div>
                            <div class="card-body">

                                <!-- <form class="form-horizontal" method="post" action="checkCode" > -->

                                    <div class="form-group">
                                        <label for="email" class="cols-sm-2 control-label"></label>
                                        <p style="color:red"> <?php if (isset($_SESSION['success'])) { echo $_SESSION['success'] ; }?> </p>
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                               <!--  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span> -->
                                                <input type="text" 
                                                value = "<?php if (isset($_SESSION['code'])) { echo $_SESSION['code'] ; } else { echo set_value('code');}?> "
                                                class="form-control" name="code" id="code" autocomplete="off"/>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="form-group ">
                                        <button type="submit" style="background-color: #33A478;font-weight: 600" class="btn  btn-md login-button"  data-toggle="modal" data-target="#myModal">

                                        Take Test</button>
                                    </div>
                                    <!-- The Modal -->
                                    <div class="modal" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            With our online editor, you can edit the code, and click on a button to view the result.
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer" align="center">
                                            <button type="button" class="btn closeBtn">Close</button>
                                        </div>

                                        </div>
                                    </div>
                                    </div>
                    
                                <!-- </form> -->
                            </div>

                        </div>
                    </div>
                </div>
</div>