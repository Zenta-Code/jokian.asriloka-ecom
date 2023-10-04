<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pemesanan </title>
    <?php require('./admin/inc/links.php'); ?>
</head>

<body>
    <?php require('./inc/header.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4  mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <?php
                        if (isset($_SESSION['data'])) {
                            if ($user['picture'] != null || $user['picture'] != '') {
                                echo "<img src='assets/images/user/$user[picture]' class='card-img-top' alt='...'>";
                            } else {
                                echo "<img src='assets/images/user/default.jpg' class='card-img-top' alt='...'>";
                            }
                            echo "<h5 class='card-title'>$user[name]</h5>";
                            echo "<p class='card-text'>$user[email]</p>";
                            echo "<p class='card-text'>$user[phone]</p>";
                            echo "<p class='card-text'>$user[address]</p>";
                        } else {
                            echo "<h5 class='text-center'>Silahkan login terlebih dahulu</h5>";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION['data'])) {
                            echo "<h5 class='card-title'>Pemesanan</h5>";
                            $sql = "SELECT * FROM booking WHERE userId = ?";
                            $res = select($sql, [$user['id']], 'i');
                            while ($row = mysqli_fetch_assoc($res)) {
                                $booking[] = $row;
                            }
                            foreach ($booking as $key => $value) {
                                if ($value['roomId'] == null) {
                                    // fetch bundling
                                    $sql = "SELECT * FROM bundling WHERE id = ?";
                                    $res = select($sql, [$value['bundlingId']], 'i');

                                    // append bundling
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $room[] = $row;
                                    }

                                } else {
                                    // fetch room
                                    $sql = "SELECT * FROM room WHERE id = ?";
                                    $res = select($sql, [$value['roomId']], 'i');

                                    // append room
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $room[] = $row;
                                    }

                                }
                            }
                            $html = "<table class='table table-striped'>";
                            $html .= "<thead>";
                            $html .= "<tr>";
                            $html .= "<th scope='col'>No Pemesaan</th>";
                            $html .= "<th scope='col'>Room</th>";
                            $html .= "<th scope='col'>Check In</th>";
                            $html .= "<th scope='col'>Check Out</th>";
                            $html .= "<th scope='col'>Total Price</th>";
                            $html .= "<th scope='col'>Status</th>";
                            $html .= "<th scope='col'>Invoice</th>"; 
                            $html .= "</tr>";
                            $html .= "</thead>";
                            $html .= "<tbody>";
                            foreach ($booking as $key => $value) {
                                $html .= "<tr>";
                                $html .= " <th scope='row'>$value[id]</th>";
                                $html .= "<td>";
                                foreach ($room as $k => $v) {
                                    if ($v['id'] == $value['roomId']) {
                                        $html .= "$v[name]";
                                        break;
                                    }
                                    if ($v['id'] == $value['bundlingId']) {
                                        $html .= "$v[name]";
                                        break;

                                    }
                                }

                                $html .= "<td>" . date('Y-m-d', strtotime($value['checkIn'])) . "</td>";
                                $html .= "<td>" . date('Y-m-d', strtotime($value['checkOut'])) . "</td>";
                                $html .= "<td>$value[totalPrice]</td>";
                                $html .= "<td>$value[status]</td>";
                                if ($value['status'] == 'BOOKED') {
                                    $_SESSION['sukses'] = "Segera lakukan pembayaran untuk mengkonfirmasi pemesanan anda";
                                    $html .= "<td><span class='text-danger'>Belum Dibayar</span></td>";
                                } else {
                                    $html .= "<td><a href='invoice.php?booking_id=$value[id]&user_id=$user[id]&room_id=$value[roomId]&check_in=$value[checkIn]&check_out=$value[checkOut]' class='btn btn-primary'>Invoice</a></td>";
                                }


                                $html .= "</tr>";
                            }
                            $html .= "</tbody>";
                            $html .= "</table>";
                            echo $html;
                        }
                        ?>

                    </div>
                </div>

            </div>
            <?php
            if (isset($_SESSION['data'])) {
                echo "<h5 class='text-center mt-5'>No Rekening Hotel</h5>";
                echo "<span class='pl-5'>Transfer ke nomor rekening <strong>di bawah ini</strong></span>";
                echo "<span class='pl-5'>Dengan mencantumkan <strong>nomor pemesanan</strong></span>";
                echo "<div class='card m-4 p-4'>";
                echo "<h4>BCA</h4>";
                echo "<h5>1234567890</h5>";
                echo "</div>";
                echo "<div class='card m-4 p-4'>";
                echo "<h4>BCA</h4>";
                echo "<h5>1234567890</h5>";
                echo "</div>";
            }
            ?>

        </div>
    </div>
</body>
<?php require('./admin/inc/scripts.php'); ?>
<?php

if (isset($_SESSION['data'])) {
    require('./inc/footer.php');
}

?>

</html>