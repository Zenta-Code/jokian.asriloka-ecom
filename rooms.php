<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AW - ROOMS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php require('inc/links.php'); ?>

</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR ROOMS</h2>
        <hr>
    </div>

    <div class="container">
        <div class="row">
            <!-- Availability -->
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-sretch mb-3">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none">
                                <label class="form-label">Check-out</label>
                                <input type="date" class="form-control shadow-none">
                            </div>
                        </div>
                        <a href="#" class="btn btn-sm w-100 btn-outline-dark shadow-none">Check Availability</a>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <!-- Graha Dewi Kunti Lt 1 -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">

                            <div id="carouselDK1" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselDK1" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselDK1" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselDK1" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahKuntilt1.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselDK1"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselDK1"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Graha Dewi Lt 1</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Kamar Mandi
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 4 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 700.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Graha Dewi Kunti Lt 2 -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <div id="carouselDK2" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselDK2" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselDK2" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselDK2" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahKuntilt2.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselDK2"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselDK2"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Graha Dewi Kunti Lt 2</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    3 Kamar Mandi Dalam
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 29 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 2.500.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Graha Dewi Kunti Lt 3 -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <div id="carouselDK3" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselDK3" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselDK3" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselDK3" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahKuntilt3.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselDK3"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselDK3"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Graha Dewi Kunti Lt 3</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Kamar Mandi Dalam
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 35 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 3.000.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Griya Arimbi 2 -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <div id="carouselAR2" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselAR2" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselAR2" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselAR2" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahArimbi2.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselAR2"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselAR2"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Griya Arimbi 2</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Kamar Mandi Dalam
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 4 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 350.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Griya Arimbi 3 -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <div id="carouselAR3" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselAR3" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselAR3" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselAR3" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahArimbi3.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselAR3"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselAR3"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Griya Arimbi 3</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    1 Kamar Mandi Dalam
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 5 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 350.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Janaka Besar -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <div id="carouselJB" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselJB" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselJB" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselJB" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahJanaka.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselJB"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselJB"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Janaka Besar</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 15 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 1.500.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Janaka Kecil 1 -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <div id="carouselJK1" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselJK1" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselJK1" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselJK1" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahJanaka.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselJK1"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselJK1"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Janaka Kecil 1</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 3 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 300.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Janaka Kecil 2 -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <div id="carouselJK2" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselJK2" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselJK2" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselJK2" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahJanaka.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselJK2"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselJK2"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Janaka Kecil 2</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 3 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 300.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
                <!-- Janaka Kecil 3 -->
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                            <div id="carouselJK3" class="carousel slide">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselJK3" data-bs-slide-to="0"
                                        class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselJK3" data-bs-slide-to="1"
                                        aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselJK3" data-bs-slide-to="2"
                                        aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/denahJanaka.png" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="images/slide2.jpg" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselJK3"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselJK3"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-4 px-lg-3 px-md-3 px-0">
                            <h5 class="mb-3">Janaka Kecil 3</h5>
                            <div class="facilities mb-3">
                                <h6 class="mb-1">Fasilitas Kamar</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kipas Angin
                                </span>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    Kasur untuk 3 orang
                                </span>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <h6 class="mb-4">Rp 300.000/malam</h6>
                            <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2">Book Now</a>
                            <a href="details.php" class="btn btn-sm w-100 btn-outline-dark shadow-none">More
                                Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <?php require('inc/footer.php'); ?>

</body>

</html>