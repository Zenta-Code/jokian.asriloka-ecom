<?php
require('inc/essentials.php');
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
            <div class="col-lg-12 ms-auto p-4 overflow-hidden">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti reiciendis tempora repellat ratione
                culpa a quas dolorum! Ex, est pariatur voluptatem rerum sit accusantium explicabo totam ipsum, ipsa eum
                quisquam!
            </div>

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
                                    <th class="text-center">Paket</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td class="text-center">Mulyono</td>
                                    <td class="text-center">Penginapan</td>
                                    <td class="text-center">2366029260</td>
                                    <td class="text-center">Graha Dewi Lt 1</td>
                                    <td class="text-center">Booked <i class="bi bi-check-circle-fill">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#viewModal">
                                            View
                                        </button>
                                        <button type="button" class="btn btn-success" data-bs-toggle=""
                                            data-bs-target="#">
                                            <i class="bi bi-check2-square"></i>
                                        </button>
                                    </td>
                                </tr>

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
                                    <tr>
                                        <td><b>NAMA</b></td>
                                        <td>:</td>
                                        <td>Mulyono</td>
                                    </tr>
                                    <tr>
                                        <td><b>NIK</b></td>
                                        <td>:</td>
                                        <td>351582929220</td>
                                    </tr>
                                    <tr>
                                        <td><b>NO TLP</b></td>
                                        <td>:</td>
                                        <td>089773666262</td>
                                    </tr>
                                    <tr>
                                        <td><b>KATEGORI</b></td>
                                        <td>:</td>
                                        <td>Penginapan</td>
                                    </tr>
                                    <tr>
                                        <td><b>ID</b></td>
                                        <td>:</td>
                                        <td>123322</td>
                                    </tr>
                                    <tr>
                                        <td><b>PAKET</b></td>
                                        <td>:</td>
                                        <td>Graha Dewi Lt 1</td>
                                    </tr>
                                    <tr>
                                        <td><b>STATUS</b></td>
                                        <td>:</td>
                                        <td>Booked</td>
                                    </tr>
                                    <tr>
                                        <td><b>CHECK-IN</b></td>
                                        <td>:</td>
                                        <td>27/11/23</td>
                                    </tr>
                                    <tr>
                                        <td><b>KUANTITAS</b></td>
                                        <td>:</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td><b>TOTAL</b></td>
                                        <td>:</td>
                                        <td>RP 700.000</td>
                                    </tr>
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