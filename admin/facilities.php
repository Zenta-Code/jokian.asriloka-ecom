<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - FASILITAS</title>


    <?php require('inc/links.php'); ?>

    <style>
        .pop:hover {
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>

</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Data Fasilitas</h2>
        <!-- <p class="text-center mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus odit architecto sunt ratione
            voluptate, fugit maxime odio animi asperiores deserunt harum, ipsam molestiae fuga numquam tenetur et labore
            aspernatur? Quas?
        </p> -->
    </div>

    <div class="container-fluid">

        <!-- Tambah Fasilitas -->
        <div class="mb-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle-fill"></i> Tambah Fasilitas
            </button>

            <!-- Modal Tambah Fasilitas-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <form method="POST" id="tambahFasilitasUmum" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_fasilitas">Nama Fasilitas</label>
                                    <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="gambar_fasilitas">Gambar</label>
                                    <input type="file" class="form-control" name="gambar_fasilitas"
                                        id="gambar_fasilitas" required>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi_fasilitas" name="deskripsi_fasilitas"
                                        required></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button id="add_fasilitas" type="submit" class="btn btn-primary"
                                        data-bs-dismiss="modal">Save
                                        changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <!-- Data Fasilitas -->
        <div class="card">
            <div class="card-header">
                <h6>Data Fasilitas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataX" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class='w-25'>Gambar</th>
                                <th>Nama Fasilitas</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="fasilitasTable">


                            <!-- Modal Edit Fasilitas -->
                            <div class="modal fade" id="staticBackdropFasilitasEdit" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Fasilitas</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" id="editFasilitasUmum">
                                                <input type="hidden" name="edit_id" id="edit_id">

                                                <div class="form-group">
                                                    <label for="edit_nama">Nama Fasilitas</label>
                                                    <input type="text" class="form-control" id="edit_nama"
                                                        name="edit_nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_gambar">Gambar</label>
                                                    <input type="file" class="form-control" name="edit_gambar"
                                                        id="edit_gambar" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="edit_description">Deskripsi</label>
                                                    <textarea class="form-control" id="edit_description"
                                                        name="edit_description" required></textarea>
                                                </div>

                                                <button type="submit" name="edit" data-bs-dismiss="modal"
                                                    class="btn btn-primary w-100 mt-1">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Hapus Fasilitas -->
                            <div class="modal fade" id="staticBackdropFasilitasHapus" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Fasilitas</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form method="POST" id="hapusFasilitasUmum">
                                            <div class="modal-body">
                                                Apa anda yakin menghapus fasilitas
                                                <div>
                                                    <span id="hapus_nama"></span> ?
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Batal</button>
                                                <input type="hidden" id="hapus_id" name="hapus_id"></input>
                                                <button type="submit" name="hapus" data-bs-dismiss="modal"
                                                    class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <?php require('inc/scripts.php'); ?>
    <script src="../assets/js/fasilitas.js"></script>

</body>

</html>