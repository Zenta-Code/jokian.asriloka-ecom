<?php
require './../lib/essentials.php';
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>


    <style>
        .bi-check-circle-fill {
            color: darkgreen;
        }
    </style>
    <?php require('inc/links.php'); ?>
</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="container-fluid " id=main-content>
        <div class="row">
            <!-- <div class="col-lg-12 ms-auto p-4 overflow-hidden">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti reiciendis tempora repellat ratione
                culpa a quas dolorum! Ex, est pariatur voluptatem rerum sit accusantium explicabo totam ipsum, ipsa eum
                quisquam!
            </div> -->

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Check In</th>
                                    <th class="text-center">Check Out</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM booking";
                                $res = mysqli_query($conn, $sql);
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

                                foreach ($booking as $key => $value) {
                                    $sql = "SELECT * FROM user WHERE id = ?";
                                    $res = select($sql, [$value['userId']], 'i');
                                    while ($row = mysqli_fetch_assoc($res)) {
                                        $user[] = $row;
                                    }
                                }

                                $html = '';
                                foreach ($booking as $key => $value) {
                                    $html .= "<tr>";
                                    $html .= "<th scope='row'>$key</th>";
                                    $html .= "<td class='text-center'>";
                                    foreach ($user as $k => $v) {
                                        if ($v['id'] == $value['userId']) {
                                            $html .= "$v[name]";
                                            break;
                                        }
                                    }
                                    $html .= "</td>";
                                    $html .= "<td class='text-center'>";
                                    foreach ($room as $k => $v) {
                                        if ($v['id'] == $value['roomId']) {
                                            $html .= "$v[name]";
                                        }
                                    }
                                    $html .= "</td>";
                                    $html .= "<td class='text-center'>$value[id]</td>";
                                    $html .= "<td class='text-center'>$value[checkIn]</td>";
                                    $html .= "<td class='text-center'>$value[checkOut]</td>";

                                    $html .= "<td class='text-center'>";
                                    $html .= "<button type='button' class='btn btn-primary' data-bs-toggle='modal' 
                                    data-bs-id = '$value[id]'
                                    data-bs-target='#viewModal'>View</button>";
                                    $html .= "<button type='button' class='btn btn-success' data-bs-toggle='' data-bs-target='#'><i class='bi bi-check2-square'></i></button>";
                                    $html .= "</td>";
                                    $html .= "</tr>";
                                }
                                echo $html;
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Checked</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">


                            <table>
                                <tbody>
                                    <?php

                                    $html = '';
                                    foreach ($booking as $key => $value) {
                                        $html .= "<tr>";
                                        $html .= "<th scope='row'>$key</th>";
                                        $html .= "<td class='text-center'>";
                                        foreach ($user as $k => $v) {
                                            if ($v['id'] == $value['userId']) {
                                                $html .= "$v[name]";
                                            }
                                        }
                                        $html .= "</td>";
                                        $html .= "<td class='text-center'>";
                                        foreach ($room as $k => $v) {
                                            if ($v['id'] == $value['roomId']) {
                                                $html .= "$v[name]";
                                            }
                                        }
                                        $html .= "</td>";
                                        $html .= "<td class='text-center'>$value[id]</td>";
                                        $html .= "<td class='text-center'>$value[checkIn]</td>";
                                        $html .= "<td class='text-center'>$value[checkOut]</td>";

                                        $html .= "<td class='text-center'>";
                                        $html .= "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#viewModal'>View</button>";
                                        $html .= "<button type='button' class='btn btn-success' data-bs-toggle='' data-bs-target='#'><i class='bi bi-check2-square'></i></button>";
                                        $html .= "</td>";
                                        $html .= "</tr>";
                                    }
                                    echo $html;
                                    ?>
                                </tbody>
                            </table>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php require('inc/scripts.php'); ?>
</body>

</html>