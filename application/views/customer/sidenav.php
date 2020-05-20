<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts"
                        >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        MCQs
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href=<?php echo base_url()."customer/mcq-list";?>>View</a>
                           <!--  <a class="nav-link" href=<?php //echo base_url()."admin/mcq-customers";?>>View Customers</a> -->
                            
                            <!-- <a class="nav-link" href=<?php //echo base_url()."admin/view-mcq";?>>View</a> -->
                             
                        </nav>
                    </div>

                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsCustomer" aria-expanded="false" aria-controls="collapseLayoutsCustomer"
                        >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Interviews
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayoutsCustomer" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href=<?php echo base_url()."customer/create-interviewe";?>>Create</a>
                            <a class="nav-link" href=<?php echo base_url()."customer/view-interview";?>>View</a>
                            <a class="nav-link" href=<?php echo base_url()."customer/create-interviewers";?>>Add Interviewer</a>
                        </nav>
                    </div>
<!--                     <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts"
                        >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Users
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href=<?php //echo base_url()."admin/create-roles";?>>Add Roles</a>
                            <a class="nav-link" href=<?php //echo base_url()."admin/create-users";?>>Create Users</a>
                        </nav>
                    </div> -->

                     <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsQ" aria-expanded="false" aria-controls="collapseLayoutsQ"
                        >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
     
                        Questions
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayoutsQ" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href=<?php echo base_url()."customer/add-section";?>>Add Section</a>
                             <a class="nav-link" href=<?php echo base_url()."customer/upload-question";?>>Upload Question</a>
                            <a class="nav-link" href=<?php //echo base_url()."admin/add-question";?>>Create</a>
                            <a class="nav-link" href=<?php //echo base_url()."admin/view-questions";?>>View</a>
                        </nav>
                    </div>
                    <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsR" aria-expanded="false" aria-controls="collapseLayoutsR"
                        >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Results
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayoutsR" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href=<?php //echo base_url()."admin/view-results";?>>View</a>
                        </nav>
                    </div> -->

                    <!-- <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsI" aria-expanded="false" aria-controls="collapseLayouts"
                        >
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        INTERVIEW
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a> -->
                    <!-- <div class="collapse" id="collapseLayoutsI" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                           <a class="nav-link" href=<?php// echo base_url()."admin/create-interview";?>>Create</a> -->
                           <!-- <a class="nav-link" href=<?php //echo base_url()."admin/create-interview-customers";?>>Add Customers</a>
                            <a class="nav-link" href=<?php //echo base_url()."admin/interview-customers-list";?>>View Customers</a>
                        </nav>
                    </div> -->
                </div>
            </div>
               
            
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <p>SkillRary Customer</p>
               
            </div>
        </nav>
    </div>
