<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>


.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
}

.vl-innertext {
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}

.hide-manually{
  display: none;
}
.googleLoginContainer{
  margin-top:5%;
  position: relative;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px 0 30px 0;

}
.fb {
  background-color: #3B5998;
  color: white;
}

.twitter {
  background-color: #55ACEE;
  color: white;
}

.google {
  background-color: #dd4b39;
  color: white;
}
.socailLoginList{
  list-style-type: none;
}
.socialbtn{
  width: 100%;
  padding: 10px 50px;
  border-radius: 4px;
  margin-bottom: 10px;
  opacity: 0.85;
}
.socialbtn:hover{
  color: white;
  opacity: 1;
}
.inputSocial{

  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 4px;
  margin: 10px 0;
  opacity: 0.85;
  display: inline-block;
  font-size: 17px;
  line-height: 20px;
  text-decoration: none;
}
.loginBtn {
  background-color: #4CAF50;
  color: white;
  cursor: pointer !important;
  width: 100%;
  padding: 7px;
  border: none;
  border-radius: 4px;
  margin: 8px 0px;
}

.loginBtn:hover {
  background-color: #45a049;
}
.bottom-container {
  text-align: center;
  background-color: #666;
  border-radius: 0px 0px 4px 4px;
  padding: 15px 0px;
  margin-bottom: 2%;
}
@media only screen and(max-width: 600px){

.vl {
  position: absolute;
  left: 50%;
  transform: translate(-50%);
  border: 2px solid #ddd;
  height: 175px;
  display: none;
}

.vl-innertext {
  display: none;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  border: 1px solid #ccc;
  border-radius: 50%;
  padding: 8px 10px;
}
}
</style>
</head>
<body>


<div class="container googleLoginContainer">

  <h4 style="text-align:center">Login with Social Media or Manually</h4><br/>
    <div class="row">
      
      <div class="vl">
        <span class="vl-innertext">or</span>
      </div>

      <div class="col-lg-5 col-md-5 offset-lg-1">
     
        <!-- <a href="#" class="twitter btn"  data-toggle="modal" data-target="#myModal">
          <i class="fa fa-laptop fa-fw"></i> Login with Code
        </a>
        <a href="#" class="fb btn">
          <i class="fa fa-facebook fa-fw"></i> Login with Facebook
         </a>

        <a href="#" class="google btn"><i class="fa fa-google fa-fw">
          </i> Login with Google+
        </a> -->
        <div class="row">
        <div class="col-lg-10 col-md-6">
        <ul class="socailLoginList">
         
          <li>
            <a href="#" class="twitter socialbtn btn"  data-toggle="modal" data-target="#myModal">
              <i class="fa fa-laptop fa-fw"></i> Login with code
            </a>
          </li>

           <li>
    
            <a href="#" class="fb socialbtn btn">
              <i class="fa fa-facebook fa-fw"></i> Login with Facebook
            </a>

          </li>


          <li>
            <a href="#" class="google socialbtn btn"><i class="fa fa-google fa-fw">
              </i> Login with Google+
            </a>
          </li>
        </ul>
        </div>
        </div>
      </div>

      <div class="col-lg-5 col-md-5 offset-md-1">
        <div class="hide-manually">
          <p>Or sign in manually:</p>
        </div>
        <form class="form-horizontal" method="post" action="signin">
          <div class="row">
            <div class="col-md-10">
                <input type="text" name="email" id="email" autocomplete="off" placeholder="User name" class="form-control inputSocial">
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">           
              <input type="password" name="pwd" id="pwd" autocomplete="off" placeholder="Password" class="form-control inputSocial">
            </div>
          </div>

          <div class="row">
            <div class="col-md-10">
            <input type="submit" value="Login" class="loginBtn">
            </div>
          </div>
        </form>
     
      </div>
      
    </div>

</div>

 
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Enter Code</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         <form method="post" action="<?php echo base_url().'admin/checkCode'; ?>">
          <input type="text" id = "code" name = "code" placeholder="Type Code Here"  required autocomplete="off"/>
          <input type="submit" value="Proceed">
        </form>
      </div>

      <!-- Modal footer -->
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>


  <!-- Modal -->
<!--   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Enter Code</h4>
        </div>
        <div class="modal-body">
          <form method="post" action="<?php echo base_url().'/admin/checkCode'; ?>">
          <input type="text" id = "code" name = "code" placeholder="Type Code Here"  required autocomplete="off"/>
          <input type="submit" value="Proceed">
        </form>
        </div> -->
       <!--  <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
<!--       </div>
    </div>
  </div> -->

<div class="container bottom-container">
  <div class="row">
    <div class="col-lg-6 col-md-6">
      <a href="registration" style="color:white" class="btn">Sign up</a>
    </div>
    <div class="col-lg-6 col-md-6">
      <a href="#" style="color:white" class="btn">Forgot password?</a>
    </div>
  </div>
</div> 

</body>
</html>

