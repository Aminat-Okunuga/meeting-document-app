<?php
include_once 'session.php';
include_once '../auto_load.php';
include_once "constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Dashboard</title>
    <?php include_once CSS; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include_once HEADER; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include_once SIDEBAR; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
<!--                <small>Control panel</small>-->
            </h1>
            <ol class="breadcrumb">
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <?php $result = $document->getDocuments();  ?>
                            <h3>
                                <?php echo count($result);?>
                            </h3>

                            <p>Documents</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="ion ion-bag"></i> -->
                            <i class="fa fa-book"></i>
                        </div>
                        <a href="view-documents.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!--for memebers-->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <?php $result = $member->getMember();?>
                            <h3>
                                <?php echo count($result);?>
                            </h3>

                            <p>Members</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="ion ion-bag"></i> -->
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="view-members.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!--for colleges-->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <?php $result = $college->getColleges();  ?>
                            <h3>
                                <?php echo count($result);?>
                            </h3>

                            <p>Colleges</p>
                        </div>
                        <div class="icon">
                            <!-- <i class="ion ion-bag"></i> -->
                            <i class="fa fa-files-o"></i>
                        </div>
                        <a href="view-colleges.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <?php $result = $department->getDepartments();  ?>
                            <h3>
                                <?php echo count($result);?>
                            </h3>

                            <p>Departments</p>
                        </div>
                        <div class="icon">
                            <!--  <i class="ion ion-stats-bars"></i> -->
                            <i class="fa fa-th"></i>
                        </div>
                        <a href="view-departments.php" class="small-box-footer">More info <i
                                    class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once FOOTER; ?>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<?php include_once JS; ?>
</body>
</html>
