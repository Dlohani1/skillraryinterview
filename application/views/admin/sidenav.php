        <?php
         $adminId = $_SESSION['admin_id'];
         $roleId = $_SESSION['role_id'];
         ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php 
                            if ($roleId == 1) {?>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                MCQs
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/create-test";?>>Create</a>
                                    <a class="nav-link" href=<?php echo base_url()."admin/view-mcq";?>>View</a>
                                </nav>
                            </div>
                            <?php } ?>
                            <?php
                                if ($adminId == 1) {?>
                              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/create-roles";?>>Add Roles</a>
                                    <a class="nav-link" href=<?php echo base_url()."admin/create-users";?>>Create Users</a>
                                </nav>
                            </div>
                        <?php } 
                        if ($roleId == 1 ) {?>
                             <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsQ" aria-expanded="false" aria-controls="collapseLayoutsQ"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
             
                                Questions
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsQ" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/add-question";?>>Create</a>
                                    <a class="nav-link" href=<?php echo base_url()."admin/view-questions";?>>View</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsR" aria-expanded="false" aria-controls="collapseLayoutsR"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Results
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsR" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/view-results";?>>View</a>
                                </nav>
                            </div>

                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsI" aria-expanded="false" aria-controls="collapseLayouts"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                INTERVIEW
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsI" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/create-interview";?>>Create</a>
                                    <!-- <a class="nav-link" href=<?php //echo base_url()."admin/view-interview";?>>View</a> -->
                                </nav>
                            </div>
                        </div>
                    </div>
                        <?php } else {/*?>
                             <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsQ" aria-expanded="false" aria-controls="collapseLayoutsQ"
                                >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>             
                                Users
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayoutsQ" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href=<?php echo base_url()."admin/add-question";?>>Create</a>
                                    <a class="nav-link" href=<?php echo base_url()."admin/view-questions";?>>View</a>
                                </nav>
                            </div>

                            <?php 
				*/ }?>

                    
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php 
                if ($roleId == "7") {
                    echo "SkillRary Proctor";
                } else if ($roleId == "6") {
                    echo "SkillRary Interviewer";
                } else {
                    echo "SkillRary Admin";
                }
                ?>
                       
                    </div>
                </nav>
            </div>
