
             <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">INVIGILATORS</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Invigilators</li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                

  <div class="container-fluid">
                                <div class="container">
                                <div class="row">
        <div class="col-md-12">
        <h4>List</h4>






        <div class="table-responsive">
              	<table id="mytable" class="table table-bordred table-striped">
                   <thead>
                   		<th>Sl no</th>
                        <th>User Id</th>
						<th>Invigilator</th>
						<th>MCQ</th>
						<th>MCQ ID</th>
                        <th>Actions</th>
                        
                   </thead>
    			<tbody>


		

    				<?php 
		      
    				$i = 1;
        foreach($data as $temp) {
		
    	 	
    
            echo '<tr><td>'.$i.'</td><td>'.$temp->id.'</td><td>'.$temp->first_name.'</td><td>'.$temp->title.'</td><td>'.$temp->mcqid.'</td>
      <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="'.base_url().'customer/invigilator-view-mcq-data/'.$temp->id.'"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></p></td></tr>';

      	$i++;
         }
        ?>


		


    
  
    
   
    
   
    
    			</tbody>
        
				</table>
				<div class="clearfix"></div>

                
            </div>
            
        </div>
  </div>
</div>


                                </div>
                            </div>
                        </div>
                        <div style="height: 100vh;"></div>
                        <div class="card mb-4">
                            
                        </div>
                    </div>
                </main>



