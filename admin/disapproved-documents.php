<?php
include_once 'session.php';
include_once '../auto_load.php';
include_once "constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin |Disapproved Document</title>
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
                Disapproved Document
            </h1>
            <ol class="breadcrumb">
<!--                <li><a href="--><?php //echo UPLOAD_DOCUMENT;?><!--" class="btn btn-primary">Disapprove Document</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
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
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $result = $document->getDisapprovedDocuments();
                        if($result != ""){
                            $x = 0;
                            foreach ($result as $row) {
                                $document->setDocument($row['id']);
                                ?>
                                <tr>
                                    <td><?php echo ++$x; ?></td>
                                    <td>
                                        <?php
                                        echo $document->getDocumentTitle();
                                        ?>
                                    </td>
                                    <td>
                                        <a  href="<?php echo DOCUMENT_UPLOAD. $document->getDocumentName();?>"
                                            class="btn btn-success glyphicon glyphicon-remove-circle"
                                            title="Disapprove Document"></a>
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

                            $per_page = 2;

                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            } else {
                                $page = "";
                            }

                            if ($page == "" || $page == 1) {
                                $page_1 = 0;
                            } else {
                                $page_1 = ($page * $per_page) - $per_page;
                            }
                            $results = $pages->getDiasapprovedPages();
                            //                            echo $results;exit();
                            $count = ceil($results / $per_page);
                            //                            $result = $pages->getApprovedDocuments();
                            //                            $count = 4;
                            for($i = 1; $i <= $count; $i++) {

                                if($i == $page){
                                    echo "<li class=\"active\"><a href=\"disapproved-documents.php?page={$i}\">{$i}</a></li>";
                                }else {
                                    echo "<li><a href=\"disapproved-documents.php?page={$i}\">{$i}</a></li>";
                                }
                            }
                            ?>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box-body -->
                <!-- /.box -->
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
