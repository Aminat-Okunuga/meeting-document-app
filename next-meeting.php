<?php
include 'session.php';
include 'standardheader.php'; ?>
<head>
    <title>Next Meeting</title>
</head>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/6.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Next Meeting</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li><a href="meetings.php">Meetings</a> -</li>
                <li>Next Meeting</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Lecturers Page 2 Area Start Here -->
<div class="lecturers-page2-area">
    <div class="container" id="inner-isotope">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <p align="justify" ">Our Next Meeting. </p>
                <?php
                    if(isset($_GET['next-meeting'])){
                        $dateCreated = "date(now())";
                       $meetingId = $meeting->getMeetingId();
//                       echo $meetingId; exit();
                        ?>

                <br>The next meeting (meeting number <?php echo $meeting->getCurrentMeeting($dateCreated, $meetingId);?>) will be holding as follows:
                <br><b> Date:</b><?php echo $meeting->getMeetingDate();?>
                <br>
                <b> Venue:</b><?php echo $meeting->getMeetingVenue();?>
                </h3>
                   <?php }else{?>
                        <h3>The next next meeting has not been decided upon by the Registrar</h3>

                   <?php }
                ?>
            </div>
            <?php include_once 'college-sidebar.php'; ?>
        </div>
    </div>
</div>
<!-- Lecturers Page 2 Area End Here -->
<?php include 'standardfooter.php'; ?>
