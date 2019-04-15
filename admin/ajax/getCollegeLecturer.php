<?php
include_once '../../auto_load.php';
/**
 * Created by PhpStorm.
 * User: Aminat
 * Date: 3/21/2018
 * Time: 11:31 PM
 */
if (isset($_GET['collegeId']) && !empty($_GET['collegeId'])) {
    $collegeId = $_GET['collegeId'];

    $lec = $lecturer->getCollegeLecturers($collegeId);
    if ($lec != "") {
        foreach ($lec as $row) {
            $lecturer->setLecturer($row['id']); ?>
            <option value="<?php echo $lecturer->getId(); ?> ">
                <?php echo $lecturer->getFirstName() . " " . $lecturer->getSurName(); ?>
            </option>

            <?php
        }
    } else {
        ?>
        <option value="">Select Lecturer</option>
        <?php
    }
} else {
    ?>
    <option value="">Select Lecturer</option>
    <?php
}
?>