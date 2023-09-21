<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PERUSAHAAN</title>

    <?php require('inc/links.php'); ?>

</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Paket Perusahaan</h2>
    </div>

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">

                <!-- Form Panel -->
                <div class="col-md-4">
                    <form action="" id="manage-category">
                        <div class="card">
                            <div class="card-header">
                                Penginapan
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="control-label">Ketersediaan</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">No / Ready</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Paket</label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Harga</label>
                                    <input type="number" class="form-control text-right" name="harga">
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Gambar</label>
                                    <input type="file" class="form-control" name="gambar" onchange="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ketentuan</label>
                                    <textarea class="form-control" rows="3" name="ketentuan"></textarea>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> Save</button>
                                        <button class="btn btn-sm btn-default col-sm-3" type="button"
                                            onclick="$('#manage-category').get(0).reset()"> Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- Table Panel -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Ketersediaan</th>
                                        <th class="text-center">Paket</th>
                                        <th class="text-center">Gambar</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Ketentuan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center"><i class="bi bi-check-circle-fill"></i></td>
                                        <td class="text-center">
                                            Paket A - Gathering (No Trainer)
                                        </td>

                                        <td class="text-center">
                                            <img src="../images/slide2.jpg" width="100px" id="cimg">
                                        </td>
                                        <td class="text-center">
                                            <p><b>Rp 75.000</b></p>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Minimal 30 Orang</li>
                                                <li>Durasi 7 jam</li>
                                                <li>Program Training Indoor & Outdoor/Workshop/Gathering</li>
                                                <li>1x Makan, 1x Snack, Minuman Khas Asriloka</li>
                                                <li>Fasilitas Indoor & Outdoor</li>
                                                <li>Sound System Standart</li>
                                            </ul>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary edit_cat" type="button" data-id=""
                                                data-name="" data-price="" data-cover_img="">Edit</button> <br>
                                            <button class="btn btn-sm btn-danger delete_cat" type="button"
                                                data-id="">Delete</button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

</body>

</html>