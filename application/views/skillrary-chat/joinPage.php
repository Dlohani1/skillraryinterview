<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Join chat</title>
    <style>
        .containerChat{
            background: #33A478;
            padding: 5px;
        }
        .joinchat{
            height: auto;
            padding: 0;
        }
        .justifyContent{
            justify-content: center !important;
        }
        /*.borderImage{
            position: absolute;
            bottom: -30px;
        }*/
        .joinTextHead{
            position: absolute;
            left: 50%;
            transform: translate(-50%);
            top: 20%;
            font-size: 22px;
        }
        .joinBtn{
            background: #33A478;
            color: white;
            border: 1px solid;
            padding: 6px;
            font-size: 17px;
        }
        .tryFree{
            background: black;
            color: #33A478;
            border: 1px solid black;
            font-weight: 600;
            border-radius: 5px;
            padding: 10px;
        }
        .ModalContent{
          width: 600px !important;
          background: black;
        }
        .modalDialog {
            position: relative;
            width: auto;
            pointer-events: none;
            left: -43px;
            top: 12%;
        }
        .titleContent{
          font-size: 20px;
          color: #33A478;
        }
        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #ffffff;
            /* text-shadow: 0 1px 0 #fff; */
             opacity: 1; 
        }
        .close:hover {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #ffffff;
            /* text-shadow: 0 1px 0 #fff; */
             opacity: 1; 
        }
        .modalHeader {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: start;
            align-items: flex-start;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1rem 1rem;
            border-bottom: 1px solid #4e4e4f;
            border-top-left-radius: .3rem;
            border-top-right-radius: .3rem;
        }
        .modalFooter {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            -ms-flex-pack: end;
            justify-content: center;
            padding: 1rem;
            border-top: 1px solid #4e4e4f;
            border-bottom-right-radius: .3rem;
            border-bottom-left-radius: .3rem;
        }
        .clsbtn{
          background: #33A478;
            border: 1px solid #33A478;
            color: black;
            font-weight: 600;
            width: 130px;
        }
        .startbtn{
        background: #33A478;
            border: 1px solid #33A478;
            color: black;
            font-weight: 600;
            width: 130px;
        }
        .detailsHead{
            color: white;
        }
        .bottom{
            margin-bottom: 10px;
        }
        .labelColor{
            color: white;
        }
    </style>
</head>
<body>
    <div class="container-fluid containerChat">
        <img src="https://skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="logo">
    </div><br/><br/>
    <h4 style="text-align: center;">Live Skillrary Chat for Classroom</h4><br/>
    <div class="container">

    	<?php if ($this->session->flashdata('chat_error')) { ?>
    		<div class="alert alert-danger"> <?= $this->session->flashdata('chat_error') ?> </div>
		<?php } ?>

        <div class="row justifyContent">
            <div class="col-md-6 card joinchat">
                <img src="<?=base_url().'images/wave3.svg';?>">
                <h5 class="joinTextHead">Join a Chat</h5>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input type="text" name="name"  placeholder="Enter your name" class="form-control">
                    </div>
                </div><br/>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <input type="text" name="name"  placeholder="Enter code" class="form-control">
                    </div>
                </div><br/>
                <div style="text-align: center;">
                    <button type="submit" class="joinBtn">Join as a student</button>
                </div>
                <img src="<?=base_url().'images/wave5.svg';?>">
            </div>
        </div><br/>
        <div style="text-align: center;">
            <button type="submit" class="tryFree" data-toggle="modal" data-target="#myModal">Try for free as a Teacher</button>
        </div>

        <div class="modal opacity-animate3" id="myModal">
            <div class="modal-dialog modalDialog" role="document">
                <div class="modal-content ModalContent">

                	<form action ="createChat" method="post" autocomplete="off">
                    <div class="modal-header modalHeader">
                        <h4 class="modal-title titleContent">Start New Channel</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                       <h6 class="detailsHead">Please provide the following details</h6><br>
                       <div class="container">
                            <div class="row"> 
                                <div class="col-md-6 offset-md-3 bottom">
                                    <label class="labelColor">Email Address</label><br>
                                    <input type="email" name="trainer_email" class="form-control" required>
                                </div>
                           </div>
                           <div class="row"> 
                                <div class="col-md-6 offset-md-3 bottom">
                                    <label class="labelColor">Name</label><br>
                                    <input type="text" name="trainer_name" class="form-control" required>
      
                                </div>
                           </div>
                           <div class="row"> 
                                <div class="col-md-6 offset-md-3 bottom">
                                    <label class="labelColor">Channel Title</label><br>
                                    <input type="text" name="channel_title" class="form-control" required>
      
                                </div>
                           </div>
                       </div>
                    </div>
                    <div class="modal-footer modalFooter">
                        <a><button type="submit" class="btn startbtn mx-auto">Start</button></a>
                        <a><button type="button" data-dismiss="modal" aria-label="Close" class="btn clsbtn mx-auto">Close</button></a>
                    </div>

				</form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>