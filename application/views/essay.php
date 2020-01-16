<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <title>SkillRary | Essay</title>

    <style>
        .completeContainer{
            margin-top: 5%;
        }
        .essayHeading{
            color: #33A478;
            text-align: center;
            font-size: 35px;
            font-weight: 600;
        }
        .box{
            background: white;
            box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
            padding: 30px;
        }
        .subtnn{
            background-color: #33A478;
            border: 2px solid #33A478;
            padding: 8px 15px;
            border-radius: 5px;
        }
        textarea{
            resize: none;
        }
        .box2{
            border: 2px solid #33A478;
            padding: 20px;
            border-radius: 10px;
        }
        .Username{
            font-size: 32px;
            text-align: center;
        }
        .backspaceCount{
            color: #33A478;
            font-size: 25px;
            font-weight: 600;
        }
        .count{
            font-size: 20px;
        }
    </style>
</head>

<body>

    <div class="container-fluid completeContainer">
        <h3 class="essayHeading">Essay Writing Editor</h3>
   
        <div class="container" id="nameDisplay">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="box">
                        
                            <input id="mytext" type="text" name="data" class="form-control" placeholder="Enter name to continue"><br/>
                            <input type="button" onclick="enterName()" value="Yes It's My Name" class="subtnn">
                        
                    </div>
                </div>
            </div>
        </div>
  
    <!-- <form name="myform" onsubmit="tosubmit();" action="second.html">
        <input id="mytext" type="text" name="data">
        <input type="submit" value="Submit">
    </form> -->
        <input type="hidden" id="username" />
        <div class="container" id="essayDisplay" style="display:none" >
            <div class="row">
                <div class="col-md-8">
                    <div class="box">
                        <textarea name="essay" id="essay" type="text" cols="120" rows="20" class="form-control"></textarea><br>
                        <input type="submit" value="Submit paragraph" id="para" onclick="submitParagraph(2)" class="subtnn">
                        <input type="hidden" id="backspaceCount" value="0"/>
                        <input type="hidden" id="deleteCount" value="0" />
                        <br>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box2">
                        <p class="Username" id="showName"></p>
                        <p class="count">Backspace Count : 
                            <span  class="backspaceCount" id="backspaceCountShow"></span>
                        </p>
                        <p class="count">Delete Count : 
                            <span class="backspaceCount" id ="deleteCountShow"></span>
                        </p> 
                         <p class="count">Total Words : 
                            <span class="backspaceCount" id ="wordCountShow"></span>
                        </p> 
                         <p class="count"> Time Left:
                            <span style="font-size:18px" class="backspaceCount" id ="showtime"></span>
                        </p> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>


        var input = document.getElementById('essay');
        var backspace = 0;
        var deleteCount = 0;
        var totalsec = 1800;
        

        input.addEventListener('keydown', function (event) {

            const key = event.key;
            if (key === "Backspace") {
                backspace++;
                document.getElementById("backspaceCount").value = backspace;
                console.log('ba',backspace);
            }
            if (key === "Delete") {
                deleteCount++;
                document.getElementById("deleteCount").value = deleteCount;
            }
        });

        function enterName() {
            var name = document.getElementById("mytext").value;
            if (!name.trim().length) {
                alert('Enter name');
            } else {
                document.getElementById("essayDisplay").style.display = "block";
                document.getElementById("username").value = name;
                document.getElementById("showName").innerHTML = "Welcome "+name;
                document.getElementById("nameDisplay").style.display = "none";
                showtime();
            }
        }

        //document.getElementById('para').click(1);
        function submitParagraph() {

            clearTimeout(tim);
            console.log('a',document.getElementById("backspaceCount").value)
            var backspaceCount = document.getElementById("backspaceCount").value;
            var deleteCount = document.getElementById("deleteCount").value;
            var wordCount = document.getElementById("essay").value != 0 ? document.getElementById("essay").value.split(' ').length: 0;
            document.getElementById("backspaceCountShow").innerHTML = backspaceCount;
            document.getElementById("deleteCountShow").innerHTML= deleteCount ;
            document.getElementById("wordCountShow").innerHTML= wordCount ;
        }

       

        function showtime() {
        console.log('showtime', totalsec);
        // first check if exam finished
        // if (pos >= questions.length) {
        //     console.log('end');
        //     clearTimeout(tim);
        //     return;
        // }

        // 1 seconde eraf
        totalsec--;
        
        var min = parseInt(totalsec / 60, 10);
        var sec = totalsec - (min * 60);
        
          if (parseInt(sec) > 0) {
            document.getElementById("showtime").innerHTML =  min + " Minutes :" + sec + " Seconds";
            tim = setTimeout("showtime()", 1000);
          } else {
            if (parseInt(sec) == 0) {
              document.getElementById("showtime").innerHTML = min + " Minutes :" + sec + " Seconds";
              if (parseInt(min) == 0) {
                clearTimeout(tim);
                alert("Time Up");
               document.getElementById('para').click();
              } else {
                document.getElementById("showtime").innerHTML =  min + " Minutes :" + sec + " Seconds";
                tim = setTimeout("showtime()", 1000);
              }
            }

          }
    }
    </script>

</body>

</html>