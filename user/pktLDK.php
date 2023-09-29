<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AW - PAKET LDKS</title>

    <?php require('inc/links.php'); ?>

</head>

<body class="bg-light">
    <?php require('inc/header.php'); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR PAKET LDKS</h2>
        <hr>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 px-4">
                <?php
                $sql = "SELECT * FROM bundling WHERE type='LDK'";
                $res = mysqli_query($conn, $sql);
                $bundling = [];
                while ($row = mysqli_fetch_assoc($res)) {
                    $bundling[] = $row;
                }
                foreach ($bundling as $key => $value) {

                    $sql = "SELECT * FROM facilityonbundling WHERE bundlingId = ?";
                    $res = select($sql, [$value['id']], 'i');
                    while ($row = mysqli_fetch_assoc($res)) {
                        $facility[] = $row;
                    }
                    $bundling[$key]['facility'] = $facility;
                    $facility = [];
                }
                foreach ($bundling as $key => $value) {
                    foreach ($value['facility'] as $k => $v) {
                        $sql = "SELECT * FROM facility WHERE id = ?";
                        $res = select($sql, [$v['facilityId']], 'i');
                        while ($row = mysqli_fetch_assoc($res)) {
                            $facility[] = $row;
                        }
                    }
                    $bundling[$key]['facility'] = $facility;
                    $facility = [];
                }

                foreach ($bundling as $key => $value) {
                    // echo  name ,price, facility, picture as html
                    $html = "<div class='card mb-4 border-0 shadow'>";
                    $html .= "<div class='row g-0 p-3 align-items-center'>";
                    $html .= "<div class='col-md-5 mb-lg-0 mb-md-0 mb-3'>";
                    $html .= "<div id='carousel$value[id]' class='carousel slide'>";
                    $html .= "<div class='carousel-indicators'>";
                    $html .= "<button type='button' data-bs-target='#carousel$value[id]' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>";
                    $html .= "<button type='button' data-bs-target='#carousel$value[id]' data-bs-slide-to='1' aria-label='Slide 2'></button>";
                    $html .= "<button type='button' data-bs-target='#carousel$value[id]' data-bs-slide-to='2' aria-label='Slide 3'></button>";
                    $html .= "</div>";
                    $html .= "<div class='carousel-inner'>";
                    $html .= "<div class='carousel-item active'>";
                    $html .= "<img src='./assets/images/bundling/$value[picture]' class='d-block w-100' alt='...'>";
                    $html .= "</div>";
                    $html .= "<div class='carousel-item'>";
                    $html .= "<img src='./assets/images/bundling/$value[picture]' class='d-block w-100' alt='...'>";
                    $html .= "</div>";
                    $html .= "<div class='carousel-item'>";
                    $html .= "<img src='./assets/images/bundling/$value[picture]' class='d-block w-100' alt='...'>";
                    $html .= "</div>";
                    $html .= "</div>";
                    $html .= "<button class='carousel-control-prev' type='button' data-bs-target='#carousel$value[id]' data-bs-slide='prev'>";
                    $html .= "<span class='carousel-control-prev-icon' aria-hidden='true'></span>";
                    $html .= "<span class='visually-hidden'>Previous</span>";
                    $html .= "</button>";
                    $html .= "<button class='carousel-control-next' type='button' data-bs-target='#carousel$value[id]' data-bs-slide='next'>";
                    $html .= "<span class='carousel-control-next-icon' aria-hidden='true'></span>";
                    $html .= "<span class='visually-hidden'>Next</span>";
                    $html .= "</button>";
                    $html .= "</div>";
                    $html .= "</div>";
                    $html .= "<div class='col-md-4 px-lg-3 px-md-3 px-0'>";
                    $html .= "<h5 class='mb-3'>$value[name]</h5>";
                    $html .= "<div class='facilities mb-3'>";
                    $html .= "<h6 class='mb-1'>Fasilitas Kamar</h6>";
                    for ($i = 0; $i < count($value['facility']); $i++) {
                        $html .= "<span class='badge rounded-pill bg-light text-dark text-wrap'>";
                        $html .= $value['facility'][$i]['name'];
                        $html .= "</span>";
                    }
                    $html .= "</div>";
                    $html .= "</div>";
                    $html .= "<div class='col-md-3 text-center'>";
                    $html .= "<h6 class='mb-4'>Rp $value[price]/malam</h6>";
                    $html .= "<a href='details?type=paketLDK&id=$value[id]' class='btn btn-sm text-white custom-bg shadow-none'>Book Now</a>";
                    $html .= "</div>";
                    $html .= "</div>";
                    $html .= "</div>";
                    echo $html;


                }
                ?>
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>

</body>

</html>