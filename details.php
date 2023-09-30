<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AW - DETAILS</title>

    <?php require('inc/links.php'); ?>

</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">More Details</h2>
        <hr>
    </div>

    <div class="container">
        <?php
        $type = '';
        $id = '';
        if (isset($_GET['type']) && isset($_GET['id'])) {
            $type = $_GET['type'];
            $id = $_GET['id'];
        }

        if ($type == 'room') {
            $sql = "SELECT * FROM room WHERE id =  $id";
            $res = mysqli_query($conn, $sql);
            $room = mysqli_fetch_assoc($res);

            $sql = "SELECT * FROM facilityonroom WHERE roomId = $id";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $facility[] = $row;
            }

            foreach ($facility as $key => $value) {
                $sql = "SELECT * FROM facility WHERE id = ?";
                $res = select($sql, [$value['facilityId']], 'i');
                while ($row = mysqli_fetch_assoc($res)) {
                    $facility[$key] = $row;

                }
            }

            $sql = "SELECT * FROM ruleonroom WHERE roomId = ?";
            $res = select($sql, [$id], 'i');
            while ($row = mysqli_fetch_assoc($res)) {
                $rule[] = $row;
            }

            foreach ($rule as $key => $value) {
                $sql = "SELECT * FROM rule WHERE id = ?";
                $res = select($sql, [$value['ruleId']], 'i');
                while ($row = mysqli_fetch_assoc($res)) {
                    $rule[$key] = $row;

                }
            }

            $sql = "SELECT * FROM capacityonroom WHERE roomId = ?";
            $res = select($sql, [$id], 'i');
            while ($row = mysqli_fetch_assoc($res)) {
                $capacity[] = $row;
            }

            foreach ($capacity as $key => $value) {
                $sql = "SELECT * FROM capacity WHERE id = ?";
                $res = select($sql, [$value['capacityId']], 'i');
                while ($row = mysqli_fetch_assoc($res)) {
                    $capacity[$key] = $row;

                }
            }
            $data = [
                'room' => $room,
                'facility' => $facility,
                'rule' => $rule,
                'capacity' => $capacity
            ];

            $html = "<div class='card mb-4 border-0 shadow'>";
            $html .= "<div class='row g-0 p-3 align-items-center'>";
            $html .= "<div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>";
            $html .= "<div id='carousel$room[id]' class='carousel slide'>";
            $html .= "<div class='carousel-indicators'>";
            $html .= "<button type='button' data-bs-target='#carousel$room[id]' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>";
            $html .= "<button type='button' data-bs-target='#carousel$room[id]' data-bs-slide-to='1' aria-label='Slide 2'></button>";
            $html .= "<button type='button' data-bs-target='#carousel$room[id]' data-bs-slide-to='2' aria-label='Slide 3'></button>";
            $html .= "</div>";
            $html .= "<div class='carousel-inner'>";
            $html .= "<div class='carousel-item active'>";
            $html .= "<img src='./assets/images/room/$room[picture]' class='d-block w-100' alt='...'>";
            $html .= "</div>";
            $html .= "<div class='carousel-item'>";
            $html .= "<img src='./assets/images/room/$room[picture]' class='d-block w-100' alt='...'>";
            $html .= "</div>";
            $html .= "<div class='carousel-item'>";
            $html .= "<img src='./assets/images/room/$room[picture]' class='d-block w-100' alt='...'>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "<button class='carousel-control-prev' type='button' data-bs-target='#carousel$room[id]' data-bs-slide='prev'>";
            $html .= "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
            $html .= "<span class='visually-hidden'>Previous</span>";
            $html .= "</button>";
            $html .= "<button class='carousel-control-next' type='button' data-bs-target='#carousel$room[id]' data-bs-slide='next'>";
            $html .= "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
            $html .= "<span class='visually-hidden'>Next</span>";
            $html .= "</button>";
            $html .= "</div>";
            $html .= "</div>";

            $html .= "<div class='col-md-4 px-lg-3 px-md-3 px-0'>";
            $html .= "<h5 class='mb-3'>$room[name]</h5>";
            $html .= "<p class='mb-3'>$room[description]</p>";
            $html .= "<p class='mb-3'>Rp. $room[price]</p>";
            $html .= "<p class='mb-3'>Facility:</p>";
            $html .= "<ul class='mb-3'>";
            foreach ($facility as $key => $value) {
                $html .= "<li>$value[name]</li>";
            }
            $html .= "</ul>";
            $html .= "<p class='mb-3'>Rule:</p>";
            $html .= "<ul class='mb-3'>";
            foreach ($rule as $key => $value) {
                $html .= "<li>$value[description]</li>";
            }
            $html .= "</ul>";
            $html .= "<p class='mb-3'>Capacity:</p>";
            $html .= "<ul class='mb-3'>";
            foreach ($capacity as $key => $value) {
                $html .= "<li>$value[description]</li>";
            }
            $html .= "</ul>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";

            // echo json_encode($data);
            echo $html;

        }
        $sql = '';
        if (substr($type, 0, 5) == 'paket') {
            $sql = "SELECT * FROM bundling WHERE id = $id";
            $res = mysqli_query($conn, $sql);
            $bundling = mysqli_fetch_assoc($res);

            $sql = "SELECT * FROM facilityonbundling WHERE bundlingId = $id";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $facility[] = $row;
            }

            foreach ($facility as $key => $value) {
                $sql = "SELECT * FROM facility WHERE id = ?";
                $res = select($sql, [$value['facilityId']], 'i');
                while ($row = mysqli_fetch_assoc($res)) {
                    $facility[$key] = $row;

                }
            }

            $sql = "SELECT * FROM ruleonbundling WHERE bundlingId = ?";
            $res = select($sql, [$id], 'i');
            while ($row = mysqli_fetch_assoc($res)) {
                $rule[] = $row;
            }

            foreach ($rule as $key => $value) {
                $sql = "SELECT * FROM rule WHERE id = ?";
                $res = select($sql, [$value['ruleId']], 'i');
                while ($row = mysqli_fetch_assoc($res)) {
                    $rule[$key] = $row;

                }
            }

            $html = "<div class='card mb-4 border-0 shadow'>";
            $html .= "<div class='row g-0 p-3 align-items-center'>";
            $html .= "<div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>";
            $html .= "<div id='carousel$bundling[id]' class='carousel slide'>";
            $html .= "<div class='carousel-indicators'>";
            $html .= "<button type='button' data-bs-target='#carousel$bundling[id]' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>";
            $html .= "<button type='button' data-bs-target='#carousel$bundling[id]' data-bs-slide-to='1' aria-label='Slide 2'></button>";
            $html .= "<button type='button' data-bs-target='#carousel$bundling[id]' data-bs-slide-to='2' aria-label='Slide 3'></button>";
            $html .= "</div>";
            $html .= "<div class='carousel-inner'>";
            $html .= "<div class='carousel-item active'>";
            $html .= "<img src='./assets/images/bundling/$bundling[picture]' class='d-block w-100' alt='...'>";
            $html .= "</div>";
            $html .= "<div class='carousel-item'>";
            $html .= "<img src='./assets/images/bundling/$bundling[picture]' class='d-block w-100' alt='...'>";
            $html .= "</div>";
            $html .= "<div class='carousel-item'>";
            $html .= "<img src='./assets/images/bundling/$bundling[picture]' class='d-block w-100' alt='...'>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "<button class='carousel-control-prev' type='button' data-bs-target='#carousel$bundling[id]' data-bs-slide='prev'>";
            $html .= "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
            $html .= "<span class='visually-hidden'>Previous</span>";
            $html .= "</button>";
            $html .= "<button class='carousel-control-next' type='button' data-bs-target='#carousel$bundling[id]' data-bs-slide='next'>";
            $html .= "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
            $html .= "<span class='visually-hidden'>Next</span>";
            $html .= "</button>";
            $html .= "</div>";
            $html .= "</div>";

            $html .= "<div class='col-md-4 px-lg-3 px-md-3 px-0'>";
            $html .= "<h5 class='mb-3'>$bundling[name]</h5>";
            $html .= "<p class='mb-3'>$bundling[description]</p>";
            $html .= "<p class='mb-3'>Rp. $bundling[price]</p>";
            $html .= "<p class='mb-3'>Facility:</p>";
            $html .= "<ul class='mb-3'>";
            foreach ($facility as $key => $value) {
                $html .= "<li>$value[name]</li>";
            }
            $html .= "</ul>";
            $html .= "<p class='mb-3'>Rule:</p>";
            $html .= "<ul class='mb-3'>";
            foreach ($rule as $key => $value) {
                $html .= "<li>$value[description]</li>";
            }
            $html .= "</ul>";
            $html .= "</div>";
            $html .= "</div>";
            $html .= "</div>";

            echo $html;

        }


        ?>
        <div class="row mt-4 mb-4">
            <div class="col-md-6 offset-md-3">
                <h4 class="fw-bold mb-3">Pembayaran</h4>
                <form method="POST" id="form_pembayaran">
                    <div class="mb-3">


                        <label for="payment_method" class="form-label">Pilih metode pembayaran</label>
                        <select class="form-select" id="payment_method" name="payment_method">
                            <option value="dana">DANA</option>
                            <option value="bank_transfer">BCA</option>
                        </select>
                        <!-- date picker for check in and check out -->
                        <label for="check_in" class="form-label">Tanggal Check In</label>
                        <input type="date" class="form-control" id="check_in" name="check_in" required>
                        <label for="check_out" class="form-label">Tanggal Check Out</label>
                        <input type="date" class="form-control" id="check_out" name="check_out" required>

                        <!-- hidden room input -->
                        <input type="hidden" name="room_id" value="<?php if (!empty($room['id'])) {
                            echo $room['id'];
                        } else {
                            echo $id;
                        } ?>">
                        <input type="hidden" name="type" value="<?php if (!empty($type))
                            echo substr($type, 5); ?>">
                        <!-- hidden user -->
                        <input type="hidden" name="user_id" value="<?php
                        if (isset($_SESSION['data']['id'])) {
                            echo $_SESSION['data']['id'];
                        }
                        ?>">
                    </div>
                    <?php
                    if (isset($_SESSION['data']['id'])) {
                        echo '<button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#paymentModal">
                        Bayar</button>';
                    } else {
                        echo alert('danger', 'Silahkan login terlebih dahulu');
                    }
                    ?>


                </form>
            </div>
        </div>
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Detail Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="formModalPaymey">
                    </div>
                </div>
            </div>
        </div>
        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <?php include './admin/inc/scripts.php' ?>
        <script src="./assets/js/payment.js"></script>
</body>

</html>