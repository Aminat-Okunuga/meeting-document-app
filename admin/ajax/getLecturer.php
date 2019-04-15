<?php
include '../../auto_load.php';
if (isset($_GET['departmentId']) && !empty($_GET['departmentId'])) {
    $departmentId = $_GET['departmentId'];

    $lec = $lecturer->getDeptLecturers($departmentId);
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
}else {
    ?>
    <option value="">Select Lecturer</option>
    <?php
}

