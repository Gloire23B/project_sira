<?php
session_start();
session_destroy();

header("Location: views/v_index.php");
exit();
?>
