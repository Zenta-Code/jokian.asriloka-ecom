<?php
// require('././inc/db.php');
// require '../../lib/db.php';
class AuthController
{
    public function login($data)
    {
        $data = filteration($data);
        $find = "SELECT * FROM user WHERE email =?";
        $res = select($find, [$data['email']], 's');


        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $hash = $row['password'];
            if (password_verify($data['password'], $hash)) {
                unset($row['password']);
                require_once('token.php');

                $res = json_decode(TokenController::generate($data['email'], $row['name'], ), true);
                if ($res['success']) {
                    setcookie('token', $res['token'], time() + (86400 * 30), "/");
                    $_SESSION['token'] = $res['token'];
                    $_SESSION['data'] = $row;
                    return json_encode(["success" => true, "message" => "Login Successful", "data" => $row]);
                } else {
                    return json_encode(["success" => false, "message" => "Token Generation Failed"]);
                }
            } else {
                return json_encode(["success" => false, "message" => "Invalid Password"]);
            }
        } else {
            return json_encode(["success" => false, "message" => "Invalid Email"]);
        }
    }
    public function logout()
    {
        session_destroy();
        header('location: ../index.php');
    }


    public function register($data, $picture)
    {

        $find = "SELECT * FROM user WHERE email = ?";
        $res = select($find, [$data['email']], 's');

        if (mysqli_num_rows($res) > 0) {
            return json_encode(["success" => false, "message" => "Email already exists"]);
        }

        $hash = password_hash($data['password'], PASSWORD_DEFAULT);

        $picture_name = null;
        if (!empty($picture['name']) || $picture['name'] != '') {
            $ext = strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION));
            $prob_ext = ['jpg', 'jpeg', 'png'];

            if (in_array($ext, $prob_ext)) {
                $picture_name = time() . "-" . uniqid() . ".$ext";
                $target_path = "./assets/images/user/$picture_name";

                if (!move_uploaded_file($picture['tmp_name'], $target_path)) {
                    return json_encode(["success" => false, "message" => "Failed to upload image"]);
                }
            } else {
                return json_encode(["success" => false, "message" => "Invalid Image Format"]);
            }
        }
        $q = "INSERT INTO user (name, email, password, phone, dob, address, picture) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $res = update($q, [
            $data['name'],
            $data['email'],
            $hash,
            $data['phone'],
            $data['dob'],
            $data['address'],
            $picture_name
        ], 'sssssss');

        if ($res) {
            return json_encode(["success" => true, "message" => "User Registered Successfully"]);
        } else {
            return json_encode(["success" => false, "message" => "User Registration Failed"]);
        }
    }

}
?>