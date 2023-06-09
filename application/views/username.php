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
<!------ Include the above in your HEAD tag ---------->
<br/><br/>
        <div class="container" style="padding: 90px 40px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="background-color: #33A478;font-weight: 600">Note :</div>
                        <div class="card-body">

                            <form class="form-horizontal" method="post" action="<?php echo base_url().'user/create/profile';?>" >

                                <div class="form-group">
                                    <label for="email" class="cols-sm-2 control-label"></label>
                                    <p style="color:red"> <?php if (isset($_SESSION['success'])) { echo $_SESSION['success'] ; }?> </p>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <!--  <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span> -->
<!--                                             <input type="text" 
                                            value = "<?php if (isset($_SESSION['code'])) { echo $_SESSION['code'] ; } else { echo set_value('code');}?> "
                                            class="form-control" name="code" id="code" autocomplete="off"/> -->
                                            <p>
                                            Please note your username is  <span> <strong><?php echo " ".$username." " ; ?></strong> </span> and password is  <span><strong>
                                            <?php echo " ".$password ; ?></strong> </span> </p>

                                        </div>
                                    </div>
                                </div>
            
                                <div class="form-group ">
                                    <!-- <button onclick="checkCode()" type="submit" style="background-color: #33A478;font-weight: 600" class="btn  btn-md login-button"  data-toggle="modal" data-target="#myModal">

                                    Take Test</button> -->
                                    <!-- <button type="submit" style="background-color: #33A478;font-weight: 600" class="btn  btn-md login-button" >
                                        Take Test
                                    </button> -->

                                     <button type="submit" style="background-color: #33A478;font-weight: 600" class="btn  btn-md login-button" >
                                        Create Your Profile
                                    </button>


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
                                        <a href="checkCode"><button type="button" class="btn closeBtn">Proceed</button></a>
                                    </div>

                                    </div>
                                </div>
                                </div>
                
                            </form>
                        </div>
                    </div>
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
        </script>