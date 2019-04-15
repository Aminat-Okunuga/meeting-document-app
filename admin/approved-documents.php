<?php
include_once 'session.php';
include_once '../auto_load.php';
include_once "constants.php";

//if (!isset($_GET['id']) || empty($_GET['id'])) {
//    header('location: '.VIEW_DOCUMENTS);
//}
//$approveDocId = $_GET['id'];
//$document->setDocument($approveDocId);;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin |Approved Document</title>
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
                Approved Document
            </h1>
            <ol class="breadcrumb">
<!--                <li><a href="--><?php //echo UPLOAD_DOCUMENT;?><!--" class="btn btn-primary">Approve Document</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Document</li>
            </ol>
        </section>

        <?php
        include_once '../message_alert.php';
        ?>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-striped table-condensed">
                        <thead>
                        <tr>
                            <th style="width: 10px">S/N</th>
                            <th>DOCUMENT TITLE</th>
                            <!--                            <th>COLLEGE DEAN</th>-->
                            <!--                            <th>RANK</th>-->
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $document->getDocuments();
//                        $result = $pages->getApprovedDocuments();
                        $result = $document->getApprovedDocuments();
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
                                        <a href="<?php echo DOCUMENT_CONTROLLER; ?>?disapprove=<?php echo $document->getId(); ?>"
                                           class="btn btn-success glyphicon glyphicon-minus-sign"
                                           title="Disapprove Document">
                                        </a>
                                        <a href="<?php echo DOCUMENT_CONTROLLER; ?>?delete_id=<?php echo $document->getId();?>"
                                           class="btn btn-danger glyphicon glyphicon-remove"
                                           title="Delete Document"
                                           onclick="return ConfirmDelete();"></a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }else{?>
                            <tr>
                                <td colspan="6" style="text-align: center;">Table Empty</td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>

<!--                    Pagination-->
                    <div class="pagination-nav d-flex justify-content-center">
                        <ul class="pagination">
                            <li><a href="#">«</a></li>
                            <?php
                            $per_page = 4;

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
                            $results = $pages->getApprovedPages();
                            //                            echo $results;exit();
                            $count = ceil($results / $per_page);
                            for($i = 1; $i <= $count; $i++) {

                                if($i == $page){
                                    echo "<li class=\"active\"><a href=\"approved-documents.php?page={$i}\">{$i}</a></li>";
                                }else {
                                    echo "<li><a href=\"approved-documents.php?page={$i}\">{$i}</a></li>";
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

<!-- jQuery 3 -->
<?php include_once JS; ?>
</body>
</html>
