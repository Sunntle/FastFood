<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Trang quản trị - Three Guys Fast Food</title>
    <base href="http://localhost/live/admin/home">
    <link rel="stylesheet" href="../public/css/styleadmin.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
</head>

<body>
    <div class="container-fluid p-0">
    <!-- <div class="position-absolute top-0 end-0 bg-dark text-white w-100 text-end" >
        <p class="fs-6 m-2">Xin chào, Thành Tài ! <a href="../home" class="text-decoration-none">Quay về</a></p>
    </div> -->
    <?php require_once "./mvc/views/blocks/admin/header.php" ?>
        <div class="wrap">
            <div class="container p-5">
            <?php require_once "./mvc/views/pages/admin/".$data['Pages'].".php" ?>
            </div>
        </div>
    </div>
</body>
<script src="../public/js/jsadmin.js"></script>
</html>