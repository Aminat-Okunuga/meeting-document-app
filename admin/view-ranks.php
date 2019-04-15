<?php
include_once 'session.php';
include_once '../auto_load.php';
include_once "constants.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Ranks</title>
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
                Ranks
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo ADD_RANK;?>" class="btn btn-success">Add Rank</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Ranks</li>
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
                    <table class="table table-bordered table-hover table-condensed">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Ranks</th>
                            <th>ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $result = $rank->getRanks();
                        if($result != ""){
                            $x = 0;
                            foreach ($result as $row) {
                                $rank->setRank($row['id']);
                                ?>
                                <tr>
                                    <td><?php echo ++$x; ?></td>
                                    <td>
                                        <?php
                                        echo $rank->getName();
                                        ?>
                                    </td>
                                    <!-- display the result from the department table-->

                                    <td>
                                        <a  href="<?php echo RANK_CONTROLLER; ?>?edit_id=<?php echo $rank->getId();?>"
                                            class="btn btn-success glyphicon glyphicon-edit" title="Edit Rank"></a>
                                        <a href="<?php echo RANK_CONTROLLER; ?>?delete_id=<?php echo $rank->getId();?>"
                                           class="btn btn-danger glyphicon glyphicon-remove"
                                           onclick="return ConfirmDelete();" title="Delete Rank"></a>
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
