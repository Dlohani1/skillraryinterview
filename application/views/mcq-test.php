<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
    <title>MCQ Create Test</title>
    <style>
        .firstSection{
            background: white;
            box-shadow: 2px 2px 10px 0px #aaa;
            padding: 30px;
        }
        .labelColor{
            color: black;
            font-size: 17px;
            line-height: 10px;
        }
        .editSubbtn{
            float:right;
            margin-right: 120px;
        }
        .ESbutn{
            margin-bottom: 5px;
            padding: 4px 15px;
            background: #33a478;
            border: 1px solid #33A478;
        }
        .labelTest{
            color: #33A478;
            font-weight: 600;
            font-size: 20px;
        }
        .addBtn{
            background: #33A478;
            margin-top: 25px;
            border: 2px solid #33A478;
            padding: 3px 8px;
        }
    </style>

    <script>
        function submitFirstForm(){
            if(document.fstForm.title.value.length != ''){
                $( "#title" ).prop( "disabled", true );
            }
            if(document.fstForm.type.selectedIndex != ''){
                $( "#type" ).prop( "disabled", true );
            }
        }
        function editFirstForm(){
            $( "#title" ).prop( "disabled", false );
            $( "#type" ).prop( "disabled", false );
        }

        function submitSecondForm(){
            if(document.secondForm.ETime.value.length != ''){
                $( "#englishTime" ).prop( "disabled", true );
            }
            if(document.secondForm.RTime.selectedIndex != ''){
                $( "#reasoningTime" ).prop( "disabled", true );
            }
            if(document.secondForm.QTime.selectedIndex != ''){
                $( "#quantitativeTime" ).prop( "disabled", true );
            }
        }

        function editSecondForm(){
            $( "#englishTime" ).prop( "disabled", false );
            $( "#reasoningTime" ).prop( "disabled", false );
            $( "#quantitativeTime" ).prop( "disabled", false );
        }
    </script>

</head>
<body>
    
    <div class="container-fluid">
        <div class="container">
            <h2 align="center" style="color: #33a478;font-weight: 600;">Create Test</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2 firstSection">
                    <form name="fstForm" action="#">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Enter your title">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Type</label>
                                <select type="text" name="type" class="form-control" id="type">
                                    <option selected disabled>Enter 1 for single, 2 for multiple section test</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div><br/>
                        <div class="editSubbtn">
                            <span><button type="button" onclick="return editFirstForm()" class="ESbutn">Edit</button></span>&nbsp;&nbsp;<span><button type="button" class="ESbutn" onclick="return submitFirstForm();">Submit</button></span>
                        </div>
                    </form>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-md-8 offset-md-2 firstSection">
                    <form name="secondForm" action="#">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">English</label>
                                <input type="text" name="ETime" class="form-control" id="englishTime" placeholder="Select total time in seconds">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Reasoning</label>
                                <input type="text" name="RTime" class="form-control" id="reasoningTime" placeholder="Select total time in seconds">
                            </div>
                        </div><br/>
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <label class="labelColor">Quantitative</label>
                                <input type="text" name="QTime" class="form-control" id="quantitativeTime" placeholder="Select total time in seconds">
                            </div>
                        </div><br/>
                        <div class="editSubbtn">
                            <span><button type="button" onclick="return editSecondForm()" class="ESbutn">Edit</button></span>&nbsp;&nbsp;<span><button type="button" class="ESbutn" onclick="return submitSecondForm();">Submit</button></span>
                        </div>
                    </form>
                </div>
            </div><br/>
            <div class="row">
                <div class="col-md-8 offset-md-2 firstSection">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="labelTest">English</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="labelColor">Sub-section</label>
                                    <select class="form-control">
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="labelColor">Difficulty Level</label>
                                    <select class="form-control">
                                        <option>Easy</option>
                                        <option>Difficult</option>
                                        <option>Medium</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="labelColor">Total Questions</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <button class="addBtn">Add</button>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="labelTest">Reasoning</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="labelColor">Sub-section</label>
                                    <select class="form-control">
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="labelColor">Difficulty Level</label>
                                    <select class="form-control">
                                        <option>Easy</option>
                                        <option>Difficult</option>
                                        <option>Medium</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="labelColor">Total Questions</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <button class="addBtn">Add</button>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="labelTest">Quantitative</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="labelColor">Sub-section</label>
                                    <select class="form-control">
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                        <option>Articles</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="labelColor">Difficulty Level</label>
                                    <select class="form-control">
                                        <option>Easy</option>
                                        <option>Difficult</option>
                                        <option>Medium</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="labelColor">Total Questions</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <button class="addBtn">Add</button>
                                </div>
                            </div>
                        </div>
                    </div><br/>
                    <div class="editSubbtn">
                        <span><button class="ESbutn">Edit</button></span>&nbsp;&nbsp;<span><button class="ESbutn">Submit</button></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
</body>
</html>