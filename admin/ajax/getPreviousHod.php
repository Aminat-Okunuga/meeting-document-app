<?php
/**
 * Created by PhpStorm.
 * User: Aminat
 * Date: 3/23/2018
 * Time: 10:14 AM
 */

include '../../auto_load.php';
if (isset($_GET['departmentId']) && !empty($_GET['departmentId'])) {
    $departmentId = $_GET['departmentId'];

    $preHod = $hod->getPreviousHod($departmentId);
    if ($preHod != "") {
        $x = 0;
        foreach ($preHod as $value) {
            $hod->setHod($value['id']);
            $department->setDepartment($hod->getDepartmentId());
            $lecturer->setLecturer($hod->getLecturerId());


            ?>
            <tr>
                <td class="mcontent"><?php echo ++$x; ?></td>
                <td class="mcontent">
                    <?php
                    echo $lecturer->getFirstName() . ' ' . $lecturer->getOtherName() . ' ' . $lecturer->getSurName();
                    ?>
                </td>

                <td class="mcontent">
                    <?php
                    echo $hod->getDateAdded();
                    ?>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <tr>
            <td colspan="3" style="text-align: center;" class="mcontent">
                Table Empty
            </td>
        </tr>
        <?php
    }
}
?>
