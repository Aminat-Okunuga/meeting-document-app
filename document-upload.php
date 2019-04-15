<?php
include_once 'session.php';
include_once 'standardheader.php';
include_once 'front_constants.php';
include_once 'auto_load.php';
include_once 'message_alert.php';

$err = "";
$success = "";

// my method for upload
if (isset($_POST['upload'])) {
    //var_dump($_POST); die();
    if (empty($_POST['document_title']) || empty($_FILES['document']['name'])) {
        $_SESSION['errorMessage'] = "document title or name required";
        header('location:document-upload.php');
    }
    if (empty($_POST['document_title'])) {
        $_SESSION['errorMessage'] = "Document title required";
        header('location:document-upload.php');
    }
    if (empty($_POST['college'])) {
        $_SESSION['errorMessage'] = "College required";
        header('location:document-upload.php');
    }
    if (empty($_POST['meeting'])) {
        $_SESSION['errorMessage'] = "Meeting number required";
        header('location:document-upload.php');
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
            header('location: document-upload.php');
        } else {
            move_uploaded_file($documentTemp, ADMIN_DOCUMENT_UPLOADS . $documentName);
            $document_title = $_POST['document_title'];
            $collegeId = $_POST['college'];
            $meetingId = $_POST['meeting'];
            $dateUploaded = date('y-m-d');

            if ($document->uploadDocument($document_title, $documentName, $collegeId, $meetingId, $dateUploaded)) {
                $_SESSION['successMessage'] = "Document successfully uploaded";
            } else {
                header('location:user-dashboard.php');
                $_SESSION['errorMessage'] = "Document can not be uploaded at the moment";
            }
        }
    }
}
?>
<head>
    <title>Document upload</title>
</head>
<!-- Inner Page Banner Area Start Here -->
<div class="inner-page-banner-area" style="background-image: url('img/banner/6.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Document Upload</h1>
            <ul>
                <li><a href="index.php">Home</a> -</li>
                <li><a href="user-dashboard.php">Dashboard</a> -</li>
                <li>Documents</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Registration Page Area Start Here -->
<div class="registration-page-area bg-secondary">
    <div class="container"><h4 style="color: green;">
            <div class="row">
                <div class="col-xs-6 ">
                    <?php require_once 'message_alert.php'; ?>
                </div>
            </div>
        <h2 class="sidebar-title">Document Upload</h2>
        <div class="registration-details-area inner-page-padding">
            <fieldset style="border: 1px solid #000088; padding: 20px;">
                <form role="form" action="document-upload.php" method="POST"
                      enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
                                <div class="form-group">
                                    <label>Document Title:</label>
                                    <input type="text" name="document_title" id="title" class="form-control" required=""
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
                                                <option value="<?php echo $meeting->getMeetingId(); ?>"  ><?php echo $meeting->getMeetingNumber(); ?></option>
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
                                                    <option value="<?php echo $college->getId(); ?>"  ><?php echo $college->getName(); ?></option>
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
                        <a href="user-dashboard.php" class="btn btn-primary">Back</a>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</div>
<!-- Registration Page Area End Here -->
<?php include_once 'standardfooter.php'; ?>
<!-- jQuery 3 -->
<script src="assets/js/custom.js"></script>
