    <style type="text/css">
        .form__icon {
        position: absolute;
            pointer-events: none;
            z-index: 2;
        }
        .form__input {
            position: relative;
            z-index: 3;
        }
        .form__input:placeholder-shown {
            z-index: 1;
        }
        
        .main-footer{
            box-sizing: border-box;
            background-color: black;
            width: 100%;
            height: auto;
            display: inline-block;
            padding: 40px 0px 0px 0px;
        }
        #footerContainer::before{
            content: " ";
            display: table;
        }
        .main-footer .list{
            float: unset;
        }
        .list{
            float: right;
        }
        ul.list-menu{
            width: 100%;
            position: relative;
            /* display: table-row; */
        }
        .list-menu{
            list-style: none;
            padding: 0px;
        }
        .list-menu li{
            height: 25px;
            display: inline-block;
            width: 50%;
            padding-left: 0px;
            margin-left: 0px;
            padding: 0 12px;
        }
        .list-item a{
            color: #e8e8e8 !important; 
            line-height: 47px; 
            font-size: 14px; 
            font-weight: 600;
            float: left;
            font-family: Tahoma,Lato,"Helvetica Neue",Helvetica,Arial,sans-serif;
        }
        .list-item a:hover{
            text-decoration: none;
            color: #e8e8e8 !important; 
        }
        .map-img{
            display: block;
            max-width: 100%; 
            height: auto;
        }

        .skillrary-heading{
            color: #e8e8e8 !important; 
            font-size: 15px;
            font-weight: 600;
            font-family: Tahoma,Lato,"Helvetica Neue",Helvetica,Arial,sans-serif;
        }
        .skillrary-address{
            color: #e8e8e8 !important; 
            font-size: 13px;
            font-family: Tahoma,Lato,"Helvetica Neue",Helvetica,Arial,sans-serif;
        }
        .skillrarySection{
            margin-left: 20px;
        }
        .submain-footer{
            // position: relative; 
            padding: 25px 20px 5px 0px;
            margin: 0px 25px;
            border-top: 1px solid #33A478;
        }
        .icons{
            width: 100%;
            position: relative;
            float: none;
            position: absolute;
            right: 0px;
            left: 0px;
            margin: 0 auto;
        }
        .list-socialicons{
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .list-socialicons li{
            display: inline-block;
            padding-left: 5px;
            padding-right: 5px;
        }
        .list-socialicons li a {
            background: #33A478;
            border-radius: 50px;
            color: #fff !important;
            display: inherit;
            height: 40px;
            padding: 10px 8px;
            width: 40px;
            line-height: normal;
            text-align: center;
            font-size: 20px;
        }
        .copyright{
            line-height: 47px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            color: #e8e8e8 !important;
        }
        .skillrary-logo{
            width: 85%;
            margin-left: 20px;
            display: inline-block;
            text-align: center;
            outline: none;
        }
        .skillrary-map-logo{
            width: 85%;
            display: inline-block;
            text-align: center;
        }
        .apple-android-icons{
            margin: 0;
            padding: 0;
        }
        .apple-android-icons li{
            display: inline-block;
        }
        .aalisticons{
            text-align: center;
        }
        .learn-heading{
            font-size: 14px;
            color: #e8e8e8;
        }
        .copyRight{
            line-height: 30px;
            margin-bottom: 30px;
        }
        .skillraryLogo {
            width: 100%;
            /*height: 110px;*/
            top:40px;
        }
        @media only screen and (max-width: 600px) {
            .list{
                margin-left: 45px;
            }
            ul.list-menu{
                width: 100%;
                position: relative;
                text-align: center;
            }
            .list-menu{
                list-style: none;
                padding: 0px;
            }
            .list-menu li{
                height: 30px;
                display: inline-block;
                width: 45%;
                padding-left: 0px;
                margin-left: 0px;
                padding: 0 12px;
            }
            .skillrary-logo{
                width: 85%;
                margin-left: 25px;
                display: inline-block;
                text-align: center;
            }
            .skillrary-map-logo{
                width: 85%;
                margin-left:26px;
                display: inline-block;
                text-align: center;
            }
            .skillrary-heading{
                color: #e8e8e8 !important; 
                margin-top: 10px;
                font-size: 16px;
                text-align:center;
                font-weight: 600;
                font-family: Tahoma,Lato,"Helvetica Neue",Helvetica,Arial,sans-serif;
            }
            .skillrary-address{
                color: #e8e8e8 !important; 
                font-size: 12px;
                text-align:center;
                font-family: Tahoma,Lato,"Helvetica Neue",Helvetica,Arial,sans-serif;
            }
            .skillrarySection{
                margin-left: 20px;
            }
        }
        @media only screen and (min-width: 768px) and (max-width: 1023px){
            .list-socialicons li a {
                background: #33A478;
                border-radius: 50px;
                color: #fff !important;
                display: inline;
                height: 40px;
                padding: 4px 8px;
                width: 40px;
                line-height: normal;
                text-align: center;
                font-size: 20px;
            }
            .skillraryLogo{
                width: 85%;
                height: 82px;
            }
        }
    </style>

    <br/> <br/>
    <footer class="main-footer">
        <div class="container-fluid" id="footerContainer">  
            <div class="row" style='marginBottom: 30px'>
            <!-- <div class="col-md-9 col-sm-12">
                <div class="list">
                <ul class="list-menu">
                    <li class="list-item"><a href="http://edurary.com/user/career">Career</a></li>                 
                    <li class="list-item"><a href="http://edurary.com/internships">Internship</a></li>  
                    <li class="list-item"><a href="http://edurary.com/testimoniallist">Testimonial</a></li> 
                    <li class="list-item"><a href="http://edurary.com/compiler/">Online Compiler</a></li>  
                    <li class="list-item"><a href="http://edurary.com/contact-us">Contact Us</a></li>              
                    <li class="list-item"><a href="http://edurary.com/blogs">Blogs</a></li> 
                    <li class="list-item"><a href="http://edurary.com/service">Service</a></li>
                    <li class="list-item"><a href="http://edurary.com/about-us">About</a></li> 
                    <li class="list-item"><a href="http://edurary.com/user-forum">Forum</a></li>                  
                    <li class="list-item"><a href="http://edurary.com/faq">FAQ</a></li> 
                </ul>
                </div>
            </div>  -->
            <div class="col-md-2 col-sm-12">
                <div class="skillrary-logo">
                    <img src="https://skillrary.com/assets/skillrary/images/footer-logo.jpg" alt="skillrary" class="skillraryLogo"/>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="list">
                    <ul class="list-menu">
                        <li class="list-item"><a href="https://www.skillrary.com/blogs">Blogs</a></li> 
                        <li class="list-item"><a href="https://www.skillrary.com/testimoniallist">Testimonial</a></li>                 
  
                        <li class="list-item"><a href="https://www.skillrary.com/compiler/">Compiler</a></li> 

                        <li class="list-item"><a href="https://www.skillrary.com/service">Services</a></li>
  
                        <li class="list-item"><a href="https://www.skillrary.com/user-forum">Forum</a></li>                  
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="list">
                    <ul class="list-menu">
                        <li class="list-item"><a href="https://www.skillrary.com/user/career">Career</a></li> 
                        <li class="list-item"><a href="https://www.skillrary.com/internships">Internship</a></li>  
                        <li class="list-item"><a href="https://www.skillrary.com/about-us">About Us</a></li> 
                        <li class="list-item"><a href="https://www.skillrary.com/faq">FAQs</a></li> 
                        <li class="list-item"><a href="https://www.skillrary.com/contact-us">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="skillrary-map-logo">
                <a href="https://www.google.co.in/maps/place/SkillRary+(An+e-learning+medium,+offers+Digital+%26+Online+Training+Worldwide)/@12.9476346,77.573515,17z/data=!4m5!3m4!1s0x3bae151ca2efe3a1:0xfa97908591bd2c0f!8m2!3d12.9479849!4d77.5730215?hl=en" target="_blank"><img src="https://www.skillrary.com/assets/skillrary/images/black_map.jpg" alt="map" class="map-img"/></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="skillrarySection">
                    <h4 class="skillrary-heading">SkillRary,</h4>
                    <p class="skillrary-address">
                    India 
                    <br/>
                    #50, 1st Floor, Brigade MLR Center,
                    <br/>
                    Vani Vilas Road, Bangalore-560004
                    <br/>
                    Karnataka, India
                    <br/>
                    <i class="fa fa-phone" aria-hidden="true" style="color:white"></i> US: 	+1(415)429-3957
                    <br/>
                    &nbsp;IND: 	(+91) 9606655655
                    </p>
                </div>
            </div>
            </div>
        </div><br/>
        <div class="submain-footer">
            <div class="row" style="display:flex">
            <div class="col-md-6 col-sm-12">
                <div class="icons">
                <ul class="list-socialicons">
                    <li><a href="https://bit.ly/twitterSkillRary"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://bit.ly/FSKILLRARY"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://bit.ly/LISKILLRARY"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="https://bit.ly/InstaSKILLRARY"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://bit.ly/youtubeSkillRary"><i class="fa fa-youtube"></i></a></li>
                </ul>
                </div><br/><br/><br/>
                <div class="copyright">
                <p class="copyRight">Copyrights © 2019, All Rights Reserved by Skillrary</p>
                </div>
            </div><br/><br/>
            <div class="col-md-6 col-sm-12">
                <div class="aalisticons">
                <ul class="apple-android-icons">
                    <h4 class="learn-heading">LEARN ON THE GO!</h4>
                    <li><a href="https://bit.ly/skillraryios" target="_blank"><img src="https://www.skillrary.com/assets/skillrary/images/app-apple.png"/></a></li>
                    <li><a href="https://bit.ly/skillraryandroid" target="_blank"><img src="https://www.skillrary.com/assets/skillrary/images/app-android.png"/></a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
	</footer>
</body>
</html>