<?php
	session_start();
	include('../config/config.php');
	include('login_check.php');
?>
<head>
<title>Admin Panel</title>


<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">


<!-- Bootstrap Core CSS -->
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">

<!--Date time picker-->
<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css" />

<!-- MetisMenu CSS -->
<link href="../assets/css/metisMenu.min.css" rel="stylesheet">  

<!-- DataTables CSS -->
<link href="../assets/css/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="../assets/css/dataTables.responsive.css" rel="stylesheet">  

<!-- Font Awesome -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<!-- Admin CSS -->
<link href="../assets/css/admin.css" rel="stylesheet">


<!--multiple file upload -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="../assets/jquery.form.js"></script>


 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php">Tech 101</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Admin <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="change.php"><i class="fa fa-user fa-fw"></i> Change Password</a>
                        </li>                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                       
                       
                     <li>
                           <a href="#"><i class="fa fa-bus fa-fw"></i> Work categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               
                                <li>
                                    <a href="category.php"><i class="fa fa-laptop fa-fw"></i> Manage  Categories</a>
                                </li>
                            </ul>
                         
                        </li>
                        <li>
                           <a href="#"><i class="fa fa-briefcase fa-fw"></i> Our Works<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="works.php"><i class="fa fa-plus fa-fw"></i> Add Works</a>
                                </li>
                                <li>
                                    <a href="view_works.php"><i class="fa fa-eye fa-fw"></i> View all Works</a>
                                </li>
                               
                            </ul>
                         
                        </li>
                        <li>
                           <a href="#"><i class="fa fa-briefcase fa-fw"></i> Our Services<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="services.php"><i class="fa fa-plus fa-fw"></i> Add Services</a>
                                </li>
                                <li>
                                    <a href="view_services.php"><i class="fa fa-eye fa-fw"></i> View all Services</a>
                                </li>
                               
                            </ul>
                         
                        </li>
                        
                        
                        <li>
                           <a href="#"><i class="fa fa-comment fa-fw"></i> Manage Blogs<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blog.php"><i class="fa fa-plus fa-fw"></i> Write A Blog</a>
                                </li>
                                <li>
                                    <a href="view_blogs.php"><i class="fa fa-eye fa-fw"></i> View Blogs</a>
                                </li>
                               
                            </ul>
                            <!-- /.nav-second-level -->
                            
                        </li>
                       
                       
                         <li>
                            <a href="#"><i class="fa fa-calendar-check-o fa-fw"></i> Manage Clients <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="clients.php"><i class="fa fa-plus fa-fw"></i> Add Clients</a>
                                </li>
                                <li>
                                    <a href="view_clients.php"><i class="fa fa-eye fa-fw"></i> View Clients</a>
                                </li>
                            </ul>
                             
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-calendar-check-o fa-fw"></i> Manage Team members <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="team.php"><i class="fa fa-plus fa-fw"></i> Add Members</a>
                                </li>
                                <li>
                                    <a href="view_team.php"><i class="fa fa-eye fa-fw"></i> View Team</a>
                                </li>
                            </ul>
                             
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Success Stories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="stories.php"><i class="fa fa-plus fa-fw"></i> Add Stories</a>
                                </li>
                                <li>
                                    <a href="view_stories.php"><i class="fa fa-eye fa-fw"></i> View All Stories</a>
                                </li>
                            </ul>
                             
                        </li>
                          <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>  Counts <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="counts.php"><i class="fa fa-plus fa-fw"></i> Add  Counts</a>
                                </li>
                                <li>
                                    <a href="view_counts.php"><i class="fa fa-eye fa-fw"></i> View All Counts</a>
                                </li>
                            </ul>
                             
                        </li>
                         <li>
                        <a href="subscribe.php"><i class="fa fa-users fa-fw"></i> Newsletter<span
                                class="fa arrow"></span></a>
                    </li>


                       
                     </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        
       
<!--Page Wrapper Starts-->       
 <div id="page-wrapper">