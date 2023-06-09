<html>
<head>
<title>SKILLRARY | Sql-Editor</title>
<meta name="Description" content="SkillRary's Sql-Editor">
<link rel="shortcut icon" href="https://skillrary.com/uploads/images/fav-sr-64x64-logo.png" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous" rel="preconnect" defer/> 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <style>
  
 	html, body {
      height: 100%;
    }
    #container {
      display: flex;
      flex-direction: column;
      height: 100%;
      padding: 0;
    }
    .row {
      flex: 1;
    }
    body {
      margin: 0;
      background: #f3f3f3;
    }
    .row:nth-child(2) {
      background: #bbb
    }
    #top_box{
        background: white;
        padding: 6px;
        margin: 6px;
        border: 1px solid black;
    }
    #bottom_box{
        background: white;
        padding: 6px;
        margin: 6px;
        border: 1px solid black;
    }
    .columnboxes{
        display: flex;
      flex-direction: row;
      height: 100%;
    }
    .column1{
        background-color: white;
        width: 20%;
        border: 1px solid black;
        margin: 6px;
        padding: 6px;
    }
    table.table thead tr th {
        border-bottom: 2px solid #ddd;
        border-top: none;
        font-weight: bold;
    }
    table.table tbody tr td {
        border-bottom: 2px solid #ddd;
        border-top: none;
    }
    .table td {
      padding: 8px;
      vertical-align: top;
      font-size: 15px;
    }
    textarea  {  
      width: 100%;
     font-family: "Lucida Console", Courier, monospace;
     color:'DodgerBlue';
    }
    .play {
      background: transparent;
      background-image: linear-gradient(to bottom right, #33A478, rgba(0, 0, 0, 0.76) 60%);
      border: 1px solid black;
    }
  </style>
</head>
<body id="bodyClass">

	<div class="container-fluid" style="background: #33A478;">
		<img src="https://skillrary.com/uploads/images/f-sr-logo-195-50.png" alt="SkillRary" style="padding:5px">
	<span>
      <button  class="btn btn-primary play" aria-hidden="true" id="ExecuteSql" >Execute Query</button>
    </span>

    <!-- <span>
      <button type="fa fa-play" class="btn btn-primary" aria-hidden="true" id="ExecuteMultipleSql" >Execute All</button>
    </span> -->

    <span>
      <button type="fa fa-play" class="btn btn-primary play" aria-hidden="true" id="RestoreDb" >Restore Database</button>
    </span>


    </div>
 
<div class="columnboxes">
<div class="column" style="width: 80%;">
    <div class="container-fluid" id="container">
        <div class="outerarea">
        </div>
      <div class="row" id="top_box">
        <textarea id="rawSql">select * from categories;</textarea>
    </div>
      <div class="row" id="bottom_box">
        <table id="qwerty" class="table">
          <th>Click "Execute Query" to execute the SQL statement above.</th>
        </table>
      </div>
    </div>
</div>
<div class="column1" >
   Your Database:
    <table  class="table">
    <thead>
      <tr>
        <th>Tablename</th>
        <th>Records</th>
      </tr>
    </thead>
    <tbody id="dbtab">


    </tbody>
    </table>
</div>
</div>

<script type="text/javascript">

        
        var isFirefox = typeof InstallTrigger !== 'undefined';
        if(isFirefox){
          document.getElementById("bodyClass").innerHTML = 'This feature is not accesible in Firefox Browser: Please open in Google Chrome';
          throw new Error("This feature is not accesible in Firefox Browser: Please open in Google Chrome");
         
        }
        else{
          var db = null;
          var db = openDatabase('SkillRary', '1.0', 'To Do', 5 * 1024 * 1024);
        }
        


        $('document').ready(function() {
        	$("#RestoreDb").click(function(){
        		db.changeVersion(db.version, '', function(t) {
				t.executeSql("SELECT name FROM sqlite_master WHERE type='table' and name not like '__Webkit%'", [], function(sqlTransaction, sqlResultSet) {
				var table, tablesNumber = sqlResultSet.rows.length;
				//console.log('DATABASE RESET MODE ENABLED');
				for (var i = 0; i < tablesNumber; i++) {
				table = sqlResultSet.rows.item(i);
				//console.log('Removing table: ' + table.name);
				sqlTransaction.executeSql('DROP TABLE ' + table.name);
				}
				});
				});
        		restoreDb();

        	});


        	function restoreDb(){

        		 db.transaction(function(tx) {
               
            	// categories table
               tx.executeSql('DROP TABLE IF EXISTS categories');
               tx.executeSql('CREATE TABLE categories (category_id int,category_name varchar(255),description varchar(255))');
               tx.executeSql("INSERT INTO categories (category_id, category_name, description) VALUES (1, 'Beverages', 'Soft drinks, coffees, teas, beers, and ales')");
               tx.executeSql("INSERT INTO categories (category_id, category_name, description) VALUES (2, 'Condiments', 'Sweet and savory sauces, relishes, spreads, and seasonings')");
               tx.executeSql("INSERT INTO categories (category_id, category_name, description) VALUES (3, 'Confections', 'Desserts, candies, and sweet breads')");
               tx.executeSql("INSERT INTO categories (category_id, category_name, description) VALUES (4, 'Dairy Products', 'Cheeses')");
               tx.executeSql("INSERT INTO categories (category_id, category_name, description) VALUES (5, 'Grains/Cereals', 'Breads, crackers, pasta, and cereal')");
               tx.executeSql("INSERT INTO categories (category_id, category_name, description) VALUES (6, 'Meat/Poultry', 'Prepared meats')");
               tx.executeSql("INSERT INTO categories (category_id, category_name, description) VALUES (7, 'Produce', 'Dried fruit and bean curd')");
               tx.executeSql("INSERT INTO categories (category_id, category_name, description) VALUES (8, 'Seafood', 'Seaweed and fish')");

               // customers table
               tx.executeSql('DROP TABLE IF EXISTS customers');
               tx.executeSql('CREATE TABLE customers (ID int,NAME varchar(255),AGE int,ADDRESS varchar(255),SALARY int)');
               tx.executeSql("INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES ('1', 'anish', '25', 'bengaluru', '15.00')");
               tx.executeSql("INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES ('2', 'manish', '26', 'mumbai', '20.00')");
               tx.executeSql("INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES ('3', 'kumar', '25', 'delhi', '18.00')");
               tx.executeSql("INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES ('4', 'sailesh', '27', 'chennai', '14.00')");
               tx.executeSql("INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES ('5', 'megha', '21', 'hyderabad', '29.00')");
               tx.executeSql("INSERT INTO customers (ID, NAME, AGE, ADDRESS, SALARY) VALUES ('6', 'geetha', '24', 'bengaluru', '25.00')");

               //departments table
               tx.executeSql('DROP TABLE IF EXISTS departments');
               tx.executeSql('CREATE TABLE departments (dept_id int,dept_name varchar(255))');
               tx.executeSql("INSERT INTO departments (dept_id, dept_name) VALUES ('1', 'Dev')");
               tx.executeSql("INSERT INTO departments (dept_id, dept_name) VALUES ('2', 'Customer Service')");
               tx.executeSql("INSERT INTO departments (dept_id, dept_name) VALUES ('3', 'Finance')");
               tx.executeSql("INSERT INTO departments (dept_id, dept_name) VALUES ('4', 'Human Resources')");
               tx.executeSql("INSERT INTO departments (dept_id, dept_name) VALUES ('5', 'Sales')");

               //employees table
               tx.executeSql('DROP TABLE IF EXISTS employees');
               tx.executeSql('CREATE TABLE employees (emp_id int,emp_name varchar(255),hire_date date,salary varchar(255),dept_id varchar(255))');
               tx.executeSql("INSERT INTO employees (emp_id, emp_name,hire_date,salary,dept_id) VALUES (1, 'Ethan Hunt', '2001-05-01', '5000', '4')");
               tx.executeSql("INSERT INTO employees (emp_id, emp_name,hire_date,salary,dept_id) VALUES (2, 'Tony Montana', '2002-07-15', '6500', '1')");

            });


            getAllTablesFromDB();


        	}



        	restoreDb();
           



            });

        function getAllTablesFromDB() {

          $("#dbtab").empty();
          var rowCntr = 3;
          tblNames = [];
          db.transaction(function(tx) {
            console.log('tst1')
            tx.executeSql('SELECT tbl_name from sqlite_master WHERE type = "table"', [], function(tx, results) {
               console.log('first')
              
                var no_rec = results.rows; 
                //console.log('dnn',no_rec)
                for(var p = 1; p < no_rec.length; p++){
                 console.log('second')
                  // if (p == (no_rec.length - 1)) {
                  //   names += no_rec[p].tbl_name;
                  // } else {
                  //   names += no_rec[p].tbl_name+",";  
                  // }
                  
                    tblNames.push(no_rec[p].tbl_name) ;  
                 // }
                  //localStorage.setItem("names", names);
                  var qwerty = '<tr>';
                  qwerty += '<th>'+no_rec[p].tbl_name+'</th>';

                  qwerty += '<th class="totalRecords" id='+no_rec[p].tbl_name+'>0</th>';

                //         var tableName = no_rec[p].tbl_name;
                  // let resultVar;
                  
                    tx.executeSql('SELECT COUNT(rowId) AS nr FROM '+ no_rec[p].tbl_name ,[],function (tx, r){
                      //resa += "ars";

                      //console.log('qq',resa)
                      //var a = r;
                      //console.log('ad', tx)
  			            	// var temp = r.rows[0];
  			            	// resultVar =  temp.nr;
                      
                      var cls = document.getElementsByClassName("totalRecords");
                      console.log('ccc',cls.length)
                      for (var i = 0; i < cls.length; i++) {
                          //cls.item(i).id
                       console.log('cls',cls.item(i).id);
                        if (cls.item(i).id == tblNames[0]) {
                          cls.item(i).innerHTML = r.rows[0].nr;
                          tblNames.shift()
                          break;
                        }
                      }
                     //cls.item(resa).innerHTML = r.rows[0].nr;
                     // var dd = document.getElementById(no_rec[p].tbl_name);
                     // dd.innerHTML = r.rows[0].nr;
  			            	//console.log("rss",resa,r.rows[0].nr, r.rows[0].tbl_name);	
                      //qwerty += '<th >'+resultVar+'</th>';		            	
              	    });
                    
                  //   console.log('key',qwerty); 

                    qwerty += '</tr>';
                    //console.log(qwerty);
                    $("#dbtab").append(qwerty);
                } 
              });
              
               // var cls = document.getElementsByClassName("totalRecords");
               // console.log('ad',cls)
                // for (var n=0, length = cls.length; n < length; n++) {
                //   //cls[n].id= "oct_" + (n + 1);
                //   console.log('n',n,cls[n].id) 
                // }   
              // tx.executeSql('SELECT COUNT(*) AS nr FROM categories' ,[],function (tx, r){
              //     var temp = r.rows[0];
              //     resultVar =  temp.nr;
              //      console.log('ads',cls.length)
              //     console.log('aa',resultVar);  

              //     //qwerty += '<th >'+resultVar+'</th>';                 
              //   });              

            });

             // console.log('tbl',localStorage.getItem("names"));
            }

            

            function CountExecute(countSql,tx){
            	var resultVar;
            	tx.executeSql(countSql ,[],function (tx, r){
            	var asdfg = r.rows[0];
            	resultVar =  asdfg.nr;
            	});

                console.log('dqd',resultVar);

                        }


        $("#ExecuteSql").click(function(){

          var sql = $("#rawSql").val();

          db.transaction(function (tx) {
            tx.executeSql(sql, [], querySuccess, errorCB);   
          });
        });


  //       $("#ExecuteMultipleSql").click(function(){
		// 	var sql = $("#rawSql").val();
		// 	sql = sql.trim();
		// 	var res = sql.split(";");

		// 	db.transaction(function (tx) {

		// 		for(var c = 0;c < res.length;c++){
		// 			tx.executeSql(res[c], [], querySuccess, errorCB);
		// 	}

                
                
  //           });

			
			
		// });

         function querySuccess(tx, results) {
            $("#qwerty").empty();
             getAllTablesFromDB();
             
            var len = results.rows.length;
                if(len > 0) {

                    var firstRow = results.rows['0'];
                    var tableData = results.rows;
                    //console.log('td',tableData);
                    const propOwn = Object.getOwnPropertyNames(firstRow);

                    var NewHeader = '<tr>';
                    
                    for(var i = 0 ; i < propOwn.length ; i++){
                     
                    NewHeader += '<th>'+propOwn[i]+'</th>';

                    }

                    NewHeader += '</tr>';
                    $("#qwerty").append(NewHeader);

                    for(var j = 0 ; j < tableData.length; j++){

                        var temp = Object.values(tableData[j]);

                        var NewRow = "<tr>";
                        for(var k = 0 ; k < propOwn.length ; k++){

                            NewRow += '<td>'+temp[k]+'</td>';
                        }

                        NewRow += '</tr>';
                        $("#qwerty").append(NewRow);
                       
                    }



             }
             else{
                var sql = $("#rawSql").val();
                if(sql.search(/create/i) >= 0){
                	var SuccessMessage = '<tr><th>Success</th></tr>';
                }
                if(sql.search(/select/i) >= 0){
                	var SuccessMessage = '<tr><th>No Results Found</th></tr>';
                }
                if(sql.search(/insert/i) >= 0){
                	var SuccessMessage = '<tr><th>New Row Inserted</th></tr>';
                }
                if(sql.search(/update/i) >= 0){
                	var SuccessMessage = '<tr><th>Row Updated</th></tr>';
                }
                if(sql.search(/delete/i) >= 0){
                	var SuccessMessage = '<tr><th>Row deleted</th></tr>';
                }
                $("#qwerty").append(SuccessMessage);
            }

        }

        function errorCB(tx,err) {
            alert(err.message);
        }


    </script>


</body>
</html>