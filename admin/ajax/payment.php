<?php

require './../../lib/db.php';
require './../../lib/controller/token.php';
require './../../lib/essentials.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['action']) && $_REQUEST['action'] === 'pembayaran') {

    $data = $_POST;
    $user = $data['user_id'];
    $room = $data['room_id'];
    $payment = $data['payment_method'];
    $check_in = $data['check_in'];
    $check_out = $data['check_out'];
    $hari = (strtotime($check_out) - strtotime($check_in)) / 86400;

    $conn = $GLOBALS['conn'];

    $sql = "SELECT * FROM user WHERE id = $user";
    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($res);
    unset($user['password']);

    $sql = "SELECT * FROM booking WHERE roomId = $room";
    $res = mysqli_query($conn, $sql);
    $bookings = mysqli_fetch_all($res, MYSQLI_ASSOC);
    if ($check_in > $check_out) {
        echo json_encode([
            'status' => 'failed',
            'message' => 'Tanggal check in tidak boleh lebih besar dari tanggal check out'
        ]);
        die();
    }

    foreach ($bookings as $booking) {
        if ($check_in >= $booking['checkIn'] && $check_in < $booking['checkOut']) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Kamar sudah dipesan pada tanggal tersebut'
            ]);
            die();
        }

        if ($check_out > $booking['checkIn'] && $check_out <= $booking['checkOut']) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Kamar sudah dipesan pada tanggal tersebut'
            ]);
            die();
        }
        if ($check_in < date('Y-m-d')) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Tanggal check in tidak boleh lebih kecil dari tanggal hari ini'
            ]);
            die();
        }
        if ($check_in == $booking['checkIn']) {
            echo json_encode([
                'status' => 'failed',
                'message' => 'Kamar sudah dipesan pada tanggal tersebut'
            ]);
            die();
        }
    }

    $sql = "SELECT * FROM room WHERE id = $room";
    $res = mysqli_query($conn, $sql);
    $room = mysqli_fetch_assoc($res);

    $total_price = $room['price'] * $hari;
    $total_price = $total_price + ($total_price * 0.1);


    echo json_encode([
        'status' => 'success',
        'total_price' => $total_price,
        'user' => $user,
        'room' => $room,
        'hari' => $hari,
        'payment' => $payment,
        'check_in' => date('Y-m-d'),
        'check_out' => date('Y-m-d', strtotime('+' . $hari . ' days')),
    ]);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['action']) && $_REQUEST['action'] === 'konfirmasi') {
    $data = $_POST;
    $user = $data['user_id'];
    $room = $data['room_id'];
    $check_in = $data['check_in'];
    $check_out = $data['check_out'];

    $conn = $GLOBALS['conn'];

    $sql = "INSERT INTO booking (userId, roomId, checkIn, checkOut) VALUES (?, ?, ?, ?)";
    $res = update($sql, [$user, $room, $check_in, $check_out], 'iiss');

    if ($res) {
        $message = "Booking was successful!";
        $class = "success";
    } else {
        $message = "Booking failed. Please try again.";
        $class = "failed";
    }

    $sql = "SELECT * FROM user WHERE id = $user";
    $res = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($res);
    unset($user['password']);

    $sql = "SELECT * FROM room WHERE id = $room";
    $res = mysqli_query($conn, $sql);
    $room = mysqli_fetch_assoc($res);

    $sql = "SELECT * FROM booking WHERE userId = $user[id] AND roomId = $room[id] AND checkIn = '$check_in' AND checkOut = '$check_out'";
    $res = mysqli_query($conn, $sql);
    $booking = mysqli_fetch_assoc($res);

    // redirect to invoice with brings all the data
    header("Location: ./../../user/invoice.php?booking_id=$booking[id]&user_id=$user[id]&room_id=$room[id]&check_in=$check_in&check_out=$check_out&message=$message&class=$class");

}

?>