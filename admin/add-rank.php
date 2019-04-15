<?php
include_once 'session.php';
include_once "constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Add-Ranks</title>
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
                Add Rank
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo VIEW_RANKS; ?>"><i class="fa fa-dashboard"></i> Ranks</a></li>
                <li class="active">Add Rank</li>
            </ol>
        </section>

        <?php include_once '../message_alert.php';?>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-body no-padding">
                    <section class="content">
                        <div class="box box-success">


                            <form role="form" action="<?php echo RANK_CONTROLLER; ?>" method="POST">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <input type="text" name="name" class="form-control" required="" placeholder= "Rank Name Here...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" name="add" class="btn btn-success">Add Rank</button>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content -->
    <!-- /.content-wrapper -->
    <?php include_once FOOTER; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?php include_once JS; ?>
</body>
</html>