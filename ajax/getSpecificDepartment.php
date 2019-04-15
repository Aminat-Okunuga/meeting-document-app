<?php
/**
 * Created by PhpStorm.
 * User: Aminat
 * Date: 3/21/2018
 * Time: 11:18 PM
 */

include '../auto_load.php';
if (isset($_GET['collegeId']) && !empty($_GET['collegeId'])) {
    $collegeId = $_GET['collegeId'];

    $dept = $department->getCollegeDepartment($collegeId);
    if ($dept != "") {
        foreach ($dept as $row) {
            $department->setDepartment($row['id']); ?>
            <option value="<?php echo $department->getId(); ?> ">
                <?php echo $department->getName(); ?>
            </option>

            <?php
        }
    } else {
        ?>
        <option value="">Select Department</option>
        <?php
    }
}else {
    ?>
    <option value="">Select Department</option>
    <?php
}

