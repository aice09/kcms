<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">PDF Viewer</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><?php echo getenv('SYS_NAME') ?></a>
            </div> 
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">  
                <?php 
                    if (isset($_SESSION['system_logged_in'])==false) { 
                ?>
                <li><a href="index.php">Login</a></li>
                <?php 
                } else { ?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="dist/img/fixtures/default_employee_img.jpg" style="width: 30px" class="profile-image img-circle">   <?php echo $_SESSION['system_userlastname'] ?>  <b class="caret"></b></a>
                        
                        <ul class="dropdown-menu">
                            <li><a href="index.php?page=docs">Go Home</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="index.php?page=help">Help</a></li>
                            <li><a href="index.php?page=settings">Settings</a></li>
                            <li><a href="index.php?page=changepass">Change Password</a></li>
                            <li><a href="javascript:void(0);" onclick="logout('1');">Sign Out</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard.php?page=dashboard"><i class="fa fa-sliders fa-fw"></i> Dashboard</a>
                        </li>
                        <li class="nav_foldericon">
                            <a href="#"><i  class="fa fa-folder-o fa-fw"></i> My Account <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!-- <li> <a href="#">Daily Symptoms Checklist <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li> <a href="dashboard.php?page=checklist-symptoms">My Daily Records</a></li>
                                        <li> <a href="dashboard.php?page=checklist-symptoms-all">All Employee Records</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li> <a href="#">Profile </a> </li>
                                <li> <a href="dashboard.php?page=myprofile-calendar">Calendar </a> </li>
                                <li> <a href="#">Work Contacts </a> </li>
                                <li> <a href="#">Attendance <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li> <a href="dashboard.php?page=employee-workingdays">Working Days</a></li>
                                        <li> <a href="dashboard.php?page=employee-absent">Absent</a></li>
                                        <li> <a href="dashboard.php?page=employee-leaves">Leave</a></li>
                                        <li> <a href="dashboard.php?page=employee-overtime">Overtime</a></li>
                                        <li> <a href="dashboard.php?page=employee-undertime">Undertime</a></li>
                                    </ul>
                                </li>
                                <li> <a href="#">Salary <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li> <a href="dashboard.php?page=employee-payslip">Payslip</a></li>
                                        <li> <a href="dashboard.php?page=employee-thirtenth-month-pay">13th Month Pay</a></li>
                                        <li> <a href="dashboard.php?page=employee-salary-calculator">Salary Calcutator</a></li>
                                    </ul>
                                </li> --><!-- 
                                <li> <a href="#">Medical Records <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li> <a href="dashboard.php?page=checklist-symptoms">Daily Symptoms Checklist</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </li> 
                        <li class="nav_foldericon">
                            <a href="#"><i  class="fa fa-folder-o fa-fw"></i> FSC <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="dashboard.php?page=fsc001">FSC Items</a></li>
                                <li> <a href="dashboard.php?page=fsccategory">FSC Category</a></li>
                                <li> <a href="dashboard.php?page=fscexport">FSC Export</a></li>
                            </ul>
                        </li>  
                        <!-- <li class="nav_foldericon">
                            <a href="#"><i  class="fa fa-folder-o fa-fw"></i> IMPEX <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="#">References  <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li> <a href="dashboard.php?page=impex-seafreight-forwarders">Accredited Seafreight Forwarders</a></li>
                                    </ul>
                                </li>
                                <li> <a href="#">List 1</a></li>
                            </ul>
                        </li>  --> 
                        <!-- <li class="nav_foldericon">
                            <a href="#"><i  class="fa fa-folder-o fa-fw"></i> Pre-press <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="dashboard.php?page=ppress-todo">To Do</a></li>
                                <li> <a href="dashboard.php?page=ppress-done">Done</a></li>
                            </ul>
                        </li> -->                             
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <script>
            $('.nav_foldericon').click(function() {
                $(this).find('i').toggleClass('fa-folder fa-folder-open-o')
            });
        </script>