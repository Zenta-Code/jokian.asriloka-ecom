<?php
require './../../lib/db.php';
require './../../lib/controller/token.php';
require './../../lib/essentials.php';

if (isset($_POST['id']) && isset($_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $sql = "UPDATE booking SET status = ? WHERE id = ?";
    $res = update($sql, [$status, $id], 'si');

    if ($res) {
        echo json_encode(['status' => 'success', 'message' => 'Booking status updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Booking status updated failed']);
    }


}