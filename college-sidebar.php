<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
    <div class="sidebar">
        <div class="sidebar-box">
            <div class="sidebar-box-inner">
                <h3 class="sidebar-title">Colleges/Offices/Units</h3>
                <ul class="sidebar-categories">
                    <li>
                        <?php
                        $result = $college->getColleges();
                        if ($result != "") {
                            $x = 0;
                            foreach ($result as $row) {
                                $college->setCollege($row['id']);
                                echo '<a href="controllers/college.php?college=' . $college->getId() . '"><strong>' . $college->getName() . '</strong></a><br/>';
                            }
                        } ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>