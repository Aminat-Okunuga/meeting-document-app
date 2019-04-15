<?php
include_once 'session.php';
include_once "constants.php";
include_once "../auto_load.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: '.VIEW_MEETINGS);
}
$meetingId = $_GET['id'];
$meeting->setMeeting($meetingId);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Edit-Meeting</title>
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
                Edit Meeting
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo EDIT_MEETING; ?>"><i class="fa fa-dashboard"></i> Meetings</a></li>
                <li class="active">Edit Meeting</li>
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

                            <form role="form" action="<?php echo MEETING_CONTROLLER; ?>" method="POST">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" name="meeting_id" class="form-control" value="<?php echo $meeting->getMeetingId();?>">
                                                <label>Meeting Number:</label>
                                                <input type="text" name="meeting_number" class="form-control" required="" value="<?php echo $meeting->getMeetingNumber();?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" name="meeting_id" class="form-control" value="<?php echo $meeting->getMeetingId();?>">
                                                <label>Meeting Date:</label>
                                                <input type="date" name="meeting_date" class="form-control" required="" value="<?php echo $meeting->getMeetingNumber();?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4col-xs-12">
                                            <div class="form-group">
                                                <label>Meeting Venue</label>
                                                <textarea name="meeting_venue" class="form-control" style="height: 200px">

                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" name="update" class="btn btn-success">Update Meeting</button>
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