
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <title>Home</title>
    <style type="text/css">
body{
    padding: 0;
    margin: 0;
    font-family: 'IBM Plex Sans','Roboto',sans-serif;
    background-image: url(https://code.skillrary.com/assets/images/homeBanner.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
/* body::after{
    position: absolute;
    content: '';
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    bottom: 0;
    right: 0;
    background: #000000ba;
    opacity: 0.9;
} */
* {
    box-sizing: border-box;
    font-stretch: normal;
}

.bg-white{
    background: transparent !important;
    position: relative;
    z-index: 1;
}
.hrDesign{
    border-top: 1px solid white !important;
    padding: 0;
    width: 100%;
    margin-top: 0.5rem;
    margin-bottom: 0.5rem;
}
.editorContainer{
    margin: 0;
    padding: 0;
}

.top-section .inner-section {
    /* background-color: #f0f5fc; */
    display: flex;
    justify-content: space-between;
    /* background-image: url(https://coderbytestaticimages.s3.amazonaws.com/consumer-v2/homepage/polygon.svg); */
    background-attachment: local;
    background-position: left 0%;
    background-repeat: no-repeat;
}
.registerBtn{
    background: #33A478;
    font-size: 18px !important;
    font-weight: 600 !important;
    letter-spacing: 0px !important;
}

.inner-section{
    border-radius: 10px;
    margin-top: 0;
    margin-bottom: 0;
}
.top-text-section h1 {
    font-weight: inherit;
    line-height: 1.52;
    margin-top: 0;
    color: white;
}
.tertiary-underline{
    color: #33a478;
    position: relative;
    font-size: 50px;
}
.top-text-section h3 {
    font-size: 19px;
    opacity: .75;
    line-height: 1.73;
    letter-spacing: 1.1px;
    font-weight: 400;
    margin-top: 0;
    margin-bottom: 40px;
    color: white;
}
/* .form-horizontal {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
} */
a {
    color: hsl(194,76%,51%);
    cursor: pointer;
    text-decoration: none;
}
.form-horizontal .btn {
    flex-grow: 0;
}
/* .btn-primary {
    color: #fff;
    background-color:hsla(211,28%,24%,1);
} */
.startBtn{
    background: #33A478;
    letter-spacing: 0px !important;
    font-size: 18px !important;
    font-weight: 700 !important;
    color: black !important;

}

.btn {
    text-transform: uppercase;
    border: 0;
    outline: 0;
    /*padding: 13px 21px;*/
    font-size: 15px;
    font-weight: 400;
    letter-spacing: 1.25px;
    font-stretch: normal;
    cursor: pointer;
    border-radius: 2px;
}
.top-player-section {
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
    border-radius: 5px;
    min-height: 200px;
    width: 60%;
    padding-left: 50px;
}
.top-player-section img {
    width: 75%;
    border-radius: 4px;
    position: relative;
    left:74px;
    top: 62px;
}
h1{
    font-size: 39px;
    color: #35424d;
}
/* .intake-form.form-horizontal{
    height: 151px;
    right: 168px;
    position: relative;
} */
.top-text-section{
    padding-left: 60px;
    padding-top: 100px;
    width: 40%;
}
#btnsubmit{
    color: white;
    text-decoration: none;
}
.btn-outline-success{
    border :1px solid #33a478;
}
.editorMainContainer{
    margin-top:6%;
    position: relative;
    z-index: 1;
}
.rightArrow{
    font-size: 25px;
    vertical-align: middle;
    color: black;
}
@media (max-width: 1070px){
.section {
    padding-left: 20px;
    padding-right: 20px;
}
}

@media (max-width: 1100px){
.top-section .inner-section {
    flex-direction: column;
}
.top-text-section {
    margin-right: 0;
}
.top-text-section h1 {
    margin-bottom: 25px;
}
.top-text-section .intake-form {
    max-width: 600px;
}
.top-player-section {
    width: 100%;
    max-width: 500px;
    margin-top: 40px;
    margin-left: auto;
    margin-right: auto;
}
}

@media (max-width: 840px){
.inner-section {
    width: 100%;
    padding: 40px;
}
}

@media (max-width: 620px){
 h1 {
    font-size: 28px;
   
    letter-spacing: 0;
}
.top-text-section .btn {
    width: 100%;
    margin-right: 0;
}
.form-horizontal .btn {
    margin-left: 139px;
   
}
img{
    top: -5px;
    left: 20px;
}
}

@media (device-width:1024px){
    img{
        top: -39px;
    }
}
    </style>
</head>
<body>
    <div class="container-fluid editorContainer">
        <div class="container">
            <nav class="navbar navbar-white bg-white">
                <img src="https://www.skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary Logo">
                
                <!-- <form class="form-inline"> -->
                    <!-- <button class="btn registerBtn" type="submit">REGISTER / LOGIN</button> -->
                <!-- </form> -->
                                <a class="btn registerBtn" href="user/login">SIGNIN</a>
                                <a class="btn registerBtn" href="user/registration">SIGNUP</a>
                            </nav>
        </div>
    <hr class="hrDesign"/>
    <div class="container-fluid editorMainContainer">
      <div class="top-section section">
          <div class="top-section-inner inner-section">
              <div class="top-text-section">
                  <h1>
                      <strong> Improve your
                          <span class="tertiary-underline">Coding</span>
                          Skills & become a better
                          <span class="tertiary-underline">Developer</span>
                      </strong>
                  </h1>
                  <h3>
                      SkillRary is the website for technical interview <br>
                      Prep and coding challenges
                  </h3>
                  <!-- <div class="intake-form form-horizontal">
                      <a href="" class="surroundButton">
                          <a class="btn startBtn " href="/user-signin" id="btnsubmit"> Start the first challenge &nbsp;<i class="fa fa-long-arrow-right rightArrow" aria-hidden="true"></i></a>  
                      </a>

                  </div> -->

              </div> 
              <div class="top-player-section">
                    <img src="https://coderbytestaticimages.s3.amazonaws.com/consumer-v2/homepage/main_image.jpg" alt="">

              </div>

          </div>

      </div>
      </div>
    </div>
</body>
</html>