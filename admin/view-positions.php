<?php
include_once 'session.php';
include_once '../auto_load.php';
include_once "constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Positions</title>
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
                Positions
            </h1>
            <ol class="breadcrumb">
                <li><a href="add-position.php" class="btn btn-success">Add Position</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Positions</li>
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
                    <table class="table table-bordered table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Positions</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $result = $position->getPositions();
                        if($result != ""){
                            $x = 0;
                            foreach ($result as $row) {
                                $position->setPosition($row['id']);
                                ?>
                                <tr>
                                    <td><?php echo ++$x; ?></td>
                                    <td>
                                        <?php
                                        echo $position->getName();
                                        ?>
                                    </td>
                                    <!-- display the result from the department table-->

                                    <td>
                                        <a  href="<?php echo POSITION_CONTROLLER; ?>?view_id=<?php echo $position->getId();?>"
                                            class="btn btn-success glyphicon glyphicon-list" title="View Position Details"></a>
                                        <a  href="<?php echo POSITION_CONTROLLER; ?>?edit_id=<?php echo $position->getId();?>"
                                            class="btn btn-success glyphicon glyphicon-edit" title="Edit Position"></a>
                                        <a href="<?php echo POSITION_CONTROLLER; ?>?delete_id=<?php echo $position->getId();?>"
                                           class="btn btn-danger glyphicon glyphicon-remove"
                                           onclick="return ConfirmDelete();" title="Delete Position"></a>
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
