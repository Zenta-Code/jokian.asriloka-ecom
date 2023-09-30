<?php
$token = $_COOKIE['token'];
$user = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Profile </title>
    <?php require('./admin/inc/links.php'); ?>
</head>

<body>
    <?php require('./user/inc/header.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4  mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <?php
                        echo "<img src='../assets/images/user/$user[picture]' class='card-img-top' alt='...'>";
                        echo "<h5 class='card-title'>$user[name]</h5>";
                        echo "<p class='card-text'>$user[email]</p>";
                        echo "<p class='card-text'>$user[phone]</p>";
                        echo "<p class='card-text'>$user[address]</p>";
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">History</h5>
                        <?php
                        $sql = "SELECT * FROM booking WHERE userId = ?";
                        $res = select($sql, [$user['id']], 'i');
                        while ($row = mysqli_fetch_assoc($res)) {
                            $booking[] = $row;
                        }
                        foreach ($booking as $key => $value) {
                            $sql = "SELECT * FROM room WHERE id = ?";
                            $res = select($sql, [$value['roomId']], 'i');
                            while ($row = mysqli_fetch_assoc($res)) {
                                $room[] = $row;
                            }
                        }

                        $html = "<table class='table table-striped'>";
                        $html .= "<thead>";
                        $html .= "<tr>";
                        $html .= "<th scope='col'>#</th>";
                        $html .= "<th scope='col'>Room</th>";
                        $html .= "<th scope='col'>Check In</th>";
                        $html .= "<th scope='col'>Check Out</th>";
                        $html .= "</tr>";
                        $html .= "</thead>";
                        $html .= "<tbody>";
                        foreach ($booking as $key => $value) {
                            $html .= "<tr>";
                            $html .= "<th scope='row'>$key</th>";
                            $html .= "<td>";
                            foreach ($room as $k => $v) {
                                if ($v['id'] == $value['roomId']) {
                                    $html .= "$v[name]";
                                }
                            }

                            $html .= "<td>$value[checkIn]</td>";
                            $html .= "<td>$value[checkOut]</td>";
                            $html .= "</tr>";
                        }
                        $html .= "</tbody>";
                        $html .= "</table>";
                        echo $html;
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<?php require('./admin/inc/scripts.php'); ?>

</html>