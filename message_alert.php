<?php
//success messages for admin actions
if (!empty($_SESSION['successMessage'])) {?>

<div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?php echo $_SESSION['successMessage']; ?></strong> 
</div>

<?php unset($_SESSION['successMessage']);
}

//error messages for admin actions
if (!empty($_SESSION['errorMessage'])) {?>

<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong><?php echo $_SESSION['errorMessage']; ?></strong>
</div>

<?php unset($_SESSION['errorMessage']);
}

?>
