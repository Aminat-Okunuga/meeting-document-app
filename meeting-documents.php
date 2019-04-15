<?php
include 'session.php';
include 'standardheader.php';
include 'front_constants.php';
?>
<head>
    <title>Documents</title>
</head>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/6.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Documents</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li>Documents</li>
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
                <p align="justify"><b>See documents uploaded for download for different colleges and units in the school</b> </p>

                <table class="table table-striped table-condensed table-bordered" id="pad">
                    <tr>
                        <th>S/N</th>
                        <th>COLLEGE / UNITS</th>
                        <th>NUMBER OF DOCUMENTS</th>
                    </tr>
                    <tr>
                   <?php
                        $result = $college->getColleges();
                            if($result != ""){
                                $x = 0;
                                foreach ($result as $row) {
                                    $college->setCollege($row['id']);
                        ?>
                        <td><?php echo ++$x;?></td>
                       <td style="text-align: left;">
                           <a href="<?php echo COLLEGE_DOCUMENT_CONTROLLER;?>?college=<?php echo $college->getId(); ?>"> <?php echo $college->getName(); ?></a>
                       </td>

                        <td>
                            <?php echo $document->getCollegeApproveDocumentNumber($college->getId());?>
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
