<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        $q = 'SELECT * FROM user';
        $this->db->query($q);
        $res = $this->db->resultSet();
        return $res;
    }

    public function getUserById($id)
    {
        $q = 'SELECT * FROM user WHERE id = ?';
        $this->db->query($q);
        $this->db->bind(1, $id);
        $res = $this->db->resultSet();
        return $res;
    }

    public function addUser($data)
    {
        $q = 'INSERT INTO user (name, email, password, role) VALUES (?, ?, ?, ?)';
        $this->db->query($q);
        $this->db->bind(1, $data['name']);
        $this->db->bind(2, $data['email']);
        $this->db->bind(3, $data['password']);
        $this->db->bind(4, $data['role']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateUser($data)
    {
        $q = 'UPDATE user SET name = ?, email = ?, password = ?, role = ? WHERE id = ?';
        $this->db->query($q);
        $this->db->bind(1, $data['name']);
        $this->db->bind(2, $data['email']);
        $this->db->bind(3, $data['password']);
        $this->db->bind(4, $data['role']);
        $this->db->bind(5, $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteUser($id)
    {
        $q = 'DELETE FROM user WHERE id = ?';
        $this->db->query($q);
        $this->db->bind(1, $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function login($data)
    {
        $q = 'SELECT * FROM user WHERE email = ?';
        $this->db->query($q);
        $this->db->bind(1, $data['email']);
        $res = $this->db->resultSet();

        if (count($res) > 0) {
            if (password_verify($data['password'], $res[0]['password'])) {
                $token = base64_encode(random_bytes(32));
                $q = 'UPDATE user SET token = ? WHERE email = ?';
                $this->db->query($q);
                $this->db->bind(1, $token);
                $this->db->bind(2, $data['email']);
                $this->db->execute();

           
                // set session
                $_SESSION['token'] = $token;
                $_SESSION['data'] = $res[0];
                // set cookie
                setcookie('token', $token, time() + (86400 * 30), "/");

                return json_encode(
                    ["success" => true, "message" => "Login Successful", "token" => $token, "data" => $res[0]]
                );
            } else {
                return json_encode(["success" => false, "message" => "Invalid Password"]);
            }
        } else {
            return json_encode(["success" => false, "message" => "Invalid Email"]);
        }
    }

    public function register($data)
    {
        $q = 'SELECT * FROM user WHERE email = ?';
        $this->db->query($q);
        $this->db->bind(1, $data['email']);
        $res = $this->db->resultSet();

        if (count($res) > 0) {
            return json_encode(["success" => false, "message" => "Email Already Registered"]);
        } else {
            $q = 'INSERT INTO user (name, email, password, role) VALUES (?, ?, ?, ?)';
            $this->db->query($q);
            $this->db->bind(1, $data['name']);
            $this->db->bind(2, $data['email']);
            $this->db->bind(3, password_hash($data['password'], PASSWORD_DEFAULT));
            $this->db->bind(4, $data['role']);
            $this->db->execute();

            return json_encode(["success" => true, "message" => "Registration Successful"]);
        }
    }
}