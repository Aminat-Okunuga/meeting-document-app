<?php

/**
 * @param Position $position
 * @param string $loginPageUrl
 */
function authenticateUser(Position $position, $loginPageUrl){
        if ($position->getAlias() == Position::REGISTRAR) {
            header('location: ../admin/index.php');
        } else if ($position->getAlias() == Position::DIRECTOR || $position->getAlias() == Position::DEAN) {
            header('location: ../user-dashboard.php');
        } else if ($position->getAlias() == Position::MEMBER) {
            header('location: ../meetings.php');
    } else {
        $_SESSION['errorMessage'] = "Invalid login details. You are not yet a registered member";
        header('location: ' . $loginPageUrl);
    }
}