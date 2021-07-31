<?php
session_start();
session_unset($_SESSION['auth']);
session_destroy();
header('Location:index.php');