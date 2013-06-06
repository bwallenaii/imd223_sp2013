<?php

session_start();
$_SESSION['uid'] = null;
//session_destroy(); //option for a deeper clean
header("Location: ./");