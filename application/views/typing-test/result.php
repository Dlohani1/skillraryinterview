<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="SkillRary's Free Typing Test">
    <link rel="shortcut icon" href="https://skillrary.com/uploads/images/fav-sr-64x64-logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> -->

    <title>SkillRary | Speed Typing test</title>
    <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    <style type="text/css">
    .speedContainer {
        background: #33A478;
        padding: 5px 20px;
    }
    .result-block {
        padding: 0;
        color: #396a83;
    }   
    .score{
        border: 1px solid black;
        border-radius: 5px;
        margin-bottom: 40px;
        background: white;
    } 
        .col {
        display: inline-block;
        width: 136px;
        height: 100%;
        text-align: center;
        overflow: hidden;
        padding-top: 8px;
        color: #234867;
    }
    .headline {
    font-size: 12px;
    display: block;
    height: 20px;
}
 .amount {
    font-family: "Flexo-BoldIt", Arial, Tahoma, sans-serif;
    font-size: 40px;
    display: block;
    left: -7;
    height: 50px;
    line-height: 50px;
    color: #33A478;
}
.meta {
    font-size: 12px;
    display: block;
    margin: 0;
    color: #396a83;
}
.promo-area {
    background: white;
    border: 1px solid black;
    border-radius: 10px;
    -moz-border-radius: 10px;
    height: 300px;
    padding: 10px;
}
.sub-title {
    display: block;
    padding: 0 10px 10px;
    font-size: 17px;
    line-height: 22px;
}
.info{
     font-size: 17px;
}
.secondary {
    background: #58bc00;
    padding: 10px 18px 10px 18px;
    color: #ffffff;
    border-radius: 10px;
    -moz-border-radius: 10px;
    border: 3px solid white;
    position: relative;
    /* font-style: italic; */
    z-index: 3;
    transition: background-color 300ms ease-out;
    display: inline-block;
    vertical-align: middle;
    font-weight: normal;
    left: -50%;
}
.secondary:hover{
    text-decoration: none;
    color: white;

}
.primary:hover{
    text-decoration: none;
    color: white;
}
.primary{
    background: #ff7e00;
    padding: 10px 18px 10px 18px;
    color: #ffffff;
    border-radius: 10px;
    -moz-border-radius: 10px;
    border: 3px solid white;
    position: relative;
    /* font-style: italic; */
    z-index: 3;
    transition: background-color 300ms ease-out;
    display: inline-block;
    vertical-align: middle;
}
 .center-button {
    position: absolute;
    bottom: -22px;
    left: 20%;
    width: 60%;
    top: 78%;
}
.result-training h2 {
    padding: 10px 10px;
    font-weight: 600;
    color: #33a478;
    margin-bottom: 10px;
    font-size: 22px;
    font-family: "Flexo-BoldIt", Arial, Tahoma, sans-serif;
    /* font-style: italic; */
}
.secondary-trainnow{
    background: #33A478;
    color: black;
    padding: 10px;  
    font-weight: 600;
}
.secondary-trainnow:hover{
    color: black;
    text-decoration: none;
}
.primary-retake{
    background: #33A478;
    color: black;
    padding: 10px;
    font-weight: 600;
}
.primary-retake:hover{
    color: black;
    text-decoration: none;
}
canvas { 
    background-color : white;
}
</style>  
</head>
<body style="background: #f0f0f0">
<div class="container-fluid speedContainer">
    <img src="https://skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="srlogo">
</div><br><br>

