<?php
include_once 'session.php';
include_once "constants.php";
include_once "../auto_load.php";
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: ' . VIEW_COLLEGES);
}
$id = $_GET['id'];
$college->setCollege($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Edit-College</title>
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
                Edit College
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo VIEW_COLLEGES; ?>"><i class="fa fa-dashboard"></i> College</a></li>
                <li class="active">Edit College</li>
            </ol>
        </section>
        <div class="row">
            <div class="col-xs-6 ">
                <?php require_once '../message_alert.php'; ?>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-body no-padding">
                    <section class="content">
                        <div class="box box-success">
                            <form role="form" action="<?php echo COLLEGE_CONTROLLER; ?>"
                                  method="POST" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-5 col-md-5 col-lg-5 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" name="id" class="form-control"
                                                       value="<?php echo $college->getId(); ?>">
                                                <label>College Name:</label>
                                                <input type="text" name="name" class="form-control" required=""
                                                       value="<?php echo $college->getName(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" name="update" class="btn btn-success">Update College </button>

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