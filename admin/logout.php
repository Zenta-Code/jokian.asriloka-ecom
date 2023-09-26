<?php
require '../lib/essentials.php';

session_start();
session_destroy();
redirect('index');
?>