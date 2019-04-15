<?php
session_start();
include_once 'standardheader.php';
//include 'auto_load.php';
include_once 'front_constants.php';

$err = "";
$success = "";

?>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/6.jpg'); height: 100px;">
    <div class="container">
        <div class="pagination-area">
            <h1>Registration</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li>Registration</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary">
    <div class="container">

        <h2 class="sidebar-title">Registration</h2>
        <div class="registration-details-area inner-page-padding">
            <fieldset style="border: 1px solid #000088; padding: 20px;">
                <form role="form" action="controllers/member.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <?php require_once 'message_alert.php'; ?>
                            <div class="form-group">
                                <label class="control-label" for="user-name">User Name *</label>
                                <input type="text" name="username" id="user-name" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="password">Password *</label>
                                <input type="password" name="password" id="pass" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="first-name">First Name *</label>
                                <input type="text" name="fname" id="first-name" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="other-name">Other Name *</label>
                                <input type="text" name="oname" id="other-name" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="last-name">Last Name *</label>
                                <input type="text" name="lname" id="last-name" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
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
                                            <option value="<?php echo $college->getId(); ?>">
                                                <?php echo $college->getName(); ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                            <div class="form-group">
                                <label>Department:</label>
                                <select class="form-control" name="department" id="department">
                                    <option value="">Select Department</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="email">E-mail Address *</label>
                                <input type="email" name="email" id="email" class="form-control" required="">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label class="control-label" for="phone">Phone *</label>
                                <input type="text" name="phone" id="phone" class="form-control" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                                        <option value="<?php echo $position->getId(); ?>"><?php echo $position->getName(); ?></option>
                                        <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
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
                                        <option value="<?php echo $rank->getId(); ?>"><?php echo $rank->getName(); ?></option>
                                        <?php
                                    }

                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="pLace-order mt-30">
                                <button class="view-all-accent-btn disabled" name="register" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label class="check">Already have an account? </label> <span><a
                                href="login.php">Login</a></span>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>
<!-- Registration Page Area End Here -->
<?php include_once 'standardfooter.php'; ?>
<!-- jQuery 3 -->
<script src="assets/js/custom.js"></script>
<!--<script src="admin/asset/js/custom.js"></script>-->
