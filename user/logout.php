<?php
session_destroy();
// header('location: /index');
require './lib/essentials.php';
redirect('index');

?>