<?php
include_once 'session.php';
include_once '../auto_load.php';
include_once "constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Documents</title>
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
                Documents
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo ADD_COURSE;?>" class="btn btn-primary">Upload Document</a></li>&nbsp;&nbsp;&nbsp;&nbsp;
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Documents</li>
            </ol>
        </section>

        <div><?php include_once '../message_alert.php';?></div>


        <!-- Main content -->
        <section class="content">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <table class="table table-bordered table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <!--                                        <th>DOCUMENT CODE</th> -->
                            <th>DOCUMENT TITLE</th>
                            <!--                                        <th>COURSE UNIT</th>-->
                            <!--                                        <th>NUMBER OF LECTURERS</th>-->
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $result = $course->getCourse();
                        if($result != ""){
                            $x = 0;
                            foreach ($result as $row) {
                                $course->setCourse($row['id']);

                                ?>
                                <tr>
                                    <td><?php echo ++$x; ?></td>
                                    <!--                                    <td>-->
                                    <!--                                        --><?php //
                                    //                                        echo $course->getCourseCode();
                                    //                                        ?>
                                    <!--                                    </td> -->
                                    <td>
                                        <?php
                                        echo $course->getCourseTitle();
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo COURSE_CONTROLLER; ?>?view_id=<?php echo $course->getId(); ?>"
                                           class="btn btn-success glyphicon glyphicon-list" title="View Document Details"></a>
                                        <a  href="#" class="btn btn-success glyphicon glyphicon-edit" title="Approve Document"></a>
                                        <a  href="#" class="btn btn-success glyphicon glyphicon-plus" title="Disapprove Document"></a>
                                        <a href="<?php echo COURSE_CONTROLLER; ?>?delete_id=<?php echo $course->getId();?>"
                                           class="btn btn-danger glyphicon glyphicon-remove"
                                           onclick="return ConfirmDelete();" title="Delete Document"></a>
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
