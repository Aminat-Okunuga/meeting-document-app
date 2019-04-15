<?php
include_once 'session.php';
include_once "constants.php";
include_once "../auto_load.php";
include_once '../message_alert.php';

// my method for upload
if (isset($_POST['upload'])) {
    //var_dump($_POST); die();
    if (empty($_POST['document_title']) || empty($_FILES['document']['name'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:upload-document.php');
    }
    if (empty($_POST['document_title'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:upload-document.php');
    }
    if (empty($_POST['college'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:upload-document.php');
    }
    if (empty($_POST['meeting'])) {
        $_SESSION['errorMessage'] = "Input Fields required";
        header('location:upload-document.php');
    } else {
        $documentName = $_FILES['document']['name'];
        $documentSize = $_FILES['document']['size'];
        $documentTemp = $_FILES['document']['tmp_name'];

        //track the valid document extensions
        $ext = array("pdf", "doc");
        //break the filename to an array
        $fileExt = explode(".", $documentName);
        //convert the last value in the $fileExt array to lower case
        $extension = strtolower(end($fileExt));

        if (!in_array($extension, $ext)) {
            $_SESSION['errorMessage'] = "Select a valid document type";
            header('location:upload-document.php');
        } else {
            move_uploaded_file($documentTemp, ADMIN_DOCUMENT_UPLOAD . $documentName);
            $document_title = $_POST['document_title'];
            $collegeId = $_POST['college'];
            $meetingId = $_POST['meeting'];
            $dateUploaded = date('y-m-d');

            if ($document->uploadDocument($document_title, $documentName, $meetingId, $collegeId, $dateUploaded)) {
                $_SESSION['successMessage'] = "Document successfully uploaded";
            } else {
                $_SESSION['errorMessage'] = "Document can not be uploaded at the moment";
            }
            header('location:view-documents.php');
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Upload Document</title>
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
                Upload Document
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo VIEW_DOCUMENTS; ?>"><i class="fa fa-dashboard"></i> Documents</a></li>
                <li class="active">Upload Document</li>
            </ol>
        </section>
        <div class="row">
            <div class="col-xs-3 ">
                <?php require_once '../message_alert.php'; ?>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-body no-padding">
                    <section class="content">
                        <div class="box box-primary">
                            <form role="form" action="upload-document.php" method="POST"
                                  enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Document Title:</label>
                                                <input type="text" name="document_title" id="title" class="form-control"
                                                       required=""
                                                       placeholder="document title here...">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label" for="document">Document *</label>
                                                <input type="file" name="document" required="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                            <div class="form-group">
                                                <label>Meeting</label>
                                                <select class="form-control" name="meeting" required="">
                                                    <option value="">Select meeting number</option>
                                                    <?php
                                                    $result = $meeting->getMeetings();

                                                    if ($result != "") {
                                                        foreach ($result as $row) {
                                                            $meeting->setMeeting($row['meeting_id']);
                                                            ?>
                                                            <option value="<?php echo $meeting->getMeetingId(); ?>"><?php echo $meeting->getMeetingNumber(); ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>College</label>
                                                    <select class="form-control" name="college" required="">
                                                        <option value="">Select college</option>
                                                        <?php
                                                        $result = $college->getColleges();

                                                        if ($result != "") {
                                                            foreach ($result as $row) {
                                                                $college->setCollege($row['id']);
                                                                ?>
                                                                <option value="<?php echo $college->getId(); ?>"><?php echo $college->getName(); ?></option>
                                                                <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                    </section>
                </div>
        </section>
    </div>
</div>
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
<?php include_once FOOTER; ?>
</div>
<!-- ./wrapper -->
<!-- jQuery 3 -->
<?php include_once JS; ?>
</body>
</html>