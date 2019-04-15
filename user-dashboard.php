<?php
include_once 'session.php';
include_once 'standardheader.php';
include_once 'front_constants.php'; ?>
<head>
    <title>User Dashboard</title>
</head>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/8.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>User Dashboard</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li>User Dashboard</li>
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
                <div>
                    <a href="user-uploaded-documents.php" class="btn btn-primary"> See Documents</a>
                    <a href="document-upload.php" class="btn btn-primary" style="margin-left: 650px; margin-bottom: 20px;"> Upload Document</a>
                </div>

                <table class="table table-striped table-condensed table-bordered" id="pad">
                    <tr>
                        <th  style="text-align: center;">S/N</th>
                        <th style="text-align: center;">MEETING NUMBER</th>
                        <th>NUMBER OF DOCUMENT</th>
                    </tr>

                    <tr>
                        <?php
                        $document->getDocuments();
                        $result = $document->getApprovedDocuments();
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
