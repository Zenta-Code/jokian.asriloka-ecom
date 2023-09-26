<?php
require './../../lib/db.php';
require './../../lib/controller/token.php';
require './../../lib/essentials.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['action']) && $_REQUEST['action'] === 'tambahKamar') {
    $data = $_POST;
    $name = $data['room_name'];
    $price = $data['room_price'];
    $isReady = 0;
    $picture = '';
    if (isset($data['isReady'])) {
        $isReady = 1;
    } else {
        $isReady = 0;
    }
    if (isset($_FILES['room_gambar'])) {
        $picture = $_FILES['room_gambar']['name'];
        echo 'Gambar ada' . $picture;

        $target_dir = "./../../assets/images/room/";
        $target_file = $target_dir . basename($_FILES["room_gambar"]["name"]);

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        $check = getimagesize($_FILES["room_gambar"]["tmp_name"]);
        if ($check !== false) {

            if (move_uploaded_file($_FILES["room_gambar"]["tmp_name"], $target_file)) {
                $picture = basename($_FILES["room_gambar"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";

        }
    }

    $sql = "INSERT INTO room (name, price, isReady, picture) VALUES (?, ?, ?, ?)";
    $res = update($sql, [$name, $price, $isReady, $picture], 'siis');

    if ($res) {
        echo "Kamar Berhasil Ditambahkan\n";
    } else {
        echo "Kamar Gagal Ditambahkan";
    }

    $sql = "SELECT * FROM room ORDER BY id DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $room = $row['id'];


    if (isset($data['selected_fasilitas']) && !empty($data['selected_fasilitas'])) {
        echo "F set";
        $facility = $data['selected_fasilitas'];
        if ($facility != '' || $facility != 'undefined') {
            $facility = explode(',', $facility);
            if (count($facility) > 0) {
                foreach ($facility as $key => $value) {
                    $sql = "INSERT INTO facilityonroom (roomId, facilityId) VALUES (?, ?)";
                    $res = update($sql, [$room, $value], 'ii');
                }
            }
        }
    }
    if (isset($data['selected_capacity']) && !empty($data['selected_capacity'])) {
        $capacity = $data['selected_capacity'];
        if ($capacity != '' || $capacity != 'undefined') {
            $capacity = explode(',', $capacity);
            if (count($capacity) > 0) {
                foreach ($capacity as $key => $value) {
                    $sql = "INSERT INTO capacityonroom (roomId, capacityId) VALUES (?, ?)";
                    $res = update($sql, [$room, $value], 'ii');
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
                    $sql = "INSERT INTO ruleonroom (roomId, ruleId) VALUES (?, ?)";
                    $res = update($sql, [$room, $value], 'ii');
                }
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_REQUEST['action']) && $_REQUEST['action'] === 'loadCapacity') {

    $sql = "SELECT * FROM capacity";
    $res = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    echo json_encode($data);

}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_REQUEST['action']) && $_REQUEST['action'] === 'loadKamar') {
    $sql = "SELECT * FROM room";
    $room = mysqli_query($conn, $sql);

    $data = [];
    while ($row = mysqli_fetch_assoc($room)) {
        $data[] = $row;
    }

    $facility = [];
    $capacity = [];
    $rule = [];

    foreach ($data as $key => $value) {
        $sql = "SELECT * FROM facilityonroom WHERE roomId = ?";
        $res = select($sql, [$value['id']], 'i');
        while ($row = mysqli_fetch_assoc($res)) {
            $facility[] = $row;
        }
        $data[$key]['facility'] = $facility;
        $facility = [];

        $sql = "SELECT * FROM capacityonroom WHERE roomId = ?";
        $res = select($sql, [$value['id']], 'i');
        while ($row = mysqli_fetch_assoc($res)) {
            $capacity[] = $row;
        }
        $data[$key]['capacity'] = $capacity;
        $capacity = [];

        $sql = "SELECT * FROM ruleonroom WHERE roomId = ?";
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
        foreach ($value['capacity'] as $k => $v) {
            $sql = "SELECT * FROM capacity WHERE id = ?";
            $res = select($sql, [$v['capacityId']], 'i');
            while ($row = mysqli_fetch_assoc($res)) {
                $capacity[] = $row;
            }
        }
        $data[$key]['capacity'] = $capacity;
        $capacity = [];
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['action']) && $_REQUEST['action'] === 'editKamar') {
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

        $target_dir = "./../../assets/images/room/";
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

    $sql = "UPDATE room SET name = ?, price = ?, isReady = ?, picture = ? WHERE id = ?";
    $res = update($sql, [$name, $price, $isReady, $picture, $id], 'siisi');

    if ($res) {
        echo "Kamar Berhasil Diubah\n";
    } else {
        echo "Kamar Gagal Diubah";
    }

    $sql = "DELETE FROM facilityonroom WHERE roomId = ?";
    $res = update($sql, [$id], 'i');

    $sql = "DELETE FROM capacityonroom WHERE roomId = ?";
    $res = update($sql, [$id], 'i');

    $sql = "DELETE FROM ruleonroom WHERE roomId = ?";
    $res = update($sql, [$id], 'i');

    if (isset($data['selected_fasilitas']) && !empty($data['selected_fasilitas'])) {
        echo "F set";
        $facility = $data['selected_fasilitas'];
        if ($facility != '' || $facility != 'undefined') {
            $facility = explode(',', $facility);
            if (count($facility) > 0) {
                foreach ($facility as $key => $value) {
                    $sql = "INSERT INTO facilityonroom (roomId, facilityId) VALUES (?, ?)";
                    $res = update($sql, [$id, $value], 'ii');
                }
            }
        }
    }

    if (isset($data['selected_capacity']) && !empty($data['selected_capacity'])) {
        $capacity = $data['selected_capacity'];
        if ($capacity != '' || $capacity != 'undefined') {
            $capacity = explode(',', $capacity);
            if (count($capacity) > 0) {
                foreach ($capacity as $key => $value) {
                    $sql = "INSERT INTO capacityonroom (roomId, capacityId) VALUES (?, ?)";
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
                    $sql = "INSERT INTO ruleonroom (roomId, ruleId) VALUES (?, ?)";
                    $res = update($sql, [$id, $value], 'ii');
                }
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['action']) && $_REQUEST['action'] === 'hapusKamar') {
    $data = $_POST;
    $id = $data['hapus_id'];

    $sql = "DELETE FROM facilityonroom WHERE roomId = ?";
    $res = update($sql, [$id], 'i');

    $sql = "DELETE FROM capacityonroom WHERE roomId = ?";
    $res = update($sql, [$id], 'i');

    $sql = "DELETE FROM ruleonroom WHERE roomId = ?";
    $res = update($sql, [$id], 'i');

    $sql = "DELETE FROM room WHERE id = ?";
    $res = update($sql, [$id], 'i');

    if ($res) {
        echo "Kamar Berhasil Dihapus\n";
    } else {
        echo "Kamar Gagal Dihapus";
    }
}



?>