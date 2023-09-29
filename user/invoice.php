<?php
require './../lib/db.php';

$userId = $_GET['user_id'];
$roomId = $_GET['room_id'];
$checkIn = $_GET['check_in'];
$checkOut = $_GET['check_out'];
$bookingId = $_GET['booking_id'];
$message = $_GET['message'];
$class = $_GET['class'];
$conn = $GLOBALS['conn'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="invoice.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <?php require('inc/links.php'); ?> -->

</head>

<body>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="invoice-title">
                    <h2>Invoice</h2>
                    <?php
                    echo "<h3 class='pull-right'>Order #ID $bookingId</h3>";
                    ?>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Data Pemesan:</strong>
                            <?php
                            $sql = "SELECT * FROM user WHERE id = $userId";
                            $res = mysqli_query($conn, $sql);
                            $user = mysqli_fetch_assoc($res);
                            echo "<br>$user[name]<br>";
                            echo "$user[address]<br>";
                            echo "$user[phone]<br>";
                            echo "$user[email]<br>";
                            ?>
                            <br>
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">

                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <address>

                            <?php

                            ?>
                            <strong>Pembayaran : </strong><br>
                            Transfer : "..." (No Rekening Pemesan)<br>
                            emailpemesan@email.com
                        </address>
                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Tanggal Order:</strong>
                            <?php
                            $now = date('d M Y');
                            echo "<br>$now<br>";
                            ?>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Rincian Pesanan</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Check-In</strong></td>
                                        <td class="text-center"><strong>Harga</strong></td>
                                        <td class="text-center"><strong>Kuantitas</strong></td>
                                        <td class="text-center"><strong>Total</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                    <tr>
                                        <?php
                                        $sql = "SELECT * FROM room WHERE id = $roomId";
                                        $res = mysqli_query($conn, $sql);
                                        $room = mysqli_fetch_assoc($res);
                                        echo "<td>$room[name]</td>";
                                        echo "<td class='text-center'>$checkIn</td>";
                                        echo "<td class='text-center'>$room[price]</td>";
                                        echo "<td class='text-center'>1</td>";
                                        echo "<td class='text-right'>$room[price]</td>";

                                        ?>
                                    </tr>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"><strong>Keterangan</strong></td>
                                        <td class="text-right">Sudah Terbayar</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <p class="text-danger bg-danger">
                            <b>*Pastikan anda menyimpan bukti invoice ini</b>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <button id="generatePdfButton" class="btn btn-primary">Print</button>
        </div>
    </div>

    <script>
        document.getElementById('generatePdfButton').addEventListener('click', function () {
            this.style.display = 'none';
            window.print();

            this.style.display = 'block';
        });
    </script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</html>