<div class="container" align="center">
    <div class="row divided result-block">
        <div class=" col-xs-12 col-sm-12 col-md-8 col-lg-8 offset-lg-2">
            <div class="score">
                <div class="col speed">
                    <span class="headline">Typing Speed</span>
                    <span class="amount" id="WPM" style="left: -8px;">
                        0
                    </span>
                    <span class="meta">WPM</span>
                </div>
                <div class="col errors">
                    <span class="headline">Errors</span>
                    <span class="amount" id="MTW"  style="left: -8px;">0</span>
                    <span class="meta">mistyped words</span>
                </div>
                <div class="col adjusted">
                    <span class="headline">Adjusted Speed</span>
                    <span class="amount" id="ATW" style="left: -8px;">0</span>
                    <span class="meta">WPM</span>
                </div>





                <div class="col adjusted">
                    <span class="headline">Time</span>
                    <span class="amount" id="TimeSpent" style="left: -8px;">0</span>
                    <span class="meta">Time Spent</span>
                </div>

                   <div class="col adjusted">
                    <span class="headline">Time</span>
                    <span class="amount" id="TimeLeft" style="left: -8px;">0</span>
                    <span class="meta">Time Left</span>
                </div>




            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-5 offset-lg-1 promo text-center">
            <div id="trainer_promo" style="display: block;">
                <div class="promo-area result-training active-promo">
                    <h2>How About Training?</h2>
                    <span class="sub-title">With touch typing your typing speed could be</span>
                    <p class="info">
                    <span class="speed-improvement-figure">
                       58
                    </span>
                        <br>
                        <span class="speed-improvement-text">
                      times faster*
                    </span>
                    </p>
                    <!-- <div class="center-button">
                        <a class="button standard secondary-trainnow" href="https://www.typingtest.com/trainer/" onclick="ga('send', 'event', 'Master benchmarks', 'Speed Improvement Promo', 'click')">Train Now</a>
                    </div> -->
                    <div class="action-group" style="margin-left:0px;">
                        <a class="button  primary-retake" href="<?=base_url().'typing-test';?>" style="display: block;width: 150px; margin-left: auto;margin-right:auto;
                            margin-bottom: 20px" onclick="ga('send', 'event', 'Master benchmarks', 'Retake Test', 'click')">Retake Test</a>
                    </div>
                </div>
        </div>
    </div>
        <!-- <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 ">
             <div class="center-button">
                    <a class="button standard secondary-trainnow" href="https://www.typingtest.com/trainer/" onclick="ga('send', 'event', 'Master benchmarks', 'Speed Improvement Promo', 'click')">Train Now</a>
                </div>
                <div class="action-group" style="margin-left:0px;">
                    <a class="button  primary-retake" href="index.html" style="display: block;width: 150px; margin-left: auto;margin-right:auto;
            margin-bottom: 20px" onclick="ga('send', 'event', 'Master benchmarks', 'Retake Test', 'click')">Retake Test</a>

                </div>
        </div> -->

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-5 promo text-center">
            <canvas id="chartJSContainer" width="600" height="400"></canvas>
        </div>

</div>

<script type="text/javascript">

    // chart starts

    var options = {
  type: 'bar',
  data: {
    labels: ["Slow", "Average", "Fluent", "Fast"],
    datasets: [
        {
          label: 'Result of Typing Test',
          data: [12, 30, 3, 5, 2, 3],
        borderWidth: 1,

         backgroundColor: [
                '#33A478',
                '#33A478',
                '#33A478',
                '#33A478',
                '#33A478',
                '#33A478'         
            ],
        },  
        ]
  },
  options: {
    scales: {
        yAxes: [{
        ticks: {
            min: 0,
            stepSize: 20,
            max: 80
        }
      }]
    }
  }
}

var ctx = document.getElementById('chartJSContainer').getContext('2d');
new Chart(ctx, options);

// chart ends

    let WPM =  localStorage.WPM;
    let MTW =  localStorage.MTW;
    $('#WPM').text(WPM);
    $('#MTW').text(MTW);

    let getMinute = parseInt(localStorage.getMinute);

    let userTypedChaaracters = parseInt(localStorage.userTypedChaaracters);

    let ATW = parseInt(((userTypedChaaracters/ 5) - MTW)/getMinute);

        ATW = (ATW < 0) ? 0 : ATW ;

    $('#ATW').text(ATW);

    let minute = localStorage.minute;
    let second = localStorage.second;

    let timeLeft = parseInt(minute *60) + parseInt(second)
    let total_time = (getMinute * 60);

    let time_spent = total_time - timeLeft;


    let minuteLeft =  parseInt(timeLeft/60);

    let secondLeft =  timeLeft%60;

    let actualTimeLeft = minuteLeft +':' + secondLeft;

    let minuteSpent =  parseInt(time_spent/60);

    let secondSpent =  time_spent%60;

    let actualTimeSpent = minuteSpent +':' + secondSpent;

    $('#TimeSpent').text(actualTimeSpent);
    $('#TimeLeft').text(actualTimeLeft);

</script>


</body>
</html>