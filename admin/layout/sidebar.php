<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- /.search form -->
        <span>
            <a href="index.php"><img style="width: 138px; height: 101px; margin-left: 18px; margin-top: 10px;
	/* align-items: center; */
}
             align-items: center;" class="img-responsive"
                                     src="../img/funaablogo.jpg" alt="logo"></a>
        </span>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li>
                <a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-files-o"></i>
                    <span>Colleges/Offices/Units</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo ADD_COLLEGE; ?>"><i class="fa fa-circle-o"></i> Add College/Office/Unit</a></li>
                    <li><a href="<?php echo VIEW_COLLEGES; ?>"><i class="fa fa-circle-o"></i>All Colleges/Offices/Units</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Departments</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo ADD_DEPARTMENT ?>"><i class="fa fa-circle-o"></i> Add Department</a></li>
                    <li><a href="<?php echo VIEW_DEPARTMENTS ?>"><i class="fa fa-circle-o"></i>All Departments</a>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Members</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo ADD_MEMBER ?>"><i class="fa fa-circle-o"></i> Add Member</a></li>
                    <li><a href="<?php echo VIEW_MEMBERS ?>"><i class="fa fa-circle-o"></i>All Members</a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Meetings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo ADD_MEETING ?>"><i class="fa fa-circle-o"></i> Add Meeting</a></li>
                    <li><a href="<?php echo VIEW_MEETINGS ?>"><i class="fa fa-circle-o"></i>All Meetings</a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Documents</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo VIEW_DOCUMENTS ?>"><i class="fa fa-circle-o"></i>All Documents</a></li>
                    <li><a href="<?php echo APPROVED_DOCUMENTS ?>"><i class="fa fa-circle-o"></i>Approved Documents</a></li>
                    <li><a href="<?php echo DISAPPROVED_DOCUMENTS ?>"><i class="fa fa-circle-o"></i>Disapproved Documents</a></li>
                    <li><a href="<?php echo PENDING_DOCUMENTS ?>"><i class="fa fa-circle-o"></i>Pending Documents</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i>
                    <span>Ranks</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo ADD_RANK ?>"><i class="fa fa-circle-o"></i>Add Ranks</a></li>
                    <li><a href="<?php echo VIEW_RANKS ?>"><i class="fa fa-circle-o"></i>All Ranks</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i>
                    <span>Positions</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo ADD_POSITION ?>"><i class="fa fa-circle-o"></i> Add Positions</a></li>
                    <li><a href="<?php echo VIEW_POSITIONS ?>"><i class="fa fa-circle-o"></i>All positions</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Notification</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="compose-mail.php"><i class="fa fa-circle-o"></i> Send Notification</a></li>
                    <li><a href="<?php echo VIEW_MEETINGS ?>"><i class="fa fa-circle-o"></i>All Notifications</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="fa fa-lock"></i>
                    <span>Log Out</span>
                    <span class="pull-right-container">
                        <i class="fa fa-lock-left pull-right"></i>
                    </span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>