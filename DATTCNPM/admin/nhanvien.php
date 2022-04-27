<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:../logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="admin.css" />
    <title>Nhân Viên</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fa fa-cogs me-2"></i>Nhân Viên</div>
            <div class="list-group list-group-flush my-3">
            <a href="nhanvien.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-shopping-bag me-2"></i>Trang chủ</a>
            <a href="xemthongtin.php" class="list-group-item list-group-item-action bg-transparent second-text"><img src="../img/account/download.png" alt="">Xem Thông Tin</a>
            <a href="xemlichlam.php" class="list-group-item list-group-item-action bg-transparent second-text"><i class="fa fa-eye" aria-hidden="true"></i> Xem Lịch Làm</a>
                <a href="doimatkhau.php" class="list-group-item list-group-item-action bg-transparent second-text"><i
                        class="fas fa-power-off me-2"></i>Đổi Mật Khẩu</a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Đăng xuất</a>
            </div>
        </div>
        <!-- /#sidebar-End -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Thông Tin Nhân Viên</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php if (isset($_SESSION['user']) && $_SESSION['user']){
                        echo $_SESSION['user'];
                    }
                    else{
                        echo 'Bạn chưa đăng nhập';
                    }?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                                <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                                <li><a class="dropdown-item" href="../logout.php">Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid px-5">
                    <div class="row gy-5">
                        <div class="col-lg-12 ">
                        <p style="font-size: 20px; text-align: left; font-weight: bolder;" class="thongtinnhanvien">Thông Tin Nhân Viên</p>
                        <hr>
                        <ul class="thongtinnhanvien" style="display: flex; padding: 0; margin: 0; height: 200px; width: 1171px;">
                            <li><img src="../img/team_member1.jpg" alt="" style="border-radius: 100%; height: 200px;width: 200px;"></li>
                            <li style=" padding: 50px 30px;height: 200px;" class="col-lg-4">
                            <?php
                                if (isset($_SESSION['user']) && $_SESSION['user']){
                                include '../config.php';
                                $username = $_SESSION['user'];
                                $result=mysqli_query($conn, "SELECT * FROM `khachhang` where username = '{$username}'");
                                while ($row = mysqli_fetch_array($result)){
                            ?>
                                <label for="" style="padding: 5px 0px; color: #000; font-size: 15px; font-weight: 600;">Họ Và Tên:</label>
                                <input style="border: none; background-color: transparent;" type="text" disabled value="<?php echo $row['hoten']?>">
                                <br><label style="padding: 5px 0px; font-size: 15px; font-weight: 600;" for="">Ngày Sinh:</label>
                                <input style="border: none; background-color: transparent;" type="text" disabled value="<?php echo $row['ngaysinh']?>">
                                <br><label style="padding: 5px 0px; font-size: 15px; font-weight: 600;" for="">Giới Tính:</label>
                                <input style="border: none; background-color: transparent;" type="text" disabled value="<?php echo $row['gioitinh']?>">
                                <?php }}?></li>
                            <li style="padding: 20px 30px;height: 200px;" class="col-lg-4">
                            <?php
                                if (isset($_SESSION['user']) && $_SESSION['user']){
                                include '../config.php';
                                $username = $_SESSION['user'];
                                $result=mysqli_query($conn, "SELECT * FROM `khachhang` where username = '{$username}'");
                                while ($row = mysqli_fetch_array($result)){
                            ?>
                                <br><label for="" style="padding: 5px 0px; font-size: 15px; font-weight: 600;">Nơi Sinh:</label>
                                <input style="border: none; background-color: transparent;" type="text" disabled value="<?php echo $row['noisinh']?>">
                                <br><label for="" style="padding: 5px 0px; font-size: 15px; font-weight: 600;">Chi Nhánh:</label>
                                <input style="border: none; background-color: transparent;" type="text" disabled value="<?php echo $row['chinhanh']?>">
                                <br><label for="" style="padding: 5px 0px; font-size: 15px; font-weight: 600;">Chức Vụ:</label>
                                <input style="border: none; background-color: transparent;" type="text" disabled value="<?php echo $row['chucvu']?>">
                                <?php }}?>      </li>
                        </ul>
                        </div>
                    </div>
                    <div class="row my-5 ">
                        <div class="col-lg-3" style="background-color: #fff; height: 100px; width: 260px; padding: 10px 10px;">
                            <img style="margin-left:100px ;height: 30px; width: 50px; text-align: center; " src="../img/account/download.png" alt="" class="text-center">
                            <p style="padding-top: 10px;">Thông tin nhân viên</p>
                        </div>
                        <div class="col-lg-3" style="background-color: #fff; height: 100px; width: 260px;  padding: 10px 10px;">
                            <img style="margin-left:100px ;height: 30px; width: 50px; " src="../img/account/download (1).png" alt="">
                            <p style="padding-top: 10px;">Lịch Làm Theo Tuần</p>
                        </div>
                        <div class="col-lg-3" style="background-color: #fff; height: 100px; width: 260px;   padding: 10px 10px;">
                            <img style="margin-left:100px ;height: 30px; width: 50px; "  src="../img/account/download (2).png" alt="">
                            <p style="padding-top: 10px;">Lịch Làm Tháng</p>
                        </div>
                        <div class="col-lg-3" style="background-color: #fff; height: 100px; width: 260px;   padding: 10px 10px;">
                            <img style="margin-left:100px ;height: 30px; width: 50px; " src="../img/account/download (3).png" alt="">
                            <p style="padding-top: 10px;">Doanh Thu</p>
                        </div>
                    </div>
            </div>
            <div class="container-fluid">
            
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>