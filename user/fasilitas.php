<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AW - FACILITIES</title>


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
        <h2 class="fw-bold h-font text-center">Our Facilities</h2>
        <hr>
        <p class="text-center mt-3">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptatibus odit architecto sunt ratione
            voluptate, fugit maxime odio animi asperiores deserunt harum, ipsam molestiae fuga numquam tenetur et labore
            aspernatur? Quas?
        </p>
    </div>

    <div class="container">
        <div class="row">
            <?php

            $sql = "SELECT * FROM facility WHERE isGeneral = ?";
            $res = select($sql, [1], 'i');

            foreach ($res as $row) {
                echo "<div class='col-lg-4 col-md-6 mb-5 px-4'>
                <div class='bg-white rounded shadow p-4 border-top border-4 border-dark pop'>
                    <div class='d-flex align-items-center mb-2'>
                        <img src='./assets/images/facility/" . $row['picture'] . "' width='40px'>
                        <h5 class='m-0 ms-3'>" . $row['name'] . "</h5>
                    </div>
                    <p>" . $row['description'] . "</p>
                </div>
            </div>";
            }
            ?>

        </div>
    </div>

    <?php require('inc/footer.php'); ?>

</body>

</html>