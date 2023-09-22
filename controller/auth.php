<?php
require_once('./Config/db.php');
class AuthController
{
    public function login(string $email, string $password)
    {
        $conn = connect();
        $find = "SELECT * FROM user WHERE email = '$email'";
        $res = mysqli_query($conn, $find);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $hash = $row['password'];
            if (password_verify($password, $hash)) {
                $_SESSION['userLogin'] = true;
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_phone'] = $row['phone'];
                $_SESSION['user_picture'] = $row['picture'];
                $_SESSION['user_dob'] = $row['dob'];
                $_SESSION['user_address'] = $row['address'];
                $_SESSION['session_created'] = time();
                return json_encode(["success" => true, "message" => "User Logged In Successfully"]);
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

    public function register(string $name, string $email, string $password, string $phone, $picture, string $dob, string $address)
    {
        $conn = connect();
        $find = "SELECT * FROM user WHERE email = '$email'";
        $res = mysqli_query($conn, $find);

        if (mysqli_num_rows($res) > 0) {
            return json_encode(["success" => false, "message" => "Email already exists"]);
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $picture_name = $picture['name'];
        alert('a', $picture_name);
        $q = "";
        if ($picture_name != "") {
            $ext = strtolower(pathinfo($picture['name'], PATHINFO_EXTENSION));
            $prob_ext = ['jpg', 'jpeg', 'png'];

            if (in_array($ext, $prob_ext)) {
                $picture_name = time() . "-" . uniqid() . ".$ext";
                $target_path = "./images/user/$picture_name";

                if (move_uploaded_file($picture['tmp_name'], $target_path)) {
                    $q = "INSERT INTO user (name, email, password, phone, picture, dob, address) VALUES ('$name', '$email', '$hash', '$phone', '$picture_name', '$dob', '$address')";
                } else {
                    return json_encode(["success" => false, "message" => "Failed to upload image"]);
                }
            } else {
                return json_encode(["success" => false, "message" => "Invalid Image Format"]);
            }
        } else {
            $q = "INSERT INTO user (name, email, password, phone, dob, address) VALUES ('$name', '$email', '$hash', '$phone', '$dob', '$address')";
        }

        $res = mysqli_query($conn, $q);

        if ($res) {
            return json_encode(["success" => true, "message" => "User Registered Successfully"]);
        } else {
            return json_encode(["success" => false, "message" => "User Registration Failed"]);
        }
    }

}
?>