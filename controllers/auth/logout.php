<?php
session_start();
session_unset();
session_destroy();
header("Location: /expensepro_plus/views/auth/login.php");
exit;
