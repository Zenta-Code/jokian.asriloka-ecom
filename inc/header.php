<nav class=" navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid ">
        <a class="navbar-brand me-5" href="index.php">
            <img width=20% src="images/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="facilities.php">Fasilitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="ketentuan.php">Ketentuan</a>
                </li>
                <li class="nav-item dropdown me-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Reservasi
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="rooms.php">Rooms</a></li>
                        <li><a class="dropdown-item" href="pktLDK.php">Paket LDK</a></li>
                        <li><a class="dropdown-item" href="pktPerusahaan.php">Paket Perusahaan</a></li>
                        <li><a class="dropdown-item" href="pktCamp.php">Paket Camp</a></li>
                    </ul>
                </li>
            </ul>
            <div class="d-flex">
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal"
                    data-bs-target="#loginModal">
                    Login
                </button>
                <button type="button" class="btn btn-outline-dark shadow-none me-lg-2 me-3" data-bs-toggle="modal"
                    data-bs-target="#registerModal">
                    Register
                </button>
            </div>
        </div>
    </div>
</nav>

<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-item-center">
                        <i class="bi bi-person-circle fs-3 me-2"></i>User Login
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control shadow-none">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control shadow-none">
                    </div>
                    <div class="d-flex align-item-center justify-content-between mb-2">
                        <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                        <a href="javascript: void(0)" class="text-scondary text-decoration-none">Forgot
                            Password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-item-center">
                        <i class="bi bi-person-fill fs-3 me-2"></i>User Registration
                    </h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">Note : Your details
                        must match with your ID</span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3">
                                <label for="user_name" class="form-label">Name</label>
                                <input id="user_name" name="user_name" value="John Doe" type="text"
                                    class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0">
                                <label for="user_email" class="form-label">Email</label>
                                <input id="user_email" name="user_email" value="john1@gmail.com" type="email"
                                    class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label for="user_phone" class="form-label">Phone Number</label>
                                <input id="user_phone" name="user_phone" value="08519801980" type="number"
                                    class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label for="user_picture" class="form-label">Picture</label>
                                <input id="user_picture" name="user_picture" type="file"
                                    class="form-control shadow-none">
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label for="user_dob" class="form-label">Date of birth</label>
                                <input id="user_dob" name="user_dob" type="date" class="form-control shadow-none"
                                    required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label for="user_password" class="form-label">Password</label>
                                <input id="user_password" name="user_password" value="password" type="password"
                                    class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 ps-0 mb-3">
                                <label for="user_confirm_password" class="form-label">Confirm Password</label>
                                <input id="user_confirm_password" name="user_confirm_password" value="password"
                                    type="password" class="form-control shadow-none" required>
                            </div>
                            <div class="col-md-6 p-0 mb-3">
                                <label for="user_address" class="form-label">Address</label>
                                <textarea id="user_address" name="user_address" class="form-control shadow-none"
                                    rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button name="user_register" type="submit" class="btn btn-dark shadow-none">REGISTER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script> 
</script>
<?php
require_once('./debug/logger.php');
require_once('./controller/auth.php');
require_once('././admin/inc/essentials.php');
if (isset($_POST['user_register'])) {

    $auth = new AuthController();
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $confirm_password = $_POST['user_confirm_password'];
    $phone = $_POST['user_phone'];
    $picture = $_FILES['user_picture'];
    $dob = $_POST['user_dob'];
    $address = $_POST['user_address'];
    if ($password != $confirm_password) {
        return alert('error', 'Password and Confirm Password must be same');
    }
    // check dob is valid or not by if more than curent date or empty
    if (empty($dob) || $dob > date('Y-m-d')) {
        return alert('error', 'Invalid Date of Birth');
    }

    $res = $auth->register($name, $email, $password, $phone, $picture, $dob, $address);
    $json = json_decode($res, true);
    logger($res);
    // log to terminal
    return alert($json['success'], $json['message']);

}

?>