<?php
include_once 'session.php';
include_once '../auto_load.php';
include_once "constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Department</title>
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
                Department
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo ADD_DEPARTMENT; ?>" class="btn btn-success">Add Department</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Department</li>
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
                            <th>NAMES OF DEPARTMENT</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $result = $department->getDepartments();
                        if ($result != "") {
                            $x = 0;
                            foreach ($result as $row) {
                                $department->setDepartment($row['id']);
                                $member->setRankId($member->getRankId());
                                ?>
                                <tr>
                                    <td><?php echo ++$x; ?></td>
                                    <td>
                                        <?php
                                        echo $department->getName();
                                        ?>
                                    </td>
                                    <!-- display the result from the department table-->
                                    <td>
                                        <a href="<?php echo DEPARTMENT_CONTROLLER; ?>?edit_id=<?php echo $department->getId(); ?>"
                                           class="btn btn-success glyphicon glyphicon-edit"
                                           title="Edit Department"></a>
                                        <a href="<?php echo DEPARTMENT_CONTROLLER; ?>?delete_id=<?php echo $department->getId(); ?>"
                                           class="btn btn-danger glyphicon glyphicon-remove"
                                           title="Delete Department"
                                           onclick="return ConfirmDelete();"></a>
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


                            $per_page = 2;

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
                            $results = $pages->getDepartmentPages();
                            //                                                        echo $results;exit();
                            $count = ceil($results / $per_page);
                            for($i = 1; $i <= $count; $i++) {

                                if($i == $page){
                                    echo "<li class=\"active\"><a href=\"view-departments.php?page={$i}\">{$i}</a></li>";
                                }else {
                                    echo "<li><a href=\"view-departments.php?page={$i}\">{$i}</a></li>";
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
    function ConfirmDelete(){
        var del = confirm('Are you sure you want to delete this?');
        if (del == true) {
            return true;
        }
        else{
            return false;
        }
    }
</script>
<!-- jQuery 3 -->
<?php include_once JS; ?>
</body>
</html>
