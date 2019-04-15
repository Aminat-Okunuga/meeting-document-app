<?php
include 'session.php';
include 'standardheader.php';
include 'front_constants.php';
?>
<head>
    <title>Previous Meetings</title>
</head>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/6.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Previous Meetings</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li><a href="meetings.php">Meetings</a> -</li>
                <li>Previous Meetings</li>
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
                <p align="justify"><b>Our previous meetings.</b></p>

                <table class="table table-striped table-condensed table-bordered" id="pad">
                    <tr>
                        <th  style="text-align: center;">S/N</th>
                        <th style="text-align: center;">MEETING NUMBER</th>
                        <th>NUMBER OF DOCUMENTS</th>
                    </tr>

                    <tr>
                        <?php
                        $result = $meeting->getMeetings();

                        if($result != ""){
                                $x = 0;

                                foreach ($result as $row) {
                                    $meeting->setMeeting($row['meeting_id']);
                                    $document->setDocument($row['meeting_id']);
                                    $document->getApprovedMeetingDocumentNumber($row['meeting_id']);

                        ?>
                        <td><?php echo ++$x;?></td>
                       <td>
                           <a href="<?php echo FRONT_MEETING_CONTROLLER;?>?meeting=<?php echo $meeting->getMeetingId(); ?>"> <?php echo $meeting->getMeetingNumber(); ?></a>
                       </td>

                        <td>
                            <?php echo $document->getApprovedMeetingDocumentNumber($meeting->getMeetingId());?>
<!--                            --><?php //echo $document->getMeetingDocumentNumber($meeting->getMeetingId(), $documentStatus);?>
<!--                            <h1>--><?php //echo $document->getDocumentStatus(); ?><!--</h1>-->
                        </td>

                    </tr>
                       <?php }} ?>

                </table>
            </div>
            <?php include_once 'college-sidebar.php'; ?>
        </div>
    </div>
</div>
<!-- Lecturers Page 2 Area End Here -->
<?php include 'standardfooter.php'; ?>
