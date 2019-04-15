<?php
include 'session.php';
include 'standardheader.php';
?>
<head>
    <title>Meetings</title>
</head>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/8.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Meetings</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li>Meetings</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Lecturers Page 2 Area Start Here -->
<div class="lecturers-page2-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="isotop-classes-tab isotop-btn-accent">
                    <a href="previous-meeting.php"class="current">Previous Meetings</a>
                    <?php $dateCreated = $meeting -> getDateCreated();
                          $meetingId = $meeting -> getMeetingId();

                    ?>
                    <a href="next-meeting.php?next-meeting=<?php echo $meeting->getCurrentMeeting($dateCreated, $meetingId);?>">Next Meeting</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Lecturers Page 2 Area End Here -->
<?php include 'standardfooter.php'; ?>
