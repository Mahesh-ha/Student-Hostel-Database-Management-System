<?php
session_start();
unset($_SESSION['Reg_no']);
session_destroy();
header('Location:index.html');
?>
