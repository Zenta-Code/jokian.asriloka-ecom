<?php
require './../../lib/db.php';
require './../../lib/controller/token.php';
require './../../lib/essentials.php';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_REQUEST['action'])) {
    $type = substr($_REQUEST['action'], 4);

    $sql = "SELECT * FROM bundling WHERE type='$type'";
    $res = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    $facility = [];
    $rule = [];

    foreach ($data as $key => $value) {
        $sql = "SELECT * FROM facilityonbundling WHERE bundlingId = ?";
        $res = select($sql, [$value['id']], 'i');
        while ($row = mysqli_fetch_assoc($res)) {
            $facility[] = $row;
        }
        $data[$key]['facility'] = $facility;
        $facility = [];

        $sql = "SELECT * FROM ruleonbundling WHERE bundlingId = ?";
        $res = select($sql, [$value['id']], 'i');
        while ($row = mysqli_fetch_assoc($res)) {
            $rule[] = $row;
        }
        $data[$key]['rule'] = $rule;
        $rule = [];
    }
    foreach ($data as $key => $value) {
        foreach ($value['facility'] as $k => $v) {
            $sql = "SELECT * FROM facility WHERE id = ?";
            $res = select($sql, [$v['facilityId']], 'i');
            while ($row = mysqli_fetch_assoc($res)) {
                $facility[] = $row;
            }
        }
        $data[$key]['facility'] = $facility;
        $facility = [];
    }

    foreach ($data as $key => $value) {
        foreach ($value['rule'] as $k => $v) {
            $sql = "SELECT * FROM rule WHERE id = ?";
            $res = select($sql, [$v['ruleId']], 'i');
            while ($row = mysqli_fetch_assoc($res)) {
                $rule[] = $row;
            }
        }
        $data[$key]['rule'] = $rule;
        $rule = [];
    }

    echo json_encode($data);
}

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['action']) &&
    substr($_REQUEST['action'], 0, 14) === 'tambahBundling'
) {

    $type = substr($_REQUEST['action'], 14);
    $data = $_POST;
    $name = $data['bundling_name'];
    $harga = $data['bundling_price'];
    $isReady = 0;
    $picture = '';
    if (isset($data['isReady'])) {
        $isReady = 1;
    } else {
        $isReady = 0;
    }
    if (isset($_FILES['bundling_gambar'])) {
        $picture = $_FILES['bundling_gambar']['name'];

        $target_dir = './../../assets/images/bundling/';
        $target_file = $target_dir . basename($_FILES["bundling_gambar"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["bundling_gambar"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["bundling_gambar"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["bundling_gambar"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    }

    $sql = "INSERT INTO bundling (name, price, isReady, picture, type) VALUES (?, ?, ?, ?, ?)";
    $res = update($sql, [$name, $harga, $isReady, $picture, $type], 'siiss');
    if ($res) {
        echo "Paket $type Berhasil Ditambahkan";
    } else {
        echo "Paket $type Gagal Ditambahkan";
    }


    $sql = "SELECT * FROM bundling ORDER BY id DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $bundling = $row['id'];
    if (isset($data['selected_fasilitas']) && !empty($data['selected_fasilitas'])) {
        echo "F set";
        $facility = $data['selected_fasilitas'];
        if ($facility != '' || $facility != 'undefined') {
            $facility = explode(',', $facility);
            if (count($facility) > 0) {
                foreach ($facility as $key => $value) {
                    $sql = "INSERT INTO facilityonbundling (bundlingId, facilityId) VALUES (?, ?)";
                    $res = update($sql, [$bundling, $value], 'ii');
                }
            }
        }
    }
    if (isset($data['selected_ketentuan']) && !empty($data['selected_ketentuan'])) {
        $rule = $data['selected_ketentuan'];
        if ($rule != '' || $rule != 'undefined') {
            $rule = explode(',', $rule);
            if (count($rule) > 0) {
                foreach ($rule as $key => $value) {
                    $sql = "INSERT INTO ruleonbundling (bundlingId, ruleId) VALUES (?, ?)";
                    $res = update($sql, [$bundling, $value], 'ii');
                }
            }
        }
    }
}


if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['action']) &&
    substr($_REQUEST['action'], 0, 13) === 'hapusBundling'
) {
    $data = $_POST;
    $id = $data['hapus_id'];

    $sql = "DELETE FROM facilityonbundling WHERE bundlingId = ?";
    $res = update($sql, [$id], 'i');

    $sql = "DELETE FROM ruleonbundling WHERE bundlingId = ?";
    $res = update($sql, [$id], 'i');

    $sql = "DELETE FROM bundling WHERE id = ?";
    $res = update($sql, [$id], 'i');

    if ($res) {
        echo "Kamar Berhasil Dihapus\n";
    } else {
        echo "Kamar Gagal Dihapus";
    }
}

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['action']) &&
    substr($_REQUEST['action'], 0, 12) === 'editBundling'
) {
    $type = substr($_REQUEST['action'], 12);
    $data = $_POST;
    $id = $data['edit_id'];
    $name = $data['edit_nama'];
    $price = $data['edit_price'];
    $isReady = 0;
    $picture = '';
    if (isset($data['isReady'])) {
        $isReady = 1;
    } else {
        $isReady = 0;
    }
    if (isset($_FILES['edit_image'])) {
        $picture = $_FILES['edit_image']['name'];
        echo 'Gambar ada' . $picture;

        $target_dir = "./../../assets/images/bundling/";
        $target_file = $target_dir . basename($_FILES["edit_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["edit_image"]["tmp_name"]);

        if ($check !== false) {
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["edit_image"]["tmp_name"], $target_file)) {
                $picture = basename($_FILES["edit_image"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    $sql = "UPDATE bundling SET name = ?, price = ?, isReady = ?, picture = ?, type = ? WHERE id = ?";
    $res = update($sql, [$name, $price, $isReady, $picture, $type, $id], 'siissi');
    if ($res) {
        echo "Kamar Berhasil Diubah\n";
    } else {
        echo "Kamar Gagal Diubah";
    }

    $sql = "DELETE FROM facilityonbundling WHERE bundlingId = ?";
    $res = update($sql, [$id], 'i');


    $sql = "DELETE FROM ruleonbundling WHERE bundlingId = ?";
    $res = update($sql, [$id], 'i');

    if (isset($data['selected_fasilitas']) && !empty($data['selected_fasilitas'])) {
        echo "F set";
        $facility = $data['selected_fasilitas'];
        if ($facility != '' || $facility != 'undefined') {
            $facility = explode(',', $facility);
            if (count($facility) > 0) {
                foreach ($facility as $key => $value) {
                    $sql = "INSERT INTO facilityonbundling (bundlingId, facilityId) VALUES (?, ?)";
                    $res = update($sql, [$id, $value], 'ii');
                }
            }
        }
    }

    if (isset($data['selected_ketentuan']) && !empty($data['selected_ketentuan'])) {
        $rule = $data['selected_ketentuan'];
        if ($rule != '' || $rule != 'undefined') {
            $rule = explode(',', $rule);
            if (count($rule) > 0) {
                foreach ($rule as $key => $value) {
                    $sql = "INSERT INTO ruleonbundling (bundlingId, ruleId) VALUES (?, ?)";
                    $res = update($sql, [$id, $value], 'ii');
                }
            }
        }
    }
}