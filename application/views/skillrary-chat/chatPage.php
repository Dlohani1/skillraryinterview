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
    <title>Chat screen</title>
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
        .titleBox{
            background: #33A478;
            border-bottom: 1px solid #cdcdcd;
            height: 44px;
        }
        .charContent {
            padding-bottom: 0;
            padding-top: 40px;
            padding-left: 20px;
            padding-right: 20px;
        }
        .ChannelTitle{
            padding: 10px;
            position: absolute;
            font-weight: 600;
            color: black;
        }
        .iconChat{
            border-right: 1px solid #cdcdcd;
            padding: 9px 13px 11px 0px;
            float: left;
            opacity: .7;
        }
        .commentBox{
            background: none repeat scroll 0 0 #f9f9f9;
            border: 1px solid #cdcdcd;
            clear: both;
            margin-bottom: 16px;
            position: relative;
        }
        .panel-left{
            margin-right: 250px;
            padding: 15px;
            width: 100%;
        }
        #chatMessage{
             height: 420px;
             background: none repeat scroll 0 0 #fdfdfd;
            border: 1px solid #ddd;
            min-height: 400px;
            overflow: auto;
            position: relative;
            max-height: 450px;
        }
        .commentMessage{
            padding: 5px 10px 5px 10px;
            margin: 10px 0;
        }
        .chatImage{
            display: inline-block;
            float: left;
            vertical-align: middle;
            width: 28px;
            height: 28px;
            margin-top: 6px;
        }
        .msgBlock{
            background: none repeat scroll 0 0 #fff;
            border: 1px solid #ccc;
            box-shadow: 1px 1px 0 1px rgba(0,0,0,.05);
            display: block;
            margin-left: 40px;
            padding: 10px;
            position: relative;
        }
        .msgBlock:before {
            border-right: 7px solid rgba(0,0,0,.1);
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            content: "";
            display: inline-block;
            left: -7px;
            position: absolute;
            top: 11px;
        }
        .chatTime{
            color: #999;
            font-size: 11px;
            font-style: italic;
            margin-left: 5px;
        }
        .thumbIcon{
            padding-left: 3px;
            font-size: 12px;
        }
        .crossIcon{
            float: right;
            font-size: 14px;
        }
        .msg {
            display: block;
            margin-top: 10px;
        }
        .well {
            min-height: 20px;
            background-color: #f5f5f5;
            border: 1px solid #e3e3e3;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            -moz-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            padding: 7px 15px;
            margin: 7px 0 0;
        }
        .inputBox {
            display: block;
            margin-right: 90px;
            margin-top: 4px;
        }
        .textareaInput{
            width: 100%;
            resize: none;
        }
        .send{
            float: right;
        }
        .panel-right{
            width: 249px;
            background-color: #f2f2f2;
            border-left: 1px solid #ddd;
            position: absolute;
            right: 0;
            top: 44px;
            height: 537px;
            overflow: auto;
            padding: 0 0 30px;
        }
        .chatUser{
            padding: 10px;
            width: 100%;
            background-color: #ececec;
            border-bottom: 1px solid #ddd;
        }
        .userImage{
            height: 20px;
            float: left;
        }
        .userName{
            padding-left: 5px;
            font-weight: 600; 
        }
        .online{
            background: silver;
            padding: 10px;
        }
        .online h5{
            font-size: 14px;
            margin: 0;
        }
        .onlineUsersList ul{
            line-height: 21px;
            list-style-type: none;
            margin: 0;
            padding: 0;
            font-size: 10px;
        }
        .onlineUsersList ul li img{
            display: inline-block;
            margin-right: 10px;
            vertical-align: middle;
            width: 22px;
            height: 22px;
            border-radius: 3px;

        }
        .onlineUsersList ul li{
            border-color: #ddd;
            border-style: none none solid;
            border-width: 0 0 1px;
            padding: 4px 10px;
            position: relative;
        }
        .onlineusername{
            font-size: 12px;
            position: absolute;
            top: 7px; 
        }
        .active{
            background: #33A477;
        }
    </style>
</head>
<body>
    <div class="container-fluid containerChat">
        <img src="https://skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="logo">
        <a class="btn btn-primary pull-right" href="<?=base_url().'skillrary-chat/logout';?>">Logout</a>
    </div>
    <div class="charContent">
    <div class="container-fluid commentBox">
        <div class="row" width="100%">
            <div class="col-md-12 titleBox">

                <span class="iconChat">
                <i class="fa fa-comment" aria-hidden="true"></i>
                </span>
                <span class="ChannelTitle">
                	Welcome, <b><?php echo $trainer_name; ?></b>
                Channel Title : <?php echo $channel_title;?> /
                ChatRoom Id : <?php echo $code;?>
                </span>


            </div>
            <div class="panel-left">
                <div id="chatMessage">

                		<?php
							$fileName = $_SESSION['channelTitle'].".html";
							if (file_exists ( $fileName ) && filesize ( $fileName ) > 0) {
								$handle = fopen ( $fileName, "r" );
								$contents = fread ( $handle, filesize ( $fileName ) );
								fclose ( $handle );
								echo $contents;
							}
						?>
                    
                        <!-- <p class="commentMessage">
                            <img src="<?=base_url().'images/teacher.svg';?>" class="chatImage">
                            <span class="msgBlock">
                                <strong style="color: #33A478;"><?php echo $trainer_name;?></strong>
                                <span class="chatTime">5 hours ago</span>
                                <span class="thumbIcon"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                <span class="crossIcon"><i class="fa fa-times" aria-hidden="true"></i></span>
                                <span class="msg">I am meena</span>
                            </span>
                        </p> -->

                        

                        


                        <!-- <p class="commentMessage">
                            <img src="<?=base_url().'images/teacher.svg';?>" class="chatImage">
                            <span class="msgBlock">
                                <strong style="color: #33A478;">Meena</strong>
                                <span class="chatTime">5 hours ago</span>
                                <span class="thumbIcon"><i class="fa fa-thumbs-up" aria-hidden="true"></i></span>
                                <span class="crossIcon"><i class="fa fa-times" aria-hidden="true"></i></span>
                                <span class="msg">I am meena</span>
                            </span>
                        </p> -->
                    
                </div>
                <div class="well">
                    
                    <span class="inputBox">
                        <textarea id="usermsg" rows="2" class="textareaInput"></textarea>
                    </span>
                    <button id="submitmsg" class="btn btn-success">Send</button>
                </div>
            </div>
            <div class="panel-right">
                <div class="chatUser">
                    <img src="<?=base_url().'images/teacher.svg';?>" class="userImage"><span class="userName">Meena</span>
                </div>
                <div class="online">
                    <h5>Online Users</h5>
                </div>
                <div class="onlineUsersList">
                    <ul>
                        <li class="active"><img src="<?=base_url().'images/teacher.svg';?>"><span class="onlineusername">Meena</span></li>
                        <li><img src="<?=base_url().'images/teacher.svg';?>"><span class="onlineusername">John</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script type="text/javascript">
    			$("#submitmsg").click(function(){
			var clientmsg = $("#usermsg").val();
			
	        $.ajax({
		        url : "save-mess", 
				data :{text: clientmsg},
				method:'POST',
				success:function(data) {
				   
					loadLog();
				     $("#usermsg").val('');
			    }
		    });

		});

    		function loadLog(){	
			
			$.ajax({
				url: "show-message",
				method:'get',
				success: function(data){
					$("#chatMessage").html(data);
			  	},
			});
		}

		setInterval (loadLog, 4000);

    </script>
</body>
</html>