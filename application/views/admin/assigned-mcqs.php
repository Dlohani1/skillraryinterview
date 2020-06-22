<input type="hidden" id="base-url" value="<?php echo base_url();?>"/>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4">MCQ Details</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">Details</li>
      </ol>
    <div class="card mb-4">
      <div class="card-body">
      <div class="container-fluid">
      <div class="container">
      <div class="row">
         <input type="hidden" id="base_url" name="base_url" value= "<?php echo base_url();?>" />
          <div class="col-md-12">
            <h4>Assigned Mcq List</h4>
            <div class="container">
              

    <div class="container">
      <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."proctor/assignedUsersSearch";?>>

          
      </form>
  </div>

        
        <div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
               <thead>
                <th>Sl.no</th>
                
                <th>Customer Name</th>
                <th>MCQs</th>
                <th>Action</th>
               </thead>

    	<tbody>

    		<?php 
		      
    				$i = 1;
        foreach($data as $temp) {
		
    	 	
    
            echo '<tr><td>'.$i.'</td><td>'.$temp->customer_name.'</td><td>'.$temp->title.'</td>
      <td><p data-placement="top" data-toggle="tooltip" title="Edit"><a href="'.base_url().'invigilator/view-mcq-data/'.$temp->mcqid.'"><button class="btn btn-primary btn-xs" ><span class="glyphicon glyphicon-eye-open"></span></button></a></p></td></tr>';

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
                            <!-- <div class="card-body">When scrolling, the navigation stays at the top of the page. This is the end of the static navigation demo.</div> -->
                        </div>
                    </div>
                </main>
