<?php
include_once 'session.php';
include_once "constants.php";
include_once "../auto_load.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Add-Member</title>
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
                Add Member
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo VIEW_MEMBERS; ?>"><i class="fa fa-dashboard"></i> Members</a></li>
                <li class="active">Add Member</li>
            </ol>
        </section>
        <?php include_once '../message_alert.php'; ?>

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
                                                <label>Username:</label>
                                                <input type="text" name="username" class="form-control" required=""
                                                       placeholder="Your username Here...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Password:</label>
                                                <input type="password" name="password" class="form-control" required=""
                                                       placeholder="Your password Here...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>First Name:</label>
                                                <input type="text" name="fname" class="form-control" required=""
                                                       placeholder="Your First Name Here...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Surname:</label>
                                                <input type="text" name="sname" class="form-control" required=""
                                                       placeholder="Your Surname Here...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Other Names:</label>
                                                <input type="text" name="oname" class="form-control" required=""
                                                       placeholder="Your Other Names Here...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="email" name="email" class="form-control" required=""
                                                       placeholder="Your Email Here...">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Phone:</label>
                                                <input type="text" name="phone" class="form-control" required=""
                                                       placeholder="Your Phone Number Here...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                                            <div class="form-group">
                                                <label>Rank:</label>
                                                <select class="form-control" name="rank" required="">
                                                    <option value="">Select Rank</option>
                                                    <?php
                                                    $rank_result = $rank->getRanks();

                                                    foreach ($rank_result as $item) {
                                                        $rank->setRank($item['id']);
                                                        ?>
                                                        <option style="text-transform: capitalize" value="<?php echo $rank->getId(); ?>"><?php echo $rank->getName(); ?></option>
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
                                                    <option value="">Select Position</option>
                                                    <?php
                                                    $position_result = $position->getPositions();

                                                    foreach ($position_result as $item) {
                                                        $position->setPosition($item['id']);
                                                        ?>
                                                        <option style="text-transform: capitalize" value="<?php echo $position->getId(); ?>"><?php echo $position->getName(); ?></option>
                                                        <?php
                                                    }

                                                    ?>
                                                </select>
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
                                                    if ($col != ""){
                                                        foreach ($col as $item) {
                                                            $college->setCollege($item['id']);
                                                            ?>
                                                            <option style="text-transform: capitalize" value="<?php echo $college->getId(); ?>">
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
                                                <select class="form-control" name="department" required="" id="department">
                                                    <option value="">Select Department</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>


                        <div class="box-footer">
                            <button type="submit" name="add" class="btn btn-success">Add Member</button>
                        </div>
                        </form>
                    </section>
                </div>
        </section>
    </div>
</div>
</section>
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