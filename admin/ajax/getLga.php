<?php
include '../../auto_load.php';
if (isset($_GET['stateId']) && !empty($_GET['stateId'])) {
    $stateId = $_GET['stateId'];

    $lg = $lga->getStateLga($stateId);
    if ($lg != "") {
        foreach ($lg as $row) {
            $lga->setLga($row['id']); ?>
            <option value="<?php echo $lga->getId(); ?> ">
                <?php echo $lga->getName(); ?>
            </option>

            <?php
        }
    } else {
        ?>
        <option value="">Select LGA</option>
        <?php
    }
}else {
    ?>
    <option value="">Select LGA</option>
    <?php
}

