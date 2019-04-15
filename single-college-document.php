<?php
include 'session.php';
include 'standardheader.php';
include_once "front_constants.php";
include_once "auto_load.php";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $collegeId = $_GET['id'];
    $college->setCollege($collegeId);
}


?>
<head>
    <title>Meeting Documents </title>
</head>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/6.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1><?php echo $college->getName(); ?>  Meeting Documents</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li><a href="previous-meeting.php">Meeting Documents</a> -</li>
                <li><?php echo $college->getName(); ?> </li>
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
                <p align="justify"><b>Available meeting documents for <?php echo $college->getName();?></b></p>

                <table class="table table-striped table-condensed table-bordered" id="pad">
                    <tr>
                        <th>S/N</th>
                        <th>MEETING DOCUMENT</th>
                    </tr>

                    <tr>
                        <?php
                        if (isset($_GET['id']) && !empty($_GET['id'])) {
                        $collegeId = $_GET['id'];
                        $collegeDoc = $document->getApprovedCollegeDocuments($collegeId);
                        $x = 0;
                        if ($collegeDoc != "") {
                        foreach ($collegeDoc as $row) {
                        $document->setDocument($row['id']);
                        $x++;
                        ?>
                        <td><?php echo $x; ?></td>
                        <td style="text-align: left;">
                            <a href="<?php echo ADMIN_DOCUMENT_UPLOADS. $document->getDocumentName();?>"> <?php echo $document->getDocumentTitle(); ?></a>
                        </td>

                    </tr>
                    <?php }
                    }
                    else {
                        ?>
                        <tr>
                            <td colspan="6" style="text-align: center;">No document uploaded</td>
                        </tr>
                        <?php
                    }
                    }?>

                </table>
            </div>
            <?php include_once 'college-sidebar.php'; ?>
        </div>
    </div>
</div>
<?php include 'standardfooter.php'; ?>
