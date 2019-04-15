<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 08-Apr-19
 * Time: 7:34 AM
 */
include_once 'session.php';
include_once 'standardheader.php';
include_once 'front_constants.php'; ?>
<head>
    <title>User Documents</title>
</head>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/8.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>User Documents</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li><a href="user-dashboard.php"> User Dashboard</a> -</li>
                <li>User Documents</li>
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
                <table class="table table-striped table-condensed table-bordered" id="pad">
                    <tr>
                        <th style="text-align: center; text-transform: uppercase">S/N</th>
                        <th style="text-align: center; text-transform: uppercase">Documents</th>
                        <th style="text-align: center; text-transform: uppercase">Action</th>
                    </tr>

                    <tr>
                        <?php
                        if(isset($_SESSION['user_id'])){
                            $collegeId = $member->getCollegeId();
                            $result = $document->getCollegeDocument($collegeId);
                            if($result != ""){
                            $x = 0;

                            foreach ($result as $row) {
                            $document->setDocument($row['id']);
                        ?>
                        <td><?php echo ++$x;?></td>
                        <td>
                            <a href="<?php echo ADMIN_DOCUMENT_UPLOADS. $document->getDocumentName();?>"> <?php echo $document->getDocumentTitle(); ?></a>
                        </td>

                        <td>
<!--                            <a href="--><?php //echo DOCUMENT_CONTROLLER; ?><!--?delete_id=--><?php //echo $document->getId();?><!--"-->
<!--                                class="btn btn-danger glyphicon glyphicon-remove"-->
<!--                                onclick="return ConfirmDelete();" title="Delete Document"></a>-->
                            <a href="admin/controllers/documents.php?delete=<?php echo $document->getId();?>"
                                class="btn btn-danger glyphicon glyphicon-remove"
                                onclick="return ConfirmDelete();" title="Delete Document"></a>

                        </td>

                    </tr>
                    <?php   } }} ?>

                </table>
            </div>
            <?php include_once 'college-sidebar.php'; ?>
        </div>
    </div>
</div>
<!-- Lecturers Page 2 Area End Here -->
<?php include 'standardfooter.php'; ?>
<script type="text/javascript">
    function ConfirmDelete() {
        var del = confirm('Are you sure you want to delete this?');
        if (del == true) {
            return true;
        }
        else {
            return false;
        }
    }
</script>
