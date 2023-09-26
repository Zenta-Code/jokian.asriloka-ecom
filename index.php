<?php

session_start();
$request = $_SERVER['REQUEST_URI'];
if (strpos($request, '/aw') === 0) {
    $request = substr($request, 3);
}
$dir = str_replace('\\', '/', __DIR__);
$isAdmin = strpos($request, '/admin') === 0;

if ($isAdmin) {
    $request = substr($request, 6);
    echo $request;
    switch ($request) {
        case '':
        case '/':
        case 'index':
            require $dir . '/admin/index.php';
            break;

        case '/dashboard':
            require $dir . '/admin/dashboard.php';
            break;

        case '/fasilitas':
            require $dir . '/admin/fasilitas.php';
            break;

        case '/ketentuan':
            require $dir . '/admin/ketentuan.php';
            break;

        case '/logout':
            require $dir . '/admin/logout.php';
            break;

        case '/setting':
            require $dir . '/admin/setting.php';
            break;

        default:
            http_response_code(404);
            require __DIR__ . '/admin/index.php';
            break;
    }

} else {
    switch ($request) {
        case '':
        case '/':
        case 'index':
            require $dir . '/user/index.php';
            break;

        case '/fasilitas':
            require $dir . '/user/fasilitas.php';
            break;

        case '/ketentuan':
            require $dir . '/user/ketentuan.php';
            break;
        case str_contains($request, '/details'):
            require $dir . '/user/details.php';
            break;

        case str_contains($request, '/user'):
            require $dir . '/user/user.php';
            break;

        case str_contains($request, '/invoice'):
            require $dir . '/user/invoice.html';
            break;

        case '/rooms':
            require $dir . '/user/rooms.php';
            break;

        case '/pktLDK':
            require $dir . '/user/pktLDK.php';
            break;

        case '/pktCamp':
            require $dir . '/user/pktCamp.php';
            break;

        case '/pktPerusahaan':
            require $dir . '/user/pktPerusahaan.php';
            break;

        case '/logout':
            require $dir . '/user/logout.php';
            break;

        default:
            http_response_code(404);
            require __DIR__ . '/user/index.php';
            break;
    }
}