<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - LDKS</title>

    <?php require('inc/links.php'); ?>

</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Paket LDKS</h2>
    </div>

    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">

                <!-- Form Panel -->
                <div class="col-md-4">
                    <form action="" id="tambahBundlingLDK">
                        <div class="card">
                            <div class="card-header">
                                Penginapan
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label class="control-label">Ketersediaan</label>
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="isReady">No / Ready</label>
                                        <input class="form-check-input" type="checkbox" name="isReady" id="isReady">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Paket</label>
                                    <input type="text" class="form-control" name="bundling_name" id="bundling_name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Harga</label>
                                    <input type="number" class="form-control text-right" name="bundling_price"
                                        name="bundling_price">
                                </div>
                                <label class="control-label">Fasilitas</label>
                                <div class="form-check" id="bundling_facility">
                                    <!-- Add content for Fasilitas -->
                                </div> <label class="control-label">Ketentuan</label>
                                <div class="form-check" id="bundling_rule">
                                    <!-- Add content for Ketentuan -->
                                </div>

                                <div class="form-group">
                                    <label for="" class="control-label">Gambar</label>
                                    <input type="file" class="form-control" name="bundling_gambar" id="bundling_gambar"
                                        onchange="">
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
                                        <th class="text-center">Fasilitas</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="bundling_table">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit Fasilitas -->
                <div class="modal fade" id="staticBackdropBundlingEdit" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Bundling</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="editBundling" enctype="multipart/form-data">
                                    <div class="card">

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="control-label">Ketersediaan</label>
                                                <div class="form-check form-switch" id="edit_isReady>
                                                    <label class=" form-check-label" for="edit_isReady">No /
                                                    Ready</label>
                                                    <input class="form-check-input" type="checkbox" name="edit_isReady"
                                                        id="edit_isReady">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Nama</label>
                                                <input type="text" class="form-control" name="edit_nama" id="edit_nama"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Harga</label>
                                                <input type="number" class="form-control text-right" name="edit_price"
                                                    id="edit_price">
                                            </div>
                                            <label class="control-label">Fasilitas</label>
                                            <div class="form-check" id="edit_room_facility">
                                                <!-- Add content for Fasilitas -->
                                            </div>

                                            <label class="control-label">Ketentuan</label>
                                            <div class="form-check" id="edit_room_rule">
                                                <!-- Add content for Ketentuan -->
                                            </div>
                                            <div class="form-group" id="edit_gambar">
                                                <label for="edit_image" class="control-label">Gambar</label>
                                                <input type="file" class="form-control" name="edit_image"
                                                    id="edit_image">
                                            </div>
                                            <input type="hidden" id="edit_id" name="edit_id"></input>
                                        </div>

                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button class="btn btn-sm btn-primary col-sm-3 offset-md-3"
                                                        name="add_room" data-bs-dismiss="modal" type="submit">
                                                        Save</button>
                                                    <button class="btn btn-sm btn-default col-sm-3" type="button"
                                                        data-bs-dismiss="modal"
                                                        onclick="$('#manage-category').get(0).reset()"> Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Hapus Fasilitas -->
                <div class="modal fade" id="staticBackdropBundlingHapus" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Fasilitas</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" id="hapusBundling">
                                <div class="modal-body">
                                    Apa anda yakin menghapus fasilitas
                                    <div>
                                        <span id="hapus_nama"></span> ?
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                    <input type="hidden" id="hapus_id" name="hapus_id"></input>
                                    <button type="submit" name="hapus" data-bs-dismiss="modal"
                                        class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    <?php require('inc/scripts.php'); ?>
    <script src="../assets/js/bundlingLDK.js"></script>

</body>

</html>