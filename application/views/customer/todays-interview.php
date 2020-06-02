            <?php 
              $customerId = $this->uri->segment(3);
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Interviews</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active"><?=ucfirst($customer);?></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">

                              <div class="container-fluid">
                                <div class="container">
                                <div class="row">

                               
        <div class="col-md-12">
        <h4>Interview Group</h4>


          <div class="container">
              <form id="myForm" autocomplete='off' enctype="multipart/form-data" method="GET" action=<?php echo base_url()."customer/todays-interview-search";?>>

                  <div class="searchBox">

                        <div class="row">

                              <div class="col-md-6 ">
                                <label>Search Interview</label>
                                <input type="date" id="searchdate" name="searchdate" class="form-control " placeholder="Search Date" value="<?php echo $searchdate; ?>" >
                              </div>

                              <div class="col-md-2 right" float='right'>
                                  <label>Search</label><br>
                                  <button type="submit" value="Submit">
                                    <i  style="font-size:28px;color:lightblue" class="fa fa-search"></i>
                                  </button>
                              </div>

                              <div class="col-md-1">
                                 <label></label>
                                 <input type="button" id="back" class="btn btn-primary" name="" value="Clear">
                              </div>
                        </div>
                  </div>
              </form>
          </div>


        <div class="table-responsive">
              <table id="mytable" class="table table-bordred table-striped">
                      <thead>
                        <th>S. No.</th>                    
                        <th>User Email</th>
                        <th>Interview Date</th>
                        <th>Interview Start Time</th>
                        <th>Interview End Time</th>
                      </thead>

                      <tbody>

                          <?php 
                            $i = $this->uri->segment(3);

                            if (count($todaysinterview) > 0)
                              foreach($todaysinterview as $key => $value) { 

                                  $orgDate = $value->interview_date;
                                  $newDate = date("d F, Y", strtotime($orgDate));  

                                  $orgInterview_start_time = $value->interview_time;
                                  $interview_start_time =  date('h:i A', strtotime($orgInterview_start_time));

                                  $orgInterview_end_time = $value->endtime;

                                  $orgInterview_end_time = date_format(date_create($orgInterview_end_time), 'h:i A');

                                  $i++;
                                  echo  '<tr>

                                            <td>'.$i.'</td>
                                            <td>'.$value->user_email.'</td>
                                            <td>'.$newDate.'</td> 
                                            <td>'.$interview_start_time.'</td> 
                                            <td>'.$orgInterview_end_time.'</td> 
                                            
                                        </tr>';
                              }
                          ?>

                      </tbody>
              </table>

              <p><?php echo $links; ?></p>

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



  <script>

     $('#back').click(function () {

        let baseUrl = '<?php echo base_url(); ?>';
        let url =  baseUrl+"customer/todays-interview";
        window.location.href = url;
      });

  </script>



