<?php
include_once 'session.php';
include_once "constants.php";
include_once "../auto_load.php";
//check if id is set
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location: ' . VIEW_MEMBERS);
}
$id = $_GET['id'];
$member->setMember($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Admin | Edit-Member</title>
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
                Edit Member
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo VIEW_MEMBERS ?>"><i class="fa fa-dashboard"></i> Member</a></li>
                <li class="active">Edit Member</li>
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

                            <form role="form" action="<?php echo MEMBER_CONTROLLER; ?>" method="POST"
                                  enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" name="id" class="form-control"
                                                       value="<?php echo $member->getId(); ?>">
                                                <label>Username:</label>
                                                <input type="text" name="username" class="form-control" required=""
                                                       value="<?php echo $member->getUserName(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" name="id" class="form-control"
                                                       value="<?php echo $member->getId(); ?>">
                                                <label>Password:</label>
                                                <input type="password" name="password" class="form-control" required=""
                                                       value="<?php echo $member->getPassword(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" name="id" class="form-control"
                                                       value="<?php echo $member->getId(); ?>">
                                                <label>First Name:</label>
                                                <input type="text" name="fname" class="form-control" required=""
                                                       value="<?php echo $member->getFirstName(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Surname:</label>
                                                <input type="text" name="sname" class="form-control" required=""
                                                       value="<?php echo $member->getLastName(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Other Names:</label>
                                                <input type="text" name="oname" class="form-control" required=""
                                                       value="<?php echo $member->getOtherName(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email" name="email" class="form-control" required=""
                                                       value="<?php echo $member->getEmail(); ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Phone:</label>
                                                <input type="text" name="phone" class="form-control" required=""
                                                       value="<?php echo $member->getPhoneNumber(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>College:</label>
                                                <select class="form-control" name="college" required=""
                                                        onchange="getSpecificDepartments(this.value)">
                                                    <option value="">Select College</option>
                                                    <?php
                                                    $col = $college->getColleges();
                                                    if ($col != "") {
                                                        foreach ($col as $item) {
                                                            $college->setCollege($item['id']);
                                                            ?>
                                                            <option value="<?php echo $college->getId(); ?>" <?php if ($college->getId() == $member->getCollegeId()) echo "selected"; ?>>
                                                                <?php echo $college->getName(); ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Department:</label>
                                                <select class="form-control" name="department" required=""
                                                        id="department">
                                                    <option value="<?php echo $department->getId(); ?>"> Select
                                                        Department
                                                    </option>
                                                    <option value="<?php echo $department->getId(); ?>" <?php if ($department->getId() == $member->getDepartmentId()) echo "selected"; ?>>
                                                        <?php echo $department->getName(); ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Rank:</label>
                                                <select class="form-control" name="rank" required="">
                                                    <option value="<?php $member->getRankId() ?>">Select Rank</option>
                                                    <?php
                                                    $rank_result = $rank->getRanks();

                                                    foreach ($rank_result as $item) {
                                                        $rank->setRank($item['id']);
                                                        ?>
                                                        <option value="<?php echo $rank->getId(); ?>" <?php if ($rank->getId() == $member->getRankId()) echo "selected"; ?> >
                                                            <?php echo $rank->getName(); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Position:</label>
                                                <select class="form-control" name="position" required="">
                                                    <option value="<?php $member->getPositionId(); ?>">Select Position
                                                    </option>
                                                    <?php
                                                    $position_result = $position->getPositions();

                                                    foreach ($position_result as $item) {
                                                        $position->setPosition($item['id']);
                                                        ?>
                                                        <option value="<?php echo $position->getId(); ?>" <?php if ($position->getId() == $member->getPositionId()) echo "selected"; ?> >
                                                            <?php echo $position->getName(); ?></option>
                                                        <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="update" class="btn btn-success">Update Member</button>
                        </div>
                        </form>
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
<script src="assets/js/custom.js"></script>
</body>
</html>