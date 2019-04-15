<?php
include_once 'session.php';
include_once '../auto_load.php';
include_once "constants.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Document</title>
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
            <h1> Document </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo UPLOAD_DOCUMENT; ?>" class="btn btn-success">Upload Document</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Document</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-6 ">
                    <?php require_once '../message_alert.php'; ?>
                </div>
            </div>
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                            <th style="width: 10px">S/N</th>
                            <th>DOCUMENT TITLE</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = $document->getDocuments();
                        if ($result != "") {
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }else{
                                $page = 1;
                            }
                            $per_page = $document->PerPage();
//                            $x = $page * 1 + ($page - 1);
                            $x = ((($page - 1) * $per_page) + 1);
                            foreach ($result as $row) {
                                $document->setDocument($row['id']);
                                ?>
                                <tr>
                                    <td><?php echo $x++; ?></td>
                                    <td>
                                        <?php
                                        echo $document->getDocumentTitle();
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo ADMIN_DOCUMENT_UPLOAD . $document->getDocumentName(); ?>"
                                           class="btn btn-success glyphicon glyphicon-download-alt"
                                           title="Download Document">
                                        </a>
                                        <a href="<?php echo DOCUMENT_CONTROLLER; ?>?approve=<?php echo $document->getId(); ?>"
                                           class="btn btn-success glyphicon glyphicon-ok"
                                           title="Approve Document">
                                        </a>
                                        <a href="<?php echo DOCUMENT_CONTROLLER; ?>?disapprove=<?php echo $document->getId(); ?>"
                                           class="btn btn-success glyphicon glyphicon-minus-sign"
                                           title="Disapprove Document">
                                        </a>
                                        <a href="<?php echo DOCUMENT_CONTROLLER; ?>?delete_id=<?php echo $document->getId(); ?>"
                                           class="btn btn-danger glyphicon glyphicon-remove"
                                           onclick="return ConfirmDelete();" title="Delete Document">

                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Table Empty</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

                    <div class="pagination-nav d-flex justify-content-center">
                        <ul class="pagination">
                            <li><a href="#">«</a></li>
                            <?php
                            $per_page = 5;//number of items per page

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = 1;
                            }

                            if ($page == "" || $page == 1) {
                                $page_1 = 0;
                            } else {
                                $page_1 = ($page * $per_page) - $per_page;
                            }
                            $results = $pages->getAllDocumentPages();
                            $count = ceil($results / $per_page);
                            for($i = 1; $i <= $count; $i++) {
                                if($i == $page){
                                    echo "<li class=\"active\"><a href=\"view-documents.php?page={$i}\">{$i}</a></li>";
                                }else {
                                    echo "<li><a href=\"view-documents.php?page={$i}\">{$i}</a></li>";
                                }
                            }
                            ?>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box-body -->
                <!-- /.box -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include_once FOOTER; ?>
</div>
<!-- ./wrapper -->

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
<!-- jQuery 3 -->
<?php include_once JS; ?>
</body>
</html>
